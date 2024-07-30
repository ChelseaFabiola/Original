<style>
    .container-vision {
        display: flex;
        justify-content: center;
        align-items: center;
        height: auto;
        /* Cambiado a 'auto' para que la altura sea dinámica */
        flex-wrap: wrap;
        /* Agregado para que los elementos se envuelvan en pantallas pequeñas */
    }

    .card {
        width: 300px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: #FFFFFF;
        margin: 20px;
        /* Ajustado el margen para separar las tarjetas */
    }

    .word-container {
        text-align: center;
    }

    hr {
        height: 2px;
        border: none;
        background-color: #FF5733;
        margin: 20px 0;
    }

    .imglaposte {
        border-radius: 10px;
        border: 2px solid white;
        max-width: 100%;
        /* Para que la imagen se ajuste al ancho del contenedor */
        height: auto;
        /* Para mantener la proporción de la imagen */
    }

    .p-vision {
        text-align: center;
    }

    @media (min-width: 768px) {
        .container-vision {
            height: 60vh;
        }
    }
</style>
</head>

<body>

    @include('administrar.header')

    <br><br><br><br><br><br>
    @foreach($eventos as $evento)
    @if($evento->Nombre == "quienessomos")
        <form action="{{ url('/admin/quienesSomos/editar/'.$evento->id) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf <!-- Agregar el token CSRF -->
            <h1 style="text-align: center;">Quienes somos</h1>
            <label for="Descripcion" style="margin-left: 536px;">Descripción:</label><br>
            <textarea style="width: 400px; margin: 0 auto; padding: 10px; border: 1px solid #ccc; 
        border-radius: 4px; box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);" class="form-control" id="Descripcion" name="Descripcion" rows="3" placeholder="Ingresa un Descripcion">{{$evento->Descripcion}}</textarea>
    
    <br>
            <label for="Imagen" style="margin-left: 536px;">Imagen:</label><br>
            <img src="/storage/{{$evento->Imagen}}" alt="{{ $evento->Nombre }}" width="150" style="border: 3px solid #9F625B; border-radius: 5px; margin-left: 650px"><br>
            <!-- Mostrar la imagen actual del evento -->
            
            <input type="file" name="Imagen" id="Imagen" style="margin-left: 580px"><br>   
            <!-- Permitir al usuario seleccionar una nueva imagen -->
<br>
            <button type="submit" class="btn btn-outline-success" style="margin-left: 680px" onclick="return confirm('¿Quieres actualizar la información de {{$evento->Nombre}}?')">Actualizar</button>
        </form>
    @endif
    @endforeach

</body>


@include('administrar.footer')
