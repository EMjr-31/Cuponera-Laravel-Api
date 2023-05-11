@extends('Layout.template')
@section('nombre_pagina','Lista de Usuarios')
@section('contenido')
@if(isset($success))
    @dump($success)
@endif
<div class="container mt-4 d-flex justify-content-between p-2">
    <h2 class="d-block">Lista de usuarios</h2>
    <a href="{{route('usuario.create')}}" class="btn btn-primary ">Agregar cupon</a>
</div>
<div class="row rounded shadow mt-3">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Identificaion</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->Nombre_Usuario}}</td>
                <td>{{$usuario->Correo_Usuario}}</td>
                <td>{{$usuario->Identificacion_Usuario}}</td>
                <td>
                    <button type="button" class="btn btn-success ver" data-bs-toggle="modal" data-bs-target="#modal" onclick="detalles('{{$usuario->id}}',1)"><i class="fa-solid fa-eye"></i></button>
                    <a class="btn btn-warning editar" href="{{route('usuario.edit',$usuario->id)}}"><i class="fa-solid fa-edit"  ></i></a>
                    <button type="button" class="btn btn-danger delete" data-bs-toggle="modal" data-bs-target="#modal" onclick="detalles('{{$usuario->id}}',2)"><i class="fa-solid fa-trash"></i></button>
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
                <h5 class="modal-title" id="Nombre_Usuario"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item"><b>ID: </b> <span id="id"></span></li>
                    <li class="list-group-item"><b>Rol: </b> <span id="rol"></span></li>
                    <li class="list-group-item"> <b>Correo: </b><span id="Correo_Usuario"></span></li>
                    <li class="list-group-item"> <b>Fecha de Nacimiento: </b> <span id="Fecha_Nacimiento_Usuario"></span></li>
                    <li class="list-group-item"> <b>Identificacion: </b> <span id="Identificacion_Usuario"></span></li>
                    <li class="list-group-item"><b>Estado: </b> <span id="Estado_Usuario"></span></li>
                    <hr>
                    <li class="list-group-item"><b>Empresa: </b> <span id="Empresa"></span></li>

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
        url:"/cuponera-laravel/public/usuario/"+id,
        type:"GET",
        dataType:"JSON",
        success: function(datos){
            $('#Empresa').text("");
            let actual=new Date();
            let fecha;
            const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            const dias_semana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
            $('#Nombre_Usuario').text(datos.Nombre_Usuario);
            $('#Correo_Usuario').text(datos.Correo_Usuario);
            $('#Identificacion_Usuario').text(datos.Identificacion_Usuario);
            $('#id').text(datos.id);
            //Fecha_Nacimiento_Usuario
            fechas =new Date(Date.parse(datos.Fecha_Nacimiento_Usuario));
            $('#Fecha_Nacimiento_Usuario').text(dias_semana[fechas.getDay()] + ', ' + fechas.getDate() + ' de ' + meses[fechas.getMonth()] + ' de ' + fechas.getUTCFullYear());
            //Estado_Usuario
            let estado;
            if (datos.Estado_Usuario==1){
                estado='Activo';
            }else{
                estado='Deshabilitado';
            }
            $('#Estado_Usuario').text(estado);
            $('#rol').text(datos.role.Rol);
            $('#Cantidad_Cupon').text(datos.Cantidad_Cupon);
            if(datos.ID_Empresa && datos.ID_Empresa!="000000"){
                $('#Empresa').text(datos.empresa.Nombre_Empresa); 
            }else{
                $('#Empresa').text('No perteneces a ninguna empresa');

            }
            if(op==2){
                $('#eliminar_cupon').removeAttr('hidden');
                $('#eliminar_cupon').prop("action","http://localhost/cuponera-laravel/public/usuario/"+datos.id);

            }else{
                $('#eliminar_cupon').attr('hidden');
            }
        }
    })
    }
</script>
@endsection