<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('nombre_pagina')</title>
    <!--Estilos Css-->
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css.map')}}">
    <!--tablas-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <!--Select -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">
</head>

<body>
    <div class="container-fluid shadow">
        <nav class="navbar navbar-expand-md bg-light border-bottom border-3 border-primary">
            <div class="container-fluid">
                <a href="#" class="navbar-brand"><i class="fa-solid fa-ticket"></i> Cuponera</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu_nav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="menu_nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">
                                Usuarios
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('usuario.create')}}" class="dropdown-item">Ingresar</a></li>
                                <li><a href="{{route('usuario.index')}}" class="dropdown-item">Ver Usuarios</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">
                                Empresas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('empresa.create')}}" class="dropdown-item">Ingresar Empresa</a></li>
                                <li><a href="{{route('empresa.index')}}" class="dropdown-item">Ver Empresas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">
                                Cupones
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('cupon.create')}}" class="dropdown-item">Ingresar Cupon</a></li>
                                <li><a href="{{route('cupon.index')}}" class="dropdown-item">Ver Cupones</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">
                                Rubros
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('rubro.create')}}" class="dropdown-item">Ingresar Rubro</a></li>
                                <li><a href="{{route('rubro.index')}}" class="dropdown-item">Ver Rubro</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-3 float-lg-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">
                                User
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="" class="dropdown-item">Perfil</a></li>
                                <li><a href="" class="dropdown-item">Cerrar Sesion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        @yield('contenido')
    </div>
        
    <footer class="container-fluid bg-light p-3 border-top border-3 border-primary mt-5 text-center">
        <p class="small ">Cuponeria 2023</p>

    </footer>
</body>
<!--Js-->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js.map')}}"></script>
<script src="{{asset('js/jquery-3.6.4.min.js')}}"></script>
<script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
<!--Js Select-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('js/select.js')}}"></script>
<!--Js Tabla-->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
    /* Initialization of datatables */
    $(document).ready(function () {
        $('table.display').DataTable();
    });
</script>

</html>