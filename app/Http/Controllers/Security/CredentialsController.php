<?php

  /*
  |--------------------------------------------------------------------------
  | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
  |--------------------------------------------------------------------------
  |
  */
namespace App\Http\Controllers\Security;

use App\User;
use App\Utils\CustomValidators;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class CredentialsController extends Controller
{

    public function __construct()
    {
        if (env('JWT_LOGIN'))
        {
            $this->middleware('jwt.auth', [
                'except' => [
                    'checkUserByEmail',
                    'activateUser'
                ]
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkUserByEmail(Request $request)
    {

        $validator = CustomValidators::requestValidator($request, CustomValidators::$checkByEmailRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidChecking;
        } else {
            if (User::where('email', $request->email)->exists())
            {
                $this->status = 200;
                $this->response = $this->successResponse([
                    'extraMessage' => 'El email existe'
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
     * @return \Illuminate\Http\JsonResponse
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
                        'is_activated' => 1
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
}
