<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use App\Models\Rubro;
use App\Models\Empresa;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cupones = Cupon::With('Empresa')->get();
        return view('Cupones.Cupones',compact('cupones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $max_codigo = Cupon::max('ID_Cupon');
        $cantidad_cupones=explode('CP', $max_codigo)[1];
        $cantidad_cupones=$cantidad_cupones+1;
        switch($cantidad_cupones){
            case $cantidad_cupones<10:
                $codigo='CP000'.$cantidad_cupones;
                break;
            case $cantidad_cupones<100:
                    $codigo='CP00'.$cantidad_cupones;
                    break;
            case $cantidad_cupones<1000:
                $codigo='CP'.$cantidad_cupones;
                break;
        }
        $rubros= Rubro::get();
        $empresas= Empresa::get();
        return view('Cupones.nuevo',compact('rubros','empresas','codigo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID_Cupon'=>['required'],
            'Titulo_Cupon'=>['required'],
            'Precio_Regular_Cupon'=>['required','numeric','min:0'],
            'Precio_Oferta_Cupon'=>['required','numeric','min:0'],
            'Fecha_Inicio_Oferta_Cupon'=>['required','after:tomorrow'],
            'Fecha_Fin_Oferta_Cupon'=>['required','after:Fecha_Inicio_Oferta_Cupon'],
            'Fecha_Limite_Cupon'=>['required','after:Fecha_Fin_Oferta_Cupon'],
            'Descripcion_Cupon'=>['required'],
            'Cantidad_Cupon'=>['required','min:1'],
            'Estado_Cupon'=>['required'],
            'ID_Empresa'=>['required']

        ]);
        $cupon= new Cupon();
        $cupon->ID_Cupon=$request->ID_Cupon;
        $cupon->Titulo_Cupon=$request->Titulo_Cupon;
        $cupon->Precio_Regular_Cupon=$request->Precio_Regular_Cupon;
        $cupon->Precio_Oferta_Cupon=$request->Precio_Oferta_Cupon;
        $cupon->Fecha_Inicio_Oferta_Cupon=$request->Fecha_Inicio_Oferta_Cupon;
        $cupon->Fecha_Fin_Oferta_Cupon=$request->Fecha_Fin_Oferta_Cupon;
        $cupon->Fecha_Limite_Cupon=$request->Fecha_Limite_Cupon;
        $cupon->Descripcion_Cupon=$request->Descripcion_Cupon;
        $cupon->Cantidad_Cupon=$request->Cantidad_Cupon;
        $cupon->Estado_Cupon=$request->Estado_Cupon;
        $cupon->ID_Empresa=$request->ID_Empresa;
        $cupon->img=$request->ID_Cupon;

        if($cupon->save()){
            return to_route('Cupon.index')->with("success","Cupon creado");
        }else{
            return "no funciono :c";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id_cupon)
    {

        $cupon = Cupon::With('Empresa')->find($id_cupon);
        return $cupon;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_cupon)
    {
        $rubros= Rubro::get();
        $empresas= Empresa::get();
        $cupon = Cupon::With('Empresa')->find($id_cupon);
        return view('Cupones.editar',compact('rubros','empresas','cupon'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Cupon $cupon)
    {
        $request->validate([
            'ID_Cupon'=>['required'],
            'Titulo_Cupon'=>['required'],
            'Precio_Regular_Cupon'=>['required','numeric','min:0'],
            'Precio_Oferta_Cupon'=>['required','numeric','min:0'],
            'Fecha_Inicio_Oferta_Cupon'=>['required','after:tomorrow'],
            'Fecha_Fin_Oferta_Cupon'=>['required','after:Fecha_Inicio_Oferta_Cupon'],
            'Fecha_Limite_Cupon'=>['required','after:Fecha_Fin_Oferta_Cupon'],
            'Descripcion_Cupon'=>['required'],
            'Cantidad_Cupon'=>['required','min:1'],
            'Estado_Cupon'=>['required'],
            'ID_Empresa'=>['required']

        ]);
        $cupon->Titulo_Cupon=$request->Titulo_Cupon;
        $cupon->Precio_Regular_Cupon=$request->Precio_Regular_Cupon;
        $cupon->Precio_Oferta_Cupon=$request->Precio_Oferta_Cupon;
        $cupon->Fecha_Inicio_Oferta_Cupon=$request->Fecha_Inicio_Oferta_Cupon;
        $cupon->Fecha_Fin_Oferta_Cupon=$request->Fecha_Fin_Oferta_Cupon;
        $cupon->Fecha_Limite_Cupon=$request->Fecha_Limite_Cupon;
        $cupon->Descripcion_Cupon=$request->Descripcion_Cupon;
        $cupon->Cantidad_Cupon=$request->Cantidad_Cupon;
        $cupon->Estado_Cupon=$request->Estado_Cupon;
        $cupon->ID_Empresa=$request->ID_Empresa;
        $cupon->img=$request->ID_Cupon;
        if($cupon->save()){
            return to_route('Cupones.index')->with("success","Cupon creado");
        }else{
            return "no funciono :c";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cupon $cupon)
    {
        //
    }
}
