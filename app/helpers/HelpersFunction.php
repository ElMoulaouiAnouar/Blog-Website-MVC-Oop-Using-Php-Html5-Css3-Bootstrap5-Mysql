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

}