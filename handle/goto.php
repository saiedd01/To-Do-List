<?php
use Week13\To_Do_List\Classes\Request;
use Week13\To_Do_List\Classes\Session;

require_once '../App.php';

if($request->check($request->get("status")) && $request->check($request->get('id'))){
    $id = $request->clean($request->get("id"));
    $status = $request->clean($request->get("status"));

    $sql = $conn->prepare("select title from todo where id=:id");
    $sql->bindParam(":id",$id);
    $sql->execute();
    if($sql->rowCount()==1){
        $sql = $conn->prepare("update todo set `status`=:status where id=:id");
            $sql->bindParam(":status",$status);
            $sql->bindParam(":id",$id);
            $Output=$sql->execute();
            if($Output){
                Session::set("success","Status of Task updated successfully!");
                Request::redirect("../index.php");
            }else{
                Session::set('errors',["Error while Update Status"]);
                Request::redirect("../index.php");
            }
    }else{
        Session::set("errors",["Todo not found."]);
        Request::redirect("../index.php");
    }

}else{
    Request::redirect("../index.php");
}