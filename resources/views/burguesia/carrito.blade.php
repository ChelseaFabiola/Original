<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La burguesia</title>
    <!-- Incluye el script de carrito.js -->
    <script src="{{ asset('js/carrito.js') }}"></script>
    <!-- Especifica el icono de la pestaña -->
    <link rel="icon" href="img/iconoBurguesia.jpg" type="image/x-icon">
</head>
<!-- Aquí puedes agregar tus estilos CSS si los tienes -->
<style>
        /* Definición de la clase para el color de fondo de las filas */
        .fila-carrito {
            background-color: #D9D9D9; /* Color especificado */
        }

        /* Estilo para la división entre filas */
        .division-fila {
            height: 9px; /* Altura de la división */
            /background-color: #FFFFFF; / Color de la división */
        }

        /* Estilo para los títulos de las columnas */
        table th {
            color: white; /* Color de los títulos de las columnas */
        }

        /* Estilo para el contenido de las celdas */
        table td {
            color: black; /* Color del contenido de las celdas */
        }

        /* Estilos para los botones de menos */
        .boton-menos {
            background-color: #9F625B; /* Color de fondo */
            color: white; /* Color del texto */
            border: none; /* Eliminar borde */
            padding: 5px 10px; /* Espaciado interno */
            cursor: pointer; /* Cambiar cursor al pasar el ratón */
            border-radius: 5px; /* Borde redondeado */
        }

        /* Estilos para los botones de más */
        .boton-mas {
            background-color: #9CA64E; /* Color de fondo */
            color: white; /* Color del texto */
            border: none; /* Eliminar borde */
            padding: 5px 10px; /* Espaciado interno */
            cursor: pointer; /* Cambiar cursor al pasar el ratón */
            border-radius: 5px; /* Borde redondeado */
        }

        body::before,
        body::after {
            content: '';
            position: fixed;
            top: 0;
            width: 6%;
            height: 100%;
            background-color: #9CA64E;
            z-index: -1; /* Asegurar que esté detrás del contenido */
        }

        body::before {
            left: 0;
            margin-left: -2.5%; /* Ajustar para que la línea no tape el contenido */
        }

        body::after {
            right: 0;
            margin-right: -2.5%; /* Ajustar para que la línea no tape el contenido */
        }

        #carrito {
            overflow-x: auto; /* Permite el desplazamiento horizontal cuando sea necesario */
            margin: 0 auto; /* Centra el contenedor horizontalmente */
            max-width: 38%; /* Establece el ancho máximo del contenedor al 50% del viewport */
        }
    </style>
<body>
    
    <!-- Incluye el encabezado de la página -->
    @include('burguesia.header')

    {{-- Comentario Blade: justify-content-center text-center --}}
    <br>
    <!-- Título de la página -->
    <h1 class="text-center">Carrito de Compras</h1>

    <br>
    <!-- Verifica si hay productos en el carrito -->
    <div id="carrito" class="text-center"> </div>

    <!-- Elemento para mostrar el total del carrito -->
    <div id="totalCarrito" style="background-color: red; color: white;"></div>

<!--*****  BOTONES PARA EL CARRITO  *******-->
<div class="text-center">
    <!--Display:none;-->
    <a id= "ordenarADomicilio" href="#" target="_blank" style="Display:none;">
        <button type="button" class="btn btn-outline-danger" style="" onclick="ordenar('domicilio')"><i class="fa-brands fa-whatsapp"></i>&nbsp;Ordenar a domicilio</button>&nbsp;&nbsp;
    </a>
   
    <!-- Botón que redirige a WhatsApp -->
    <a id= "ordenarEnRestaurante" href="#" target="_blank" style="Display:none;">
        <button type="button" class="btn btn-outline-success" style="" onclick="ordenar('restaurante')"><i class="fa-brands fa-whatsapp"></i>&nbsp;Ordenar en restaurante</button>
    </a>

    
</div>
    <!-- Incluye el script de Bootstrap -->
    <script src="{{ asset('js/boostrap.js') }}"></script>

    <script>
        var carrito = document.getElementById("carrito");
        let cart = sessionStorage.getItem('cart');

        if (cart != null) {
            // Parsear el JSON almacenado en sessionStorage
            var productos = JSON.parse(cart);

            if (productos.length > 0) {
                // Construir la tabla HTML para mostrar los productos
                contruirCarrito();
            } else {
                carrito.innerHTML = '<p>No hay productos en el carrito.</p>';
            }
        } else {
            carrito.innerHTML = '<p>No hay productos en el carrito.</p>';
        }


        function contruirCarrito() {
            var ordenarADomicilio = document.getElementById("ordenarADomicilio");
        var ordenarRestaurante = document.getElementById("ordenarEnRestaurante");

        ordenarADomicilio.style.display = 'inline'
        ordenarEnRestaurante.style.display = 'inline'
    var carrito = document.getElementById("carrito");
    let cart = sessionStorage.getItem('cart');
    var productos = JSON.parse(cart);

    var totalCarrito = 0; // Variable para almacenar el total del carrito

    var tablaHTML = '<table>';
    tablaHTML += '<thead><tr><th>Imagen</th><th></th><th>Nombre</th><th>P/U&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Cantidad&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Acciones&nbsp;&nbsp;&nbsp;</th></tr></thead>';
    tablaHTML += '<tbody>';

    // Verificar si hay productos en el carrito
    if (productos && productos.length > 0) {
        // Iterar sobre cada producto en el carrito
        for (var i = 0; i < productos.length; i++) {
            var producto = productos[i];
            var totalProducto = producto.precio * producto.cantidad; // Calcular el total del producto

            totalCarrito += totalProducto; // Agregar el total del producto al total del carrito
            tablaHTML += '<tr class="fila-carrito">';
            tablaHTML += '<td><img src="storage/' + producto.img +'" alt="' + producto.titulo + '" style="width: 146px; height: 77px;"></td>';
            tablaHTML += '<td style="padding-right: 20px;">';
            tablaHTML += '<td>' + producto.titulo + '</td>';
            tablaHTML += '<td>' +'$' + producto.precio + '</td>';
            tablaHTML += '<td> <!-- Campo de entrada para la cantidad -->';
            tablaHTML += '<p id='+producto.id+'>'+producto.cantidad+'</p>'; // Se inicia con cantidad 1 y mínimo 1
            tablaHTML += '</td>';
            tablaHTML += '<td>' + '<button class="boton-menos" onclick="disminuirCantidad(\'' + producto.id + '\')">-</button>'; // Botón para aumentar la cantidad
            tablaHTML += '<span style="margin-right: 8px;"></span>'; // Espacio entre los botones 
            tablaHTML += '<button class="boton-mas" onclick="aumentarCantidad(\'' + producto.id + '\')">+</button>'; // Botón para disminuir la cantidad
            tablaHTML += '</td>';
            tablaHTML += '</tr>';
            // Añadir la división entre filas
            tablaHTML += '<tr class="division-fila"><td colspan="5"></td></tr>';
        }
    } else {
        // Si no hay productos en el carrito, mostrar un mensaje indicando que está vacío
        tablaHTML += '<tr><td colspan="6">No hay productos en el carrito.</td></tr>';
        // Ocultar los botones de ordenar
        document.getElementById('botonesOrdenar').style.display = 'none';
        
    }

    tablaHTML += '</tbody></table>';
    // Mostrar el total del carrito fuera de la tabla
    var totalCarritoHTML = '<p id="totalCarrito" style="background-color: red; color: white;">Total $' + totalCarrito.toFixed(2) + '</p>';
    
    // Agregar la tabla al div "carrito"
    carrito.innerHTML = tablaHTML + totalCarritoHTML;
}
        // Función para aumentar la cantidad del producto
        function aumentarCantidad(productoId) {
            var parrafo = document.getElementById(productoId);
            var cantidad = parseInt(parrafo.textContent);
            
            if (cantidad <= 19) {
                parrafo.innerText = cantidad + 1;
                

                let cart = sessionStorage.getItem('cart');
                var productos = JSON.parse(cart);

                productos.map(function (producto) {
                    if(producto.id == productoId) {
                        producto.cantidad = cantidad + 1;
                    }
                    return producto;
                });

                var platillosJSON = JSON.stringify(productos);

                // Guardar la cadena JSON en sessionStorage
                sessionStorage.setItem('cart', platillosJSON);
                // Actualizar el total del carrito
                 // Actualizar el contador del carrito después de disminuir la cantidad de un producto
                 actualizarContadorCarrito(productos.length);

// Actualizar el total del carrito
actualizarTotalCarrito();
            }

        }
        // Función para ordenar a domicilio o en el restaurante
function ordenar(opcion) {
    let cart = sessionStorage.getItem('cart');
    var productos = JSON.parse(cart);

    // Aquí puedes agregar la lógica para enviar el pedido según la opción seleccionada (domicilio o restaurante)
    if (opcion === 'domicilio') {
        enviarWhatsApp(productos, opcion);
        alert('Tu pedido ha sido enviado a domicilio');
    } else if (opcion === 'restaurante') {
        enviarWhatsApp(productos, opcion);
        alert('Tu pedido ha sido enviado al restaurante');
    } else {
        console.log('Opción no válida');
    }

    // Aquí puedes agregar más acciones, como vaciar el carrito después de realizar el pedido, por ejemplo
    sessionStorage.removeItem('cart');
    // Actualizar el contador del carrito después de vaciarlo
    actualizarContadorCarrito(0);
    // Actualizar el total del carrito después de vaciarlo
    actualizarTotalCarrito();

    // Redireccionar a una página de confirmación de pedido, por ejemplo
    // window.location.href = '/confirmacion-pedido';
}

        // Función para disminuir la cantidad del producto
        function disminuirCantidad(productoId) {
            var parrafo = document.getElementById(productoId);
            var cantidad = parseInt(parrafo.textContent);
            var carrito = document.getElementById("carrito");

            let cart = sessionStorage.getItem('cart');
            var productos = JSON.parse(cart);

            if(cantidad == 1) {
                parrafo.innerText = cantidad - 1;
                // Filtrar la lista de productos para excluir el producto con el ID especificado
                productos = productos.filter(function(producto) {
                    return producto.id != productoId;
                });

                // Actualizar el contador del carrito después de disminuir la cantidad de un producto
                actualizarContadorCarrito(productos.length);

                // Actualizar el total del carrito
                actualizarTotalCarrito();

                var platillosJSON = JSON.stringify(productos);
                // Guardar la cadena JSON en sessionStorage
                if(productos.length == 0) {
                    // Eliminar el elemento del sessionStorage
                    sessionStorage.removeItem("cart");
                    carrito.innerHTML = '<p>No hay productos en el carrito.</p>';
                    ordenarADomicilio.style.display = 'none'
                    ordenarEnRestaurante.style.display = 'none'
                } else {
                    sessionStorage.setItem('cart', platillosJSON);
                    contruirCarrito();
                }
                // Actualizar el contador del carrito después de disminuir la cantidad de un producto
                actualizarContadorCarrito(productos.length);

                // Actualizar el total del carrito
                actualizarTotalCarrito();
               
                return;
            }
            if (cantidad > 1) {
                parrafo.innerText =  cantidad - 1;

                productos.map(function (producto) {
                    if(producto.id == productoId) {
                        producto.cantidad = cantidad - 1;
                        
                        // Actualizar el contador del carrito después de disminuir la cantidad de un producto
                actualizarContadorCarrito(productos.length);

// Actualizar el total del carrito
actualizarTotalCarrito();
                    }
                    return producto;
                });

                var platillosJSON = JSON.stringify(productos);
                // Guardar la cadena JSON en sessionStorage
                sessionStorage.setItem('cart', platillosJSON);

                // Actualizar el contador del carrito después de disminuir la cantidad de un producto
                actualizarContadorCarrito(productos.length);

                // Actualizar el total del carrito
                actualizarTotalCarrito();
            }
        }
        // Función para actualizar el total del carrito
        function actualizarTotalCarrito() {
            let cart = sessionStorage.getItem('cart');
            var productos = JSON.parse(cart);
            var totalCarrito = 0;

            // Calcular el total del carrito sumando el precio de cada producto multiplicado por su cantidad
            productos.forEach(function (producto) {
                totalCarrito += producto.precio * producto.cantidad;
            });
            

            // Actualizar el elemento HTML que muestra el total del carrito
            document.getElementById('totalCarrito').innerText = 'Total $' + totalCarrito.toFixed(2);
        }

        // Función para enviar la lista del carrito por WhatsApp
        function enviarWhatsApp(productos, opcion) {
            var mensaje = "Mi pedido (" + opcion + "):\n";
            productos.forEach(function(producto) {
                mensaje += producto.cantidad + " " + producto.titulo + " $" + (producto.precio * producto.cantidad) +"\n";
            });
            mensaje += "Total a pagar: $" + document.getElementById('totalCarrito').innerText.substr(7) + "\nNombre:";
            
            // Modifica el número de WhatsApp al que deseas enviar el mensaje
            var numeroWhatsApp = "+529831920749";
// Construye el enlace para enviar el mensaje por WhatsApp
var enlaceWhatsApp = "https://wa.me/" + numeroWhatsApp + "?text=" + encodeURIComponent(mensaje);
            // Abre la misma ventana con el enlace de WhatsApp
            window.location.href = enlaceWhatsApp;
        }


        
    </script>

    <!-- Incluye el pie de página u otros elementos finales -->
    @include('burguesia.footer')

</body>
</html>