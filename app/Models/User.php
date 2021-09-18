<?php
class User{

    private $db = null;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll(){
            $this->db->Query("select * from users");
            return $this->db->DataResult();
    }

    public function insert($data){
        $this->db->Query("insert into users(name,email,pass,id_photo,type_user) values(:name,:email,:pass,1,:type)");
        if($this->db->Execute(["name" => $data['name'],'email' => $data['email'],'pass' => $data['password'],'type' => 'user'])){
            return true;
        }
        else{
            return false;
        }
    }


    public function find($email){
        $this->db->query("select * from users where email like :email");
        return $this->db->single(['email'=>$email]);
    }

    public function verfierLogin($email,$password){
        $this->db->query("select * from users where email like :email and pass like :password");
        return $this->db->single(['email' => $email,'password' => $password]);
    }

}