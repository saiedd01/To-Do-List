<?php

use Week13\To_Do_List\Classes\Session;

require_once 'inc/header.php';
require_once 'App.php';
?>

<?php 
if($request->check($request->get('id'))){
    $id = $request->clean($request->get("id"));
    $sqlOne = $conn->prepare( "SELECT title FROM `todo` WHERE id=:id" );
    $sqlOne->bindParam(":id",$id);
    $sqlOne->execute();
    if($sqlOne->rowCount()==1){
        $data = $sqlOne->fetch(PDO::FETCH_ASSOC);
    }else{
        Session::set("errors",["todo not found"]);
        $request->redirect("index.php");
    }
}else{
    $request->redirect("index.php");
}
?>

<body class="container w-50 mt-5">
    <?php require_once 'inc/errors.php';?>
    <form action="handle/edit.php?id=<?php echo $id ?>" method="post">
            <textarea type="text" class="form-control" name="title" id="" placeholder="enter your note here"><?php echo $data["title"]; ?></textarea>
            <div class="text-center">
                <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Update</button>
            </div>  
    </form>
</body>
</html>