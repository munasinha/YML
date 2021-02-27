<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css"/>
        
      <?php
        // include '../includes/bootstrap_includes_css.php';
        include '../model/report_model.php';
        $rep_obj = new Report();  ///  creating the user Object     
        $app_id=0;
        $rep_row="";

        if(isset($_GET['id'])){
            $app_id = base64_decode($_GET['id']);
            $app_result=$rep_obj->get_tests($app_id);
        }
        else{
            header("Location:third_party.php");
        }
        
      ?>
    </head>
    
    <body >
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
            <div class="row">
                <h1 style="margin:auto;">Add Results</h1>
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
                    
                    <div class="row">
                        
                        <div class="col-md-8">
                            <p style="font-size:28px">Test Details</p>
                            <table class="table table-responsive" id="example">
                                <tr>
                                    <th>No</th>
                                    <th>Test</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php 
                                    $count=0;
                                    while($app_row = $app_result-> fetch_assoc()){ 
                                        $count+=1;
                                        $test_id = base64_encode($app_row['test_id']);
                                ?>      
                                    <tr>                          
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $app_row["test_name"];?></td>
                                        <td><a href="add_report_details.php?app_id=<?php echo base64_encode($app_id);?>&test_id=<?php echo $test_id?>" class="btn btn-primary">Add Results</a></td>
                                    </tr>
                                <?php 
                                }
                                ?>
                            </table>
                        </div>
                    </div>                    
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
