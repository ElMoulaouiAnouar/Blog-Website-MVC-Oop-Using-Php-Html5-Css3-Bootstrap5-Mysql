<?php 
class session{

    static public function Set($key , $value){
        setcookie($key,$value,time()+5,'/');
    }

}