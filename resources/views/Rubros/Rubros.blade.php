@extends('Layout.template')
@section('nombre_pagina','Lista de Usuarios')
@section('contenido')
@if(isset($success))
    @dump($success)
@endif
<div class="container mt-4 d-flex justify-content-between p-2">
    <h2 class="d-block">Lista de empresas</h2>
    <a href="{{route('rubro.create')}}" class="btn btn-primary ">Agregar Rubro</a>
</div>
<div class="row rounded shadow mt-3">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Rubro</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rubros as $rubro)
            <tr>
                <td>{{$rubro->id_rubro}}</td>
                <td>{{$rubro->nombre_rubro}}</td>
                <td>
                    <a class="btn btn-warning editar" href="{{route('rubro.edit',$rubro->id_rubro)}}"><i class="fa-solid fa-edit"  ></i></a>
                    <button type="button" class="btn btn-danger delete" data-bs-toggle="modal" data-bs-target="#modal" onclick="detalles('{{$rubro->id_rubro}}',2)"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
</div>
<!--Modal-->
<div id="modal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nombre_rubro"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item"> <b>Codigo : </b><span id="id_rubro"></span></li>
                    <li class="list-group-item"> <b>Rubro:  : </b> <span id="nombre_rubro2"></span></li>
                    <hr>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <form action="" method="POST" id="eliminar_cupon" hidden>
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Eliminar</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
<script>
    function detalles(id,op){
    $.ajax({
        url:"/cuponera-laravel/public/rubro/"+id,
        type:"GET",
        dataType:"JSON",
        success: function(datos){
            $('#nombre_rubro').text("");
            $('#id_rubro').text(datos.id_rubro);
            $('#nombre_rubro').text(datos.nombre_rubro);
            $('#nombre_rubro2').text(datos.nombre_rubro);

            if(op==2){
                $('#eliminar_cupon').removeAttr('hidden');
                $('#eliminar_cupon').prop("action","http://localhost/cuponera-laravel/public/rubro/"+datos.id_rubro);

            }else{
                $('#eliminar_cupon').attr('hidden');
            }
        }
    })
    }
</script>
@endsection