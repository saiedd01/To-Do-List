<?php 

if($session->get('errors')){
    foreach ($session->get('errors') as $error){ ?>
    <div class="alert alert-danger"> <?php echo $error; $session->remove('errors') ?></div>
    <?php }
}


?>