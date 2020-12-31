<?php

include_once '../commons/dbConnection.php';
$db_con_obj= new db_connection();

class Patient{
    

    function add_patient($patient_f_name, $patient_l_name,$gender,$dob,$patient_image_url,$patient_nic){
        $con=$GLOBALS['con'];
        $sql="INSERT into patient(patient_f_name, patient_l_name,gender,d_o_b,image_url,date_joined,nic) values('$patient_f_name', '$patient_l_name','$gender','$dob','$patient_image_url',NOW(),'$patient_nic')";
        $results=$con->query($sql) or die($con->error);
        $patient_id=$con->insert_id;  //  getting the auto incremented id
        return $patient_id;
    }

    function edit_patient($id,$patient_f_name, $patient_l_name,$gender,$dob,$patient_image_url,$patient_nic){
        $con=$GLOBALS['con'];
        $sql="UPDATE patient SET patient_f_name='$patient_f_name', patient_l_name='$patient_l_name',gender='$gender',d_o_b='$dob',image_url='$patient_image_url',date_joined='$date_joined',nic='$patient_nic' WHERE patient_id='$id' ";
        $results=$con->query($sql);
        return $id;
    }

    function add_patient_contact($patient_number,$tel_no_1,$tel_no_2,$email){
        $con=$GLOBALS['con'];
        $sql="INSERT into patient_contact(patient_id,telephone_number,telephone_number_2,email) values('$patient_number','$tel_no_1','$tel_no_2','$email')";
        $results = $con->query($sql);
        $patient_contact_id=$con->insert_id;  //  getting the auto incremented id
        return $patient_contact_id;
    }

    function edit_patient_contact($patient_number,$tel_no_1,$tel_no_2,$email){
        $con=$GLOBALS['con'];
        $sql="UPDATE patient_contact SET telephone_number='$tel_no_1',telephone_number_2='$tel_no_2',email='$email' WHERE patient_id='$patient_number'";
        $results = $con->query($sql);
        return $patient_number;
    }

    function add_patient_address($patient_number,$patient_home_number,$patient_home_street,$patient_home_town){
        $con=$GLOBALS['con'];
        $sql="INSERT into patient_address(patient_id,house_no,street,town) values('$patient_number','$patient_home_number','$patient_home_street','$patient_home_town')";
        $results = $con->query($sql);
        $patient_add_id=$con->insert_id;  //  getting the auto incremented id
        return $patient_add_id;
    }

    function edit_patient_address($patient_number,$patient_home_number,$patient_home_street,$patient_home_town){
        $con=$GLOBALS['con'];
        $sql="UPDATE patient_address SET house_no='$patient_home_number',street='$patient_home_street',town='$patient_home_town' WHERE patient_id='$patient_number' ";
        $results = $con->query($sql);
        return $patient_number;
    }

    function temp_password_generate(){
        //source: https://www.w3resource.com/php-exercises/php-string-exercise-9.php
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($data), 0, 8);
    }
  
    function add_patient_login($patient_id,$patient_email,$patient_password){
        $con=$GLOBALS['con'];
        $sql="INSERT into patient_login(patient_id,email,patient_password) values('$patient_id','$patient_email','$patient_password')";
        $results = $con->query($sql);
        $patient_id=$con->insert_id;  //  getting the auto incremented id
        return $patient_id;
      
    }

    function get_patient_details($id){
        $id = base64_decode($id);
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM patient p,patient_contact pc,patient_address pd WHERE p.patient_id = pc.patient_id and p.patient_id = pd.patient_id and p.patient_id='$id' ";
        $result=$con->query($sql);
        return $result;
    }


    function get_all_patients(){
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM patient p,patient_contact pc WHERE p.patient_id = pc.patient_id";
        $result=$con->query($sql);
        return $result;
    }

    function validate_email($patient_email){
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM patient_contact WHERE email='$patient_email'";
        $result=$con->query($sql);
        if($result->num_rows>0){
           return false;            
        }
        else{
            return true;
        }
    }

    function send_tmp_password($email, $temp_password){
        include '../includes/email_includes.php';

        $username="yoshithaprabo@gmail.com";
            
        $mail->setFrom('mail@yml.lk', 'Yasas Medi Lab information System');
        $mail->addReplyTo('mail@yml.lk', 'Yasas Medi Lab information System');
        $mail->addAddress($username);   // Add a recipient
        
        $mail->Subject = 'Access Credentials';
        
        $dec_email = base64_decode($email);
        $dec_pass = base64_decode($temp_password); 
        
        $mail->isHTML(true);  // Set email format to HTML
        $body="<img src='http://www.esoft.lk/wp-content/th"
                . "emes/esoft/assets/images/mainlogo.png'/>";
        $body.="<h2>Please use the below email and Password to log in to the system. After the initial login you will have to change your password</h2>";
        $body.="<p>UserName: $dec_email</p>";
        $body.="<p>Password: $dec_pass</p>";
               
        $mail->Body    = $body;
        if($mail->send())
        {
            return true;
            
        }
        else{
           die($mail->ErrorInfo);
        }
    }

    function get_total_patient_count(){
        $con=$GLOBALS['con']; 
        $sql="SELECT count(patient_id) as c FROM patient";
        $results=$con->query($sql);
        return $results; 
    }
    function deactivateUser($id){
        $con=$GLOBALS['con']; 
        $sql="UPDATE patient SET patient_status=0 WHERE patient_id='$id'";
        $results=$con->query($sql);
        return $results;  
    }
    function activateUser($id){
        $con=$GLOBALS['con']; 
        $sql="UPDATE patient SET patient_status=1 WHERE patient_id='$id'";
        $results=$con->query($sql);
        return $results;  
    }

    function validate_password($patient_id,$c_pass){
        $con=$GLOBALS['con'];
        $c_pass = sha1($c_pass);
        $sql="SELECT * FROM  patient_login  WHERE patient_id='$patient_id' AND patient_password='$c_pass'";
        $result= $con->query($sql);
        if($result->num_rows == 1){
            return true;
        }else{
            return false; 
        }    
    }

    function changePassword($patient_id,$new_password){
        $new_password = sha1($new_password);
        $con=$GLOBALS['con']; 
        $sql="UPDATE patient_login SET patient_password='$new_password', password_changed=1 WHERE patient_id='$patient_id'";
        $results=$con->query($sql);
        if($result->num_rows == 1){
            return true;
        }else{
            return false; 
        }  
    }

    function search_data($txt){
        $con=$GLOBALS['con']; 
        $sql="SELECT * FROM patient p, patient_address pa,patient_contact pc WHERE p.patient_id=pc.patient_id and p.patient_id= pa.patient_id and (p.patient_id='$txt' or p.patient_f_name LIKE '%$txt%' or p.patient_l_name LIKE '%$txt%' or p.nic = '$txt') LIMIT 0,5 ";
        $results=$con->query($sql)or die($con->error);
        return $results; 
    }

}