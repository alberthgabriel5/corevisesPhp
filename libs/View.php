<?php

class View {
    
    public function __construct() {
        ;
    }//Fin del constructor.
    
     public function show($nombreVista, $vars=array(), $valorAuxiliar){
         $config = Config::singleton();
         $path = $config->get('viewFolder').$nombreVista;
         $val = $valorAuxiliar;
         
         if(is_file($path)==FALSE){
             trigger_error('Pagina ' . $path . 'No existe', E_USER_NOTICE);
             return FALSE;
         }//Verifica si la dirección de esa página existe.
         
         if(is_array($vars)){
             foreach ($vars as $key=>$value){
                 $key = $value;
             }//Fin del foreach.
         } // if(is_array($vars))
         include $path;
     }//Fin de la función show.
}//Fin de la clase View.

?>
