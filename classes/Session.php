<?php 

namespace Week13\To_Do_List\Classes;

class Session{
    
    //start the session
    public function __construct()
    {
        session_start();
    }

    //set
    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }
    
    //get
    public function get($key)
    {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return null;
        }
    }

    //unset
    public function remove($key){
        unset( $_SESSION[$key]);
    }

    //destroy
    public function destroy(){
        session_destroy();
    }
}

?>