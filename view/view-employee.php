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
        
        $emp_result=$emp_obj->get_all_employees();
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
                    <ul class="list-group">
                        <a href="add-user.php" class="list-group-item">
                            <span class="glyphicon glyphicon-plus">
                            </span>&nbsp;
                            Add User</a>
                        <a href="view-user.php" class="list-group-item">
                            <span class="glyphicon glyphicon-search">
                            </span>&nbsp;
                            View Users</a>
                    </ul>
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
                    <div class="col-md-12">
                        <table class="table table-responsive" id="example">
                            <thead>
                                <tr style="background-color: #297c87;color: #FFF">
                                    <th>&nbsp;</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Employee Role</th>
                                    <th>EPF number</th>
                                    <th>ETF number</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                while($emp_row=$emp_result->fetch_assoc()){
                                    $emp_id=$emp_row["employee_id"];
                                    $emp_id= base64_encode($emp_id);
                                ?>
                                <tr>
                                    <td><img src="../images/user_image/<?php echo $emp_row["employee_image_url"];  ?>" width="50" height="60" /></td>
                                    <td><?php echo $emp_row["employee_f_name"];   ?></td>
                                    <td><?php echo $emp_row["employee_l_name"];   ?></td>
                                    <td><?php echo $emp_row["role_name"];   ?></td>
                                    <td><?php echo $emp_row["epf_number"];   ?></td>
                                    <td><?php echo $emp_row["etf_number"];   ?></td>
                                    <td><?php echo $emp_row["email"];   ?></td>
                                    <td>
                                        <?php 
                                        if($emp_row["employee_status"]=="1"){
                                            echo "Active";
                                        }
                                        else{
                                            echo "Deactive";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="../view/display-user.php?user_id=<?php echo $emp_id; ?>" class="btn btn-default">
                                            <span class="glyphicon glyphicon-search"></span>&nbsp;View
                                        </a>
                                        &nbsp;
                                        <?php
                                        if($emp_row["employee_status"]==0){
                                        ?>
                                        <a href="../controller/usercontroller.php?status=activateUser&user_id=<?php  echo $emp_id;   ?>" class="btn btn-success">
                                            <span class="glyphicon glyphicon-refresh"></span>&nbsp;Activate
                                        </a>
                                        &nbsp;
                                        <?php  
                                        }
                                        ?>
                                        <?php  
                                             
                                        if($emp_row["employee_status"]=="1"){
                                        ?>
                                        <a href="../controller/usercontroller.php?status=deactivateUser&user_id=<?php echo $emp_id;  ?>   " class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span>&nbsp;Deactivate
                                        </a>
                                             
                                        <?php 
                                            }
                                        ?>
                                    </td>
                                    
                                    </tr>
                                    <?php  
                                    }
                                    ?>
                                </tbody>
                                
                            </table>
                        </div>
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
