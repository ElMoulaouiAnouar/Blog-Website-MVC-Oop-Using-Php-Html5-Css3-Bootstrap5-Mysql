<?php 
class redirect{
    static public function To($path){
        header("loction: ".BASE_URL.$path);
    }
} 