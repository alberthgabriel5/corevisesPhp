<?php

include_once 'public/header.php';

echo '<div class="men">
            <div class="container">
                <div class="col-md-8">
                    <div class="dreamcrub">
                        <ul class="breadcrumbs">
                            <li class="home">
                                <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
                                <span>&gt;</span>
                            </li>
                            <li class="home">&nbsp;
                                Men / Women&nbsp;
                            </li>
                        </ul>

                        <div class="clearfix"></div>		
                    </div>
                    <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
                        <div class="cbp-vm-options">
                            <a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
                            <a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
                        </div>
                        <div class="pages">   
                            <div class="clearfix"></div>
                            <ul>';
if (isset($vars['articulos'])) {
    while ($datos = $vars['articulos']->fetch()) {
        echo '<li>';


        echo '<div class="view view-first" align="center">
                        <div class="inner_content clearfix">
                            <div class="product_image">
                                <div class="mask1"><img src="' . $datos[4] . '" alt="image" class="img-responsive zoom-img"></div>
                                <div class="mask">
                                    <div class="info">Quick View</div>
                                </div>
                                <div class="product_container">
                                    <h4>' . $datos[1] . '</h4>
                                    <p>' . $datos[3] . '</p>';
    }//Fin del while.
}//Fin del if issets.

echo '</ul>
          </div>
            <script src="public/js/cbpViewModeSwitch.js" type="text/javascript"></script>
            <script src="public/js/classie.js" type="text/javascript"></script>
          </div>
        </div>
    </div>';
?>

