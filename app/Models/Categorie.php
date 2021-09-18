<?php 
class Categorie{

    private $db = null ;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function GetCategories(){
        $this->db->Query("select libelle from categories");
        return $this->db->DataResult();
    }

    

}