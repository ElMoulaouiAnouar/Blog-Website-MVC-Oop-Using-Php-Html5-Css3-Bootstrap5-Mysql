<?php
class Core{

    protected $currentController = 'PostController';
    protected $currentMethod = 'index';
    protected $params  = [];
    
    public  function __construct()
    {
        $url = $this->getUrl();
        //check if File Controller ennter is exists
        if(file_exists('../app/Controllers/'.ucwords($url[0]).'Controller.php')){
            $this->currentController = ucwords($url[0]).'Controller';
            unset($url[0]);
        }
        //require Controller
        require_once '../app/Controllers/'.$this->currentController.'.php';

        //instance objet from Class name(currentController)
        $this->currentController = new $this->currentController;

        //check if Method Enter exists
        if(isset($url[1])){
            if(method_exists($this->currentController,$url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        //check params if exists 
        $this->params = $url ? array_values($url) : [];

        //callback function from file (CurrentController)
        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);

    }


    private function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            return explode('/',$url);
        }
    }



}