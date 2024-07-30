<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Burguesía</title>
    <link rel="shortcut icon" href="img/iconoBurguesia.jpg" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/proyecto.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav id="header" class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand dropdown-center d-flex" href="#">
                <img src="img/logo2-removebg-preview.png" alt="BP La Burguesía del Pueblo" width="70" height="70">
                <div class="justify-content-center text-center" style="line-height: 1.1;">
                    <span style="white-space: nowrap; font-size: 0.8em;">____ La ____</span><br>
                    <span style="white-space: nowrap; font-size: 1.3em;"><b>Burguesía</b></span><br>
                    <span style="white-space: nowrap; font-size: 0.8em;">del Pueblo</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">   
                </ul>
            </div>
        </div>
    </nav>

    <br><br><br><br><br>
    
    <!-- Formulario de Inicio de Sesión -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4" style="margin-left: 220px;">Iniciar Sesión</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label" style="margin-left: 150px;">Correo Electrónico</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autocomplete="email" autofocus style="width: 50%; margin-left: 150px">
                        @error('email')
                            <span class="invalid-feedback" role="alert" style="margin-left: 150px;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label" style="margin-left: 150px;">Contraseña</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" style="width: 50%; margin-left: 150px">
                        @error('password')
                            <span class="invalid-feedback" role="alert" style="margin-left: 150px;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: #9CA64E; border-color: #9CA64E; width: 50%; margin-left: 150px;; display: block; margin-top: 30px">Entrar</button>
                </form>
                 <div class="text-center mt-3">
                    <p>¿No tienes una cuenta? <a href="{{ route('register') }} " style="color: #00FFFF;">Regístrate</a></p>
                </div>
            </div>
        </div>
    </div>

    @include('administrar.footer')
</body>
</html>
