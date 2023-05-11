<?php

namespace App\Http\Controllers;

use App\Models\Rubro;
use Illuminate\Http\Request;

class RubroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rubros= Rubro::get();
        return view('Rubros.Rubros',compact('rubros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $max_codigo = Rubro::max('id_rubro');
        $codigo=$max_codigo+1;

        return view('Rubros.nuevo',compact('codigo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_rubro'=>['required'],
        ]);
        $rubro= new Rubro();
        $rubro->nombre_rubro=$request->nombre_rubro;
        if($rubro->save()){
            return to_route('rubro.index')->with("success","Rubro creado");
        }else{
            return "no funciono :c";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rubros= Rubro::find($id);
        return $rubros;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rubro $rubro)
    {
        return view('Rubros.editar',compact('rubro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rubro $rubro)
    {
        $request->validate([
            'nombre_rubro'=>['required'],

        ]);
        $rubro->nombre_rubro=$request->nombre_rubro;
        if($rubro->save()){
            return to_route('rubro.index')->with("success","Rubro modificada");
        }else{
            return "no funciono :c";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rubro $rubro)
    {
        $rubro->delete();
        return to_route('rubro.index')->with("success","Rubro eliminado");
    }
}
