<?php
include '../commons/session.php';
include '../model/login_model.php';
include '../model/employee_model.php';

$emp_obj = new Employee();

$login_obj= new Login();
$status=$_REQUEST["status"];
 
switch ($status){
     
    case "login":
    
        $uname=$_POST["username"];
        $pw=$_POST["password"];
        $pw=  sha1($pw);
    
        $result= $login_obj->validate_login($uname, $pw);
      
        if($result->num_rows==1){
 
            $emp_row=$result->fetch_assoc();
            $role_id=$emp_row["employee_role"];  
            $first_name=$emp_row["employee_f_name"];
            $last_name=$emp_row["employee_l_name"];
            $previous_loged = $emp_row["previous_loged"];
            $password_changed = $emp_row["password_changed"];
            $id = $emp_row["employee_id"];

            if($previous_loged==0){
                $login_obj->update_login_first_time($id);
            }else{
                $login_obj->update_login_time($id);
            }
            
            $employee_array=array(
                "first_name"=>$first_name, 
                "last_name"=>$last_name,
                "role_id"=>$role_id,
                "password_status"=>$password_changed,
                "emp_id"=>$id
                );
                
                $_SESSION["employee"]=$employee_array;
               
        ?>  
            <script> window.location="../view/dashboard.php"</script>
        
        <?php
        
        }
        else{
            $msg="The Credentials: username and the password does not match!";
            $msg=base64_encode($msg);
        
        ?>
        <script> window.location="../view/login.php?err=<?php echo $msg;  ?>"</script>

        <?php
        }
            
    break;
     
    case "logout":
        session_start();
        session_destroy();

    ?>
    <script> window.location="../index.php"</script>
    
    <?php     
    
    break;
    
        
    case "change_password":
         
        $user_id=base64_decode($_GET["id"]);
        $c_pass = $_POST["c_password"];
        $new_pass=$_POST["new_password"];
        $re_pass = $_POST["re_password"];
        try{
            if(trim($c_pass)=="" || trim($new_pass)=="" || trim($re_pass)==""){
                throw new Exception("Please Fill All Values"); 
            }else if($c_pass==$new_pass){
                throw new Exception("New Password can't be same as old Password"); 
            }else if($new_pass!=$re_pass){
                throw new Exception("Password Confirmation failed"); 
            }else if(!$emp_obj->validate_password($user_id,$c_pass)){
                throw new Exception("Current password authentication failed");
            }else{
                $res = $emp_obj->changePassword($user_id, $new_pass);
                session_start();
                $_SESSION["employee"]["password_status"]=1;
                $msg="Password Sucessfully Updated";
                $msg=  base64_encode($msg);
                ?>
                    <script> window.location="../view/dashboard.php?msg=<?php echo $msg;  ?>"</script>
                <?php
                
            }
        }catch(Exception $e){
            $msg="Error: $e";
            $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/employee-changepw.php?id=<?php echo base64_encode($user_id);?>&err=<?php echo $msg;  ?>"</script>
            <?php
        }
        
         
        ?>
            <script> window.location="../view/login.php?updated=true"</script>
        <?php
     
    break;
    default:
        echo "Invalid Parameters";
    break;
      
 }
?>

