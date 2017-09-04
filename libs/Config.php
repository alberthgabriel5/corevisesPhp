<?php

class Config {
    
    private $vars;
    private static $instance;
    
    private function __construct() {
        $this->vars=array();
    }//Fin del constructor.
    
     public function set($nombreAtributo, $valor){
         if(!isset($this->vars[$nombreAtributo])){
             $this->vars[$nombreAtributo]=$valor;
         }
     }//Fin del set.
     
     public function get($nombreAtributo){
         if(isset($this->vars[$nombreAtributo])){
             return $this->vars[$nombreAtributo];
         }
     }//Fin del get.
    
     public static function singleton(){
         if(!isset(self::$instance)){
             $tmpClass=__CLASS__;
             self::$instance=new $tmpClass;
         }
         return self::$instance;
     }//Fin de la función singleton.
     
}//Fin de la clase Config.

?>
