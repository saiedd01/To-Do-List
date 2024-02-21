<?php 

namespace Week13\To_Do_List\Classes;
use Week13\To_Do_List\Classes\Validator;
require_once 'Validator.php';

class Str implements Validator {

    public function check($key, $value)
    {
        if(is_numeric($value)){
            return "$key must be string";
        }else{
            return false;
        }
    }
}





?>