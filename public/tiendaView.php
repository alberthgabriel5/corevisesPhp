<?php
include_once 'public/header.php';
?>

<body>
    <form>
        <div class="banner">
            <div class="container">
                <div class="logo">
                    <a href="?controlador=Tienda&accion=verificaSesion"><img src="public/images/logo.png" alt=""/></a>
                    <title>BearGamer</title>
                </div>
                <div class="menu">
                    <ul class="megamenu skyblue">
                        <li><a class="color1">Productos</a>
                            <div class="megapanel">
                                <div class="row">
                                    <div class="col1">
                                        <div class="h_nav">
                                            <h4>Productos</h4>
                                            <ul>
                                                <li><a href="?controlador=Tienda&accion=revisarCatalogo">Catálogo</a></li>
                                            </ul>	
                                        </div>							
                                    </div>
                                </div>
                            </div>
                        </li>


                        <li><a class="color5" href="?controlador=Tienda&accion=cerrarSesion">Salir</a></li>
                        <div class="clearfix"> </div>
                    </ul>
                </div>
            </div>
        </div>
    </form>
    <?php
    ?>

    <?php
    include_once 'public/footer.php';
    ?>