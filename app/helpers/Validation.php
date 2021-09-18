<?php class Validation{  

    public $errors;
    public static $data = [];

   public function Validate($data,$OptionsValidations){
       //save data to variable
       Validation::$data = $data;
       $this->errors = [];
        foreach ($data as $key => $value) {
            foreach ($OptionsValidations as $key2 => $typesValidations) {
                if($key == $key2){
                    //declare array stock error $key  
                    $error = []; 
                    //explode data ( | ) and save to array  
                    $options = $this->ExplodeOptionValidation($typesValidations);
                    for ($i=0; $i <count($options) ; $i++) { 
                        if($options[$i] == 'required'){
                            $error[] = $this->ValidateInput($key,$value,'required');
                        }
                        else{
                            //chec if value containe (:) example max:10 or min:10
                            if(strpos($options[$i],":")){
                                //explode value from array $options with (:)
                                $optionsValue = $this->ExplodeOptionAndValue($options[$i]);
                                $error[] = $this->ValidateInput($key,$value,$optionsValue[0],$optionsValue[1]);
                            }//else is par example phone or number or string 
                            else{
                                $error[] = $this->ValidateInput($key,$value,$options[$i]);
                            }
                        }
                    }
                    $this->errors[$key] = $error;
                }    
            }
        }
    }

    //function explod options validation example(options is "required|max:10" return array = [required,max:10])
   private function ExplodeOptionValidation($optionValidation){
        return explode("|",$optionValidation);
    }
    //function explod options and value example (options is "max:10" return array = [max,10])
   private function ExplodeOptionAndValue($optionValidation){
        return explode(":",$optionValidation);
    }


  private  function ValidateInput($key,$value,$typeValidation,$value_Typevalidation = 0){
        switch($typeValidation){
            case 'required' :
                if(empty($value)){
                   // session::Set($key,$key.' is required');
                    return 'is required';
                }
                break;
            case 'chaine' : 
                if(!preg_match("/^[a-zA-Z]+$/i",$value)){
                   // session::Set($key,"enter chine");
                    return 'enter chine';
                }
                break;
            case 'email':
                if(!preg_match('/^[a-zA-Z0-9_.]{5,20}\@[a-z]{4,6}\.[a-z]{2,3}$/i',$value))
                {
                   // session::Set($key,"email incorrect");
                    return 'email incorrect';
                }
                break;
            case 'number':
                if(!preg_match('/^[0-9]+$/i',$value))
                {
                   // session::Set($key,$key." is not number");
                    return "is not number";
                }
                break;
            case 'max':
                if(strlen($value) > $value_Typevalidation)
                {
                   // session::Set($key,$value_Typevalidation." is max caracter");
                    return "$value_Typevalidation is max caracter";
                }
                break;
            case 'min':
                if(strlen($value) < $value_Typevalidation)
                {
                    //session::Set($key,$value_Typevalidation." is min caracter");
                    return "$value_Typevalidation is min caracter";
                }
                break;
            case 'confirmed':
                if(isset(Validation::$data['password']) && isset(Validation::$data['confirmed_password'])){
                    if(Validation::$data['password'] != Validation::$data['confirmed_password']){
                        return 'Password not confirmed';
                     }
                 }
                break;
        }
    }

   public function DisplayError($key){
       //check if array errors not null or exists
       if(isset($this->errors)){
           //boocle in array errors
        for ($i=0; $i < count($this->errors[$key]) ; $i++) { 
            //check if error index $i if null contunie else retunr error
            if(is_null($this->errors[$key][$i])){
                continue;
            }
            else{
                 return $this->errors[$key][$i];
            }
        }
       }
       else{
            return '';
       }
    }

    public function ErrorCount(){
        $errorCount  = 0;
        foreach ($this->errors as $key => $value) {
            # booble on arrays erroors
            $ver =  false;
            for ($i=0; $i <count($value) ; $i++) { 
                # boocle on check array errors
                if(is_null($value[$i])){
                    //chec if can not error => contunie
                    continue;
                }
                else{
                    //if exist error change value variable $ver to true 
                    $ver = true;
                }
            }
            if($ver == true){
                $errorCount += 1;
            }
            
        }
        return $errorCount;
    }
}
