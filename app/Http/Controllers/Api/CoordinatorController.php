<?php

namespace App\Http\Controllers\Api;

use App\Utils\Constants;
use App\Utils\CustomValidators;
use App\Utils\DataManipulation;
use App\Utils\HttpUtils;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coordinator;
use App\User;
use App\Setting;
use Illuminate\Http\Response;

class CoordinatorController extends Controller
{

    public $settings;
    public function __construct()
    {
        $this->settings = Setting::find(1);
        if (env('JWT_LOGIN'))
        {
            $this->middleware('jwt.auth');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        if ($row = Coordinator::get()) {

            $this->response = $this->successResponse($row);

        } else {

            $this->response = $this->invalidResponse;
        }

        return \Response::json($this->response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = CustomValidators::requestValidator($request, CustomValidators::$coordinadorRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidCreation;

        } else {

            $email = $request->email;
            $user = explode( '@', $email)[0];
            $secret = DataManipulation::randomStrings();
            $created = User::create([
                'username'   => $user,
                'email'      => $email,
                'password'   => bcrypt($secret),
                'rol_id'     => 5,
                'is_admin'   => true,
                'is_enabled' => true
            ]);

            if ($id = $created->id)
            {
                $host = HttpUtils::getServerUri($request);
                $data = [
                    'url'           => $host . '/admin/#/login',
                    'email'         => $email,
                    'password'      => $secret,
                    'headerMessage' => Constants::EMAIL_USER_CREATION_HEADER_MESSAGE,
                    'footerMessage' => Constants::EMAIL_USER_CREATION_FOOTER_MESSAGE
                ];

                \Mail::send('notifications.users_email_template', $data, function($message) use ($email)
                {
                    $message->to($email)->subject('Creacion de un nuevo usuario');
                    $message->from('contactanos@utec.edu.sv', 'Control de instructores');
                });

                 Coordinator::create([
                    'nombre'     => $request->nombre,
                    'apellido'   => $request->apellido,
                    'email'      => $email,
                    'telefono'   => $request->telefono,
                    'oficina'    => $request->oficina,
                    'user_id'    => $id,
                    'is_enabled' => true
                ]);

                $this->response = $this->successCreation;
            } else {
                $this->response = $this->invalidCreation;
            }
        }

        return \Response::json($this->response);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        if ( $row = Coordinator::find($id)) {

            $this->response = $this->successResponse($row);

        } else {

            $this->response = $this->invalidResponse;
        }

        return \Response::json($this->response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        if($row = Coordinator::find($id))
        {
            $validator = CustomValidators::requestValidator($request, CustomValidators::$coordinadorRules);

            if ($validator->fails())
            {
                $this->response = $this->invalidChecking;

            } else {

                if($row->update($request->all()))
                {
                    $this->response = $this->successResponse($row);

                } else {

                    $this->response = $this->invalidUpdate;
                }
            }

        } else {

            $this->response = $this->notFoundResponse;
        }

        return \Response::json($this->response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        if($row = Coordinator::find($id))
        {
            if ($row->is_enabled)
            {
                $row->update([
                    'is_enabled' => ($row->is_enabled == 1) ? 0 : 0
                ]);

                $this->response = $this->successDeletion;

            } else {

                $this->response = $this->previouslyDeleted;
            }

        } else {

            $this->response = $this->notFoundResponse;
        }

        return \Response::json($this->response);
    }
}
