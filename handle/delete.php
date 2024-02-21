<?php
require_once '../App.php';

use Week13\To_Do_List\Classes\Request;
use Week13\To_Do_List\Classes\Session;


if($request->check($request->get("id"))){
    $id = $request->get("id");
    $runquery = $conn->prepare("select id from todo where id =:id");
    $runquery->bindParam(":id",$id, PDO::PARAM_INT);  // Bind the parameter to the query
    $runquery->execute();
    if($runquery->rowCount()==1){
        $del = $conn->prepare( "delete from todo WHERE id=:id");
        $del->bindParam(":id",$id, PDO::PARAM_INT);   // Bind the parameter to the delete statement
        $res = $del->execute();              // Execute the delete statement
        if($res){
            Session::set("success","The todo has been deleted!");
            Request::redirect('../index.php');
        }else{
            Session::set("errors",["Error While Deleted"]);
            Request::redirect("../index.php");
        }
    }else{
        Session::set("errors",["Todo is not found"]);
        Request::redirect("../index.php");
    }
}else{
    Session::set("errors",["Todo not found"]);
    Request::redirect("../index.php");
}