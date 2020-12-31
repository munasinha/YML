<?php

    include_once  '../commons/dbConnection.php';
    $dbConnObj= new db_connection();
    
    class Login{
    
    public function validate_login($username,$password){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM employee e , employee_login el"
                . " WHERE e.employee_id=el.employee_id "
                . "AND el.employee_email='$username' "
                . "AND el.emp_password='$password'";
        $result= $con->query($sql);
        return $result;         
    }   
    
    public function update_login_first_time($id){
        $con=$GLOBALS['con'];
        $sql="UPDATE employee_login SET first_login=Now(), last_login=NOW(), previous_loged=1 WHERE employee_id=$id";
        $con->query($sql);
        
    }

    public function update_login_time($id){
        $con=$GLOBALS['con'];
        $sql="UPDATE employee_login SET last_login=NOW() WHERE employee_id=$id";
        $con->query($sql);
        
    }

}
?>