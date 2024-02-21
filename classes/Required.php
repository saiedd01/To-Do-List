<?php 

namespace Week13\To_Do_List\Classes;
use Week13\To_Do_List\Classes\Validator;
require_once 'Validator.php';

class Required implements Validator {

    public function check($key, $value)
    {
        if(empty($value)){
            return "$key is Required";
        }else{
            return false;
        }
    }
}





?>