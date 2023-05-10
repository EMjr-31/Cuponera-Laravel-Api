<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cupones = Cupon::With('Empresa')->get();
        return $cupones;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show($id_cupon)
    {
        $cupon = Cupon::With('Empresa')->find($id_cupon);
        return $cupon;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cupon $cupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cupon $cupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cupon $cupon)
    {
        //
    }
}
