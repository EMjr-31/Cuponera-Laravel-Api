@extends('Layout.template')
@section('nombre_pagina','Lista de Usuarios')
@section('contenido')
@if(isset($success))
    @dump($success)
@endif
<div class="container mt-4 d-flex justify-content-between p-2">
    <h2 class="d-block">Lista de empresas</h2>
    <a href="{{route('empresa.create')}}" class="btn btn-primary ">Agregar Empresa</a>
</div>
<div class="row rounded shadow mt-3">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Empresa</th>
                <th>Rubro</th>
                <th>Comision</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empresas as $empresa)
            <tr>
                <td>{{$empresa->ID_Empresa}}</td>
                <td>{{$empresa->Nombre_Empresa}}</td>
                <td>{{$empresa->Rubro_Empresa}}</td>
                <td>{{$empresa->Comision_Empresa}}</td>
                <td>
                    <button type="button" class="btn btn-success ver" data-bs-toggle="modal" data-bs-target="#modal" onclick="detalles('{{$empresa->ID_Empresa}}',1)"><i class="fa-solid fa-eye"></i></button>
                    <a class="btn btn-warning editar" href="{{route('empresa.edit',$empresa->ID_Empresa)}}"><i class="fa-solid fa-edit"  ></i></a>
                    <button type="button" class="btn btn-danger delete" data-bs-toggle="modal" data-bs-target="#modal" onclick="detalles('{{$empresa->ID_Empresa}}',2)"><i class="fa-solid fa-trash"></i></button>
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
                <h5 class="modal-title" id="Nombre_Empresa"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item"> <b>Rubro: </b><span id="Rubro_Empresa"></span></li>
                    <li class="list-group-item"> <b>Comision : </b> <span id="Comision_Empresa"></span></li>
                    <li class="list-group-item"> <b>Estado: </b> <span id="Estado_Empresa"></span></li>
                    <li class="list-group-item"><b>Fecha de Creacion: : </b> <span id="Fecha_Creacion_Empresa"></span></li>
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
        url:"/cuponera-laravel/public/empresa/"+id,
        type:"GET",
        dataType:"JSON",
        success: function(datos){
            $('#Empresa').text("");
            let actual=new Date();
            let fecha;
            const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            const dias_semana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
            $('#ID_Empresa').text(datos.ID_Empresa);
            $('#Nombre_Empresa').text(datos.Nombre_Empresa);
            $('#Rubro_Empresa').text(datos.Rubro_Empresa);
            $('#Comision_Empresa').text(datos.Comision_Empresa);
            //Fecha_Nacimiento_Usuario
            fechas =new Date(Date.parse(datos.Fecha_Creacion_Empresa));
            $('#Fecha_Creacion_Empresa').text(dias_semana[fechas.getDay()] + ', ' + fechas.getDate() + ' de ' + meses[fechas.getMonth()] + ' de ' + fechas.getUTCFullYear());
            //Estado_Usuario
            let estado;
            if (datos.Estado_Empresa==1){
                estado='Activo';
            }else{
                estado='Deshabilitado';
            }
            $('#Estado_Empresa').text(estado);
            if(op==2){
                $('#eliminar_cupon').removeAttr('hidden');
                $('#eliminar_cupon').prop("action","http://localhost/cuponera-laravel/public/empresa/"+datos.ID_Empresa);

            }else{
                $('#eliminar_cupon').attr('hidden');
            }
        }
    })
    }
</script>
@endsection