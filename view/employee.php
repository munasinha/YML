<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css"/>
        
      <?php
        include '../model/employee_model.php';
        $emp_obj = new Employee();  ///  creating the user Object
        $emp_res = $emp_obj->get_total_employee_count();
        $emp_row = $emp_res->fetch_assoc();
        $role_result= $emp_obj->get_emp_roles();
        
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
                <h1 style="margin:auto;">Employee
               
                </h1>
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
                <?php  
                   /* if(isset($_GET["msg"]))
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
                    }*/
                ?>
                <ul class="nav nav-tabs" role="tablist" >
                    <li class="nav-item">
                        <a href="#sum" class="nav-link <?php if(!isset($_GET['tab'])){?> active <?php } ?>" role="tab" data-toggle="tab">Summary</a>
                    </li>
                    <li class="nav-item">
                        <a href="#add" class="nav-link <?php if(isset($_GET['tab'])){?> active <?php } ?>" role="tab" data-toggle="tab">Add Employee</a>
                    </li>
                    <li class="nav-item">
                        <a href="#att" class="nav-link" role="tab" data-toggle="tab">Add Attendence</a>
                    </li>
                </ul>
                
                <div class="tab-content" >
                    <div role="tabpanel" class="tab-pane  <?php if(!(isset($_REQUEST['tab']))){?>active<?php }?>" id="sum">
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="col-md-3" style="height: 200px;background-color:#1b4f3c">
                            <h1 style="color: #FFF;text-align:center;">Total Employees</h1>
                            <h1 style="color: #FFF;width:10%;text-align:center;margin:auto">
                                <?php echo $emp_row['c']?>
                            </h1>
                        </div>

                        <div class="col-md-8">
                            <table class="table table-responsive">
                                <tr style="background-color:gray;">
                                    <th>Employee ID</th>
                                    <th>Employee First Name</th>
                                    <th>Employee Last Name</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <?php 
                                $emp_res = $emp_obj->get_all_employees();
                                while($emp_row = $emp_res->fetch_assoc()){
                                    $emp_id = base64_encode($emp_row["employee_id"]);
                                    
                                ?>
                                <tr style="background-color:lightgray">
                                    <th style="text-align:center"><?php echo $emp_row["employee_id"];?></th>
                                    <th><?php echo $emp_row["employee_f_name"];?></th>
                                    <th><?php echo $emp_row["employee_l_name"];?></th>
                                    <td><a href="employee-profile.php?id=<?php echo $emp_id;?>" class="btn btn-success">Show Employee Profile</a></td>
                                    <td><a href="employee-edit.php?id=<?php echo $emp_id;?>" class="btn btn-primary">Edit Employee</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
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
