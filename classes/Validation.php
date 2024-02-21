<?php 

namespace Week13\To_Do_List\Classes;
require_once 'Str.php';
require_once 'Required.php';

class Validation{
    private $errors =[];

    public function EndValidate($key,$value,$rules){

        foreach ($rules as $rule){
            $rule = "Week13\To_Do_List\Classes\\".$rule;
            $obj = new $rule;
            $res= $obj->check($key,$value);
            if($res != false){
                $this->errors[] = $res;
            }
        }
    }

    public function getError(){
       return $this->errors ;
    }
}


?>