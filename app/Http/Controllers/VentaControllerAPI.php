<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas=Venta::with('Cupon','Usuario')->get();
        return $ventas;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show($venta)
    {
        $venta=Venta::with('Cupon','Usuario')->find($venta);
        return $venta;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $venta)
    {
        $cupon=Venta::find($venta);
        $cupon->Estado_Canje_Venta=$request->input('Estado_Canje_Venta');
        $cupon->Fecha_Canje_Venta=$request->input('Fecha_Canje_Venta');
        $cupon->save();
        return 1;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }
}
