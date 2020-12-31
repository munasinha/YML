<html>
    <head>
    
    <?php
     include '../includes/bootstrap_includes_css.php';
     include '../model/employee_model.php';

      $emp_obj = new Employee(); //create employee object
      $role_result= $emp_obj->get_emp_roles();

      include '../model/module_model.php';
      $module_obj = new Module();
      $module_result=$module_obj->get_all_modules();  
      
      $id = 0;
      if(isset($_GET['id'])){
       
        $id = base64_decode($_GET['id']);
      }
      $emp_res = $emp_obj->get_employee_details($_GET['id']);
      $emp_row = $emp_res->fetch_assoc();
    
    ?>

    </head>

    <body>
        <div class="container">

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <h4> <span class="glyphicon glyphicon-user"></span><span>TMS Tennakoon</span></h4>
                </div>
                
                <div class="col-md-8"><h4 align="center" >Yasas Medi Lab</h4></div>
                    <div class="col-md-1">
                    <a href="../controller/login_controller.php?status=logout" class="btn btn-primary" >Logout</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    &nbsp;
                </div>

              <div class="col-md-10">
                  <div class="row">
                      <h1 align="center"><?php  echo strtoupper("Edit Employee") ?></h1>
                  </div>
             </div>

            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
        <div class="row">
            <?php
                if(isset($_GET["msg"])){
            ?>
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <?php
                        $msg=$_REQUEST["msg"];
                        $msg=  base64_decode($msg);
                        echo $msg;
                    ?>

                </div>
            </div>

            <?php
                }
            ?>

            <div class="col-md-12">
                <div id="alertDiv"></div>
            </div>
        </div>

        <form id="addUser" enctype="multipart/form-data" method="post" action="../controller/employee_controller.php?status=edit_employee">
            <div class="row" >
                <input type="hidden" value="<?php echo $emp_row["employee_id"];?>" name="emp_id">
                <div class="col-md-3">
                    <label class="control-label">First Name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="emp_fname" class="form-control" id="emp_fname" value="<?php echo $emp_row["employee_f_name"];?>" />
                        </div>

                    <div class="col-md-3">
                            <label class="control-label">Last Name</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="emp_lname" class="form-control" id="emp_lname" value="<?php echo $emp_row["employee_l_name"];?>"/>
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
                            <input type="text" name="emp_email" class="form-control" id="emp_email"  value="<?php echo $emp_row["email"];?>"/>
                        </div>



                    <div class="col-md-3">
                            <label class="control-label">Gender</label>
                        </div>
                        <div class="col-md-3">
                            <?php
                                if($emp_row["gender"]==0){
                            ?>
                                 <input type="radio" name="emp_gender" value="0" checked="checked"  />&nbsp;<label class="control-label">Male</label>
                            &nbsp;
                            <input type="radio" name="emp_gender" value="1" />&nbsp;<label class="control-label">Female</label>
                            <?php
                                }else{
                            ?>
                                 <input type="radio" name="emp_gender" value="0"  />&nbsp;<label class="control-label">Male</label>
                            &nbsp;
                            <input type="radio" name="emp_gender" value="1" checked="checked" />&nbsp;<label class="control-label">Female</label>
                            <?php
                                }
                            ?>
                           
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
                            <div class="input-group">
                                <input type="date" name="emp_dob" class="form-control" id="emp_dob" value="<?php echo $emp_row["dob"];?>"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>



                    <div class="col-md-3">
                            <label class="control-label">NIC Number</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="emp_nic" class="form-control" id="emp_nic" value="<?php echo $emp_row["nic_number"]?>"/>
                        </div>

                </div>

                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">

                    <div class="col-md-3">
                        <label class="control-label">EPF Number</label>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" name="emp_epf" class="form-control" id="emp_epf" value="<?php echo $emp_row["epf_number"];?>"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-3">
                            <label class="control-label">ETF Number</label>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="emp_etf" class="form-control" id="emp_etf" value="<?php echo $emp_row["etf_number"]?>"/>
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
                        <input type="text" name="emp_cno1" class="form-control"  id="emp_cno1" value="<?php echo $emp_row["telephone_number"];?>"/>
                    </div>



                    <div class="col-md-3">
                        <label class="control-label">Contact Number 2 (Mobile)</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="emp_cno2" class="form-control" id="emp_cno2" value="<?php echo $emp_row["telephone_number_2"];?>"/>
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
                        <input type="text" name="emp_add_no" class="form-control"  id="emp_add_no" placeholder="Number" value="<?php echo $emp_row["house_no"];?>"/>
                    </div>
                    
                    <div class="col-md-3">
                        <input type="text" name="emp_add_street" class="form-control" id="emp_add_street" placeholder="Street" value="<?php echo $emp_row["street"];?>"/>
                    </div>
                    
                    <div class="col-md-3">
                        <input type="text" name="emp_add_city" class="form-control" id="emp_add_city" placeholder="City" value="<?php echo $emp_row["town"];?>"/>
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
                            
                            <option value="<?php  echo $role_row["role_id"]; ?>" <?php if($role_row["role_id"]==$emp_row["employee_role"]){echo "selected";}?> >
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
                        <input type="hidden" value="<?php echo $emp_row["employee_image_url"];?>" name="emp_img">
                    </div>

                </div>

                <div class="row" >
                    <div class="col-md-12">&nbsp;</div>
                </div>

                <div class="row" >
                    <div class="col-md-3">
                        <label class="control-label">Date Joined</label>
                    </div>
                    <div class="col-md-3">
                    <div class="input-group">
                        <input type="date" name="emp_date_join" class="form-control" id="emp_date_join" value="<?php echo $emp_row["date_joined"];?>" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
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


        </body>
    <?php
    include '../includes/bootstrap_script_includes.php';

    ?>
        <script type="text/javascript" src="../js/user_validation.js"></script>
        <script type="text/javascript">

            function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#prev_img')
                .attr('src', e.target.result)
                .height(70)
                .width(80);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
            </script>

</html>
