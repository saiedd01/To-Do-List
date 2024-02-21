<?php 



namespace Week13\To_Do_List\Classes;

class Request{

    // GET
    public function get($key){
        return(isset($_GET[$key])) ? $_GET[$key] : null;
    }

    // POST
    public function post($key){
        return(isset($_POST[$key])) ? $_POST[$key] : null;
    }

    // check
    public function check($data){
        return isset($data);
    }

    // Clean
    public function clean($data){
        return trim(htmlspecialchars($data));
    }

    public function checkMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function redirect($file){
        header("Location: $file");
    }
}

?>