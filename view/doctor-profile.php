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
        
        $doc_obj = new Thirdparty();  ///  creating the user Object
        $doc_id=0;
        $doc_row="";

        if(isset($_GET['id'])){
            $doc_id = base64_decode($_GET['id']);
            $doc_result=$doc_obj->get_doc_details($doc_id);
            $doc_row=$doc_result->fetch_assoc();
           
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
                        <p style="font-size:28px">Doctor Information </p>
                        <table class="table table-responsive" id="example">
                           
                            <tr>
                                <th>Doctor Name</th>
                                <td><?php echo "Dr. ".$doc_row["first_name"]." ".$doc_row["last_name"]?></td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <td><?php echo $doc_row["contact_number"];   ?></td>
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
