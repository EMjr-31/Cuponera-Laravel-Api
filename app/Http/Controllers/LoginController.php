<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function registro(Request $request){
        $request->validate([
            'id'=>'required',
            'Nombre_Usuario'=>'required',
            'Contraseña_Usuario'=>'required',
            'Correo_Usuario'=>'required',
            'Fecha_Nacimiento_Usuario'=>'required',
            'Identificacion_Usuario'=>'required',
            'Estado_Usuario',
            'ID_Rol',
            'ID_Empresa'
        ]);
        $user= new User();
        $user->id=$request->id;
        $user->Nombre_Usuario=$request->Nombre_Usuario;
        $user->Correo_Usuario=$request->Correo_Usuario;
        $user->Contraseña_Usuario=hash('sha256',$request->Contraseña_Usuario);
        $user->Fecha_Nacimiento_Usuario=$request->Fecha_Nacimiento_Usuario;
        $user->Identificacion_Usuario=$request->Identificacion_Usuario;
        $user->Estado_Usuario=1;
        $user->ID_Rol="ROL003";
        $user->ID_Empresa=null;   
        $user->save();
        return response()->json(["mensaje"=>"usuario registrado"],201);
    }

    public function login(Request $request){
        $request->validate([
            'Contraseña_Usuario'=>'required',
            'Correo_Usuario'=>'required',

        ]);
        $user= Usuario::where("Correo_Usuario","=",$request->Correo_Usuario)->first();
        if(isset($user)){
            if(hash('sha256',$request->Contraseña_Usuario)==$user->Contraseña_Usuario){
                $token =$user->createToken("auth_token")->plainTextToken;
                return response()->json(["mensaje"=>"se inicio sesion","access_Token"=>$token]);
            }else{
                return response()->json(["mensaje"=>"contra no es valida","error"=>true],200);
            }

        }else{
            return response()->json(["mensaje"=>"usuario no existe","error"=>true],200);
        }
        
    }

    public function perfil(){
        return Auth::user();
    }

    public function logout(){
        Auth::user()->tokens()->delete();
        return response()->json(["status"=>1,"mensaje"=>"sesion cerrada"]);
    }
}
