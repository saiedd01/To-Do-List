<?php 

if($session->get('success')){?>
    <div class="alert alert-success"> <?php echo $session->get('success'); $session->remove('success') ?> </div>
<?php }



?>