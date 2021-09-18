<?php
require '../app/Config/Config.php';
//this function include file automatique on instance obgect form class
spl_autoload_register(function($className){
    $paths = [
        '../app/Controllers/',
        '../app/helpers/',
        '../app/librareis/',
        '../app/Models/'
    ];

    foreach ($paths as  $path) {
        //concat class name and extenstion file php
        $file_name = $path.$className.'.php';
        //check if file is exists 
        if(file_exists($file_name)){
            //include file 
            include $file_name;
        }
    }
});