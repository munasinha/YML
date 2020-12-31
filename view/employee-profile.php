<?php
    include '../commons/session.php';
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css"/>
        
      <?php
      // include '../includes/bootstrap_includes_css.php';
        include '../model/module_model.php';
        include '../model/employee_model.php';
        
        $emp_obj = new Employee();  ///  creating the user Object
        $emp_id=0;
        if(isset($_GET['id'])){
            $emp_result=$emp_obj->get_employee_details($_GET['id']);
            $emp_row=$emp_result->fetch_assoc();
            $emp_id = base64_decode($_GET['id']);
        }
        else{
            header("Location:employee.php");
        }
        
        $module_obj = new Module();
        
      ?>
        
    </head>
    
    <body >
        <div class="container">
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
             <?php
                //include '../includes/top_row.php';
            ?>
            
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-2">
                        <?php
                        if($emp_row["employee_status"]==1){
                        ?>
                        <a href="../controller/employee_controller.php?status=deactivateUser&user_id=<?php echo base64_encode($emp_id); ?>   " class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span>&nbsp;Deactivate
                                        </a>
                        <?php
                        }else{
                        
                        ?>
                        <a href="../controller/employee_controller.php?status=activateUser&user_id=<?php echo base64_encode($emp_id);  ?>   " class="btn btn-success">
                                            <span class="glyphicon glyphicon-remove"></span>&nbsp;Activate
                                        </a>
                        <?php
                        }
                        ?>
                    
                </div>
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
                    <div class="col-md-4" >
                        <img src="../images/user_image/<?php echo $emp_row["employee_image_url"]; ?>" width="200px" height="200px"/>
                    </div>

                    <div class="col-md-8">
                        <p style="font-size:28px">Personal Information </p>
                        <table class="table table-responsive" id="example">
                           
                            <tr>
                                <th>Name</th>
                                <td><?php echo $emp_row["employee_f_name"]." ".$emp_row["employee_l_name"];   ?></td>
                            </tr>
                            <tr>
                                <th>DOB</th>
                                <td><?php echo $emp_row["dob"];   ?></td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>
                                <?php 
                                    if($emp_row["gender"]==0){
                                        echo "Male";
                                    }else{
                                        echo "Female";
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Employee Role</th>
                                <td><?php echo $emp_row["role_name"];   ?></td>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <td>
                                <a href="employee-changepw.php?user_id=<?php echo base64_encode($emp_id); ?>   " class="btn btn-primary">
                                        &nbsp;Change Password
                                        </a>
                                </td>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <td>&nbsp;</td>
                            </tr>
                           
                        </table>
                  
                    </div>
                </div>
                
                <div class="row">
               
                    <div class="col-md-6">
                        <h1>Contact Information </h1>
                        <table class="table table-responsive" id="example">
                            
                            <tr>
                                <th>Address</th>
                                <td><?php echo $emp_row["house_no"]." ".$emp_row["street"]." ".$emp_row["town"];   ?></td>
                            </tr>
                            <tr>
                                <th>Telephone Number</th>
                                <td><?php echo $emp_row["telephone_number"];   ?></td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td><?php echo $emp_row["telephone_number_2"];   ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $emp_row["email"];   ?></td>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <td>&nbsp;</td>
                            </tr>
                            
                        </table>
                    </div>  

                    <div class="col-md-6">
                        <h1>Admin Information </h1>
                        <table class="table table-responsive" id="example">
                            
                            <tr>
                                <th>EFP number</th>
                                <td><?php echo $emp_row["epf_number"];   ?></td>
                            </tr>
                            <tr>
                                <th>ETF Number</th>
                                <td><?php echo $emp_row["etf_number"];   ?></td>
                            </tr>
                            <tr>
                                <th>Date Joined</th>
                                <td><?php echo $emp_row["nic_number"];   ?></td>
                            </tr>
                            
                            <tr>
                                <th>&nbsp;</th>
                                <td>&nbsp;</td>
                            </tr>
                            
                        </table>
                    </div>  
                </div>
            </div>  
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
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
