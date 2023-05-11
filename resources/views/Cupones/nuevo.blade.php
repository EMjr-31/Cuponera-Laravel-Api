@extends('Layout.template')
@section('nombre_pagina','Lista de cupones')
@section('contenido')
<div class="container col-md-6 rounded shadow p-3 mt-4">
    <form role="form" action="{{route('cupon.store')}}" method="POST">
        @csrf
        <fieldset>
          <legend>Informacion del cupon</legend>
          @if ($errors->all())
            <hr>
            <div class="alert alert-danger ">
                @foreach ($errors->all() as $err)
                    <li>{{$err}}</li>
                    
                @endforeach
            </div>
            @endif
          <hr>
          <div class="mb-3">
            <label for="ID_Empresa" class="form-label">Empresa</label>
            <select id="ID_Empresa" class="form-select form-select-lg  mi-selector" name="ID_Empresa">
                @foreach ($empresas as $empresa)
                <option value='{{$empresa->ID_Empresa}}'>{{$empresa->Nombre_Empresa}}</option>
                @endforeach
            </select>
          </div>
          <hr>
          <div class="mb-3">
            <div class="mb-3">
                <p><strong>Codigo del cupon: {{$codigo}}</strong></p>
                <input type="hidden" id="ID_Cupon" name="ID_Cupon" class="form-control" placeholder="Codigo Cupon" value="{{$codigo}}">
              </div>
          </div>
          <div class="mb-3">
            <div class="mb-3">
                <label for="Titulo_Cupon" class="form-label">Titulo del Cupon</label>
                <input type="text" id="Titulo_Cupon" name="Titulo_Cupon" class="form-control" placeholder="Titulo del Cupon">
              </div>
          </div>
          <div class="mb-3">
            <label for="Descripcion_Cupon" class="form-label">Descripcion:</label>
            <textarea type="text" id="Descripcion_Cupon" name="Descripcion_Cupon" class="form-control" placeholder="Escriba la descripcion aqui"></textarea>
          </div>
          <div class="mb-3">
            <label for="Precio_Regular_Cupon" class="form-label">Precio Regular:</label>
            <input type="number" id="Precio_Regular_Cupon" name="Precio_Regular_Cupon" class="form-control" placeholder="Precio Regular" min="0.1" step="0.1">
          </div>
          <div class="mb-3">
            <label for="Precio_Oferta_Cupon" class="form-label">Precio oferta:</label>
            <input type="number" id="Precio_Oferta_Cupon" name="Precio_Oferta_Cupon" class="form-control" placeholder="Precio Oferta" min="0.1" step="0.1">
          </div>
          <div class="mb-3">
            <label for="Fecha_Inicio_Oferta_Cupon" class="form-label">Fecha de inicio de la oferta:</label>
            <input type="date" id="Fecha_Inicio_Oferta_Cupon" name="Fecha_Inicio_Oferta_Cupon" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="Fecha_Fin_Oferta_Cupon" class="form-label">Fecha fin de la oferta:</label>
            <input type="date" id="Fecha_Fin_Oferta_Cupon" name="Fecha_Fin_Oferta_Cupon" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="Fecha_Limite_Cupon" class="form-label">Fecha limite para canjea :</label>
            <input type="date" id="Fecha_Limite_Cupon" name="Fecha_Limite_Cupon" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="Cantidad_Cupon" class="form-label">Cantidad:</label>
            <input type="number" id="Cantidad_Cupon" name="Cantidad_Cupon" class="form-control" placeholder="0" min="1" step="1">
          </div>
          <div class="mb-3">
            <label for="Estado_Cupon" class="form-label">Estado</label>
            <select id="Estado_Cupon" class="form-select form-select-lg  mi-selector" name="Estado_Cupon">
                <option value='0'>No Autorizado</option>
                <option value='1'>Autorizado</option>
            </select>
        </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </fieldset>
      </form>
</div>
@endsection