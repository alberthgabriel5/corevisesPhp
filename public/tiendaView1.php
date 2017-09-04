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

                        <li><a class="color5" href="?controlador=Tienda&accion=revisarCatalogo">Todos</a></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <ul class="megamenu skyblue">

                        <li><a class="color5" href="?controlador=Tienda&accion=revisarCatalogo2">Categoria Accion</a></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <ul class="megamenu skyblue">

                        <li><a class="color5" href="?controlador=Tienda&accion=revisarCatalogo3">Categoria Aventura</a></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <ul class="megamenu skyblue">

                        <li><a class="color5" href="?controlador=Tienda&accion=cerrarSesion">Salir</a></li>
                        <div class="clearfix"> </div>
                    </ul>

                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <form method="POST" action="?controlador=Tienda&accion=revisarCatalogo4"> 
                <strong>Buscar Juego:</strong> <input type="text" id="T1" name="T1" size="20"><br><br> 
                <input type="submit" value="Buscar" name="buscar"> 
            </form>
        </div
        <br>
        <div class="menu">

        </div>
        <br>
        <div style="margin-left: 460px;">

            <?php
            if (isset($val)) {
                if ($val == 4) {
                    $array4 = $vars['articulos4'];
                    $max = sizeof($array4);
                    for ($g = 0; $g < $max; $g++) {
                        echo '<div class="view view-first" >
                        <div class="inner_content clearfix">
                            <div class="product_image">
                                <div class="mask1"><img src="public/images/' . $arra4[$g]->Consol . '.jpg" alt="image" class="img-responsive zoom-img" align="center" width="300px" height="250px"></div>
                                <div class="mask">
                                   
                                </div>
                                <div class="product_container">
                                    <h4>' . $array4[$g]->Name . '</h4>
                                    <p>' . $array4[$g]->Price . '</p>';
                    }
                }
            }//Fin del isset.
            ?>
            <br>

        </div>

        <div class="container"  style="margin-left: 460px;">

            <?php
            if (isset($val)) {
                if ($val == 1) {
                    $array = $vars['articulos'];
                    $max = sizeof($array);
                    for ($i = 0; $i < $max; $i++) {
                        echo '<div class="view view-first" >
                        <div class="inner_content clearfix">
                            <div class="product_image">
                                <div class="mask1"><img src="public/images/' . $array[$i]->Consol . '.jpg" alt="image" class="img-responsive zoom-img" align="center" width="300px" height="250px"></div>
                                <div class="mask">
                                   
                                </div>
                                <div class="product_container">
                                    <h4>' . $array[$i]->Name . '</h4>
                                    <p>' . $array[$i]->Price . '</p>';
                    }
                }
            }//Fin del isset.
            ?>
            <br>

        </div>

        <div class="container" style="margin-left: 460px;">
            <?php
            if (isset($val)) {
                if ($val == 3) {
                    $array2 = $vars['articulos3'];
                    $max = sizeof($array2);
                    for ($u = 0; $u < $max; $u++) {
                        if ($array2[$u]->Consol == 3) {
                            echo '<div class="view view-first" >
                        <div class="inner_content clearfix">
                            <div class="product_image">
                                <div class="mask1"><img src="public/images/' . $array2[$u]->Consol . '.jpg" alt="image" class="img-responsive zoom-img" align="center" width="300px" height="250px"></div>
                                <div class="mask">
                                   
                                </div>
                                <div class="product_container">
                                    <h4>' . $array2[$u]->Name . '</h4>
                                    <p>' . $array2[$u]->Price . '</p>';
                        }
                    }
                }
            }//Fin del isset.
            ?>

            <br>
        </div>

        <div class="container" style="margin-left: 460px;">
            <?php
            if (isset($val)) {
                if ($val == 2) {
                    $array1 = $vars['articulos2'];
                    $max = sizeof($array1);
                    for ($e = 0; $e < $max; $e++) {
                        if ($array1[$e]->Consol == 1) {
                            echo '<div class="view view-first" >
                        <div class="inner_content clearfix">
                            <div class="product_image">
                                <div class="mask1"><img src="public/images/' . $array1[$e]->Consol . '.jpg" alt="image" class="img-responsive zoom-img" align="center" width="300px" height="250px"></div>
                                <div class="mask">
                                   
                                </div>
                                <div class="product_container">
                                    <h4>' . $array1[$e]->Name . '</h4>
                                    <p>' . $array1[$e]->Price . '</p>';
                        }
                    }
                }
            }//Fin del isset.
            ?>
        </div>

        <?php
        include_once 'public/footer.php';
        ?>