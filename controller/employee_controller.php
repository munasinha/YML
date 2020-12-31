<?php

if(isset($_REQUEST["status"])){

    include "../model/employee_model.php";
    $emp_obj = new Employee();
    $status = $_REQUEST["status"];

    switch($status){
        case "add_employee":
            
            $emp_f_name = trim($_POST["emp_fname"]);
            $emp_l_name = trim($_POST["emp_lname"]);
            $emp_email = trim($_POST["emp_email"]);
            $emp_gender = $_POST["emp_gender"];
            $emp_dob = $_POST["emp_dob"];
            $emp_nic = trim($_POST["emp_nic"]);
            $emp_cno_1 = trim($_POST["emp_cno1"]);
            $emp_cno_2 = trim($_POST["emp_cno2"]);
            $emp_add_no = trim($_POST["emp_add_no"]);
            $emp_add_street = trim($_POST["emp_add_street"]);
            $emp_add_city = trim($_POST["emp_add_city"]);
            $emp_role = $_POST["emp_role"];
            $emp_date_join = $_POST["emp_date_join"];
            //$emp_image = $_POST["emp_img"];
           
            try{
                
                if($emp_f_name==""){
                    throw new Exception("Firstname can't be empty ");
                }

                if($emp_l_name==""){
                    throw new Exception("Lastname can't be empty ");
                }

                if($emp_email==""){
                    throw new Exception("Email can't be empty ");
                }

                $patern_email="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                if(!preg_match($patern_email, $emp_email)){
                     throw new Exception("Invalid Email Address");
                }

                $is_valid=$emp_obj->validate_email($emp_email);
                
                if($is_valid===false){
                    throw new Exception("Email Address is Already Taken!!!");  
                }
                
                if($emp_gender==""){
                    throw new Exception("Gender can't be empty ");
                }

                if($emp_dob==""){
                    throw new Exception("Date of Birth can't be empty ");
                }

                if($emp_nic==""){
                    throw new Exception("NIC can't be empty ");
                }
                
                $pattern_nic="/^[0-9]{9}[vVxX]$/";
                if(!preg_match($pattern_nic, $emp_nic)){
                    throw new Exception("Invalid NIC");
                }
                
                if($emp_cno_1=="" && $emp_cno_2==""){
                    throw new Exception("Has to fill atleast on contact number");
                }

                if($emp_add_no==""){
                    throw new Exception("Address Number can't be empty");
                }
                
                if($emp_add_street==""){
                    throw new Exception("Address Street can't be empty ");
                }
                
                if($emp_add_city==""){
                    throw new Exception("Address City can't be empty");
                }
                
                if($emp_role==""){
                    throw new Exception("Please Select an Employee role");
                }

                //image upload
                if($_FILES["emp_img"]["name"]!=""){
                    $img=$_FILES["emp_img"]["name"];
                    $img="".time()."_".$img;
                    /// obtain temporary location
                   $tmp= $_FILES["emp_img"]["tmp_name"];
                   $destination="../images/user_image/$img";
                   move_uploaded_file($tmp, $destination);                    
                }
                else{                    
                    $img="defaultImage.jpg";
                }
               
                if($emp_date_join==""){
                    throw new Exception("Date Joined can't be empty");
                }

                $emp_id = $emp_obj->add_employee($emp_f_name, $emp_l_name,$emp_gender,$emp_dob,0,0,$img,$emp_role,$emp_date_join,$emp_nic);
              
                
                if($emp_id>0){
                    $emp_contact_id = $emp_obj->add_employee_contact($emp_id,$emp_cno_1,$emp_cno_2,$emp_email);
                    if(!$emp_contact_id>0){
                        throw new Exception("Error in contacts");
                    }

                    $emp_add_id = $emp_obj->add_employee_address($emp_id,$emp_add_no,$emp_add_street,$emp_add_city);
                    if(!$emp_add_id>0){
                        throw new Exception("Error in Address");
                    }

                    $tmp_password = $emp_obj->temp_password_generate();
                    echo "add login";
                    $en_tmp_password=sha1($tmp_password);
                    $emp_login_id = $emp_obj->add_employee_login($emp_id,$emp_email,$en_tmp_password);
                    if(!$emp_login_id>0){
                        throw new Exception("Error in Login");
                    }
                    
                    $emp_email = base64_encode($emp_email);
                    $tmp_password = base64_encode($tmp_password);

                    if($emp_obj->send_tmp_password($emp_email, $tmp_password)){
                        $msg="Successfully Inserted User $emp_f_name"." "."$emp_l_name";
                        $msg=  base64_encode($msg);
                
                     ?>
                        <script> window.location="../view/employee.php?msg=<?php echo $msg;  ?>&tab=add"</script>
                
                    <?php
                    }else{
                        throw new Exception("Couldn't send the email");    
                    }

                }else{
                    throw new Exception("Error in Inserting employee");
                }
                
            }
            catch(Exception $ex){
                $msg="Error $ex";
                $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/employee.php?msg=<?php echo $msg;  ?>&tab=add"</script>
            <?php
            }
        break;
        case "edit_employee":
            
            $emp_id = $_POST["emp_id"];
            $emp_f_name = trim($_POST["emp_fname"]);
            $emp_l_name = trim($_POST["emp_lname"]);
            $emp_email = trim($_POST["emp_email"]);
            $emp_gender = $_POST["emp_gender"];
            $emp_dob = $_POST["emp_dob"];
            $emp_nic = trim($_POST["emp_nic"]);
            $emp_cno_1 = trim($_POST["emp_cno1"]);
            $emp_cno_2 = trim($_POST["emp_cno2"]);
            $emp_add_no = trim($_POST["emp_add_no"]);
            $emp_add_street = trim($_POST["emp_add_street"]);
            $emp_add_city = trim($_POST["emp_add_city"]);
            $emp_role = $_POST["emp_role"];
            $emp_date_join = $_POST["emp_date_join"];
            $emp_epf = $_POST["emp_epf"];
            $emp_etf = $_POST["emp_etf"];

            try{
                if($emp_f_name==""){
                    throw new Exception("Firstname can't be empty ");
                }

                if($emp_l_name==""){
                    throw new Exception("Lastname can't be empty ");
                }

                if($emp_email==""){
                    throw new Exception("Email can't be empty ");
                }

                $patern_email="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                if(!preg_match($patern_email, $emp_email)){
                     throw new Exception("Invalid Email Address");
                }
                
                if($emp_gender==""){
                    throw new Exception("Gender can't be empty ");
                }

                if($emp_dob==""){
                    throw new Exception("Date of Birth can't be empty ");
                }

                if($emp_nic==""){
                    throw new Exception("NIC can't be empty ");
                }
                
                $pattern_nic="/^[0-9]{9}[vVxX]$/";
                if(!preg_match($pattern_nic, $emp_nic)){
                    throw new Exception("Invalid NIC");
                }
                
                if($emp_cno_1=="" && $emp_cno_2==""){
                    throw new Exception("Has to fill atleast on contact number");
                }

                if($emp_add_no==""){
                    throw new Exception("Address Number can't be empty");
                }
                
                if($emp_add_street==""){
                    throw new Exception("Address Street can't be empty ");
                }
                
                if($emp_add_city==""){
                    throw new Exception("Address City can't be empty");
                }
                
                if($emp_role==""){
                    throw new Exception("Please Select an Employee role");
                }

                if($emp_epf==""){
                    throw new Exception("EPF can't be empty");
                }

                if($emp_etf==""){
                    throw new Exception("EtF can't be empty");
                }

                //image upload
                if($_FILES["emp_img"]["name"]!=""){
                    $img=$_FILES["emp_img"]["name"];
                    $img="".time()."_".$img;
                    /// obtain temporary location
                   $tmp= $_FILES["emp_img"]["tmp_name"];
                   $destination="../images/user_image/$img";
                   move_uploaded_file($tmp, $destination);                    
                }
                else{                    
                    $img=$_POST["emp_img"];
                }

                if($emp_date_join==""){
                    throw new Exception("Date Joined can't be empty");
                }
                $emp_id = $emp_obj->edit_employee($emp_id,$emp_f_name, $emp_l_name,$emp_gender,$emp_dob,$emp_epf,$emp_etf,$img,$emp_role,$emp_date_join,$emp_nic);
              
                if($emp_id>0){
                    $emp_contact_id = $emp_obj->edit_employee_contact($emp_id,$emp_cno_1,$emp_cno_2,$emp_email);
                    if(!$emp_contact_id>0){
                        throw new Exception("Error in contacts");
                    }

                    $emp_id = $emp_obj->edit_employee_address($emp_id,$emp_add_no,$emp_add_street,$emp_add_city);
                    if(!$emp_id>0){
                        throw new Exception("Error in Address");
                    }

                    if($emp_id){
                        $msg="Successfully Updated User $emp_f_name"." "."$emp_l_name";
                        $msg=  base64_encode($msg);
                
                     ?>
                        <script> window.location="../view/employee.php?msg=<?php echo $msg;  ?>"</script>
                
                    <?php
                    }else{
                        throw new Exception("Error");    
                    }

                }else{
                    throw new Exception("Error in Updating employee");
                }
                
            }
            catch(Exception $ex){
                $msg="Error $ex";
                $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/employee.php?msg=<?php echo $msg;  ?>"</script>
            <?php
            }
        break;
        case "deactivateUser":
            $userId=$_REQUEST["user_id"]; 
            ///  decode the encoded user id to the normal numeric form
            
            $userId=  base64_decode($userId);
            
            $emp_obj->deactivateUser($userId);
            
            $msg="User Succesfully Deactivated!!!";
            $msg=  base64_encode($msg);
            ?>
            <script> window.location="../view/employee.php?msg=<?php echo $msg;  ?>"</script>
            <?php
        break;
        case "activateUser":
            $userId=$_REQUEST["user_id"]; 
            ///  decode the encoded user id to the normal numeric form
            
            $userId=  base64_decode($userId);
            
            $emp_obj->activateUser($userId);
            
            $msg="User Succesfully Activated!!!";
            $msg=  base64_encode($msg);
            ?>
            <script> window.location="../view/employee.php?msg=<?php echo $msg;  ?>"</script>
            <?php
        break;
    }

}