<?php

namespace App\Http\Controllers;

use App\Models\empresa;
use App\Models\Rubro;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas= Empresa::get();
        return view('Empresas.Empresas',compact('empresas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $max_codigo = Empresa::max('ID_Empresa');
        $cantidad_cupones=explode('EM', $max_codigo)[1];
        $cantidad_cupones=$cantidad_cupones+1;
        switch($cantidad_cupones){
            case $cantidad_cupones<10:
                $codigo='EM000'.$cantidad_cupones;
                break;
            case $cantidad_cupones<100:
                    $codigo='EM00'.$cantidad_cupones;
                    break;
            case $cantidad_cupones<1000:
                $codigo='EM'.$cantidad_cupones;
                break;
        }
        $rubros= Rubro::get();
        return view('Empresas.nuevo',compact('rubros','codigo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID_Empresa'=>['required'],
            'Nombre_Empresa'=>['required'],
            'Comision_Empresa'=>['required','numeric','min:0.1',"max:0.9"],
            'Rubro_Empresa'=>['required'],
            'Fecha_Creacion_Empresa'=>['required'],
            'Estado_Empresa'=>['required']

        ]);
        $empresa= new Empresa();
        $empresa->ID_Empresa=$request->ID_Empresa;
        $empresa->Nombre_Empresa=$request->Nombre_Empresa;
        $empresa->Rubro_Empresa=$request->Rubro_Empresa;
        $empresa->Comision_Empresa=$request->Comision_Empresa;
        $empresa->Estado_Empresa=$request->Estado_Empresa;
        $empresa->Fecha_Creacion_Empresa=$request->Fecha_Creacion_Empresa;
        $empresa->img_empresa=$request->ID_Empresa;
        if($empresa->save()){
            return to_route('empresa.index')->with("success","Cupon creado");
        }else{
            return "no funciono :c";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $empresas= Empresa::find($id);
        return $empresas;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(empresa $empresa)
    {
        $rubros= Rubro::get();
        return view('Empresas.editar',compact('empresa','rubros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, empresa $empresa)
    {
        $request->validate([
            'ID_Empresa'=>['required'],
            'Nombre_Empresa'=>['required'],
            'Comision_Empresa'=>['required','numeric','min:0.1',"max:0.9"],
            'Rubro_Empresa'=>['required'],
            'Estado_Empresa'=>['required']

        ]);
        $empresa->Nombre_Empresa=$request->Nombre_Empresa;
        $empresa->Comision_Empresa=$request->Comision_Empresa;
        $empresa->Rubro_Empresa=$request->Rubro_Empresa;
        $empresa->Estado_Empresa=$request->Estado_Empresa;
        if($empresa->save()){
            return to_route('empresa.index')->with("success","Empresa modificada");
        }else{
            return "no funciono :c";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(empresa $empresa)
    {
        $empresa->delete();
        return to_route('empresa.index')->with("success","Empresa eliminado");
    }
}
