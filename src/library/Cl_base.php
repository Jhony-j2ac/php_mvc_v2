<?php
class Cl_base{
    private $at_host = DB_HOST;
    private $at_usuario = DB_USER;
    private $at_password = DB_PASS;
    private $at_base = DB_DB;
    
    
    private $at_con;
    private $at_sql;
    private $at_error;
    
    public function __construct(){
        //conexion configurar
        $dsn = "mysql:host=" . $this->at_host . ';dbname=' . $this->at_base;
        
        $opciones = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        
        //instancioar pdo
        try{
            $this->at_con = new PDO($dsn, $this->at_usuario, $this->at_password, $opciones);
            
            $this->at_con->exec('set names utf8');
        }catch(PDOException $e){
            $this->at_error = $e->getMessage();
            echo $this->at_error;
        } 
    }
    
    public function query($sql){
        $this->at_sql = $this->at_con->prepare($sql);
    }
    
    public function bind($parametro, $valor, $tipo = null){
        if (is_null($tipo)) {
            
            switch(true){
                case is_int($valor): 
                $tipo = PDO::PARAM_INT;
                break;

                case is_bool($valor): 
                $tipo = PDO::PARAM_BOOL;
                break;

                case is_null($valor): 
                $tipo = PDO::PARAM_NULL;
                break;

                default: 
                $tipo = PDO::PARAM_STR;
                break;
            }
        }

        $this->sql->bindValue($parametro, $valor, $tipo);
        
    }

    public function execute(){
        return $this->at_sql->execute();
    }

    public function registros(){
        $this->execute();
        return $this->at_sql->fetchAll(PDO::FETCH_OBJ);
    }

    public function registro(){
        $this->execute();
        return $this->at_sql->fetch (PDO::FETCH_OBJ);
    }

    public function rowCount(){
        $this->execute();
        return $this->at_sql->rowCount();
    }

    
    
}