<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css"/>
        
      <?php
      // include '../includes/bootstrap_includes_css.php';
        include '../model/patient_model.php';
        
        $patient_obj = new Patient();  ///  creating the user Object
        $patient_id=0;
    
        if(isset($_GET['id'])){
            $patient_result=$patient_obj->get_patient_details($_GET['id']);
            $patient_row=$patient_result->fetch_assoc();
           
            $patient_id = base64_decode($_GET['id']);
        }
        else{
            header("Location:patient.php");
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
                <div class="col-md-10">
                    <h1 style="text-align:center">Patient Profile</h1>
                </div>
            </div>
        </div>

        <?php include_once("../includes/side-nav.php");?>

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-2">
                        <?php
                        if($patient_row["patient_status"]==1){
                        ?>
                        <a href="../controller/patient_controller.php?status=deactivateUser&patient_id=<?php echo base64_encode($patient_id); ?>   " class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span>&nbsp;Deactivate
                                        </a>
                        <?php
                        }else{
                        
                        ?>
                        <a href="../controller/patient_controller.php?status=activateUser&patient_id=<?php echo base64_encode($patient_id);  ?>   " class="btn btn-success">
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
                    
                    <div class="col-md-8">
                        <p style="font-size:28px">Personal Information </p>
                        <table class="table table-responsive" id="example">
                           
                            <tr>
                                <th>Name</th>
                                <td><?php echo $patient_row["patient_f_name"]." ".$patient_row["patient_l_name"];   ?></td>
                            </tr>
                            <tr>
                                <th>DOB</th>
                                <td><?php echo $patient_row["d_o_b"];   ?></td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>
                                <?php 
                                    if($patient_row["gender"]==0){
                                        echo "Male";
                                    }else{
                                        echo "Female";
                                    }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <th>NIC</th>
                                <td><?php echo $patient_row["nic"];   ?></td>
                            </tr>
                            <tr>
                                <th>Date Joined</th>
                                <td><?php echo $patient_row["date_joined"];   ?></td>
                            </tr>
                            <tr>
                                <th>&nbsp;</th>
                                <td>
                                <a href="patient-changepw.php?patient_id=<?php echo base64_encode($patient_id); ?>   " class="btn btn-primary">
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
                                <td><?php echo $patient_row["house_no"]." ".$patient_row["street"]." ".$patient_row["town"];   ?></td>
                            </tr>
                            <tr>
                                <th>Telephone Number</th>
                                <td><?php echo $patient_row["telephone_number"];   ?></td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td><?php echo $patient_row["telephone_number_2"];   ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $patient_row["email"];   ?></td>
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
