<?php session_start(); ?>

<div class="col-md-3">
    <h4> <span class="glyphicon glyphicon-user"></span><span><?php echo "Hello ".$_SESSION['employee']['first_name']." ".$_SESSION['employee']['last_name'];?></span></h4>
</div>

<div class="col-md-8"><h4 align="center" >Yasas Medi Lab</h4></div>

<div class="col-md-1">
    <a href="../controller/login_controller.php?status=logout" class="btn btn-primary" >Logout</a>
</div>