@include('administrar.header')
<head>
   <!-- Incluir Bootstrap CSS -->
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluir Bootstrap Icons (opcional si no lo tienes ya en tu proyecto) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/administrador.css') }}">
</head>
<div class="container-fluid" style="margin-top: 160px;">
    <div class="row">
        <!-- Barra lateral izquierda para categorías -->
        <div class="col-lg-3">
            <div class="list-group">
                <!-- Filtros por precio -->
                <div class="list-group-item">
                    
                    <form action="{{url('/admin/menu/crearcategoria')}}" method="POST">
                        @csrf
                        <label for="nombre">categoria</label><br>
                        <input type="text" name='nombre' id="nombre">
                        <input type="submit" class="btn btn-secondary" value="Nueva categoria">
                    </form>
                </div>
                <!--<div id="categoryLinks" class="list-group" style="position: fixed; top:2; left: 0;">-->
                @foreach ($lista as $categoria)
                <div class="d-flex justify-content-between">
                    <a href="#" class="list-group-item list-group-item-action"
                        onclick="showCategory('{{ $categoria->nombre }}')">{{ $categoria->nombre }}</a>
                    <form class="" action="{{ route('categorias.eliminar', $categoria->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar esta categoría?')">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                </div>
                    
                @endforeach
                
                
            </div>
        </div>
        <!-- Contenido principal con cards -->
        <div class="col-lg-9">
            <!-- Título de la categoría seleccionada -->
             <h1>Administrar Menú</h1>
            <br>
            <div class="row">
                <div class="col-md-9">
                <h3 id="categoriaSeleccionada"></h3> 
                </div>
                <div class="col-md-3">
                    <a class="btn btn-link" href="{{ url('/admin/crearplatillo') }}" style="text-decoration: none;">
                    <i class="fas fa-plus-circle text-success" style="font-size: 20px;"></i> <span class="text-success" style="font-size: 20px; border-bottom: 2px solid green;">Agregar platillo</span>
                    </a>
                </div>
            </div>
            <br>
            <div id="menuContent">
                <!-- Aquí se mostrarán los platillos de la categoría seleccionada -->
            </div>
        </div>
    </div>
</div>

<script>
    // Define un objeto con los platillos por categoría
    var menuItems = {
        @foreach ($lista as $categoria)
            '{{ $categoria->nombre }}': [ //entradas
                @foreach ($platillos as $platillo)
                    @if ($categoria->nombre == $platillo->categoria)
                        {
                            id: '{{ $platillo->id }}',
                            titulo: '{{ $platillo->nombre }}',
                            descripcion: '{{ $platillo->descripcion }}',
                            imagen: '{{ $platillo->imagen }}',
                            precio: '{{ $platillo->precio }}'

                        },
                    @endif
                @endforeach
            ],
        @endforeach
        // Agrega más categorías según sea necesario
        
    };

    // Función para mostrar los platillos de una categoría específica
    function showCategory(category) {
        
        
    var menuHTML = '<div class="p-3"><table class="table table-bordered table-hover ">';
    menuHTML += '<thead>';
    menuHTML += '<tr>';
    menuHTML += '<th scope="col" style="width: 200px;">Nombre</th>';
    menuHTML += '<th scope="col" style="width: 300px;">Descripción</th>';
    menuHTML += '<th scope="col">Imagen</th>';
    menuHTML += '<th scope="col">Precio</th>';
    menuHTML += '<th scope="col" style="color: green; text-align: center;">Acciones</th>';
    menuHTML += '</tr>';
    menuHTML += '</thead>';
    menuHTML += '<tbody>';

    document.getElementById('categoriaSeleccionada').innerText = getCategoryName(category);

    // Obtiene los platillos de la categoría seleccionada
    var items = menuItems[category];

    // Genera el HTML de cada fila de la tabla para cada platillo
    for (var i = 0; i < items.length; i++) {
        let id = items[i].id;
        let titulo = items[i].titulo;
        let desc = items[i].descripcion;
        let imgPath = items[i].imagen;
        let precio = items[i].precio;

        menuHTML += '<tr>';
        menuHTML += '<td>' + titulo + '</td>';
        menuHTML += '<td style="color: green; max-width: 360px;">' + desc + '</td>';
        menuHTML += '<td style="display: flex;justify-content: center;height: 100%;"><img src="/storage/' + imgPath + '" alt="' + titulo + '" class="rounded-circle" style="width: 44px; height: 44px;"></td>';
        menuHTML += '<td style="color: green; max-width: 300px; text-align: center;">$' + precio + '</td>';
        menuHTML += '<td style="text-align: center;">';
        menuHTML += '<div class="btn-group" role="group" aria-label="Acciones">';
        menuHTML += '<a href="/admin/menu/editar/' + id + '" class="btn btn-link" style="color: green; padding: 0; font-weight: bold;">Editar |</a>';
        menuHTML += '<form action="/admin/menu/eliminar/' + id + '" method="POST">';
        menuHTML += '@csrf';
        menuHTML += '@method('DELETE')';
        menuHTML += '<button type="submit" class="btn btn-link" style="color: green; padding: 0; font-weight: bold;"" onclick="return confirm(\'¿Quieres borrar el plato '+titulo+'?\')">Eliminar |</button>';
        menuHTML += '</form>';
        menuHTML += '<a href="/admin/menu/ocultar/' + id + '" class="btn btn-link" style="color: green; padding: 0; font-weight: bold;"> Ocultar</a>';
        menuHTML += '</div>';
        menuHTML += '</td>';
        menuHTML += '</tr>';
    }

    menuHTML += '</tbody>';
    menuHTML += '</table></div>';

    // Muestra la tabla en el contenedor correspondiente
    document.getElementById('menuContent').innerHTML = menuHTML;
    }

    function agregarACarrito(id, titulo, desc, img, precio) {
        var platillo = {
            "id": id,
            "titulo": titulo,
            "desc": desc,
            "img": img,
            "precio": precio,
            "cantidad": 1,
        };

        let cart = sessionStorage.getItem('cart');

        if (cart != null) {
            var productos = JSON.parse(cart);

            var productosEncontrados = productos.filter(function(producto) {
                return producto.id == id;
            });

            if (productosEncontrados.length == 0) {
                productos.push(platillo);
                var platillosJSON = JSON.stringify(productos);
                // Guardar la cadena JSON en sessionStorage
                sessionStorage.setItem('cart', platillosJSON);
                console.log(productos);

            }

        } else {
            var platillos = [platillo];
            var platillosJSON = JSON.stringify(platillos);

            // Guardar la cadena JSON en sessionStorage
            sessionStorage.setItem('cart', platillosJSON);
        }
    }

    // Retorna el nombre de la categoría dado su identificador
    function getCategoryName(category) {
        switch (category) {
            @foreach ($lista as $categoria)
                case '{{ $categoria->nombre }}':
                return '{{ $categoria->nombre }}';
            @endforeach
        }
    }

    // Llamar a showCategory con la primera categoría por defecto cuando se carga la página
    window.onload = function() {
        showCategory('{{ $lista[0]->nombre }}');
    }
</script>


{{-- 
<script>
    // Define un objeto con los platillos por categoría
    var menuItems = {
        @foreach ($lista as $categoria)
            '{{ $categoria->nombre }}': [ //entradas
                @foreach ($platillos as $platillo)
                    @if ($categoria->nombre == $platillo->categoria)
                    {
                        id: '{{$platillo->id}}',
                        titulo: '{{$platillo->nombre}}',
                        descripcion: '{{$platillo->descripcion}}',
                        imagen: '{{$platillo->imagen}}',
                        precio: '{{$platillo->precio}}'

                    },
                    @endif
                @endforeach
            ],
        @endforeach
        
        // Agrega más categorías según sea necesario
    };

    // Función para mostrar los platillos de una categoría específica
    function showCategory(category) {
    var menuHTML = '';
    // Obtiene los platillos de la categoría seleccionada
    var items = menuItems[category];
    // Actualiza el título de la categoría seleccionada
    document.getElementById('categoriaSeleccionada').innerText = getCategoryName(category);
    // Genera el HTML de los cards para cada platillo
    for (var i = 0; i < items.length; i++) {
        if (i % 3 === 0) {
            menuHTML += '<div class="row">';
        }
        menuHTML += '<div class="col-md-4 mb-4">';
        menuHTML += '<div class="card" style="background-color: #BEA899; border: 4px solid #9F625B;">';
        menuHTML += '<div class="card-body d-flex flex-column justify-content-between">';
        menuHTML += '<h5 class="card-title text-center mb-4">' + items[i].titulo + '</h5>';
        menuHTML += '<p class="card-text">' + items[i].descripcion + '</p>';
        menuHTML += '<img src="storage/' + items[i].imagen +'" class="card-img-top mx-auto" alt="..." style="max-width: 150px; height: auto; border: 4px solid white;">'; // Establece el ancho máximo deseado para las imágenes (por ejemplo, 150px)
        menuHTML += '<h6 class="card-text mt-2">Precio: ' + items[i].precio + '</h6>';
        menuHTML +=
            '<a href="#" class="btn btn-success mx-auto" style="background-color: #9CA64E;">Agregar</a>'; // Botón centrado horizontalmente con estilo de fondo
        menuHTML += '</div></div></div>';
        if ((i + 1) % 3 === 0 || i === items.length - 1) {
            menuHTML += '</div>';
        }
    }
    // Muestra los cards en el contenedor correspondiente
    document.getElementById('menuContent').innerHTML = menuHTML;
}

// Retorna el nombre de la categoría dado su identificador
function getCategoryName(category) {
    switch (category) {
        @foreach ($lista as $categoria)
            case '{{ $categoria->nombre }}':
            return '{{ $categoria->nombre }}';
        @endforeach
    }
}

// Llamar a showCategory con la primera categoría por defecto cuando se carga la página
window.onload = function() {
    showCategory('{{ $lista[0]->nombre }}');
}


</script> --}}







{{-- <br><br><br><br>



<h3>categorias:</h3>
<ul>
    @foreach ($lista as $categoria)
        <li>{{$categoria->nombre}}</li>
        <form action="{{route('categorias.eliminar',$categoria->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Eliminar" onclick="return confirm('¿Quieres borrar esta categoria?')">
        </form>
    @endforeach
</ul>
<form action="{{url('/admin/menu/crearcategoria')}}" method="POST">
    @csrf
    <label for="nombre">categoria</label><br>
    <input type="text" name='nombre' id="nombre"><br>
    <input type="submit" value="Insertar categoria">
</form>
<h2>platillos:</h2>
@foreach ($platillos as $platillo)
        <ul>
            <li>{{$platillo->nombre}}</li>
            {{-- php artisan storage:link --}}
{{-- <img src="{{asset('storage').'/'.$platillo->imagen}}" alt="" width="100">
            <li>{{$platillo->imagen}}</li>
            <li>{{$platillo->descripcion}}</li>
            <li>{{$platillo->precio}}</li>
            <li>{{$platillo->categoria}}</li>
            <a href="{{url('/admin/menu/editar/'.$platillo->id)}}">Editar</a>
            <form action="{{url('/admin/menu/eliminar/'.$platillo->id)}}" method="POST">@csrf,@method('DELETE')<input type="submit" value="X" onclick="return confirm('¿Quieres borrar este platillo?')"></form>
        </ul> --}}

{{-- @endforeach --}}

@include('administrar.footer')