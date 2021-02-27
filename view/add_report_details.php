<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css"/>
        
      <?php
            // include '../includes/bootstrap_includes_css.php';
            include '../model/report_model.php';
            $rep_obj = new Report();  ///  creating the user Object     
            $app_id=0;
            $test_id=0;
            $test_attrib_result="";
            $test_name_res ="";
            if(isset($_GET['app_id']) && isset($_GET['test_id'])){
                $app_id = base64_decode($_GET['app_id']);
                $test_id = base64_decode($_GET['test_id']);
                $test_attrib_result=$rep_obj->get_test_attibutes($test_id);
                $test_name_res = $rep_obj->get_test_name($test_id);
                
            }
            else{
                header("Location:third_party.php");
            }
      ?>
    </head>
    
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <?php include_once('../includes/top_row.php');?>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            
        </div>

        <div class="row">
            &nbsp;
        </div>
        <div class="row">
            <?php include_once("../includes/side-nav.php");?>
            
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
            
                <div class="row">
                    <h1 style="margin:auto;">
                        <?php
                            $test_name = $test_name_res->fetch_assoc();
                            echo $test_name['test_name'];
                        ?>
                    </h1>
                </div>
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
            
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="col-md-10">
                        <?php
                            if(isset($_GET["msg"])){
                        ?>       
                        <div class="col-md-12">
                            <div class="alert alert-success">
                            <?php
                                $msg=$_REQUEST["msg"];
                                $msg=  base64_decode($msg);
                                echo $msg;
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                                        
                    <div class="col-md-8" >
                        <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/report_controller.php?status=add_report">
        
                            <?php
                                $counter=0;
                                
                                while($test_attrib_row = $test_attrib_result->fetch_assoc()){
                            ?>
                                    <div class="col-md-3">
                                        <label class="control-label"><?php echo $test_attrib_row['attribute_name'];?></label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name=<?php echo $test_attrib_row['attribute_id'];?> class="form-control" id="fname" />
                                    </div>
                            <?php
                                    $counter++;
                                    if($counter%2==0){
                            ?>
                                    <div class="row">
                                        <div class="col-md-3">&nbsp;</div>
                                    </div>
                            <?php
                                    }
                                }
                            ?>
                            <div class="row">
                                <div class="col-md-3">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    &nbsp;
                                </div>
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;  Save
                                    </button>
                                    <button type="reset" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-refresh"></span>&nbsp;  Reset
                                    </button>
                                </div>
                            <div>
                            
                        </form>
                </div>                        
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">&nbsp;</div>
        </div>
    
    </body>
   <?php
// include '../includes/bootstrap_script_includes.php';
   ?>
    <script src="../js/datatable/jquery-3.5.1.js"></script>
    <script src="../js/datatable/jquery.dataTables.min.js"></script>
    <script src="../js/datatable/dataTables.bootstrap.min.js"></script>
    
    <script>
        $(document).ready(function() {
    $('#example').DataTable();
    } );
    
    </script>
</html>
