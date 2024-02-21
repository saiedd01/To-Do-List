<?php

use Week13\To_Do_List\Classes\Request;
use Week13\To_Do_List\Classes\Session;

require_once '../App.php';

if($request->check($request->post("submit")) && $request->check($request->get('id'))){
    $id = $request->clean($request->get("id"));
    $title = $request->clean($request->post("title"));
    
    // validation
    $validation->EndValidate("title",$title,["Required","Str"]);
    $errors = $validation->getError();

    // check
    $sql = $conn->prepare("select title from todo where id=:id");
    $sql->bindParam(":id",$id);
    $sql->execute();
    if($sql->rowCount()==1){
        if(empty($errors)){
            // update
            $sql = $conn->prepare("update todo set `title`=:title where id=:id");
            $sql->bindParam(":title",$title);
            $sql->bindParam(":id",$id);
            $Output=$sql->execute();
            if($Output){
                Session::set("success","Task updated successfully!");
                Request::redirect("../index.php");
            }else{
                Session::set('errors',["Error while Update"]);
                Request::redirect("../edit.php?id=$id");
            }
        }else{
            Session::set('errors',$errors);
            Request::redirect("../edit.php?id=$id");
        }
    }else{
        Session::set("errors",["Todo not found."]);
        Request::redirect("../edit.php?id=$id");
    }
}else{
    Session::set('errors',["Todo Not found"]);
    Request::redirect("../index.php");
}