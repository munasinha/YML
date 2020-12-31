<?php

include_once '../commons/dbConnection.php';
$db_con_obj= new db_connection();

class Equipment{
    function get_all_equipment(){
        $con=$GLOBALS['con'];
        $sql="SELECT DISTINCT * FROM equipment e, equipment_maintainance eq_m WHERE e.equ_id=eq_m.equipment_id";
        $results=$con->query($sql);
        return $results; 
    }

    function add_equipment($equipment_name, $purchased_date,$manufactuer,$comment){
        $con=$GLOBALS['con'];
        $sql="INSERT into equipment(equ_name, purchased_date,manufacture,comment) values('$equipment_name', '$purchased_date','$manufactuer','$comment')";
        $results=$con->query($sql) or die($con->error);
        $equ_id=$con->insert_id;  //  getting the auto incremented id
        return $equ_id;
    }

    function edit_equipment($equ_id,$equipment_name, $purchased_date,$manufactuer,$comment){
        $con=$GLOBALS['con'];
        $sql="UPDATE equipment SET equ_name='$equipment_name', purchased_date='$purchased_date',manufacture='$manufactuer',comment='$comment' WHERE equ_id='$equ_id'";
        $results=$con->query($sql);       
        return $id;
    }

    function schedule_maintainance($equipment_id,$prev_date ,$sh_date,$comment){
        $con=$GLOBALS['con'];
        $sql="INSERT into equipment_maintainance(equipment_id,prev_date,sh_date,sh_comment) values('$equipment_id','$prev_date' ,'$sh_date','$comment')";
        $results=$con->query($sql) or die($con->error);;
        $equ_id=$con->insert_id;  //  getting the auto incremented id
        return $equ_id;
    }

    function edit_schedule($schedule_id, $sh_date,$comment){
        $con=$GLOBALS['con'];
        $sql="UPDATE equipment_maintainance SET sh_date='$sh_date',comment='$comment' WHERE schedule_id='$schedule_id'";
        $results=$con->query($sql);       
        return $schedule_id;
    }

    function prev_sh_date($eq_id){
        $con=$GLOBALS['con'];
        $sql="SELECT sh_date FROM equipment_maintainance eq_m WHERE equipment_id='$eq_id' ORDER BY sh_date DESC LIMIT 1";
        $results=$con->query($sql)or die($con->error);;
        return $results; 
    
    }


}