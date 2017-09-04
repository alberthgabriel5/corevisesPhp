<?php

class TiendaModel {

    protected $db;

    public function __construct() {
        
    }

//Fin del constructor.

    public function verificaSesion($nombreUsuario, $password) {
        $consulta = $this->db->prepare("call sp_verificarSesion('$nombreUsuario', '$password')");
        $consulta->execute();
        return $consulta;
    }

//Fin de la función verificaSesion.

    public function actualizarCuenta($nombreUsuario, $nuevoUsuario, $password) {
        $consulta = $this->db->prepare("call sp_actualizarCuenta('$nombreUsuario','$nuevoUsuario', '$password')");
        $consulta->execute();
        $resultado = $consulta->rowCount();
        return $resultado;
    }

//Fin de la función cambiarDatosCuenta.

    public function registrarAdministrador($nombreUsuario, $password) {
        $consulta = $this->db->prepare("call sp_agregarAdministrador('$nombreUsuario', '$password')");
        $consulta->execute();
        $resultado = $consulta->rowCount();
        return $resultado;
    }

//Fin de la función registrarAdministrador.

    public function registrarArticulo($nombre, $precio, $descripcion, $cantidad, $destino) {
        $consulta = $this->db->prepare("call sp_registrarArticulo('$nombre', '$precio', '$descripcion', '$cantidad', '$destino')");
        $consulta->execute();
        $resultado = $consulta->rowCount();
        return $resultado;
    }

//Fin de la funcion registrarArticulo.

    public function obtenerArticulos() {

        $wsdl = "http://25.75.16.236:8097/WebCore.asmx?WSDL";
        $soapClient = $soapClient = new SoapClient($wsdl);
        $result = $soapClient->games();
        $array = json_decode($result->gamesResult);

        return $array;
    }

//Fin de la función verificaSesion.

    public function obtenerArticulos1($T1) {

        $wsdl = "http://25.75.16.236:8097/WebCore.asmx?WSDL";
        $soapClient = $soapClient = new SoapClient($wsdl);
        $result = $soapClient->games();
        $array = json_decode($result->gamesResult);
        $max = sizeof($array);
        for ($g = 0; $g < $max; $g++) {
            $posicion_coincidencia = strpos($array[g]->Name, $T1);
            if($posicion_coincidencia != null){
            return $array[g]->Name;
            }
        }//for
        return "";
    }

//Fin de la función verificaSesion.

    public function obtenerArticulo($nombre) {
        $consulta = $this->db->prepare("call sp_obtenerArticulo('$nombre')");
        $consulta->execute();
        return $consulta;
    }

//Fin de la función obtenerArticulo.

    public function actualizarArticulo($nombre, $precio, $descripcion, $cantidad, $destino) {
        $consulta = $this->db->prepare("call sp_actualizarArticulo('$nombre', '$precio', '$descripcion', '$cantidad', '$destino')");
        $consulta->execute();
        $resultado = $consulta->rowCount();
        return $resultado;
    }

//Fin de la función actualizarArticulo.

    public function registrarProductoFavorito($nombreProducto, $nombreCliente) {
        $consulta = $this->db->prepare("call sp_agregarFavorito('$nombreProducto', '$nombreCliente')");
        $consulta->execute();
        $resultado = $consulta->rowCount();
        return $resultado;
    }

//Fin de la función registrarProductoFavorito.

    public function agregarVisto($nombreProducto, $nombreUsuario) {
        $consulta = $this->db->prepare("call sp_agregarVisto('$nombreProducto', '$nombreUsuario')");
        $consulta->execute();
        return $consulta;
    }

//Fin de la función agregarVisto.

    public function obtenerArticulos2($nombreUsuario, $dato) {
        $consulta = $this->db->prepare("call sp_obtenerArticulos2('$nombreUsuario', $dato)");
        $consulta->execute();
        return $consulta;
    }

//Fin de la función obtenerFavoritos
}

//Fin de la clase ItemsModel
?>