@extends('Layout.template')
@section('nombre_pagina','Editar Cupon')
@section('contenido')
<div class="container col-md-6 rounded shadow p-3 mt-4">
    <form role="form"  action="{{route('usuario.update',$usuario->id)}}" method="POST">
      @csrf
      @method('PUT')
        <fieldset>
          <legend>Editar Informacion del cupon</legend>
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
                <option value='{{$empresa->ID_Empresa}}' {{old('ID_Empresa',$cupon->empresa->ID_Empresa)==$empresa->ID_Empresa?"selected":"";}}>{{$empresa->Nombre_Empresa}}</option>
                @endforeach
            </select>
          </div>
          <hr>
          <div class="mb-3">
            <div class="mb-3">
                <p><strong>Codigo del cupon: {{$cupon->ID_Cupon}}</strong></p>
                <input type="hidden" id="ID_Cupon" name="ID_Cupon" class="form-control" placeholder="Codigo Cupon" value="{{$cupon->ID_Cupon}}">
              </div>
          </div>
          <div class="mb-3">
            <div class="mb-3">
                <label for="Titulo_Cupon" class="form-label">Titulo del Cupon</label>
                <input type="text" id="Titulo_Cupon" name="Titulo_Cupon" class="form-control" placeholder="Titulo del Cupon" value="{{old('Titulo_Cupon',$cupon->Titulo_Cupon)}}">
              </div>
          </div>
          <div class="mb-3">
            <label for="Descripcion_Cupon" class="form-label">Descripcion:</label>
            <textarea type="text" id="Descripcion_Cupon" name="Descripcion_Cupon" class="form-control" placeholder="Escriba la descripcion aqui">{{old('Descripcion_Cupon',$cupon->Descripcion_Cupon)}}</textarea>
          </div>
          <div class="mb-3">
            <label for="Precio_Regular_Cupon" class="form-label">Precio Regular:</label>
            <input type="number" id="Precio_Regular_Cupon" name="Precio_Regular_Cupon" class="form-control" placeholder="Precio Regular" min="0.1" step="0.1" value="{{old('Precio_Regular_Cupon',$cupon->Precio_Regular_Cupon)}}">
          </div>
          <div class="mb-3">
            <label for="Precio_Oferta_Cupon" class="form-label">Precio oferta:</label>
            <input type="number" id="Precio_Oferta_Cupon" name="Precio_Oferta_Cupon" class="form-control" placeholder="Precio Oferta" min="0.1" step="0.1" value="{{old('Precio_Oferta_Cupon',$cupon->Precio_Oferta_Cupon)}}">
          </div>
          <div class="mb-3">
            <label for="Fecha_Inicio_Oferta_Cupon" class="form-label">Fecha de inicio de la oferta:</label>
            <input type="date" id="Fecha_Inicio_Oferta_Cupon" name="Fecha_Inicio_Oferta_Cupon" class="form-control" value="{{old('Fecha_Inicio_Oferta_Cupon',date("Y-m-d", strtotime($cupon->Fecha_Inicio_Oferta_Cupon)))}}">
          </div>
          <div class="mb-3">
            <label for="Fecha_Fin_Oferta_Cupon" class="form-label">Fecha fin de la oferta:</label>
            <input type="date" id="Fecha_Fin_Oferta_Cupon" name="Fecha_Fin_Oferta_Cupon" class="form-control" value="{{old('Fecha_Fin_Oferta_Cupon',date("Y-m-d", strtotime($cupon->Fecha_Fin_Oferta_Cupon)))}}">
          </div>
          <div class="mb-3">
            <label for="Fecha_Limite_Cupon" class="form-label">Fecha limite para canjea :</label>
            <input type="date" id="Fecha_Limite_Cupon" name="Fecha_Limite_Cupon" class="form-control" value="{{old('Fecha_Limite_Cupon',date("Y-m-d", strtotime($cupon->Fecha_Limite_Cupon)))}}">
          </div>
          <div class="mb-3">
            <label for="Cantidad_Cupon" class="form-label">Cantidad:</label>
            <input type="number" id="Cantidad_Cupon" name="Cantidad_Cupon" class="form-control" placeholder="0" min="1" step="1" value="{{old('Cantidad_Cupon',$cupon->Cantidad_Cupon)}}">
          </div>
          <div class="mb-3">
            <label for="Estado_Cupon" class="form-label">Estado</label>
            <select id="Estado_Cupon" class="form-select form-select-lg  mi-selector" name="Estado_Cupon" >
                <option value='0' {{old('Estado_Cupon',$cupon->Estado_Cupon)==0?'selected':'';}}>No Autorizado</option>
                <option value='1' {{old('Estado_Cupon',$cupon->Estado_Cupon)==1?'selected':'';}}>Autorizado</option>
            </select>
        </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </fieldset>
      </form>
</div>
@endsection