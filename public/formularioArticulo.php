<?php

echo '<div class="register">
            <div class="container">
                <h3 class="animated wow zoomIn" data-wow-delay=".5s">Article Form</h3>
                    <div class="login-form-grids">
                        <form class="animated wow slideInUp" data-wow-delay=".5s" enctype="multipart/form-data" action="?controlador=Tienda&accion=crudArticulos" method="post">';

if (isset($val)) {
    if ($val == 3) {
        if (isset($vars['articulo'])) {
            while ($datos = $vars['articulo']->fetch()) {
                echo '<input type="text" id="nombre" name="nombre" placeholder="Nombre" value="' . $datos[1] . '" required><br>
                              <input type="number" id="precio" name="precio" placeholder="Precio" value="' . $datos[2] . '" required><br><br>
                              <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion" value="' . $datos[3] . '" required><br>
                              <input type="number" id="cantidad" name="cantidad" placeholder="Cantidad" value="' . $datos[5] . '" required><br><br>
                              <input type="file" name="foto"/><br><br>
                              <input type="submit" id="insertar" name="insertar" value="Añadir">
                              <input type="submit" id="buscar" name="buscar" value="Buscar">
                              <input type="submit" id="actualizar" name="actualizar" value="Actualizar">
                            </form>
                        </div>
                        </div>
                    </div>
                  </div>';
            }//Fin del while.
        }//Fin del isset vars.
    } else {
        echo '<input type="text" id="nombre" name="nombre" placeholder="Nombre"><br>
                  <input type="number" id="precio" name="precio" placeholder="Precio"><br><br>
                  <input type="text" id="descripcion" name="descripcion" placeholder="Descripcion"><br>
                  <input type="number" id="cantidad" name="cantidad" placeholder="Cantidad"><br><br>
                  <input type="file" name="foto"/><br><br>
                  <input type="submit" id="insertar" name="insertar" value="Añadir">
                  <input type="submit" id="buscar" name="buscar" value="Buscar">
                  <input type="submit" id="actualizar" name="actualizar" value="Actualizar">
                </form>
            </div>
            </div>
        </div>
      </div>';
    }//Verifica el valor de val.
}//Fin del isset.
?>

