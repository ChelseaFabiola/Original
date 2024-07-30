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

    @include('burguesia.header')

    <br><br><br><br><br><br>
    @foreach ($eventos as $evento)
        @if ($evento->Nombre == 'quienessomos')
            <div class="container-vision">
                <img class="imglaposte" src="/storage/{{$evento->Imagen}}" alt="BP La Burguesía del Pueblo" width="400px"
                    height="600px">
                <div class="card right-card">
                    <div class="word-container">
                        <h5>Quienes somos</h5>
                        <hr>
                    </div>
                    <p class="p-vision">{{$evento->Descripcion}}</p>
                </div>
            </div>
        @endif
    @endforeach


</body>

<br><br><br><br><br><br>
@include('burguesia.footer')
