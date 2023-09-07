<?php

namespace  App\controllers; 
use App\library\Cl_controlador;


class Cl_existente extends Cl_controlador{
    public function __construct(){
        //echo 'Paginasc cargada';
    }
    
    public function index(){
        $datos = [
            "titulo" => "Prueba de una pagina que si existe"
        ];
        $this->vista('pages\Inicio', $datos);
    
    
    }

    public function test(){
        $datos = [
            "titulo" => "Prueba de una pagina que si existe con un metodo"
        ];
        $this->vista('pages\Inicio', $datos);


    }
    
}
