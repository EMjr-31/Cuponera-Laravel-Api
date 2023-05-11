<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!--Estilos Css-->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css.map">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&family=Varela+Round&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Quicksand', sans-serif;
            font-family: 'Varela Round', sans-serif;
            background: rgb(255,255,255);
            background: radial-gradient(circle, rgba(255,255,255,1) 0%, rgba(148,187,233,1) 100%);
           }
        .bg{
            background-image: url(img/back.jpg);
            background-size:cover;
        }
    </style>
</head>
<body>
    <div class="container w-75 bg-body mt-5 rounded shadow ">
        <div class="row align-items-stretch center-block justify-content-center">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6">
                
            </div>
            <div class="col ">
                <div class="text-center mt-4 mb-0 "><i class="fa-solid fa-ticket fa-bounce " style="font-size: 50px; color: #1e5ed4; padding: 0; margin: 0;;"></i></div>
                <h2 class="fw-bold text-center mb-4">Cuponera</h2>
                <!--LOGIN-->
                <form id="login_form" method="POST" action="{{url('/login/verificar')}}">
                    @csrf
                    @if ($errors->all())
                    <div class="alert alert-danger ">
                         @foreach ($errors->all() as $err)
                         <li>{{$err}}</li>
                         @endforeach
                        </div>
                        @endif
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input name="Correo_Usuario" type="text" id="Correo_Usuario" class="form-control" maxlength="50" placeholder="Correo" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                        <input name="Contraseña_Usuario" type="password" id="Contraseña_Usuario" class="form-control" maxlength="50" placeholder="Contraseña" required>
                    </div>
                    <div class="d-grid mb-5">
                        <button type="submit" class="btn btn-primary">Loign  <i class="fa-solid fa-arrow-right-to-bracket"></i></button>
                    </div>
                </form>
            </div>
            
        </div>
        
    </div>
</body>
 <!--Js-->
 <script src="js/bootstrap.bundle.min.js"></script>
 <script src="js/bootstrap.bundle.min.js.map"></script>
 <script src="js/jquery-3.6.4.min.js"></script>
 <script src="js/sweetalert2.all.min.js"></script>
</html>