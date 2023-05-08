<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use \stdClass;
use Illuminate\Testing\Fluent\Concerns\Hash;

class AuthControllerAPi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login( Request $request)
    {
        if(!Auth::attempt($request->only('correo','contra'))){
            return response()
            ->json(["message"=>"No autorizado"],401);
        }
        $user = Usuario::where('correo',$request['correo'])->firsOrFail();

        $token=$user->createToken('auth_token')->plainTextToken;

        return response()
        ->json([
            'message'=>'HI', $user->nombre_usuario,
            'accessToken'=>$token,
            'token_type'=>'Bearer',
            'user'=>$user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuario $usuario)
    {
        //
    }
}
