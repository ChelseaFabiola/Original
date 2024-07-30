<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La burguesia</title>
    <!-- Aquí puedes agregar tus estilos CSS -->
    <script src="{{ asset('js/carrito.js') }}"></script>
</head>

<body>

    <!-- Incluye el encabezado de la página -->
    @include('burguesia.header')
    
    <div class="container-fluid" style="margin-top: 100px;">
        <div class="row">
            <!-- Barra lateral izquierda para categorías -->
            <div class="col-lg-3">
                <div class="list-group">
                    <!-- Filtros por precio -->
                    <div class="list-group-item">
                        <h5 class="mb-3">Filtrar por precio:</h5>
                        <button onclick="filterByPrice('asc')" class="btn btn-secondary">Más Barato</button>
                        <button onclick="filterByPrice('desc')" class="btn btn-secondary">Más Caro</button>
                    </div>
                    <!-- Lista de categorías -->
                    @foreach ($lista as $categoria)
                        <a href="#" class="list-group-item list-group-item-action"
                            onclick="showCategory('{{ $categoria->nombre }}')"
                            style="background-color: #9CA64E;">{{ $categoria->nombre }}</a>
                    @endforeach
                </div>
            </div>
            <!-- Contenido principal con cards -->
            <div class="col-lg-9">
                <!-- Título de la categoría seleccionada -->
                <br>
                <h2 class="text-center" id="categoriaSeleccionada"></h2>
                <br>
                <div id="menuContent" class="row" >
                    <!-- Aquí se mostrarán los platillos de la categoría seleccionada -->
                </div>
            </div>
        </div>
    </div>

    <!-- Incluye el pie de página -->
    @include('burguesia.footer')

    <script>
        // Define un objeto con los platillos por categoría
        var menuItems = {
            @foreach ($lista as $categoria)
                '{{ $categoria->nombre }}': [
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

        // Variable para contar la cantidad de productos en el carrito
        var contadorCarrito = 0;

        // Función para mostrar los platillos de una categoría específica
        function showCategory(category) {
            // Restablece el contador del carrito
            contadorCarrito = 0;

            // Restablece el contador en el almacenamiento de la sesión
            sessionStorage.setItem('contadorCarrito', contadorCarrito);

            var menuHTML = '';
            var items = menuItems[category]; // Obtiene los platillos de la categoría seleccionada
            // Actualiza el título de la categoría seleccionada
            document.getElementById('categoriaSeleccionada').innerText = category;
            // Genera el HTML de los cards para cada platillo
            for (var i = 0; i < items.length; i++) {
                let id = items[i].id;
                let titulo = items[i].titulo;
                let desc = items[i].descripcion;
                let imgPath = items[i].imagen;
                let precio = items[i].precio;
                // Construye el HTML de cada card
                menuHTML += '<div class="col-md-4 mb-4">';
                menuHTML += '<div class="card" style="background-color: #D9D9D9; border: 3px solid #ffffff;">';
                menuHTML += '<div class="card-body d-flex flex-column justify-content-between">';
                menuHTML += '<h5 class="card-title text-center mb-4">' + titulo + '</h5>';
                menuHTML += '<p class="card-text">' + desc + '</p>';
                menuHTML += '<img src="storage/' + imgPath +
                    '" class="card-img-top mx-auto" alt="..." style="max-width: 150px; height: auto; border: 4px solid white;">';
                menuHTML += '<h6 class="card-text mt-2">Precio: $' + precio + '</h6>';
                menuHTML += '<a href="#" class="btn btn-outline-success mx-auto" onclick="agregarACarrito(\'' + id +
                    '\', \'' + titulo + '\', \'' + desc + '\', \'' + imgPath + '\',  \'' + precio + '\')">Agregar</a>';
                menuHTML += '</div></div></div>';
            }
            // Muestra los cards en el contenedor correspondiente
            document.getElementById('menuContent').innerHTML = menuHTML;
        }

        // Función para agregar un platillo al carrito
        function agregarACarrito(id, titulo, desc, img, precio) {
            var platillo = {
                "id": id,
                "titulo": titulo,
                "desc": desc,
                "img": img,
                "precio": precio,
                "cantidad": 1, // Inicia la cantidad en 1
            };

            let cart = sessionStorage.getItem('cart');

            if (cart != null) {
                var productos = JSON.parse(cart);

                // Busca si ya existe el producto en el carrito
                var productoExistente = productos.find(function(producto) {
                    return producto.id == id;
                });

                if (!productoExistente) {
                    // Si el producto no existe en el carrito, lo agregamos
                    productos.push(platillo);
                } else {
                    // Si el producto ya está en el carrito, aumentamos su cantidad
                    platillo.cantidad = productoExistente.cantidad + 1; // La cantidad toma el valor anterior + 1
                    // Reemplazamos el producto existente por el nuevo
                    productos = productos.map(function(producto) {
                        return producto.id === id ? platillo : producto;
                    });
                }

                var platillosJSON = JSON.stringify(productos);
                sessionStorage.setItem('cart', platillosJSON); // Guarda el carrito actualizado en sessionStorage

                // Actualiza el contador del carrito y muestra el valor
                contadorCarrito = productos.reduce((total, producto) => total + producto.cantidad, 0);
                localStorage.setItem('contadorCarrito', contadorCarrito);
                document.getElementById('contadorCarrito').style.display = "block";
                document.getElementById('contadorCarrito').innerText = contadorCarrito;
            } else {
                // Si no hay productos en el carrito, creamos uno nuevo
                var platillos = [platillo];
                var platillosJSON = JSON.stringify(platillos);
                sessionStorage.setItem('cart', platillosJSON); // Guarda el carrito actualizado en sessionStorage

                // Incrementa el contador del carrito y muestra el valor
                contadorCarrito++;
                localStorage.setItem('contadorCarrito', contadorCarrito);
                document.getElementById('contadorCarrito').style.display = "block";
                document.getElementById('contadorCarrito').innerText = contadorCarrito;
            }
        }

        // Función para filtrar los platillos por precio
        function filterByPrice(order) {
            var category = document.getElementById('categoriaSeleccionada').innerText.trim();
            var items = menuItems[category];

            // Ordena los platillos según el precio
            if (order === 'asc') {
                items.sort((a, b) => parseFloat(a.precio) - parseFloat(b.precio));
            } else if (order === 'desc') {
                items.sort((a, b) => parseFloat(b.precio) - parseFloat(a.precio));
            }

            // Muestra los platillos ordenados
            showCategory(category);
        }

        // Llama a la función showCategory con la primera categoría por defecto cuando se carga la página
        window.onload = function() {
            showCategory('{{ $lista[0]->nombre }}');
        }
    </script>
</body>

</html>
