<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Role;
use App\Models\Empresa;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=Usuario::with('empresa','role')->get();
        return view('Usuarios.Usuarios',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $max_codigo = Usuario::max('Id');
        $cantidad_cupones=explode('US', $max_codigo)[1];
        $cantidad_cupones=$cantidad_cupones+1;
        switch($cantidad_cupones){
            case $cantidad_cupones<10:
                $codigo='US000'.$cantidad_cupones;
                break;
            case $cantidad_cupones<100:
                    $codigo='US00'.$cantidad_cupones;
                    break;
            case $cantidad_cupones<1000:
                $codigo='US'.$cantidad_cupones;
                break;
        }
        $roles= Role::get();
        $empresas=Empresa::get();
        return view('Usuarios.nuevo',compact('roles','empresas','codigo'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'=>['required'],
            'Nombre_Usuario'=>['required'],
            'Correo_Usuario'=>['required','email'],
            'Fecha_Nacimiento_Usuario'=>['required'],
            'Identificacion_Usuario'=>['required'],
            'ID_Rol'=>['required'],
            'Contraseña_Usuario'=>['required','same:Contraseña_Usuario_confirmation'],
            'Estado_Usuario'=>['required'],
            'ID_Empresa'=>['required']

        ]);
        $usuario= new Usuario();
        $usuario->id=$request->id;
        $usuario->Nombre_Usuario=$request->Nombre_Usuario;
        $usuario->Correo_Usuario=$request->Correo_Usuario;
        $usuario->Fecha_Nacimiento_Usuario=$request->Fecha_Nacimiento_Usuario;
        $usuario->Identificacion_Usuario=$request->Identificacion_Usuario;
        $usuario->Estado_Usuario=$request->Estado_Usuario;
        $usuario->ID_Rol=$request->ID_Rol;
        $usuario->ID_Empresa=$request->ID_Empresa;
        $usuario->Contraseña_Usuario=hash('SHA256',$request->Contraseña_Usuario);
        if($usuario->save()){
            return to_route('usuario.index')->with("success","Cupon creado");
        }else{
            return "no funciono :c";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $usuario=Usuario::with('empresa','role')->find($id);
        return $usuario;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        $roles= Role::get();
        $empresas=Empresa::get();
        return view('Usuarios.editar',compact('roles','empresas','usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'id'=>['required'],
            'Nombre_Usuario'=>['required'],
            'Correo_Usuario'=>['required','email'],
            'Fecha_Nacimiento_Usuario'=>['required'],
            'Identificacion_Usuario'=>['required'],
            'ID_Rol'=>['required'],
            'Contraseña_Usuario'=>['required','same:Contraseña_Usuario_confirmation'],
            'Estado_Usuario'=>['required'],
            'ID_Empresa'=>['required']

        ]);
        $usuario->id=$request->id;
        $usuario->Nombre_Usuario=$request->Nombre_Usuario;
        $usuario->Correo_Usuario=$request->Correo_Usuario;
        $usuario->Fecha_Nacimiento_Usuario=$request->Fecha_Nacimiento_Usuario;
        $usuario->Identificacion_Usuario=$request->Identificacion_Usuario;
        $usuario->Estado_Usuario=$request->Estado_Usuario;
        $usuario->ID_Rol=$request->ID_Rol;
        $usuario->ID_Empresa=$request->ID_Empresa;
        $usuario->Contraseña_Usuario=hash('SHA256',$request->Contraseña_Usuario);
        if($usuario->save()){
            return to_route('usuario.index')->with("success","Cupon creado");
        }else{
            return "no funciono :c";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return to_route('usuario.index')->with("success","Cupon eliminado");
    }
}
