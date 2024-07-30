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
        var contadorCarrito = productos.reduce((total, producto) => total + producto.cantidad, 0);
        localStorage.setItem('contadorCarrito', contadorCarrito);
        document.getElementById('contadorCarrito').style.display = "block";
        document.getElementById('contadorCarrito').innerText = contadorCarrito;
    } else {
        // Si no hay productos en el carrito, creamos uno nuevo
        var platillos = [platillo];
        var platillosJSON = JSON.stringify(platillos);
        sessionStorage.setItem('cart', platillosJSON); // Guarda el carrito actualizado en sessionStorage

        // Incrementa el contador del carrito y muestra el valor
        var contadorCarrito = 1;
        localStorage.setItem('contadorCarrito', contadorCarrito);
        document.getElementById('contadorCarrito').style.display = "block";
        document.getElementById('contadorCarrito').innerText = contadorCarrito;
    }
}
