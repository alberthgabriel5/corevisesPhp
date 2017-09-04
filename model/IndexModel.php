<?php

class IndexModel {

    protected $db;

    public function __construct() {
        
    }//Fin del constructor.

    public function insertarUsuario($valor1, $valor2,$valor3, $valor4){

     $soapClient= $soapClient = new SoapClient("http://25.75.16.236:8097/WebCore.asmx?WSDL");
   
    $resultado = $soapClient->insertClient(array( "email" => $valor3,"password" => $valor4,"name" => $valor1,"birthday" => $valor2));

    echo $resultado->insertClientResult; 
    $resultado->insertClientResult;
    return $resultado->insertClientResult;;
    }//Fin de la función InsertarReparacion.
    
    public function verificaSesion($nombreUsuario, $password){
     $soapClient= $soapClient = new SoapClient("http://25.75.16.236:8097/WebCore.asmx?WSDL"); 
   
    $resultado = $soapClient->initSessionClient(array( "email" => $nombreUsuario,"password" => $password));

        echo $resultado->initSessionClientResult;
        return $resultado->initSessionClientResult;;
    }//Fin de la función verificaSesion.

}//Fin de la clase ItemsModel
?>