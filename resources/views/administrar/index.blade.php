@include('administrar.header')


{{-- justify-content-center text-center --}}
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
    .card {
        height: 100%; /* Establecer altura fija para todas las tarjetas */
    }
    .card-img-top {
        height: 200px; /* Altura deseada para las imágenes dentro de las tarjetas */
        object-fit: cover; /* Ajustar la imagen dentro de la altura fija de la tarjeta */
    }
    .card-body {
        height: calc(100% - 200px); /* Calcular el espacio restante para el cuerpo de la tarjeta */
        overflow: auto; /* Agregar barra de desplazamiento si el contenido es más largo que la altura */
    }

    
    /**Desde aqui son los estilos para la tabla de los sliders */
/*Color externo y exteerno de la tabla de slider */
.table-rounded {
        border-collapse: separate;
        border-spacing: 0;
        border: 1px solid #D9E8DE;
        border-radius: 12px;
        overflow: hidden;
    }

    .table-rounded th,
    .table-rounded td {
        border: none; /* Elimina el borde de las celdas */
        border-bottom: 1px solid #D9E8DE; /* Mantén solo el borde inferior para las filas */
    }

    /* Estilo específico para la primera fila */
    .table-rounded thead th {
        border-bottom: 1px solid #D9E8DE; /* Mantén el borde inferior para las celdas del encabezado */
    }

    /* Bordes redondeados solo en las esquinas exteriores */
    .table-rounded thead tr:first-child th:first-child {
        border-top-left-radius: 12px;
    }

    .table-rounded thead tr:first-child th:last-child {
        border-top-right-radius: 12px;
    }

    .table-rounded tbody tr:last-child td:first-child {
        border-bottom-left-radius: 12px;
    }

    .table-rounded tbody tr:last-child td:last-child {
        border-bottom-right-radius: 12px;
    }
   
    .styled-button {
        border: none;
        background: none;
        color: #007bff; /* Color del texto */
        text-decoration: underline; /* Subrayado */
        cursor: pointer; /* Cambia el cursor al pasar por encima */
    }
    

    .styled-button {
    text-decoration: none;
    border: none;
    background: none;
    padding: 0;
    margin: 0;
    cursor: pointer;
}

.styled-button:focus {
    outline: none;
}

.styled-button.validar-btn:hover,
.styled-button.eliminar-btn:hover {
    text-decoration: underline;
}


</style>
<br><br>
<!--<div class="text-center">-->
    <!--le cambie la escala a 75%-->
    <!--tambien le puse style="border:0; border-radius: 20px;"-->
   <!-- <video src="img/LaBurguesiaDelPueblo(HD).mp4" class="object-fit-scale" width="75%" autoplay controls muted
        style="border:0; border-radius: 15px;"></video>
</div>-->

<!--agrege brs-->
<br><br><br>

<!--sliders-->
<!--agrege tambien rounded-->
<!--<div class="container">
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
        </div>-->
        <!--mapa-->
        <!--le cambie los borde de las puntas con rounded y border-radius etc tambien cambie el tamaño del mapa-->
       <!-- <div class="col-md-5">
            <div class="text-center rounded">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15118.796060141516!2d-88.389356!3d18.6774977!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f5bb19cacac039d%3A0xf78e6e0a829b436a!2sLa%20Burgues%C3%ADa%20del%20Pueblo!5e0!3m2!1ses!2smx!4v1710813132548!5m2!1ses!2smx"
                    width="100%" height="495" style="border:0; border-radius: 15px;" allowfullscreen=""
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>-->

<!--agrege brs-->
<br><br>


<div class="container">
    <h1 class="text-left">Administrar inicio</h1>
    <br>
    <h3 class="text-left">Galería de imágenes</h3>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center">
                <div class="card-body">
                    <!--<h5 class="card-title">Agregar imágen</h5>-->
                    <form action="{{ url('/admin/create/galeria') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="foto"></label><!--es lo que decia de subir elegir imagen-->
                            <input type="file" class="form-control-file" name="foto" id="foto" style="color:#5E8C6E;">
                        </div>
                        <!--<br>-->
                        <!--Decoracion del boton agregar imagen-->
                        <a class="btn btn-link" href="#" onclick="this.closest('form').submit()" style="text-decoration: none;">
                            <i class="fas fa-plus-circle text-success" style="font-size: 20px;"></i>
                            <span class="text-success" style="font-size: 20px; border-bottom: 2px solid green;">Agregar imagen</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--FIN---SUBIR IMAGEN-->

    <br>
    <div class="text-center justify-content-center">
        <table class="table table-custom text-center align-middle table-rounded table-bordered" style="width: 70%; margin-left: 200px; ">
            <thead>
                <tr>
                    <th scope="col" style="height: 50px;" class="text-center align-middle">Nombre</th>
                    <th scope="col" style="height: 50px;" class="text-center align-middle">Imagen</th>
                    <th scope="col" style="color: #5E8C6E; height: 55px;" class="text-center align-middle">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($imagenes as $index => $imagen)
                    <tr>
                        <td>Slider {{ $index + 1 }}</td>
                        <td><img src="/storage/{{ $imagen->foto }}" alt="" class="img-fluid" style="max-width: 200px; border-radius: 6%;"></td>
                        <td>
                            <span style="cursor: pointer; color:green;font-weight: bold;" onclick="eliminarImagen('{{ $imagen->id }}');">
                                Eliminar
                            </span>
                            <form id="eliminarForm-{{ $imagen->id }}" action="{{ url('/admin/galeria/eliminar', $imagen->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    function eliminarImagen(id) {
        if (confirm('¿Quieres borrar esta imagen?')) {
            document.getElementById('eliminarForm-' + id).submit();
        }
    }
</script>


    <!--<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Agregar imágen</h5>
                        <form action="{{ url('/admin/create/galeria') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="foto">Seleccionar Imagen</label>
                                <input type="file" class="form-control-file" name="foto" id="foto">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-outline-primary">Agregar imágen</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

    <br>
    


    <!--comentarios-->
    <br><br><br>
    <!--modificado-->
    <!--<div id="comentarios">
    <h1 class="text-left" style="margin-bottom: 40px;">Administrar inicio</h1>
    <h2 class="text-left">Comentarios recientes</h2>
    </div>


    {{-- comentarios funcionales --}}

    @foreach ($comentarios as $comentario)
    <div class="container mt-4 col-7">
        <div class="row">
            <div class="col">
                <div class="d-flex comentario-container">
                    <div class="me-3">
                        <span class="user-icon">
                            <i class="fas fa-user fa-2x"></i> 
                        </span>
                    </div>
                    <div class="border p-3 comentario-content">
                        <p style="text-align: left; margin-bottom: 0px;"><strong>{{ $comentario->nombre }}</strong></p>
                        <p class="fecha" style="text-align: left; margin-bottom: 5px;">
                            {{ $comentario->created_at->format('d \d\e F \d\e\l Y, H:i') }}</p>
                        <hr style="margin-bottom: 5px;">
                        <p class="estrellas" style="text-align: left; margin-bottom: 4px;">{!! str_repeat('&#9733;', $comentario->puntuacion) !!}</p>
                        <p style="text-align: left; margin-bottom: 2px;">{{ $comentario->comentario }}</p>
                        <div class="d-inline">
                            @if ($comentario->estatus==0)
                            <form action="{{ route('estatus.comentario', $comentario->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-success">Validar Comentario</button>
                            </form>
                            @endif
                            <form action="{{ route('eliminar.comentario', $comentario->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Eliminar Comentario</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
-->

<!--***************************PRUEBA**************************-->
<!-- Comentarios -->
<br><br><br>


<div class="container mt-4 col-10">
<div id="comentarios">
    <h1 class="text-left">Administrar inicio</h1>
    <br>
    <h3 class="text-left">Comentarios recientes</h3>
    <br>
</div>
    <div class="text-center justify-content-center">
        <table class="table table-custom text-center align-middle table-rounded table-bordered" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col" style="height: 50px; max-width: 300px;width: 18%;" class="text-center align-middle">Nombre</th>
                    <th scope="col" style="height: 50px;  max-width: 300px;width: 25%;" class="text-center align-middle">Comentario</th>
                    <th scope="col" style="height: 50px; max-width: 300px;width: 15%;" class="text-center align-middle">Calificación</th>
                    <th scope="col" style="height: 50px; max-width: 300px;width: 20%;" class="text-center align-middle">Fecha</th>
                    <th scope="col" style="height: 50px; max-width: 300px;width: 20%;" class="text-center align-middle">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comentarios as $comentario)
                    <tr>
                        <td class="text-left align-middle">{{ $comentario->nombre }}</td>
                        <td style="color:green;height: 85px;" class="text-left align-middle">{{ $comentario->comentario }}</td>
                        <td style="color:#FFD600;" class="text-center align-middle">{!! str_repeat('&#9733;', $comentario->puntuacion) !!}</td>
                        <td style="color:green;" class="text-center align-middle">{{ $comentario->created_at->format('d \d\e F \d\e\l Y, H:i') }}</td>
                        <td class="text-center align-middle">
                            @if ($comentario->estatus == 0)
                                <form action="{{ route('estatus.comentario', $comentario->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="styled-button validar-btn" style="color: green; font-weight: bold;">Validar</button>
                                </form>
                            @else
                                <span style="color: #C3E4CE;font-weight: bold;">Validar</span>
                            @endif
                            <form action="{{ route('eliminar.comentario', $comentario->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="styled-button eliminar-btn" style="color: green; font-weight: bold;">| Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!--***************************PRUEBA**************************-->






    {{-- 
<br>
    <!-- Comentario Falso -->
<div class="container mt-4 col-7">
    <div class="row">
        <div class="col">
            <div class="d-flex">
                <div class="me-3">
                    <i class="fas fa-user fa-2x"></i> <!-- Icono de persona -->
                </div>
                <div class="border p-3">
                    <p class="mb-0"><strong>Usuario123:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget justo nec libero ullamcorper lacinia. Sed ut libero nec justo ultricies tincidunt. Donec non enim a odio malesuada tristique.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
    <!-- Comentario Falso -->
<div class="container mt-4 col-7">
    <div class="row">
        <div class="col">
            <div class="d-flex">
                <div class="me-3">
                    <i class="fas fa-user fa-2x"></i> <!-- Icono de persona -->
                </div>
                <div class="border p-3">
                    <p class="mb-0"><strong>Usuario123:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget justo nec libero ullamcorper lacinia. Sed ut libero nec justo ultricies tincidunt. Donec non enim a odio malesuada tristique.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
    <!-- Comentario Falso -->
<div class="container mt-4 col-7">
    <div class="row">
        <div class="col">
            <div class="d-flex">
                <div class="me-3">
                    <i class="fas fa-user fa-2x"></i> <!-- Icono de persona -->
                </div>
                <div class="border p-3">
                    <p class="mb-0"><strong>Usuario123:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget justo nec libero ullamcorper lacinia. Sed ut libero nec justo ultricies tincidunt. Donec non enim a odio malesuada tristique.</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    @include('administrar.footer')
