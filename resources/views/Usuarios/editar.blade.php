@extends('Layout.template')
@section('nombre_pagina','Lista de cupones')
@section('contenido')

<div class="container col-md-6 rounded shadow p-3 mt-4">
  <form role="form"  action="{{route('usuario.update',$usuario->id)}}" method="POST">
    @csrf
    @method('PUT')
        <fieldset>
          <legend>Informacion del Usuario</legend>
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
              <option value='000000' >Seleccione una empresa</option>
                @foreach ($empresas as $empresa)
                <option value='{{$empresa->ID_Empresa}}' {{old('ID_Empresa',$usuario->ID_Empresa)==$empresa->ID_Empresa?"selected":"";}}>{{$empresa->Nombre_Empresa}}</option>
                @endforeach
            </select>
          </div>
          <hr>
          <div class="mb-3">
            <div class="mb-3">
                <p><strong>Codigo del usuario: {{$usuario->id}}</strong></p>
                <input type="hidden" id="id" name="id" class="form-control" placeholder="Codigo Cupon" value="{{old('id',$usuario->id)}}">
              </div>
          </div>
          <div class="mb-3">
            <label for="ID_Rol" class="form-label">Rol:</label>
            <select id="ID_Rol" class="form-select form-select-lg  mi-selector" name="ID_Rol">
                @foreach ($roles as $rol)
                <option value='{{$rol->ID_Rol}}' {{old('ID_Rol',$usuario->ID_Rol)==$rol->ID_Rol?"selected":"";}}>{{$rol->Rol}}</option>
                @endforeach
            </select>
          </div>
          <div class="mb-3">
            <div class="mb-3">
                <label for="Nombre_Usuario" class="form-label">Nombre</label>
                <input type="text" id="Nombre_Usuario" name="Nombre_Usuario" class="form-control" placeholder="Nombre" value="{{old('Nombre_Usuario',$usuario->Nombre_Usuario)}}">
              </div>
          </div>
          <div class="mb-3">
            <label for="Identificacion_Usuario" class="form-label">Identificacion:</label>
            <input type="text" id="Identificacion_Usuario" name="Identificacion_Usuario" class="form-control" placeholder="00000000-0" value="{{old('Identificacion_Usuario',$usuario->Identificacion_Usuario)}}">
          </div>
          <div class="mb-3">
            <label for="Fecha_Nacimiento_Usuario" class="form-label">Fecha de nacimiento:</label>
            <input type="date" id="Fecha_Nacimiento_Usuario" name="Fecha_Nacimiento_Usuario" class="form-control" value="{{old('Fecha_Nacimiento_Usuario',date("Y-m-d", strtotime($usuario->Fecha_Nacimiento_Usuario)))}}">
          </div>
          <div class="mb-3">
            <div class="mb-3">
                <label for="Correo_Usuario" class="form-label">Correo electronico:</label>
                <input type="email" id="Correo_Usuario" name="Correo_Usuario" class="form-control" placeholder="usuario@cuponera.com" value="{{old('Correo_Usuario',$usuario->Correo_Usuario)}}">
              </div>
          </div>
          <div class="mb-3">
            <label for="Contraseña_Usuario" class="form-label">Contraseña:</label>
            <input type="password" id="Contraseña_Usuario" name="Contraseña_Usuario" class="form-control"  >
          </div>
          <div class="mb-3">
            <label for="Contraseña_Usuario_confirmation" class="form-label">Verificar Contraseña:</label>
            <input type="password" id="Contraseña_Usuario_confirmation" name="Contraseña_Usuario_confirmation" class="form-control" >
          </div>
          <div class="mb-3">
            <label for="Estado_Usuario" class="form-label">Estado</label>
            <select id="Estado_Usuario" class="form-select form-select-lg  mi-selector" name="Estado_Usuario" >
                <option value='1' {{old('Estado_Usuario',$usuario->Estado_Usuario)==1?'selected':'';}}>Activo</option>
                <option value='0' {{old('Estado_Usuario',$usuario->Estado_Usuario)==0?'selected':'';}}>Dehabilitado</option>
            </select>
        </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </fieldset>
      </form>
</div>
@endsection