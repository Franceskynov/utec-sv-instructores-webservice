<?php

namespace App\Http\Controllers\Security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Hash;
use App\Utils\Constants;

class AuthController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['is_enabled'] = true;
        $credentials['is_activated'] = true;
        if (!$token = auth('api')->attempt($credentials)) {

            $this->response = $this->loginResponse([
                'token'   => null,
                'type'    => null,
                'expires' => null
            ], Constants::MESSAGE_LOGIN_FAILS, true);

        } else {

            $this->response = $this->loginResponse([
                'token'   => $token,
                'type'    => 'bearer',
                'expires' => auth('api')->factory()->getTTL() * 60,
            ], Constants::MESSAGE_LOGIN_SUCCESS, false);
        }

        return \Response::json($this->response);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        $this->response = $this->successResponse(Constants::MESSAGE_LOGOUT_SUCCESS);
        return \Response::json($this->response);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        $token = \Auth::guard('api')->refresh();

        $this->response = $this->loginResponse([
            'token'   => $token,
            'type'    => 'bearer',
            'expires' => auth('api')->factory()->getTTL() * 60,
        ], Constants::MESSAGE_LOGIN_SUCCESS, false);
        return \Response::json($this->response);
    }

}
