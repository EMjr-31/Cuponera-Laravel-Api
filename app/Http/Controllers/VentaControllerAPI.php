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
        $ventas=Venta::all();
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
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        //
    }
}