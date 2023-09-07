<?php

namespace App\library;
require("../src/config/Cl_configs.php");

/* Mapear url
1) url
2) metodo	
3) parametro
*/

class Cl_core {
    protected $At_Controladoractual = "Cl_paginas";
    protected $At_MetodoActual = "index";
    protected $At_parametros = array();
    
    public function __construct(){
        $url = $this->Mt_getUrl();
	self::ArConfig();
	/* 1)
	 * Se valida y se carga el controlador segun la url
	 * */	
        if(isset($url[0])  && class_exists('App\\controllers\\' . ucwords($url[0]))){
            //si esta se establece como controlador por defecto
            $this->At_Controladoractual = ucwords($url[0]);
            // print_r ($this->At_Controladoractual);
            //limpio el elemento del arrray;
            unset($url[0]);
        }
        // llamo el controlador con la url desde el index
        //require_once '../app/controllers/' . $this->At_Controladoractual . '.php';
	// activo el controlador y llamo la clase
	$controlador = 'App\\controllers\\' . $this->At_Controladoractual;
	$this->At_Controladoractual = new $controlador();
        
	/* 2)
	 *  Verificar el metodo a usar
	 */
        if(isset($url[1])){
            //verificar existencia de el metodo
            if(method_exists($this->At_Controladoractual, $url[1])){
                $this->At_MetodoActual = $url[1];
                unset($url[1]);
            }

            $this->At_parametros = $url ? array_values($url) : [];
            // <<print_r($this->At_parametros);            
        }

        call_user_func_array([$this->At_Controladoractual,$this->At_MetodoActual], $this->At_parametros);

    }
    
    public function Mt_getUrl(){
        //echo $_GET['url'];
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

    private static function ArConfig(){
                $uu     = DB_USER;
                $pp     = DB_PASS;
                $hh     = DB_HOST;
                $dd     = DB_DB;
                $dsn_ar = "mysql://$uu:$pp@$hh/$dd;charset=utf8";
                $cfg    = \ActiveRecord\Config::instance();
                $cfg->set_model_directory(RUTA_APP.'/models/orm');
                $cfg->set_connections(array(
                        'development' => $dsn_ar,
                        'execute' => 'SET lc_time_names = "es_ES"'
		));

		#var_dump(\Models\TestAr::find('all'));
		#var_dump(\App\models\orm\CategoriasAr::find('all'));
        }
    
}
