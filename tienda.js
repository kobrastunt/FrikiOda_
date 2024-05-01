document.addEventListener('DOMContentLoaded', function() {
    const btnsAddToCart = document.querySelectorAll('.info-product button');
    const btnWhatsApp = document.querySelector('a[href="https://wa.me/34667810705/?text=Hola,%20Wikioda%20escribo%20para%20realizarle%20la%20siguiente%20pregunta:"]');
    const btnCart = document.querySelector('.container-icon');
    const containerCartProducts = document.querySelector('.container-cart-products');
    const contadorProductos = document.getElementById('contador-productos');

    const productosEnCarrito = [];

    function crearMensaje() {
        let mensaje = '¡Hola! Quiero ordenar los siguientes productos:';
        productosEnCarrito.forEach((producto, index) => {
            mensaje += `\n${index + 1}. ${producto.nombre} - Precio: ${producto.precio}`;
            if (producto.talla) {
                mensaje += ` - Talla: ${producto.talla}`;
            }
        });
        return mensaje;
    }

    function addToCart(event) {
        const producto = event.target.closest('.item');
        const nombreProducto = producto.querySelector('.info-product h2').textContent;
        const precioProducto = producto.querySelector('.info-product .price').textContent;
        const talla = producto.querySelector('.info-product select') ? producto.querySelector('.info-product select').value : '';

        const productoExistente = productosEnCarrito.find(item => item.nombre === nombreProducto && item.talla === talla);
        if (productoExistente) {
            alert('Este producto ya está en el carrito.');
            return;
        }

        productosEnCarrito.push({ nombre: nombreProducto, precio: precioProducto, talla: talla });

        const nuevoProducto = document.createElement('div');
        nuevoProducto.classList.add('cart-product');
        nuevoProducto.innerHTML = `
            <div class="info-cart-product">
                <span class="cantidad-producto-carrito">1</span>
                <p class="titulo-producto-carrito">${nombreProducto}</p>
                <span class="talla-producto-carrito">${talla ? 'Talla: ' + talla : ''}</span>
                <span class="precio-producto-carrito">${precioProducto}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon-close">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
        `;

        const contenedorCarrito = document.querySelector('.container-cart-products');
        contenedorCarrito.appendChild(nuevoProducto);

        contadorProductos.textContent = parseInt(contadorProductos.textContent) + 1;

        calcularTotal();
    }

    btnsAddToCart.forEach(btn => {
        btn.addEventListener('click', addToCart);
    });

    function removeFromCart(event) {
        const producto = event.target.closest('.cart-product');
        const nombreProducto = producto.querySelector('.titulo-producto-carrito').textContent;
        const talla = producto.querySelector('.talla-producto-carrito').textContent.replace('Talla: ', '');

        productosEnCarrito.splice(productosEnCarrito.findIndex(item => item.nombre === nombreProducto && item.talla === talla), 1);
        
        producto.remove();
        contadorProductos.textContent = parseInt(contadorProductos.textContent) - 1;
        calcularTotal();
    }

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('icon-close')) {
            removeFromCart(event);
        }
    });

    function calcularTotal() {
        const preciosProductos = document.querySelectorAll('.precio-producto-carrito');
        let total = 0;
        preciosProductos.forEach(precio => {
            total += parseFloat(precio.textContent.replace('€', ''));
        });

        const totalPagar = document.querySelector('.total-pagar');
        totalPagar.textContent = '€' + total.toFixed(2);
    }

    function actualizarMensajeWhatsApp() {
        btnWhatsApp.href = `https://wa.me/34667810705/?text=${encodeURIComponent(crearMensaje())}`;
    }

    btnWhatsApp.addEventListener('click', function(event) {
        event.preventDefault();
        window.open(btnWhatsApp.href, '_blank');
    });

    btnCart.addEventListener('click', () => {
        containerCartProducts.classList.toggle('hidden-cart');
    });

    // Actualizar el mensaje de WhatsApp cada vez que se modifica el carrito
    document.addEventListener('click', actualizarMensajeWhatsApp);
});
