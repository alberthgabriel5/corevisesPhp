<?php
include_once 'public/header.php';
?>

<body>
    <form>
        <div class="banner">
            <div class="container">
                <div class="logo">
                    <a href="?controlador=Index&accion=inicio"><img src="public/images/logo.png" alt=""/></a>
                    <title>BearGamer</title>
                </div>
                <div class="menu">
                    <ul class="megamenu skyblue">
                        <li><a class="color1" href="?controlador=Index&accion=visitarTienda">Visitar</a></li>
                        <li><a class="color2" href="?controlador=Index&accion=login"><span></span>Iniciar Sesion</a></li>               
                        <li><a class="color3" href="?controlador=Index&accion=registrar">Registrar Nuevo Usuario</a></li>                   
                    </ul>
                </div>
            </div>
        </div>
    </form>

    <div class="main">
        <div class="register">
            <div class="container">
                <?php
                if (isset($vars)) {
                    if ($vars == 1) {
                        include_once 'formularioRegistro.php';
                    } else if ($vars == 2) {
                        echo '<div class = "login">
                                            <div class = "container">
                                                <h3 class = "animated wow zoomIn" data-wow-delay = ".5s">Iniciar Sesión</h3>
                                                <div class = "login-form-grids animated wow slideInUp" data-wow-delay = ".5s">
                                                    <form action = "?controlador=Index&accion=verificaSesion" method = "post">
                                                        <input type = "text" id = "usuario" name = "usuario" placeholder = "Mail" required>
                                                        <input type = "password" id = "pass" name = "pass" placeholder = "Contraseña" required>
                                                        <input type = "submit" value = "Ingresar">
                                                    </form>
                                                </div>
                                            </div>
                                         </div>';
                    } else if ($vars == 0) {
                        include_once 'public/informacionPagina.php';
                    } else if ($vars == 3) {
                        include_once 'formularioRegistro.php';
                        echo '<p>El registro se ha llevado a cabo exitosamente</p>';
                    } else if ($vars == 4) {
                        include_once 'formularioRegistro.php';
                    } else if ($vars == 5) {
                        echo '<div class = "login">
                                            <div class = "container">
                                                <h3 class = "animated wow zoomIn" data-wow-delay = ".5s">Login Form</h3>
                                                <div class = "login-form-grids animated wow slideInUp" data-wow-delay = ".5s">
                                                    <form action = "?controlador=Index&accion=verificaSesion" method = "post">
                                                        <input type = "text" id = "usuario" name = "usuario" placeholder = "Mail" required>
                                                        <input type = "password" id = "pass" name = "pass" placeholder = "Password" required>
                                                        <input type = "submit" value = "Login">
                                                    </form>
                                                </div>
                                            </div>
                                         </div>';
                        echo '<p>Los datos de usuario no coinciden con los registros del sistema.</p>';
                    }//Fin del if.
                }//Fin del isset.
                ?>
            </div>
        </div>
        <?php
        include_once 'public/footer.php';
        ?>
