<?php

class FrontController {

    static function main() {
        require 'libs/View.php';
        require 'libs/configuration.php';
        $nombreAccion = "";
        $parametros = "";
        
        if (!empty($_GET['controlador'])){
            $controllerName = $_GET['controlador'].'Controller';
            if(!empty($_GET['parametros'])){
                $parametros = $_GET['parametros'];
            }//Fin del if del parametro.
        }else
            $controllerName = 'IndexController';

        if (!empty($_GET['accion'])) {
            $nombreAccion = $_GET['accion'];
        }else{
            $nombreAccion = "inicio";
        }//Si no hay una acción en la página, abre el index.

        $rutaControlador = $config->get('controllerFolder').$controllerName.'.php';

        if (is_file($rutaControlador))
            require $rutaControlador;
        else
            die('Controlador no encontrado - 404 not found');

        if (is_callable(array($controllerName, $nombreAccion)) == FALSE) {
            trigger_error($controllerName . '->' . $nombreAccion . ' no existe', E_USER_NOTICE);
            return FALSE;
        }
        
        $controller = new $controllerName();
        $controller->$nombreAccion($parametros);
    }//Fin de la función main.
}//Fin de la clase FrontController.

?>
