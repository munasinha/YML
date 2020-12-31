<html>
    <head>
      <?php
        include '../includes/bootstrap_includes_css.php';
        include '../model/module_model.php';
        include '../model/employee_model.php';
            
        $module_obj = new Module();
        $emp_obj= new Employee();    
         
      ?>
        
    </head>
    
    <body >
        <div class="container">
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <?php  
                    include '../includes/top_row.php';  
                    $role_id=$_SESSION["employee"]["role_id"];
                    $module_result=$emp_obj->get_modules_by_role($role_id);
                ?>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <?php 
                if($_SESSION['employee']['password_status']==0){?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                            <?php
                                echo "Please Change your Password. Click";
                                ?>
                                <a href='employee-changepw.php?id=<?php echo base64_encode($_SESSION["employee"]["emp_id"])?>'>Here </a> 
                                <?php
                                echo "to Change it.";
                            ?>
                            </div>  
                        </div>
                    </div>

            <?php
                }    
            ?>

            <?php 
                if(isset($_GET['msg'])){?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
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
                <div class="col-md-12">&nbsp;</div>
            </div>

        
        
            
                <div class="col-md-12" >
                    <?php
                        $counter=0;
                        while($row=$module_result->fetch_assoc()){
                    ?>
                
                    <a href="<?php echo strtolower($row["module_path"]);  ?>">
                        <div class="col-md-3 col-md-offset-1 panel" style="height: 200px;background-color:#1b4f3c">
                            <div class="row">
                                &nbsp;
                            </div>
                            <div class="row">
                                &nbsp;
                            </div>
                            <h4 style="color: #FFF;" align="center">
                                <?php
                                    echo ucfirst($row["module_name"]);
                                ?>
                            </h4>
                            <br>
                            
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <img src="../images/iconset/<?php echo $row["module_image"];  ?>" width="80" height="80px">    
                            </div>    
                        </div>
                    </a>
                        
                    <?php
                        $counter++;
                        if($counter%3==0){
                    ?>
                    
                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>
                    
                
                    <?php
                        }
                    }                  
                    ?>
                </div>
            
                <div class="row">
                    <div class="col-md-3">&nbsp;</div>
                </div>
        </div>
        
    </body>
   <?php
        include '../includes/bootstrap_script_includes.php';

   ?>
    <script src="../js/login_validation.js"></script>
</html>
