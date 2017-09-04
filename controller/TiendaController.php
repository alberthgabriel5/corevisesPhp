<?php

    class TiendaController {
    
        public function __construct(){
            $this->view = new View();
        }//Fin del constructor.
        
        public function verificaSesion() {
            require 'model/TiendaModel.php';
            session_start();

            if (!isset($_SESSION['contador'])) {
                if(isset($_POST['usuario'])){
                    $items = new TiendaModel();
                    $resultado = $items->verificaSesion($_POST['usuario'], $_POST['pass']);
                    $error = 1;

                    while ($datos = $resultado->fetch()) {
                        $error = 0;
                        if ($datos[0] == $_POST['usuario']) {
                            $_SESSION['user'] = $_POST['usuario'];
                            if (isset($datos[1])) {
                                $_SESSION['contador'] = 2;
                                $this->view->show("tiendaView.php", 0, 0);
                            } else {
                                $_SESSION['contador'] = 1;
                                $this->view->show("tiendaView.php", 0, 0);
                            }//Verifica si es un usuario o un administrador.
                        }//Verifica si los datos coinciden.
                        break;
                    }//Fin del while.

                    if ($error) {
                        $this->view->show("indexView.php", 5, 0);
                    }//Verifica si falló el login.
                }else{
                    $this->view->show("tiendaView.php",0, 0);
                }//Verifica si viene de un formulario.
            } else {
                $this->view->show("tiendaView.php", 0, 0);
            }//Fin del isset session.
        }//Fin de la función verificaSesion.

        public function cerrarSesion(){
            session_start();
            session_destroy();
            $this->view->show("indexView.php", 0, 0);
        }//Fin de la función cerrarSesión.

        public function revisarCatalogo(){
            require 'model/TiendaModel.php';
            $items = new TiendaModel();
            session_start();
            
            $data['articulos'] = $items->obtenerArticulos();
            $this->view->show("tiendaView1.php", $data, 1);
        }//Fin de la función revisarCatálogo de todos los productos que existen en la base de datos
        
         public function revisarCatalogo2(){
            require 'model/TiendaModel.php';
            $items = new TiendaModel();
            session_start();
            
            $data['articulos2'] = $items->obtenerArticulos();
            $this->view->show("tiendaView1.php", $data, 2);
        }//Fin de la función revisarCatálogo.

        public function revisarCatalogo3(){
            require 'model/TiendaModel.php';
            $items = new TiendaModel();
            session_start();
            
            $data['articulos3'] = $items->obtenerArticulos();
            $this->view->show("tiendaView1.php", $data, 3);
        }//Fin de la función revisarCatálogo.
        
         public function revisarCatalogo4(){
            require 'model/TiendaModel.php';
            $items = new TiendaModel();
            session_start();
            
            $data['articulos4'] = $items->obtenerArticulos1($_POST['T1']);
            
            $this->view->show("tiendaView1.php", $data, 4);
        }//Fin de la función revisarCatálogo.

        
        public function cambiarDatos(){
            session_start();
            $this->view->show("tiendaView.php", 1, 0);
        }//Fin de la función insertarArticulo.

        public function actualizarCuenta(){
            require 'model/TiendaModel.php';
            $items = new TiendaModel();
            session_start();

            if($items->actualizarCuenta($_SESSION['user'], $_POST['usuario'], $_POST['pass']))
                $this->view->show("tiendaView.php", 2, 0);
            else
                $this->view->show("tiendaView.php", 3, 0);
        }//Fin de la función actualizarCuenta.
        
        public function agregarAdmin(){
            session_start();
            $this->view->show("tiendaView.php", 4, 0);
        }//Fin de la función agregarAdmin.
        
        public function registrarAdministrador(){
            require 'model/TiendaModel.php';
            $items = new TiendaModel();
            session_start();

            if($items->registrarAdministrador($_POST['usuario'], $_POST['pass']))
                $this->view->show("tiendaView.php", 5, 0);
            else
                $this->view->show("tiendaView.php", 6, 0);
        }//Fin de la función actualizarCuenta.
        
        public function mostrarFormularioArticulo(){
            session_start();
            $this->view->show("tiendaView.php", 8, 0);
        }//Fin de la función mostrarFormularioArticulo.
        
        public function crudArticulos() {
            require 'model/TiendaModel.php';
            $items = new TiendaModel();
            $tipo = $_FILES["foto"]["type"];
            session_start();
            
            if (!isset($_POST['buscar'])) {
                if($tipo == "image/jpeg" or $tipo == "image/png"){
                    $foto = $_FILES["foto"]["name"];
                    $ruta = $_FILES["foto"]["tmp_name"];

                    if ($tipo == "image/jpeg") {
                        $nombre = str_replace(".jpg", "", $foto);
                    } else if ($tipo == "image/png") {
                        $nombre = str_replace(".png", "", $foto);
                    }//Verifica el formato de la imagen.

                    $foto = str_replace($nombre, $_POST['nombre'], $foto);
                    $destino = "public/images/".$foto;

                    if(isset($_POST['insertar'])){
                        if($items->registrarArticulo($_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['cantidad'], $destino)){
                            copy($ruta, $destino);
                            $this->view->show("tiendaView.php", 9, 0);
                        }else{
                            $this->view->show("tiendaView.php", 10, 0);
                        }//Verifica si registro correctamente el artículo.
                    }else{
                         if($items->actualizarArticulo($_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['cantidad'], $destino)){
                            copy($ruta, $destino);
                            $this->view->show("tiendaView.php", 11, 0);
                        }else{
                            $this->view->show("tiendaView.php", 12, 0);
                        }//Verifica si registro correctamente el artículo.
                    }//Fin del if isset.
                }//Verifica si el archivo insertado es una imagen.
            }else{
                $data['articulo'] = $items->obtenerArticulo($_POST['nombre']);
                $this->view->show("tiendaView.php", $data, 3);
            }
        }//Fin de la función registrarArticulo.
        
        public function abrirProducto($nombreProducto){
            require 'model/TiendaModel.php';
            $items = new TiendaModel();
            session_start();
            $items->agregarVisto($nombreProducto, $_SESSION['user']);
            $data['articulo'] = $items->obtenerArticulo($nombreProducto);
            $this->view->show("tiendaView.php", $data, 2);
        }//Fin de la función abrirProducto.
        
        public function registrarProductoFavorito($nombreProducto){
            require 'model/TiendaModel.php';
            $items = new TiendaModel();
            session_start();
            $items->registrarProductoFavorito($nombreProducto, $_SESSION['user']);
            $data['articulo'] = $items->obtenerArticulo($nombreProducto);
            $this->view->show("tiendaView.php", $data, 2);
        }//Fin de la función registrarProductoFavorito.
        
        public function obtenerFavoritos(){
            require 'model/TiendaModel.php';
            $items = new TiendaModel();
            session_start();
            $data['articulos'] = $items->obtenerArticulos2($_SESSION['user'], 1);
            $this->view->show("tiendaView.php", $data, 1);
        }//Fin de la función obtenerFavoritos.
        
        public function obtenerVistos(){
            require 'model/TiendaModel.php';
            $items = new TiendaModel();
            session_start();
            $data['articulos'] = $items->obtenerArticulos2($_SESSION['user'], 2);
            $this->view->show("tiendaView.php", $data, 1);
        }//Fin de la función obtenerVitos.
       
    }//Fin del TiendaController.
?>
