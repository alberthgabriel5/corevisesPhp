<!DOCTYPE HTML>
<html>
    <head>
        <title>Proyecto II</title>
        <link href="public/css/bootstrap.css" rel='stylesheet' type='text/css'/>
        <link href="public/css/style.css" rel='stylesheet' type='text/css' />
        <link href="public/css/component.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> 
            addEventListener("load", function() { 
            setTimeout(hideURLbar, 0); }, false); 
            function hideURLbar(){ 
            window.scrollTo(0,1); 
            } 
        </script>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="public/js/jquery-1.11.1.min.js"></script>
        <link href="public/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="public/js/megamenu.js"></script>
        <script>$(document).ready(function () {
                $(".megamenu").megamenu();
            });</script>
        <link rel="stylesheet" href="public/css/etalage.css">
        <script src="public/js/jquery.etalage.min.js"></script>
        <script>
            jQuery(document).ready(function ($) {
                $('#etalage').etalage({
                    thumb_image_width: 300,
                    thumb_image_height: 400,
                    source_image_width: 900,
                    source_image_height: 1200,
                    show_hint: true,
                    click_callback: function (image_anchor, instance_id) {
                        alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
                    }
                });
            });
        </script>
        <script src="public/js/easyResponsiveTabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#horizontalTab').easyResponsiveTabs({
                    type: 'default',
                    width: 'auto',
                    fit: true
                });
            });
        </script>
    </head>

    <?php
    if (isset($vars['articulo'])) {
        while ($datos = $vars['articulo']->fetch()) {
            echo '<div class="men">
                <div class="container">
                    <div class="col-md-9 single_top">
			<div class="single_left">
                            <div class="labout span_1_of_a1">
				<ul id="etalage">
                                    <li>
					<a href="optionallink.html"><img class="etalage_thumb_image" src="' . $datos[4] . '" class="img-responsive" /><img class="etalage_source_image" src="' . $datos[4] . '" class="img-responsive" title="" /></a>
                                    </li>
				</ul>
                            <div class="clearfix"></div>	
			</div>
                        <div class="cont1 span_2_of_a1">
                            <h1>' . $datos[1] . '</h1>';

            if ($datos[5] > 0)
                echo '<p class="availability">Availability: <span class="color">In stock</span></p>';
            else
                echo '<p class="availability">Availability: <span class="reducedfrom">In stock</span></p>';

            echo '<div class="price_single">';

            if (isset($datos[6])) {
                $nuevoPrecio = $datos[2] - ($datos[2] / 100 * $datos[6]);
                echo '<span class="reducedfrom">$' . $datos[2] . '</span>
                <span class="actual">$' . $nuevoPrecio . '</span>';
            } else {
                echo '<span class="actual">$' . $datos[2] . '</span>';
            }//If isset val.


            echo '</div>';
            if ($_SESSION['contador'] == 1) {
                echo '<div class="wish-list">
                                    <ul>
                                        <li class="wish"><a href="?controlador=Tienda&accion=registrarProductoFavorito&parametros=' . $datos[1] . '">Marcar/desmarcar favorito</a></li>
                                        <li class="compare"><a href="?controlador=Tienda&accion=añadirCarrito&parametros=' . $datos[1] . '">Añadir al carrito</a></li>
                                    </ul>
                                </div>
                                <a href="#" title="Online Reservation" class="btn btn-primary btn-normal btn-inline " target="_self">Comprar</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>';
            }//Fin del if.

            echo '           <div class="sap_tabs">	
                            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                                <ul class="resp-tabs-list">
                                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Description</span></li>
                                        <div class="clear"></div>
                                </ul>				  	 
                                <div class="resp-tabs-container">
                                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                                        <div class="facts">
                                            <ul class="tab_list">
                                                <li><a>' . $datos[3] . '</a></li>
                                            </ul>           
					</div>
                                    </div>
				</div>
                            </div>
			</div>	
                    </div>
     		<div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>';
        }//Fin del while.
    }//Fin del if isset.
    ?>
