<?php 
require_once 'App.php';
require_once 'inc/header.php';
?>
<body>
    
    <div class="container my-3 ">    
        <div class="row d-flex justify-content-center">
               
                <div class="container mb-5 d-flex justify-content-center">
                    <div class="col-md-4">
                        <form action="handle/addToDo.php" method="post">
                        <textarea type="text" class="form-control" rows="3" name="title" id="" placeholder="enter your note here"></textarea>
                        <div class="text-center">
                            <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Add To Do</button>
                        </div>
                        </form>
                    </div>
                </div>
               

        </div>
        <?php  require_once 'inc/errors.php' ;?>
        <div class="row d-flex justify-content-between">  
            <?php 
            require_once 'inc/success.php';
            require_once 'inc/errors.php';
            ?> 
            <!-- all -->
            <div class="col-md-3 "> 
                <h4 class="text-white">All Notes</h4>

                <?php
                $runquery = $conn->query("SELECT * FROM todo WHERE status = 'All' ORDER BY created_At DESC");
                if($runquery->rowCount()>0){
                    while($all = $runquery->fetch(PDO::FETCH_ASSOC)){ ?>
                        <div class="alert alert-info p-2">
                                <h4 ><?php echo $all['title']?></h4>
                                <h5><?php echo $all['created_At']?></h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="edit.php?id=<?php echo $all['id'] ?>"class="btn btn-info p-1 text-white" >edit</a>
                                   
                                    <a href="handle/goto.php?status=Doing&id=<?php echo $all['id'] ?>"class="btn btn-info p-1 text-white" >doing</a>
                                </div>
                            
                        </div>
                    <?php  }
                }else{ ?>
                     <div class="m-2  py-3">
                    <div class="show-to-do">

                            <div class="item">
                                <div class="alert-info text-center ">
                                 empty to do
                                </div>
                            </div>
                    </div>
                </div>
                <?php }
                ?>
            </div>

            <!-- doing -->
            <div class="col-md-3 ">
            
                <h4 class="text-white">Doing</h4>
                <?php    
                    $runquery = $conn->query("Select * FROM todo WHERE `status`='Doing' ORDER BY created_At DESC");
                    if($runquery->rowCount()>0){
                        while($doing = $runquery->fetch(PDO::FETCH_ASSOC)){?>
                            <div class="alert alert-success p-2">
                                <h4 ><?php  echo $doing['title'] ?></h4>
                                <h5><?php echo $doing['created_At']?></h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <a></a>
                                    <a href="handle/goto.php?status=Done&id=<?php echo $doing['id'] ?>"class="btn btn-success p-1 text-white" >Done</a>
                                    </div>
                                    
                                    </div>
                                    
                                    <?php }
                        }else { ?>
                            <div class="m-2 py-3">
                                <div class="show-to-do">
                                    <div class="item">
                                        <div class="alert-success text-center ">
                                            empty to do
                                        </div>
                                    </div>
                                </div>
                            </div>
                       <?php } ?>
            </div>
           
            <!-- done -->
            <div class="col-md-3">
                <h4 class="text-white">Done</h4>

                        <?php 
                            $runquery = $conn->query("Select * FROM todo WHERE status='Done' ORDER BY created_At DESC");
                            if ($runquery -> rowCount() > 0){
                                while($done = $runquery->fetch(PDO::FETCH_ASSOC)){ ?>
                                    <div class="alert alert-warning p-2">
                                            <a href="handle/delete.php?id=<?php echo $done['id']?>" onclick="confirm('are your sure')"  class="remove-to-do text-dark d-flex justify-content-end " ><i class="fa fa-close" style="font-size:16px;"></i></a>                                                                
                                            <h4 ><?php echo $done['title'] ?></h4>
                                           <h5><?php echo $done['created_At'] ?></h5>
                                    </div>

                                <?php }
                            }else{?>
                            <div class="m-2 py-3">
                                <div class="show-to-do">
                                    <div class="item">
                                        <div class="alert-warning text-center ">
                                            empty to do
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }
                        ?>
            </div>
        </div>
    </div>

</body>
</html>