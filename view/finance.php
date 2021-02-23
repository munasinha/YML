<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css"/>
        
      <?php
        include '../model/finance_model.php';
        $fin_obj = new Finance(); 
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
                <h1 style="margin:auto;">Finance</h1>
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
                
                <ul class="nav nav-tabs" role="tablist" >
                    <li class="nav-item">
                        <a href="#sum" class="nav-link <?php if(!isset($_GET['tab'])){?> active <?php } ?>" role="tab" data-toggle="tab">Summary</a>
                    </li>
                    <li class="nav-item">
                        <a href="#test" class="nav-link <?php if(isset($_GET['tab'])){?> active <?php } ?>" role="tab" data-toggle="tab">By Test</a>
                    </li>
                    <li class="nav-item">
                        <a href="#doc" class="nav-link" role="tab" data-toggle="tab">By Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a href="#lab" class="nav-link" role="tab" data-toggle="tab">By Lab</a>
                    </li>
                </ul>
                
                <div class="tab-content" >
                    <div role="tabpanel" class="tab-pane  <?php if(!(isset($_REQUEST['tab']))){?>active<?php }?>" id="sum">
                        <div class="row">
                            <div class="row">
                                &nbsp;
                            </div>
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">Today's Income</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_today(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_today(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_today(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h1>
                            </div>

                            <div class="col-md-1">
                                &nbsp;
                            </div> 
                            
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">Last 7 days' Income</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_last_week(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_week(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_week(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h1>
                            </div>
                        </div>                    
                        
                        <div class="row">
                            &nbsp;
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">Last 30 day's Income</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_last_month(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h1>
                            </div>

                            <div class="col-md-1">
                                &nbsp;
                            </div> 
                            
                            <div class="col-md-4" style="height: 250px;background-color:#1b4f3c">
                                <h1 style="color: #FFF;text-align:center;">Highest Income</h1>
                                <h2 style="color: #FFF;text-align:center;margin:auto;">
                                    <?php 
                                        $sum = 0;
                                        $fin_res=$fin_obj->get_last_month(1);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Yasas 0.00"; 
                                        }else{
                                            echo "Yasas ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(2);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Asiri 0.00"; 
                                        }else{
                                            echo "Asiri ". $fin_row['t'];
                                            $sum += $fin_row['t']; 
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                        $fin_res=$fin_obj->get_last_month(3);
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Lanka 0.00"; 
                                        }else{
                                            echo "Lanka ". $fin_row['t']; 
                                            $sum += $fin_row['t'];
                                        }
                                    ?>
                                </h2>
                                <h2 style="color: #FFF;text-align:center;margin:auto">
                                    <?php 
                                    /* $fin_res=$fin_obj->get_today_total();
                                        $fin_row=$fin_res->fetch_assoc();
                                        if($fin_row['t'] == 0){
                                            echo "Total 0.00"; 
                                        }else{
                                            $fin_row=$fin_res->fetch_assoc();*/
                                            echo "Total ". $sum; 
                                        //}
                                    ?>
                                </h1>
                            </div>
                        </div>
                        
                    </div>

                    <div role="tabpanel" class="tab-pane" id="add">
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
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="col-md-12"> 
                            <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/employee_controller.php?status=add_employee">
                                    <div class="row" >
                                        <div class="col-md-3">
                                            <label class="control-label">First Name</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="emp_fname" class="form-control" id="emp_fname" />
                                        </div>

                                        <div class="col-md-3">
                                            <label class="control-label">Last Name</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="emp_lname" class="form-control" id="emp_lname"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">&nbsp;</div>
                                    </div>
                                        
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label">Email</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="emp_email" class="form-control" id="emp_email"/>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="control-label">Gender</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="radio" name="emp_gender" value="0" checked="checked"  />&nbsp;<label class="control-label">Male</label>
                                            &nbsp;
                                            <input type="radio" name="emp_gender" value="1" />&nbsp;<label class="control-label">Female</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">&nbsp;</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label">Date of Birth</label>
                                        </div>
                                        <div class="col-md-3">
                                            <div >
                                                <input type="date" name="emp_dob" class="form-control" id="emp_dob" />
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="control-label">NIC Number</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="emp_nic" class="form-control" id="emp_nic" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">&nbsp;</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label">Contact Number 1</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="emp_cno1" class="form-control"  id="emp_cno1" />
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label">Contact Number 2 (Mobile)</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="emp_cno2" class="form-control" id="emp_cno2" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">&nbsp;</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label">Address</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="emp_add_no" class="form-control"  id="emp_add_no" placeholder="Number"/>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <input type="text" name="emp_add_street" class="form-control" id="emp_add_street" placeholder="Street"/>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <input type="text" name="emp_add_city" class="form-control" id="emp_add_city" placeholder="City"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">&nbsp;</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="control-label">Employee Role</label>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <select name="emp_role" class="form-control" id="emp_role">
                                                <option value="">---</option>
                                                <?php
                                                    while($role_row=$role_result->fetch_assoc()){
                                                ?>
                                                
                                                <option value="<?php  echo $role_row["role_id"]; ?>" >
                                                    <?php  echo $role_row["role_name"]; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="control-label">Employee Image</label>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <input type="file" name="emp_img" id="emp_img" onchange="readURL(this)"  class="form-control" />
                                            <br/>
                                            <img id="prev_img"/>
                                        </div>
                                    </div>

                                    <div class="row" >
                                        <div class="col-md-12">&nbsp;</div>
                                    </div>

                                    <div class="row" >
                                        <div class="col-md-3">
                                            <label class="control-label">Date joined</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="date" name="emp_date_join" class="form-control" id="emp_date_join" />
                                        </div>
                                    </div>

                                    <div class="row" >
                                        <div class="col-md-12">&nbsp;</div>
                                    </div>

                                    <div class="container" id="myfunctions">
                                        
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
                                    </div>
                            </form>
                        </div>
                    </div>                             

                    <div role="tabpanel" class="tab-pane" id="att">
                        <div class="row">
                            &nbsp;
                        </div>
                        <h1>Add Attendence<h1>
                    </div>
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
