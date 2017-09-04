<?php

class IndexController {
    
    public function __construct(){
        $this->view = new View();
    }//Fin del constructor.
    
    public function inicio(){
        $this->view->show("indexView.php", 0, 0);
    }//Fin de la funcion inicio.
    
    public function visitarTienda(){
        $this->view->show("tiendaView.php", 0, 0);
    }//Fin de la función visitarTienda.
    
    public function registrar(){
        $this->view->show("indexView.php", 1, 0);
    }//Fin de la función registrar.
    
    public function login(){
        $this->view->show("indexView.php", 2, 0);
    }//Fin de la función login.
    
    public function registrarUsuario(){
        require 'model/IndexModel.php';
        $items = new IndexModel();
        
        if($items->insertarUsuario($_POST['valor1'],$_POST['valor2'], $_POST['valor3'], $_POST['valor4']))
            $this->view->show("indexView.php", 3, 0);
        else
            $this->view->show("indexView.php", 4, 0);
    }//Fin de la función insertarUsuarioenelsistemapormetodopost
    
    public function verificaSesion() {
        require 'model/IndexModel.php';
        $items = new IndexModel();
        $resultado = $items->verificaSesion($_POST['usuario'], $_POST['pass']);
        
        session_start();
        
        if($resultado==1){
               $this->view->show("tiendaView.php", 0, 0);
        }else{
           
          echo 'LO siento NO estas REGISTRADO';  
        }
        

    }//Fin de la función verificaSesion para el cliente,tiene que estar registrada,envia por post al metodo verificaSesion.

}//Fin de la clase ItemsController.
