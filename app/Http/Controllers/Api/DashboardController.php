<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Docente;
use App\Instructor;
use App\User;

class DashboardController extends Controller
{

    public function __construct()
    {
        if (env('JWT_LOGIN'))
        {
            $this->middleware('jwt.auth');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $customResponse = [
            'docentes'      => Docente::get()->count(),
            'instructores'  => Instructor::get()->count(),
            'usuarios'      => User::get()->count(),
            'instructorias' => 0
        ];
        $this->response = $this->successResponse($customResponse);

        return \Response::json($this->response);
    }
}
