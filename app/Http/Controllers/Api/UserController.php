<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if ( $usuarios =  User::with('rol')->get()) {

            $this->response = $this->successResponse($usuarios);

        } else {

            $this->response = $this->invalidResponse;
        }

        return \Response::json($this->response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ( $usuario =  User::find($id)) {

            $this->response = $this->successResponse($usuario->load('rol'));

        } else {

            $this->response = $this->invalidResponse;
        }

        return \Response::json($this->response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if($usuario = User::find($id))
        {
            if (!$usuario->is_admin)
            {
                if ($usuario->is_enabled )
                {
                    $usuario->update([
                        'is_enabled' => ($usuario->is_enabled == 1) ? 0 : 0
                    ]);

                    $this->response = $this->successDeletion;

                } else {

                    $this->response = $this->previouslyDeleted;
                }

            } else {
                $this->response = $this->invalidUserDelete;
            }

        } else {

            $this->response = $this->notFoundResponse;
        }

        return \Response::json($this->response);
    }
}
