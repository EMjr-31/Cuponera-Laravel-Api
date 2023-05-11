<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'Contraseña_Usuario'=>'required',
            'Correo_Usuario'=>'required',

        ]);
        $user= Usuario::where("Correo_Usuario","=",$request->Correo_Usuario)->first();
        if(isset($user)){
            if($user->ID_Rol=="ROL001"){
                if(hash('sha256',$request->Contraseña_Usuario)==$user->Contraseña_Usuario){
                    Auth::login($user);
                    return $user;
                }else{
                    return response()->json(["mensaje"=>"Usuario no permitido","error"=>true],200);
                }

            }else{

            }

        }else{
            return response()->json(["mensaje"=>"usuario no existe","error"=>true],200);
        }
        
    }
}
