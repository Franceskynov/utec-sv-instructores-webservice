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
            $this->middleware('jwt.auth');
        }
    }

    public function activate(Request $request)
    {

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
            $this->response = $this->invalidCreation;

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
}
