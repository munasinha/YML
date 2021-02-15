<?php

if(isset($_REQUEST["status"])){

    include "../model/patient_model.php";
    $patient_obj = new Patient();
    $status = $_REQUEST["status"];

    switch($status){
        case "add_patient":
            
            $patient_f_name = trim($_POST["patient_fname"]);
            $patient_l_name = trim($_POST["patient_lname"]);
            $patient_email = trim($_POST["patient_email"]);
            $patient_gender = $_POST["patient_gender"];
            $patient_dob = $_POST["patient_dob"];
            $patient_nic = trim($_POST["patient_nic"]);
            $patient_cno_1 = trim($_POST["patient_cno1"]);
            $patient_cno_2 = trim($_POST["patient_cno2"]);
            $patient_add_no = trim($_POST["patient_add_no"]);
            $patient_add_street = trim($_POST["patient_add_street"]);
            $patient_add_city = trim($_POST["patient_add_city"]);
          
         
            try{
                
                if($patient_f_name==""){
                    throw new Exception("Firstname can't be empty ");
                }

                if($patient_l_name==""){
                    throw new Exception("Lastname can't be empty ");
                }

                if($patient_email!=""){
                    $patern_email="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                    if(!preg_match($patern_email, $patient_email)){
                        throw new Exception("Invalid Email Address");
                    }
                    $is_valid=$patient_obj->validate_email($patient_email);
                
                    if($is_valid===false){
                        throw new Exception("Email Address is Already Taken!!!");  
                    }
                }
                
                if($patient_gender==""){
                    throw new Exception("Gender can't be empty ");
                }

                if($patient_dob==""){
                    throw new Exception("Date of Birth can't be empty ");
                }

                if($patient_nic!=""){
                    $pattern_nic="/^[0-9]{9}[vVxX]$/";
                    if(!preg_match($pattern_nic, $patient_nic)){
                        throw new Exception("Invalid NIC");
                    }
                }
                
                if($patient_cno_1=="" && $patient_cno_2==""){
                    throw new Exception("Has to fill atleast on contact number");
                }

                if($patient_add_no==""){
                    throw new Exception("Address Number can't be empty");
                }
                
                if($patient_add_street==""){
                    throw new Exception("Address Street can't be empty ");
                }
                
                if($patient_add_city==""){
                    throw new Exception("Address City can't be empty");
                }
                
                
                //image upload
                if($_FILES["patient_img"]["name"]!=""){
                    $img=$_FILES["patient_img"]["name"];
                    $img="".time()."_".$img;
                    /// obtain temporary location
                   $tmp= $_FILES["patient_img"]["tmp_name"];
                   $destination="../images/patient_image/$img";
                   move_uploaded_file($tmp, $destination);                    
                }
                else{                    
                    $img="defaultImage.jpg";
                }
               
                $patient_id = $patient_obj->add_patient($patient_f_name, $patient_l_name,$patient_gender,$patient_dob,$img,$patient_nic);
              
                
                if($patient_id>0){
                    $patient_contact_id = $patient_obj->add_patient_contact($patient_id,$patient_cno_1,$patient_cno_2,$patient_email);
                    if(!$patient_contact_id>0){
                        throw new Exception("Error in contacts");
                    }

                    $patient_add_id = $patient_obj->add_patient_address($patient_id,$patient_add_no,$patient_add_street,$patient_add_city);
                    if(!$patient_add_id>0){
                        throw new Exception("Error in Address");
                    }

                    $tmp_password = $patient_obj->temp_password_generate();
                    echo "add login";
                    $en_tmp_password=sha1($tmp_password);
                    $patient_login_id = $patient_obj->add_patient_login($patient_id,$patient_email,$en_tmp_password);
                    if(!$patient_login_id>0){
                        throw new Exception("Error in Login");
                    }
                    
                    $patient_email = base64_encode($patient_email);
                    $tmp_password = base64_encode($tmp_password);

                    if($patient_obj->send_tmp_password($patient_email, $tmp_password)){
                        $msg="Successfully Inserted $patient_f_name"." "."$patient_l_name";
                        $msg=  base64_encode($msg);
                
                     ?>
                        <script> window.location="../view/patient.php?msg=<?php echo $msg;  ?>"</script>
                
                    <?php
                    }else{
                        throw new Exception("Couldn't send the email");    
                    }

                }else{
                    throw new Exception("Error in Inserting Patient");
                }
                
            }
            catch(Exception $ex){
                $msg="Error $ex";
                $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/patient-register.php?msg=<?php echo $msg;  ?>"</script>
            <?php
            }
        break;
        case "edit_patient":
            
            
            $patient_f_name = trim($_POST["patient_fname"]);
            $patient_l_name = trim($_POST["patient_lname"]);
            $patient_email = trim($_POST["patient_email"]);
            $patient_gender = $_POST["patient_gender"];
            $patient_dob = $_POST["patient_dob"];
            $patient_nic = trim($_POST["patient_nic"]);
            $patient_cno_1 = trim($_POST["patient_cno1"]);
            $patient_cno_2 = trim($_POST["patient_cno2"]);
            $patient_add_no = trim($_POST["patient_add_no"]);
            $patient_add_street = trim($_POST["patient_add_street"]);
            $patient_add_city = trim($_POST["patient_add_city"]);
            $patient_id = base64_decode($_GET["id"]);
         
            try{
                
                if($patient_f_name==""){
                    throw new Exception("Firstname can't be empty ");
                }

                if($patient_l_name==""){
                    throw new Exception("Lastname can't be empty ");
                }

                if($patient_email!=""){
                    $patern_email="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/";
                    if(!preg_match($patern_email, $patient_email)){
                        throw new Exception("Invalid Email Address");
                    }
                    $is_valid=$patient_obj->validate_email($patient_email);
                
                    if($is_valid===True){
                        throw new Exception("Email Address Doesn't Esixt!!!");  
                    }
                }
                
                if($patient_gender==""){
                    throw new Exception("Gender can't be empty ");
                }

                if($patient_dob==""){
                    throw new Exception("Date of Birth can't be empty ");
                }

                if($patient_nic!=""){
                    $pattern_nic="/^[0-9]{9}[vVxX]$/";
                    if(!preg_match($pattern_nic, $patient_nic)){
                        throw new Exception("Invalid NIC");
                    }
                }
                
                if($patient_cno_1=="" && $patient_cno_2==""){
                    throw new Exception("Has to fill atleast on contact number");
                }

                if($patient_add_no==""){
                    throw new Exception("Address Number can't be empty");
                }
                
                if($patient_add_street==""){
                    throw new Exception("Address Street can't be empty ");
                }
                
                if($patient_add_city==""){
                    throw new Exception("Address City can't be empty");
                }
                
                
                //image upload
                if($_FILES["patient_img"]["name"]!=""){
                    $img=$_FILES["patient_img"]["name"];
                    $img="".time()."_".$img;
                    /// obtain temporary location
                   $tmp= $_FILES["patient_img"]["tmp_name"];
                   $destination="../images/patient_image/$img";
                   move_uploaded_file($tmp, $destination);                    
                }
                else{                    
                    $img="defaultImage.jpg";
                }
                //$id,$patient_f_name, $patient_l_name,$gender,$dob,$patient_image_url,$patient_nic
                $patient_id = $patient_obj->edit_patient($patient_id,$patient_f_name, $patient_l_name,$patient_gender,$patient_dob,$img,$patient_nic);
              
                
                if($patient_id>0){
                    $patient_contact_id = $patient_obj->edit_patient_contact($patient_id,$patient_cno_1,$patient_cno_2,$patient_email);
                    if(!$patient_contact_id>0){
                        throw new Exception("Error in contacts");
                    }

                    $patient_add_id = $patient_obj->edit_patient_address($patient_id,$patient_add_no,$patient_add_street,$patient_add_city);
                    if(!$patient_add_id>0){
                        throw new Exception("Error in Address");
                    }
                    if($patient_id){
                        $msg="Successfully Updated User $patient_f_name"." "."$patient_l_name";
                        $msg=  base64_encode($msg);
                   
                    ?>
                        <script> window.location="../view/patient.php?msg=<?php echo $msg;  ?>"</script>
                
                    <?php
                    }
                    else{
                        throw new Exception("Error in Updating");    
                    }
                    
                }else{
                    throw new Exception("Error in Updating Patient");
                }
                
            }
            catch(Exception $ex){
                $msg="Error $ex";
                $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/patient-register.php?msg=<?php echo $msg;  ?>"</script>
            <?php
            }
        break;
        case "deactivateUser":
            $patientId=$_REQUEST["patient_id"]; 
            ///  decode the encoded user id to the normal numeric form
            
            $patientId=  base64_decode($patientId);
            
            $patient_obj->deactivateUser($patientId);
            
            $msg="Patient Succesfully Deactivated!!!";
            $msg=  base64_encode($msg);
            ?>
            <script> window.location="../view/patient.php?msg=<?php echo $msg;  ?>"</script>
            <?php
        break;
        case "activateUser":
            $patientId=$_REQUEST["patient_id"]; 
            ///  decode the encoded user id to the normal numeric form
            
            $patientId=  base64_decode($patientId);
            
            $patient_obj->activateUser($patientId);
            
            $msg="Patient Succesfully Activated!!!";
            $msg=  base64_encode($msg);
            ?>
            <script> window.location="../view/patient.php?msg=<?php echo $msg;  ?>"</script>
            <?php
        break;
        case "search":
            
            $search_txt = $_POST['search'];
            
            $res = $patient_obj->search_data($search_txt);
            
           
            $output = "<table class='table table-responsive'>
                                <tr style='background-color:gray;'>
                                    <th>Patient ID</th>
                                    <th>NIC</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Address</th>
                                    <th>Telephone Number</th>
                                    <th>Pending Tests</th>
                                </tr>";
           
                     
            while($res_row = $res->fetch_assoc()){
                $p_id =$res_row['patient_id'];
                $p_id = base64_encode($p_id); 
                
                //get this to a different function-------------------------
                    $bday = new DateTime($res_row['d_o_b']); //date of birth
                    $today = new Datetime(date('m.d.y'));
                    $diff = $today->diff($bday); 
                    $age = 0;
                    if($diff->y > 0){
                        $age= $diff->y." y";
                    }         
                    else if($diff->y > 0){
                        $age= $diff->m." m";
                    }
                    else{
                        $age= $diff->d." days";
                    }
                //--------------------------------------------------------

                $output .= "<tr style='background-color:lightgray'>
                    <th style='text-align:center'>".$res_row['patient_id']."</th>
                    <th style='text-align:center'>".$res_row['nic']."</th>
                    <th style='text-align:center'>".$res_row['patient_f_name']." ".$res_row['patient_l_name']."</th>
                    <th style='text-align:center'>".$age."</th>
                    <th style='text-align:center'>".$res_row['house_no']." ".$res_row['street']." ".$res_row['town']."</th>
                    <th style='text-align:center'>".$res_row['telephone_number']."</th>
                    <th><a href='patient-edit.php?id=".$p_id."' class='btn btn-primary'>Edit Patient</a></th>
                </tr>";
            }
            $output .= "</table>";
            echo $output;
        break;
    }

}