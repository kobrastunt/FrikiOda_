<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="firefox" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tienda online</title>
    <link rel="stylesheet" type="text/css" href="assets\css\tstyle.css"/>
</head>
<body>
    <style>
body{
        background-image: url('imagenes/mugiwara-store.jpg');
        background-color: #cbeff4(203,239,244, 0,8); /* Ajusta el último valor para cambiar la opacidad */
        background-blend-mode: overlay;
        background-size: cover; /* Hace que la imagen cubra todo el área visible */
        background-repeat: no-repeat; /* Evita que la imagen se repita */
        }
        h1 {
    text-align: center;
    background-image: url('imagenes/one-piece.webp');
    background-size: cover;
    background-position: center;
    font-size: 30px;
    color: #333;
    text-shadow: 
                -1px -1px 0 #fff,  
                1px -1px 0 #fff,
                -1px 1px 0 #fff,
                1px 1px 0 #fff;
    text-transform: uppercase;
    letter-spacing: 2px;
    padding: 20px 40px;
    border: 2px solid #333;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
}
.formulario{
    float: ;
    width: 40%;
background-color: rgba(87, 150, 234, 0.8);
    border-radius: 20px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
    color: #000;
    padding: 10px;
    margin-bottom: 30px;
    margin-right: 10px;
    margin-left: 0px;
    margin-top: 20px;
}

.item{
    background-color: rgba(87, 150, 234, 0.8);
}
        </style>
    <header>
        <h1>Productos One Piece</h1>
        <div class="container-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="icon-cart">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
            </svg>
            <div class="count-products">
                <span id="contador-productos">0</span>
            </div>
            <div class="container-cart-products hidden-cart">
                <div class="cart-total">
                    <h3>Total:</h3>
                    <span class="total-pagar">€0.00</span>
                </div>
            </div>
        </div>
        <a href="https://wa.me/34667810705/?text=Hola,%20Wikioda%20escribo%20para%20realizarle%20la%20siguiente%20pregunta:" target="_blank">
    <img src="imagenes\whatsapp_logo.png" width="70" height="70">
    </a>
    </header>
    <div class="formulario">
        <?php
                
                if (!isset($_SESSION['user_id'])) {
                    // Mostrar el formulario de inicio de sesión solo si el usuario no está autenticado
            ?>
            <h2>Iniciar sesión</h2>
            <form action="login.php" method="POST">
                <input type="text" name="email" placeholder="Correo electrónico">
                <input type="password" name="password" placeholder="Contraseña">
                <input type="submit" value="Iniciar sesión">
            </form>
            <span>¿No tienes una cuenta? <a href="signup.php">Regístrate</a></span>
            <?php
                } else {
                    // Si el usuario ya está autenticado, muestra un mensaje de bienvenida y el botón de cierre de sesión
                    ?>
                    <h2>¡BIENVENIDO/A <?php echo strtoupper($_SESSION['user_email']); ?>!!!</h2>
                    <form action="logout.php" method="POST">
                        <input type="submit" value="Cerrar sesión">
                    </form>
                    <?php
                }
            ?>
        </div>
        
    <div class="container-items">
        <div class="item">
            <figure>
                <img src="https://www.zapmaszap.es/wp-content/uploads/2022/02/taza-one-piece.jpg" alt="producto" />
            </figure>
            <div class="info-product">
                <h2>Taza de Luffy</h2>
                <p class="price">€20</p>
                <button>Añadir al carrito</button>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="https://www.worten.es/i/46e814ceb3f5ad3416d73125f2b9d544a34fc9b9" alt="producto" />
            </figure>
            <div class="info-product">
                <h2>Figura Luffy</h2>
                <p class="price">€35</p>
                <button>Añadir al carrito</button>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="https://m.media-amazon.com/images/I/61M-Z-7cEbL.jpg" alt="producto" />
            </figure>
            <div class="info-product">
                <h2>Lámpara Mini Luffy</h2>
                <p class="price">€50</p>
                <button>Añadir al carrito</button>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="https://m.media-amazon.com/images/I/51HCWxP3B-L._AC_SY741_.jpg" alt="producto" />
            </figure>
            <div class="info-product">
                <h2>Sudadera Ace</h2>
                <p class="price">€30</p>
                <button>Añadir al carrito</button>
                <label for="talla">Talla:</label>
                <select id="talla" name="talla">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="imagenes\pantalones-one-piece.png.png" alt="producto" />
            </figure>
            <div class="info-product">
                <h2>Pantalon Ace </h2>
                <p class="price">€45</p>
                <button>Añadir al carrito</button>
                <label for="talla">Talla:</label>
                <select id="talla" name="talla">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="https://assets.laboutiqueofficielle.com/w_450,q_auto,f_auto/media/products/2022/10/12/one-piece_344318_OP_TED_LOGO_NOIBLC_20221020T150953_01.jpg" alt="producto" />
            </figure>
            <div class="info-product">
                <h2>Chaqueta Baseball</h2>
                <p class="price">€75</p>
                <button>Añadir al carrito</button>
                <label for="talla">Talla:</label>
                <select id="talla" name="talla">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>
            </div>
        </div>
    </div>

    <script src="tienda.js"></script>
</body>

</html>


