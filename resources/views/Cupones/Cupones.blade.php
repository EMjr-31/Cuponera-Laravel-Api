@extends('Layout.template')
@section('nombre_pagina','Lista de cupones')
@section('contenido')
<div class="container mt-4 d-flex justify-content-between p-2">
    <h2 class="d-block">Lista de cupones</h2>
    <a href="{{route('cupon.create')}}" class="btn btn-primary ">Agregar cupon</a>
</div>
<div class="row rounded shadow mt-3">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Cupon</th>
                <th>Estado</th>
                <th>Empresa</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cupones as $cupon)
            <tr>
                <td>{{$cupon->ID_Cupon}}</td>
                <td>{{$cupon->Titulo_Cupon}}</td>
                <td>
                    @if ($cupon->Estado_Cupon==1)
                        @if (strtotime("$cupon->Fecha_Fin_Oferta_Cupon")<strtotime(date("d-m-Y H:i:00",time())))
                        <p class="bg-danger btn text-white">No disponible</p>
                        @else
                            <p class="bg-success btn text-white"> Activo</p>
                        @endif

                    @else
                    <p class="bg-warning btn text-white">No Autorizado</p>
                    @endif
                </td>
                <td>{{$cupon->Empresa->Nombre_Empresa}}</td>
                <td>
                    <button type="button" class="btn btn-success ver" data-bs-toggle="modal" data-bs-target="#modal" onclick="detalles('{{$cupon->ID_Cupon}}')"><i class="fa-solid fa-eye"></i></button>
                    <button type="button" class="btn btn-warning editar"><i
                            class="fa-solid fa-edit"></i></button>
                    <button type="button" class="btn btn-danger delete"><i
                            class="fa-solid fa-trash"></i></button>
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
                <h5 class="modal-title" id="titulo"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item"> <b>Precio Regular: </b> $<span id="Precio_Regular_Cupon"></span></li>
                    <li class="list-group-item"> <b>Precio oferta: </b> <span id="Precio_Oferta_Cupon"></span></li>
                    <li class="list-group-item"> <b>Fecha de inicio: </b> <span id="Fecha_Inicio_Oferta_Cupon"></span></li>
                    <li class="list-group-item"> <b>Fecha Fin: </b> <span id="Fecha_Fin_Oferta_Cupon"></span></li>
                    <li class="list-group-item"> <b>Fecha Limite: </b> <span id="Fecha_Limite_Cupon"></span></li>
                    <li class="list-group-item"> <b>Descripcion: </b> <span id="Descripcion_Cupon"></span></li>
                    <li class="list-group-item"><b>Cantidad: </b> <span id="Cantidad_Cupon"></span></li>
                    <li class="list-group-item"><b>Estado: </b> <span id="Estado_Cupon"></span></li>
                    <li class="list-group-item"><b>Empresa: </b> <span id="Empresa"></span></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            
        </div>
    </div>
</div>
<script>
    function detalles(id){
    $.ajax({
        url:"/cuponera-laravel/public/cupon/"+id,
        type:"GET",
        dataType:"JSON",
        success: function(datos){
            let actual=new Date();
            let fecha;
            const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            const dias_semana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
            $('#titulo').text(datos.Titulo_Cupon);
            $('#Precio_Regular_Cupon').text(datos.Precio_Regular_Cupon);
            $('#Precio_Oferta_Cupon').text(datos.Precio_Oferta_Cupon);
            //Fecha_Inicio_Oferta_Cupon
            fechas =new Date(Date.parse(datos.Fecha_Inicio_Oferta_Cupon));
            $('#Fecha_Inicio_Oferta_Cupon').text(dias_semana[fechas.getDay()] + ', ' + fechas.getDate() + ' de ' + meses[fechas.getMonth()] + ' de ' + fechas.getUTCFullYear());
            //Fecha_Fin_Oferta_Cupo
            fechas =new Date(Date.parse(datos.Fecha_Fin_Oferta_Cupon));
            $('#Fecha_Fin_Oferta_Cupon').text(dias_semana[fechas.getDay()] + ', ' + fechas.getDate() + ' de ' + meses[fechas.getMonth()] + ' de ' + fechas.getUTCFullYear());
            //estado
            let estado;
            if (datos.Estado_Cupon==1){
                if(fechas<actual){
                    estado='No disponible';
                }else{
                    estado='Activo';
                }
            }else{
                estado='No Autorizado';
            }
            $('#Estado_Cupon').text(estado);
            //Fecha_Limite_Cupon
            fechas =new Date(Date.parse(datos.Fecha_Limite_Cupon));
            $('#Fecha_Limite_Cupon').text(dias_semana[fechas.getDay()] + ', ' + fechas.getDate() + ' de ' + meses[fechas.getMonth()] + ' de ' + fechas.getUTCFullYear());
            $('#Descripcion_Cupon').text(datos.Descripcion_Cupon);
            $('#Cantidad_Cupon').text(datos.Cantidad_Cupon);
            $('#Empresa').text(datos.empresa.Nombre_Empresa);

        }
    })
    }
</script>
@endsection