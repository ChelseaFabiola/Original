    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>La burguesia</title>
        <!-- Aquí puedes agregar tus estilos CSS si los tienes -->
    </head>
    <style>
        .comentario-container {
            margin-bottom: 20px;
        }

        .comentario-content {
            flex-grow: 1;
            background-color: #FFFFFF;
            border-radius: 10px;
            color: #000000;
            padding: 10px;
        }

        .comentario-content .fecha {
            color: #888888;
            /* Color de la fecha más gris */
        }

        .comentario-content .estrellas {
            color: #FFC300;
            /*color de las estrellitas */
        }

        .user-icon {
            /* Fondo con degradado */
            background: linear-gradient(50deg, #0044ff, #00ccff);
            /* Color del muñeco de usuario blanco */
            color: white;
            /* Forma circular */
            border-radius: 50%;
            /* Para centrar verticalmente */
            display: inline-flex;
            align-items: center;
            /* Para centrar horizontalmente */
            justify-content: center;
            /* Ancho y altura del círculo */
            width: 50px;
            height: 50px;
            /* Espaciado dentro del círculo */
            padding: 5px;
            box-shadow: 0 0 6px #0044ff;
            /* Cambia el valor para ajustar el brillo */
        }
    </style>


    <body>
        <!-- Contenido de tu página -->
        @include('burguesia.header')

        {{-- justify-content-center text-center --}}

        <br><br>
        <div class="text-center">
            <!--le cambie la escala a 75%-->
            <!--tambien le puse style="border:0; border-radius: 20px;"-->
            <video src="img/LaBurguesiaDelPueblo(HD).mp4" class="object-fit-scale" width="75%" autoplay controls muted
                style="border:0; border-radius: 15px;"></video>
        </div>

        <!--agrege brs-->
        <br><br><br>

        <!--sliders-->
        <!--agrege tambien rounded-->
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div id="carouselExample" class="carousel slide rounded" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($imagenes as $imagen)
                                <div class="carousel-item active">
                                    <img src="/storage/{{ $imagen->foto }}" class="d-block w-100 rounded" alt="..." style="height: 500px;object-fit: cover;">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <!--mapa-->
                <!--le cambie los borde de las puntas con rounded y border-radius etc tambien cambie el tamaño del mapa-->
                <div class="col-md-5">
                    <div class="text-center rounded">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15118.796060141516!2d-88.389356!3d18.6774977!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f5bb19cacac039d%3A0xf78e6e0a829b436a!2sLa%20Burgues%C3%ADa%20del%20Pueblo!5e0!3m2!1ses!2smx!4v1710813132548!5m2!1ses!2smx"
                            width="100%" height="495" style="border:0; border-radius: 15px;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>

        <!--agrege brs-->
        <br><br><br><br>




        <!--************************************************************************************************-->
        <!--ingresar comentarios-->
        <div class="text-center justify-content-center">
            <h2>——— Comentarios ———</h2>
            <h3>Deja tu comentario</h3>

            <div style="display: flex; justify-content: center;">
                <form action="{{ url('/') }}" class="col-5" method="POST">
                    @csrf
                    <div class="form">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            placeholder="Ingresa tu nombre" aria-describedby="nombreHelp" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="comentario">Comentario:</label>
                        <textarea class="form-control" id="comentario" name="comentario" rows="3" placeholder="Ingresa un comentario"
                            required></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="puntuacion">Calificación:</label>
                        <select class="form-control" id="puntuacion" name="puntuacion" required>
                            <option value="">Seleccionar...</option>
                            <option value="1" style="color: #FFC300;">{!! str_repeat('&#9733;', 1) !!}</option>
                            <option value="2" style="color: #FFC300;">{!! str_repeat('&#9733;', 2) !!}</option>
                            <option value="3" style="color: #FFC300;">{!! str_repeat('&#9733;', 3) !!}</option>
                            <option value="4" style="color: #FFC300;">{!! str_repeat('&#9733;', 4) !!}</option>
                            <option value="5" style="color: #FFC300;">{!! str_repeat('&#9733;', 5) !!}</option>
                        </select>
                        <input type="hidden" value='0' name="estatus">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-outline-success" onclick="return confirm('En un momento sera publicado el comentario')">Enviar comentario</button>
                </form>
            </div>
            <br>
            <!--************************************************************************************************-->



            <!--************************************************************************************************-->
            <!--le agrege brs-->
            <br><br>
            <!--comentarios-->
            <!--modificado-->
            <div id="comentarios">
                <h3>Comentarios recientes</h3>
            </div>



            @foreach ($comentarios as $comentario)
            @if($comentario->estatus==1)
                <div class="container mt-4 col-7">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex comentario-container">
                                <div class="me-3">
                                    <span class="user-icon">
                                        <i class="fas fa-user fa-2x"></i> <!-- Icono de persona -->
                                    </span>
                                </div>
                                <div class="border p-3 comentario-content">
                                    <p style="text-align: left; margin-bottom: 0px;">
                                        <strong>{{ $comentario->nombre }}</strong></p>
                                    <p class="fecha" style="text-align: left; margin-bottom: 5px;">
                                        {{ $comentario->created_at->format('d \d\e F \d\e\l Y, H:i') }}</p>
                                    <hr style="margin-bottom: 5px;">
                                    <p class="estrellas" style="text-align: left; margin-bottom: 4px;">
                                        {!! str_repeat('&#9733;', $comentario->puntuacion) !!}</p>
                                    <p style="text-align: left; margin-bottom: 2px;">{{ $comentario->comentario }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach



            <!--************************************************************************************************-->



            <!-- Importa tu archivo JavaScript -->
            <script src="{{ asset('js/boostrap.js') }}"></script>

            <!-- Footer u otros elementos finales -->
            @include('burguesia.footer')


    </body>

    </html>
