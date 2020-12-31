<?php

include_once '../commons/dbConnection.php';
$db_con_obj= new db_connection();

class Module{
    
    function get_all_modules()
    {
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM module";
        $results=$con->query($sql);
        return $results;       
        
    }
   
    
}
