<?php 
class Filters{

    static public function FilterInput($inputValue){
        $inputValue = trim($inputValue);
        $inputValue = htmlspecialchars($inputValue);
        $inputValue = stripslashes($inputValue);
        return $inputValue;
    }

}