<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>        
      <?php
        include '../model/report_model.php';
        $rep_obj = new Report();  ///  creating the user Object     
        
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
            <div class="row">
                <h1 style="margin:auto">Reporting</h1>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
        </div>

        <div class="row">
            &nbsp;
        </div>

        <div class="col-md-12">
            <?php include_once("../includes/side-nav.php");?>
           
            <div class="col-md-9">
                <?php  
                    if(isset($_GET["msg"]))
                    {
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <?php

                                $msg=$_REQUEST["msg"];
                                $msg=  base64_decode($msg);
                                echo $msg;
                                ?>

                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
                <ul class="nav nav-tabs" role="tablist" >
                    <li class="nav-item">
                        <a href="#yasas" class="nav-link active" role="tab" data-toggle="tab">Yasas</a>
                    </li>
                    <li class="nav-item">
                        <a href="#asiri" class="nav-link" role="tab" data-toggle="tab">Asiri</a>
                    </li>
                    <li class="nav-item">
                        <a href="#lanka" class="nav-link" role="tab" data-toggle="tab">Lanka</a>
                    </li>
                </ul>
            

                <div class="tab-content" >
                    <div role="tabpanel" class="tab-pane active" id="yasas">
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                            <table class="table table-responsive">
                                <tr style="background-color:gray;">
                                    <th>Appointement ID</th>
                                    <th>Patient Name</th>
                                    <th>Tests</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php 
                                $rep_res = $rep_obj->get_active_appoitments(1);   
                                while($rep_row = $rep_res->fetch_assoc()){
                                    $app_id = $rep_row["appointment_id"];
                                ?>
                                <tr style="background-color:lightgray">
                                    <th style="text-align:center"><?php echo $rep_row["appointment_id"];?></th>
                                    <th><?php echo $rep_row["patient_f_name"]," ",$rep_row["patient_l_name"] ;?></th>
                                    <th>
                                        <?php 
                                            $test_res = $rep_obj->get_tests($app_id);
                                            while($test_row = $test_res->fetch_assoc()){
                                                echo $test_row["test_name"]," ";
                                            }
                                        ?>
                                    </th>
                                    <td>
                                        <?php
                                            $rep_com = $rep_obj->get_completed($app_id); 
                                            $rep_com_row = $rep_com->fetch_assoc();

                                            $rep_tot = $rep_obj->get_total_tests($app_id); 
                                            $rep_tot_row = $rep_tot->fetch_assoc();
                                        
                                            echo "",$rep_com_row["com"],"/",$rep_tot_row["tot"];
                                        ?>
                                    </td>
                                    <td><a href="add_report.php?id=<?php echo base64_encode($app_id);?>" class="btn btn-primary">Add Report</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>

                    </div>
                    
                    <div role="tabpanel" class="tab-pane" id="asiri">
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                        <table class="table table-responsive">
                                <tr style="background-color:gray;">
                                    <th>Appointement ID</th>
                                    <th>Patient Name</th>
                                    <th>Tests</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php 
                                $rep_res = $rep_obj->get_active_appoitments(2);   
                                while($rep_row = $rep_res->fetch_assoc()){
                                    $app_id = $rep_row["appointment_id"];
                                ?>
                                <tr style="background-color:lightgray">
                                    <th style="text-align:center"><?php echo $rep_row["appointment_id"];?></th>
                                    <th><?php echo $rep_row["patient_f_name"]," ",$rep_row["patient_l_name"] ;?></th>
                                    <th>
                                        <?php 
                                            $test_res = $rep_obj->get_tests($app_id);
                                            while($test_row = $test_res->fetch_assoc()){
                                                echo $test_row["test_name"]," ";
                                            }
                                        ?>
                                    </th>
                                    <td>
                                        <?php
                                            $rep_com = $rep_obj->get_completed($app_id); 
                                            $test_row = $rep_com->fetch_assoc();
                                            echo "",$test_row["com"],"/",$test_row["tot"];
                                        ?>
                                    </td>
                                    <td><a href="display_bill.php?id=<?php echo base64_encode($app_id);?>" class="btn btn-primary">Print Bill</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>

                    </div>

                    <div role="tabpanel" class="tab-pane" id="lanka">
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="col-md-12">
                        <table class="table table-responsive">
                                <tr style="background-color:gray;">
                                    <th>Appointement ID</th>
                                    <th>Patient Name</th>
                                    <th>Tests</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php 
                                $rep_res = $rep_obj->get_active_appoitments(3);   
                                while($rep_row = $rep_res->fetch_assoc()){
                                    $app_id = $rep_row["appointment_id"];
                                ?>
                                <tr style="background-color:lightgray">
                                    <th style="text-align:center"><?php echo $rep_row["appointment_id"];?></th>
                                    <th><?php echo $rep_row["patient_f_name"]," ",$rep_row["patient_l_name"] ;?></th>
                                    <th>
                                        <?php 
                                            $test_res = $rep_obj->get_tests($app_id);
                                            while($test_row = $test_res->fetch_assoc()){
                                                echo $test_row["test_name"]," ";
                                            }
                                        ?>
                                    </th>
                                    <td>
                                        <?php
                                            $rep_com = $rep_obj->get_completed($app_id); 
                                            $test_row = $rep_com->fetch_assoc();
                                            echo "",$test_row["com"],"/",$test_row["tot"];
                                        ?>
                                    </td>
                                    <td><a href="display_bill.php?id=<?php echo base64_encode($app_id);?>" class="btn btn-primary">Print Bill</a></td>
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
    </body>
   <?php
        include '../includes/bootstrap_script_includes.php';  
   ?>

    <script type="text/javascript">

        function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#prev_img1')
            .attr('src', e.target.result)
            .height(70)
            .width(80);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

        function readURL2(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#prev_img2')
            .attr('src', e.target.result)
            .height(70)
            .width(80);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
        </script>
        <script type="text/javascript" src="../js/category.js"></script>
       
</html>
