@extends('Layout.template')
@section('nombre_pagina','Lista de cupones')
@section('contenido')

<div class="container col-md-6 rounded shadow p-3 mt-4">
  <form role="form"  action="{{route('rubro.update',$rubro->id_rubro)}}" method="POST">
    @csrf
    @method('PUT')
        <fieldset>
          <legend>Informacion de la Rubro</legend>
          @if ($errors->all())
            <hr>
            <div class="alert alert-danger ">
                @foreach ($errors->all() as $err)
                    <li>{{$err}}</li>
                    
                @endforeach
            </div>
            @endif
          <div class="mb-3">
            <div class="mb-3">
                <p><strong>Codigo de la Rubro: {{$rubro->id_rubro}}</strong></p>
                <input type="hidden" id="id_rubro" name="id_rubro" class="form-control" placeholder="Codigo Cupon" value="{{$rubro->id_rubro}}">
              </div>
          </div>
          <div class="mb-3">
            <div class="mb-3">
                <label for="nombre_rubro" class="form-label">Empresa</label>
                <input type="text" id="nombre_rubro" name="nombre_rubro" class="form-control" placeholder="Nombre" value="{{old('nombre_rubro',$rubro->nombre_rubro)}}">
              </div>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </fieldset>
      </form>
</div>
@endsection