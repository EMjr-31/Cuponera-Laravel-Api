@extends('Layout.template')
@section('nombre_pagina','Lista de cupones')
@section('contenido')

<div class="container col-md-6 rounded shadow p-3 mt-4">
    <form role="form" action="{{route('empresa.store')}}" method="POST">
        @csrf
        <fieldset>
          <legend>Informacion de la Empresa</legend>
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
                <p><strong>Codigo de la Empresa: {{$codigo}}</strong></p>
                <input type="hidden" id="ID_Empresa" name="ID_Empresa" class="form-control" placeholder="Codigo Cupon" value="{{$codigo}}">
              </div>
          </div>
          <div class="mb-3">
            <label for="Rubro_Empresa" class="form-label">Rubro:</label>
            <select id="Rubro_Empresa" class="form-select form-select-lg  mi-selector" name="Rubro_Empresa">
                @foreach ($rubros as $rubro)
                <option value='{{$rubro->nombre_rubro}}' {{old('Rubro_Empresa')==$rubro->nombre_rubro?"selected":"";}}>{{$rubro->nombre_rubro}}</option>
                @endforeach
            </select>
          </div>
          <div class="mb-3">
            <div class="mb-3">
                <label for="Nombre_Empresa" class="form-label">Empresa</label>
                <input type="text" id="Nombre_Empresa" name="Nombre_Empresa" class="form-control" placeholder="Nombre" value="{{old('Nombre_Empresa')}}">
              </div>
          </div>
          <div class="mb-3">
            <label for="Comision_Empresa" class="form-label">Comision:</label>
            <input type="number" id="Comision_Empresa" name="Comision_Empresa" class="form-control" placeholder="0.0" min="0.1" step="0.1" max="0.9" value="{{old('Comision_Empresa')}}">
          </div>
          <div class="mb-3">
            <input type="date" id="Fecha_Creacion_Empresa" name="Fecha_Creacion_Empresa" class="form-control" value="{{date("Y-m-d")}}" hidden>
          </div>
          <div class="mb-3">
            <label for="Estado_Empresa" class="form-label">Estado</label>
            <select id="Estado_Empresa" class="form-select form-select-lg  mi-selector" name="Estado_Empresa" >
                <option value='1' {{old('Estado_Empresa')==1?'selected':'';}}>Activo</option>
                <option value='0' {{old('Estado_Empresa')==0?'selected':'';}}>Dehabilitado</option>
            </select>
        </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </fieldset>
      </form>
</div>
@endsection