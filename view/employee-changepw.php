<html>
    <head>
      <?php include '../includes/bootstrap_includes_css.php';?>
    </head>

    <body >
        <div class="container-fluid">
            <?php include "../includes/top_row.php"?>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <?php
            if(isset($_GET["err"]))
            {
                $msg=  base64_decode($_GET["err"]);
            ?>

            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                    <div class="alert alert-danger">
                        <h6><?php
                        echo $msg;
                        ?>
                        </h6>
                    </div>
                </div>
                <div class="col-md-3">&nbsp;</div>
            </div>
            <?php
            }

            if(isset($_GET["updated"])){
               ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                    Password Successfully Updated!!!
                    </div>
                </div>
            </div>
             <?php
            }
            ?>
            <div class="row">
                     <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                        <div id="alertmsg">

                         </div>
                </div>
                       <div class="col-md-3">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                    <form method="post" action="../controller/login_controller.php?status=change_password&id=<?php echo $_GET['id'];?>" id="loginform">
                        <div class="panel panel-default" style="height:350px">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-10 col-sm-10 col-xs-10">
                                        <h4>Change Password</h4>
                                        
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <h1 class="h1"><span class="glyphicon glyphicon-lock" ></span></h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div  class="col-md-3">
                                        <label class="control-label">Current Password</label>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <input type="password" class="form-control" placeholder="Current Password" name="c_password" id="c_password" required="required"/>
                                    </div>

                                </div>
                                <br/>
                                <div class="row">
                                    <div  class="col-md-3">
                                        <label class="control-label">New Password</label>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <input type="password" class="form-control" placeholder="New Password" name="new_password" id="new_password" required="required"/>
                                    </div>

                                </div>
                                <br/>
                                <div class="row">
                                    <div  class="col-md-3">
                                        <label class="control-label">Current Password</label>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-xs-12">
                                        <input type="password" class="form-control" placeholder="Re-enter Password" name="re_password" id="re_password" required="required"/>
                                    </div>
                                   
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-md-12">&nbsp;</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                        <input type="submit" class="btn btn-block btn-success" value="Change Password"/>
                                    </div>

                                </div>
                                <div class="row">
                                  &nbsp;
                                </div>
                                <div class="row">
                                  <div class="col-md-12 col-xs-12 col-sm-12">
                                    <a href="recovery.php" >Forgot my password</a>
                                  </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">&nbsp;</div>
            </div>
        </div>
    </body>
    <?php include '../includes/bootstrap_script_includes.php'; ?>
    <!--<script src="../js/login_validation.js"></script>-->
</html>
