<?php

  /*
  |--------------------------------------------------------------------------
  | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
  |--------------------------------------------------------------------------
  |
  */
namespace App\Http\Controllers\Security;

use App\User;
use App\Utils\Constants;
use App\Utils\CustomValidators;
use App\Utils\DataManipulation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\InstructorQuerieMailable;
class CredentialsController extends Controller
{

    public function __construct()
    {
        if (env('JWT_LOGIN'))
        {
            $this->middleware('jwt.auth', [
                'except' => [
                    'checkUserByEmail',
                    'activateUser',
                    'accountRecover',
                    'temporalUserActivation'
                ]
            ]);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request)
    {
        $validator = CustomValidators::requestValidator($request, CustomValidators::$credentialsRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidChecking;

        } else {

            $authtorizedUser = \JWTAuth::user();
            $user = User::find($authtorizedUser->id);
            $hashedPassword = $user->password;
            if (Hash::check($request->oldPassword, $hashedPassword))
            {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
                $this->response = $this->successChanged;
            } else {
                $this->response = $this->invalidChanged;
            }
        }

        return \Response::json($this->response);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function checkUserByEmail(Request $request)
    {

        $validator = CustomValidators::requestValidator($request, CustomValidators::$checkByEmailRules);

        if ($validator->fails())
        {
            $this->status = 406;
            $this->response = $this->invalidChecking;
        } else {


            if ($user = User::where('email', $request->email)->first())
            {
                $this->status = 200;
                $this->response = $this->successResponse([
                    'is_enabled'   => $user->is_enabled,
                    'is_activated' => $user->is_activated,
                ]);
            } else {
                $this->status = 404;
                $this->response = $this->invalidEmailResponse;
            }
        }

        return \Response::json($this->response, $this->status);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function activateUser(Request $request)
    {
        $validator = CustomValidators::requestValidator($request, CustomValidators::$activateCreadentialsRule);

        if ($validator->fails())
        {
            $this->response = $this->invalidChecking;
            $this->status = 406;

        } else {
            $user = User::where('email', $request->email)
                ->where('is_activated', false)
                ->first();

            if ($user)
            {
                $hashedPassword = $user->password;

                if (Hash::check($request->password, $hashedPassword))
                {
                    $user->update([
                        'is_activated'      => 1,
                        'email_verified_at' => \Carbon\Carbon::now()
                    ]);
                    $this->response = $this->successActivatedUser;
                    $this->status = 200;
                } else {
                    $this->response = $this->invalidActivatedUser;
                    $this->status = 400;
                }
            } else {
                $this->status = 400;
                $this->response = $this->invalidUserActivate;
            }
        }

        return \Response::json($this->response, $this->status);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function accountRecover(Request $request)
    {
        $validator = CustomValidators::requestValidator($request, CustomValidators::$checkByEmailRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidChecking;
            $this->status = 406;
        } else {

            $user = User::where('email', $request->email)
                ->where('is_activated', true)
                ->first();
            if ($user)
            {
                $secret = DataManipulation::randomStrings();
                $this->status = 200;
                $email = $user->email;
                $user->update([
                    'password' => Hash::make($secret)
                ]);
                $data = [
                    'url'           => env('APP_URL') . '/#/login',
                    'email'         => $email,
                    'password'      => $secret,
                    'headerMessage' => Constants::EMAIL_ACCOUNT_RECOVER_HEADER_MESSAGE,
                    'footerMessage' => Constants::EMAIL_ACCOUNT_RECOVER_FOOTER_MESSAGE
                ];

                \Mail::send('notifications.users_email_template', $data, function($message) use ($email)
                {
                    $message->to($email)->subject('Recuperacion de credenciales');
                    $message->from('contactanos@utec.edu.sv', 'Control de instructores');
                });

                $this->response = $this->successResponse([
                    'recovered' => true
                ]);
            } else {
                $this->status = 404;
                $this->response = $this->invalidEmailResponse;
            }
        }

        return \Response::json($this->response, $this->status);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function temporalUserActivation(Request $request)
    {
        $validator = CustomValidators::requestValidator($request, CustomValidators::$activateCreadentialsRule);

        if ($validator->fails())
        {
            $this->response = $this->invalidChecking;
            $this->status = 406;

        } else {
            $email = $request->email;
            $password = $request->password;
            Mail::to($email)
                ->send( new InstructorQuerieMailable('Credenciales temporales', $email, $password));
            $this->response = $this->successActivatedUser;
            $this->status = 200;
        }

        return \Response::json($this->response, $this->status);
    }
}
