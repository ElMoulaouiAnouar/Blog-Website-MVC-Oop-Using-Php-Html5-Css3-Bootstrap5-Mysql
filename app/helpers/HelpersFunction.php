<?php 
class HelpersFunction{
    
    // this helper function => cut text 

    static public function CutText($value,$length){
        $nv_value = '';
        if($length < strlen($value)){
            for ($i=0; $i < $length; $i++) { 
                # code...
                $nv_value .= $value[$i];
            }
            $nv_value .='...';
        }
        else{
            $nv_value = $value;
        }
        return $nv_value; 
    }

    //function add space to word example(HomeController <=> Home Controller)
    static public function AddSpaceToWord($value){
        $nv_value = $value[0];
        for ($i=1; $i <strlen($value) ; $i++) { 
            # code...
            if(strtoupper($value[$i]) == $value[$i]){
                $nv_value .= ' '.$value[$i];
            }
            else{
                $nv_value .= $value[$i];
            }
        }
        return $nv_value;
    }

    //get current method from url (index or show or ...)
   static function getCurrentMethod(){
      $url =  $_SERVER['REQUEST_URI'];
      $url = explode('/',$url);
      return HelpersFunction::getValueNotNumber($url,count($url));
    }
    
    static function getValueNotNumber($array_value,$count){
        --$count;
        if(!is_numeric($array_value[$count])){
            return $array_value[$count];
        }
        else{
            return HelpersFunction::getValueNotNumber($array_value,$count);
        }
    }

}