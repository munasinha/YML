<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css"/>
        
      <?php
        include '../model/billing_model.php';
        $bill_obj = new Bill();  ///  creating the user Object     
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
                <h1 style="margin:auto;">Billing</h1>
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
                <div class="col-md-8">
                    <table class="table table-responsive">
                        <tr style="background-color:gray;">
                            <th>Appointement ID</th>
                            <th>Patient Name</th>
                            <th>Tests</th>
                            <th>Total</th>
                            <th>&nbsp;</th>
                        </tr>
                        <?php 
                        $bill_res = $bill_obj->get_active_appoitments();   
                        while($bill_row = $bill_res->fetch_assoc()){
                            $app_id = $bill_row["appointment_id"];
                        ?>
                        <tr style="background-color:lightgray">
                            <th style="text-align:center"><?php echo $bill_row["appointment_id"];?></th>
                            <th><?php echo $bill_row["patient_f_name"]," ",$bill_row["patient_l_name"] ;?></th>
                            <th>
                                <?php 
                                    $test_res = $bill_obj->get_tests($app_id);
                                    while($test_row = $test_res->fetch_assoc()){
                                        echo $test_row["test_name"]," ";
                                    }
                                ?>
                            </th>
                            <td>
                                <?php
                                    $test_tot = $bill_obj->get_total($app_id); 
                                    $test_row = $test_tot->fetch_assoc();
                                    echo "",$test_row["t"];
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
    </body>
   <?php
 
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
        <?php
        
        include '../includes/bootstrap_script_includes.php';

        ?>
</html>
