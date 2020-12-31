<?php

include_once '../commons/dbConnection.php';
$db_con_obj= new db_connection();

class Employee{
    function get_emp_roles(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM roles";
        $results=$con->query($sql);
        return $results; 
    }

    function add_employee($employee_f_name, $employee_l_name,$gender,$dob,$epf_number,$etf_number,$employee_image_url,$employee_role,$date_joined,$emp_nic){
        $con=$GLOBALS['con'];
        $sql="INSERT into employee(employee_f_name, employee_l_name,gender,dob,epf_number,etf_number,employee_image_url,employee_role,date_joined,nic_number) values('$employee_f_name', '$employee_l_name','$gender','$dob','$epf_number','$etf_number','$employee_image_url','$employee_role','$date_joined','$emp_nic')";
        $results=$con->query($sql);
        $emp_id=$con->insert_id;  //  getting the auto incremented id
        return $emp_id;

    }

    function edit_employee($id,$employee_f_name, $employee_l_name,$gender,$dob,$epf_number,$etf_number,$employee_image_url,$employee_role,$date_joined,$emp_nic){
        $con=$GLOBALS['con'];
        $sql="UPDATE employee SET employee_f_name='$employee_f_name', employee_l_name='$employee_l_name',gender='$gender',dob='$dob',epf_number='$epf_number',etf_number='$etf_number',employee_image_url='$employee_image_url',employee_role='$employee_role',date_joined='$date_joined',nic_number='$emp_nic' WHERE employee_id='$id' ";
        $results=$con->query($sql);
        
        return $id;

    }

    function add_employee_contact($emp_number,$tel_no_1,$tel_no_2,$email){
        $con=$GLOBALS['con'];
        $sql="INSERT into employee_contact(employee_id,telephone_number,telephone_number_2,email) values('$emp_number','$tel_no_1','$tel_no_2','$email')";
        $results = $con->query($sql);
        $emp_contact_id=$con->insert_id;  //  getting the auto incremented id
        return $emp_contact_id;
    }

    function edit_employee_contact($emp_number,$tel_no_1,$tel_no_2,$email){
        $con=$GLOBALS['con'];
        $sql="UPDATE employee_contact SET telephone_number='$tel_no_1',telephone_number_2='$tel_no_2',email='$email' WHERE employee_id='$emp_number'";
        $results = $con->query($sql);
        return $emp_number;
    }

    function add_employee_address($emp_number,$emp_home_number,$emp_home_street,$emp_home_town){
        $con=$GLOBALS['con'];
        $sql="INSERT into employee_address(employee_id,house_no,street,town) values('$emp_number','$emp_home_number','$emp_home_street','$emp_home_town')";
        $results = $con->query($sql);
        $emp_add_id=$con->insert_id;  //  getting the auto incremented id
        return $emp_add_id;
    }

    function edit_employee_address($emp_number,$emp_home_number,$emp_home_street,$emp_home_town){
        $con=$GLOBALS['con'];
        $sql="UPDATE employee_address SET house_no='$emp_home_number',street='$emp_home_street',town='$emp_home_town' WHERE employee_id='$emp_number' ";
        $results = $con->query($sql);
        return $emp_number;
    }

    function temp_password_generate(){
        //source: https://www.w3resource.com/php-exercises/php-string-exercise-9.php
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($data), 0, 8);
    }
  
    function add_employee_login($employee_id,$employee_email,$emp_password){
        $con=$GLOBALS['con'];
        $sql="INSERT into employee_login(employee_id,employee_email,emp_password) values('$employee_id','$employee_email','$emp_password')";
        $results = $con->query($sql);
        $emp_id=$con->insert_id;  //  getting the auto incremented id
        return $emp_id;
      
    }

    function get_all_employees(){
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM employee e, roles r, employee_contact ec WHERE e.employee_role=r.role_id and e.employee_id = ec.employee_id";
        $result=$con->query($sql);
        return $result;
    }

    function validate_email($emp_email){
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM employee_contact WHERE email='$emp_email'";
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

    function get_modules_by_role($role_id){
        $con=$GLOBALS['con']; 
        $sql="SELECT * FROM module m, module_role r WHERE m.module_id=r.module_id AND r.role_id='$role_id'";
        $results=$con->query($sql);
        return $results;      
    }

    function get_total_employee_count(){
        $con=$GLOBALS['con']; 
        $sql="SELECT count(employee_id) as c FROM employee";
        $results=$con->query($sql);
        return $results; 
    }

    function get_employee_details($id){
        $id = base64_decode($id);
        $con=$GLOBALS["con"];
        $sql="SELECT * FROM employee e, roles r, employee_contact ec, employee_address ed WHERE e.employee_role=r.role_id and e.employee_id=ec.employee_id and e.employee_id=ed.employee_id and e.employee_id = '$id'";
        $result=$con->query($sql);
        return $result;

    }

    function deactivateUser($id){
        $con=$GLOBALS['con']; 
        $sql="UPDATE employee SET employee_status=0 WHERE employee_id='$id'";
        $results=$con->query($sql);
        return $results;  
    }
    function activateUser($id){
        $con=$GLOBALS['con']; 
        $sql="UPDATE employee SET employee_status=1 WHERE employee_id='$id'";
        $results=$con->query($sql);
        return $results;  
    }

    function validate_password($emp_id,$c_pass){
        $con=$GLOBALS['con'];
        $c_pass = sha1($c_pass);
        $sql="SELECT * FROM  employee_login  WHERE employee_id='$emp_id' AND emp_password='$c_pass'";
        $result= $con->query($sql);
        if($result->num_rows == 1){
            return true;
        }else{
            return false; 
        }    
    }

    function changePassword($emp_id,$new_password){
        $new_password = sha1($new_password);
        $con=$GLOBALS['con']; 
        $sql="UPDATE employee_login SET emp_password='$new_password', password_changed=1 WHERE employee_id='$emp_id'";
        $results=$con->query($sql);
        if($result->num_rows == 1){
            return true;
        }else{
            return false; 
        }  
    }

}