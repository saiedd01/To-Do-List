<?php
require_once '../App.php';

if($request->check($request->post("submit"))){
    $title = $request->clean($request->post("title"));

    // validation
    $validation->EndValidate("title",$title,["Required","Str"]);
    $errors = $validation->getError();
    // insert
    if(empty($errors)){
        $add = $conn->prepare("INSERT INTO todo (`title`) VALUES(:title)");
        $add->bindParam(":title",$title);
        $result = $add->execute();
        if($result){
            // done
            $session->set("success","Task added!");
            $request->redirect("../index.php");
        }else{
            // error
            $session->set('errors',["Error while insert"]);
            $request->redirect("../index.php");        
        }
    }else{
        $session->set('errors',$errors);
        $request->redirect("../index.php");

    }
}else{
    $request->redirect("../index.php");
}
?>