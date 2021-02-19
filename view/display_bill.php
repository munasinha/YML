<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css"/>
        
      <?php
      // include '../includes/bootstrap_includes_css.php';
        include '../model/billing_model.php';
        
        $bill_obj = new Bill();  ///  creating the user Object
        $app_id=0;
        if(isset($_GET['id'])){
            $app_result=$bill_obj->get_appointment_details($_GET['id']);
            $app_row=$app_result->fetch_assoc();
            $app_id = base64_decode($_GET['id']);
        }
        else{
            header("Location:billing.php");
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
                <h1 style="text-align:center;">Bill</h1>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
        </div>

        <?php include_once("../includes/side-nav.php");?>

        <div class="col-md-9">
            <div class="row">
                <div class="row">
                    
                    <div class="col-md-8">
                        <p>Name: <?php echo $app_row["patient_f_name"]." ".$app_row["patient_l_name"];   ?></p>
                        <p>Date: <?php echo $app_row["appointment_date"]; ?></p>
                        <div class="row">
                           &nbsp;
                        </div>
                        <table class="table table-responsive">
                            <tr>
                                <th>No</th>
                                <th>Test</th>
                                <th>Price</th>
                            </tr>
                        <?php 
                        
                            $test_res = $bill_obj->get_tests($app_id);
                            $count=0;
                            while($test_row = $test_res->fetch_assoc()){
                                $count+=1;
                                echo "<tr>
                                        <td>$count</td>
                                        <td>",$test_row["test_name"],"</td>",
                                        "<td>",$test_row["price"],"</td>";
                            } 
                        ?> 
                            <tr>
                                <td colspan="2">Total</td>
                                <td><?php
                                    $test_tot = $bill_obj->get_total($app_id); 
                                    $test_row = $test_tot->fetch_assoc();
                                    echo "",$test_row["t"];
                                ?></td>
                            </tr>
                        </table> 
                        <a href="display_bill.php?id=<?php echo base64_encode($app_id);?>" class="btn btn-primary">Print Bill</a>
                    </div>
                </div>
            </div>  
            
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
