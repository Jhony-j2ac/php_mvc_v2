<?php

namespace App\library;
// traer modelos y vistas
class Cl_controlador{
    
    public function modelo($modelo){
        require_once("../app/models/" . $modelo . ".php");
        
        return new $modelo;
    }
    
    
    public function vista($vista, $datos = []){
	$className = "\App\\views\\" . $vista;
        if (class_exists($className)) {
            new $className($datos);
        }else {
            die("la vista no existe");
        }
    }
}
