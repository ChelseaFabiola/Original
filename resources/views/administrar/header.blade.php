<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Burguesía</title>
    <link rel="shortcut icon" href="{{ asset('img/logo2-removebg-preview.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/administrador.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="icon" href="img/iconoBurguesia.jpg" type="image/x-icon">
</head>
<body>

    <!-- Navbar -->
    <nav id="header" class="navbar navbar-expand-lg navbar-light bg-white navbar-dark fixed-top" style="border-bottom: 2px solid #DDDDDD;">
        <div class="container-fluid">
            <a class="navbar-brand dropdown-center d-flex" href="#" style="color:#000000;">
                <img src="../img/logonegor.png" alt="BP La Burguesía del Pueblo" width="60" height="90">
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
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url('/admin')}}" style="font-size: 18px; color: #000000;margin-right: 20px;">Administrar <br> Inicio</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link " href="{{url('/admin/misionvision')}}" style="font-size: 18px; color: #000000;">Administrar <br> Visión y Misión</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link " href="{{url('/admin/menu')}}" style="font-size: 18px; color: #000000;margin-right: 20px;">Administrar <br> Menú</a>
                    </li>
                   <!-- <li class="nav-item">
                        <a id="horarios-link" class="nav-link text-white header-heading header" aria-current="page" style="font-size: 18px;" data-toggle="modal" data-target="#ventanaFlotanteHorario">Administrar <br> Horarios</a>
                    </li>-->
                    <li class="nav-item">
                        <a class="nav-link " href="{{url('/admin/#comentarios')}}" style="font-size: 18px; color: #000000;margin-right: 20px;">Administrar <br> Comentarios</a>
                    </li>
                    
                    <li class="nav-item dropdown" style="margin-right: 20px;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #000000;">
                            {{ Auth::user()->name }} <!--<i class="fas fa-chevron-down"></i> -->
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                        Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- FontAwesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-EXAMPLEHASH" crossorigin="anonymous"></script>

</body>
</html>


    <!-- Ventana flotante de Horarios -->
    <div id="ventanaFlotanteHorario" class="ventana" style="display: none;">
        <div id="modalHorario" class="modal-content">
            <span class="close">&times;</span>
            <h4 style="text-align: center;">Horarios:</h4>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead style="text-align: center;">
                                    <tr>
                                        <th style="border: 7px solid #FFFFFF; background-color: #FFD8B8;">DÍA</th>
                                        <th style="border: 7px solid #FFFFFF; background-color: #FFD8B8;">HORARIO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="border: 7px solid #FFFFFF; background-color: #FFD8B8;">Lunes</td>
                                        <td style="border: 7px solid #FFFFFF; background-color: #FEEDDF;">11:30 a.m - 10:30 p.m</td>
                                    </tr>
                                    <!-- Aquí van las otras filas de horarios -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin de la ventana flotante de Horarios -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Script para la ventana flotante de Horarios -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var horarioLink = document.getElementById('horarios-link');
            var modalHorario = document.getElementById("ventanaFlotanteHorario");
            var closeBtnHorario = modalHorario.querySelector(".close");

            horarioLink.addEventListener('click', function(event) {
                event.preventDefault();
                modalHorario.style.display = "block";
            });

            closeBtnHorario.addEventListener('click', function() {
                modalHorario.style.display = "none";
            });

            window.addEventListener('click', function(event) {
                if (event.target === modalHorario) {
                    modalHorario.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>