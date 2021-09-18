<?php

use League\Flysystem\Config;

class Database{

    //declre propriete class 

    private $db_name = DB_NAME;
    private $db_host = DB_HOST;
    private $db_username = DB_USERNAME;
    private $db_password = DB_PASSWORD;
    private $db_charset = DB_CHARSET;

    private $db_handler = null;
    public $db_statement = null;


    public function __construct()
    {
        $this->db_handler = new PDO("mysql:host=$this->db_host;dbname=$this->db_name;charset=$this->db_charset;",$this->db_username,$this->db_password);
        $this->db_handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        
    }

    public function Query($query){
        $this->db_statement = $this->db_handler->prepare($query);
        return $this->db_statement;
    }

    public function Execute($params = null){
        if(is_null($params)){
           return $this->db_statement->execute();
        }
        else{
           return $this->db_statement->execute($params);
        }
        
    }


    public function BindParam($parameter,$value,$type = null){
        switch(is_null($type)){
            case  is_int($type) :
                $type = PDO::PARAM_INT;
                break;
            case is_string($type):
                $type = PDO::PARAM_STR;
                break;
            case is_bool($type):
                $type = PDO::PARAM_BOOL;
                break;
            default :
                return;
        }
        $this->db_statement->bindValue($parameter,$value,$type);
    }

    public function RowCount(){
        return $this->db_statement->rowCount();
    }     

    public function DataResult($array_of_params = []){
        //check if exist array paramerters or not exists
        if(is_null($array_of_params)){
            $this->Execute();
        }
        else{
            $this->Execute($array_of_params);
        }
        return $this->db_statement->fetchAll(PDO::FETCH_OBJ);
    }
   
    public function single($param = []){
        if(isset($param)){
            $this->Execute($param);
        }
        else{
            $this->Execute();
        }
        return $this->db_statement->fetch(PDO::FETCH_OBJ);
    }

    
}