<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class LoginUserController extends Controller
{
    public function login (){
        return view('user.login');

    }
    public function verificar (Request $request){
        $request->validate([
            'Contraseña_Usuario'=>'required',
            'Correo_Usuario'=>'required',

        ]);
        $credenciales = $request->only('Correo_Usuario','Contraseña_Usuario');
        $user= Usuario::where("Correo_Usuario","=",$request->Correo_Usuario)->first();
        if(isset($user)){
           
            if(hash('sha256',$request->Contraseña_Usuario)==$user->Contraseña_Usuario){
                Auth::login($user);
                return to_route('cupon.index',compact('user'));
            }else{
                return redirect('/login');
            }
        }

        
    }
    public function logout(){
        Auth::logout();
        return view('user.login');

    }
}
