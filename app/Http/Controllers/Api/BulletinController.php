<?php

namespace App\Http\Controllers\Api;

use App\Utils\CustomValidators;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Bulletin;
use App\Instructor;
use App\Mail\BulletinMailable;
use Illuminate\Support\Facades\Mail;

class BulletinController extends Controller
{
//    public function __construct()
//    {
//        if (env('JWT_LOGIN'))
//        {
//            $this->middleware('jwt.auth');
//        }
//    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        if ($row = Bulletin::get()) {

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
        $validator = CustomValidators::requestValidator($request, CustomValidators::$bulletinRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidCreation;

        } else {

            Bulletin::create($request->all());
            $emails =  Bulletin::getMailsFromInstructors(
                $request->withouthTrainings,
                $request->areScholarshipped
            );
            Mail::to($emails)
                ->send(new BulletinMailable(
                    $request->subject,
                    $request->headerMessage,
                    $request->message,
                    $request->footerMessage
                ));

                $this->response = $this->successCreation;

//            $this->response = $this->successResponse($emails);
        }

        return \Response::json($this->response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
