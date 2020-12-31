<?php
    include '../commons/session.php';
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css"/>
        
      <?php
      // include '../includes/bootstrap_includes_css.php';
        include '../model/third_party_model.php';
        
        $lab_obj = new Thirdparty();  ///  creating the user Object
        $lab_id=0;
        if(isset($_GET['id'])){
            $lab_result=$lab_obj->get_lab_details($_GET['id']);
            $lab_row=$lab_result->fetch_assoc();
            $lab_id = base64_decode($_GET['id']);
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
             <?php
                //include '../includes/top_row.php';
            ?>
            
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-2">
                        <?php
                        if($lab_row["lab_status"]==1){
                        ?>
                        <a href="../controller/lab_controller.php?status=deactivateUser&user_id=<?php echo base64_encode($lab_id); ?>   " class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span>&nbsp;Deactivate
                                        </a>
                        <?php
                        }else{
                        
                        ?>
                        <a href="../controller/lab_controller.php?status=activateUser&user_id=<?php echo base64_encode($lab_id);  ?>   " class="btn btn-success">
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
                        <p style="font-size:28px">Admin Information </p>
                        <table class="table table-responsive" id="example">
                           
                            <tr>
                                <th>Lab Name</th>
                                <td><?php echo $lab_row["lab_name"]?></td>
                            </tr>
                            <tr>
                                <th>Commission</th>
                                <td><?php echo $lab_row["commission"];   ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="row">
               
                    <div class="col-md-8">
                        <p style="font-size:28px">Contact Information </p>
                        <table class="table table-responsive" id="example">
                            
                            <tr>
                                <th>Address</th>
                                <td><?php echo $lab_row["address_no"]." ".$lab_row["street"]." ".$lab_row["town"];  ?></td>
                            </tr>
                            <tr>
                                <th>Collector's Number</th>
                                <td><?php echo $lab_row["collector_no"];   ?></td>
                            </tr>
                            <tr>
                                <th>Lab's Telephone Number</th>
                                <td><?php echo $lab_row["telephone_number_1"];   ?></td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td><?php echo $lab_row["telephone_number_2"];   ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $lab_row["email"];   ?></td>
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
