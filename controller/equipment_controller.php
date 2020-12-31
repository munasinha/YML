<?php

if(isset($_REQUEST["status"])){

    include "../model/equipment_model.php";
    $eq_obj = new Equipment();
    $status = $_REQUEST["status"];

    switch($status){
        case "add_equipment":
            
            $equ_name = $_POST['equ_name'];
            $purchase_date= $_POST['purchase_date'];
            $manufacturer= $_POST['manufacturer'];
            $comment= $_POST['comment'];
            $maintenance_date = $_POST['maintenance_date'];
            try{
                
                if($equ_name==""){
                    throw new Exception("Equipment Name can't be empty ");
                }

                $eq_id = $eq_obj->add_equipment($equ_name, $purchase_date,$manufacturer,$comment);
                           
                if($eq_id>0){
                    $eq_sh = $eq_obj->schedule_maintainance($eq_id,0,$maintenance_date,"");
                    if(!$eq_sh>0){
                        throw new Exception("Error in contacts");
                    }else{
                        $msg = base64_encode("Success");
                ?>
                        <script> window.location="../view/equipment.php?msg=<?php echo $msg;  ?>"</script>
                
                    <?php
                    }
                }else{
                    throw new Exception("Error in Inserting Equipment");
                }
            }
            catch(Exception $ex){
                $msg="Error $ex";
                $msg=  base64_encode($msg);
        
            ?>
                <script> window.location="../view/equipment.php?msg=<?php echo $msg;  ?>"</script>
            <?php
            }
        break;
        case "sh_maintainance":
            $equ_id=$_POST["equ"];
            $sh_date=  $_POST['sh_date'];
            $comment = $_POST['comment'];

            try{
                $res = $eq_obj->prev_sh_date($equ_id);
                $row = $res->fetch_assoc();
                $prev_sh_date = $row['sh_date'];

                $sh_d = $eq_obj->schedule_maintainance($equ_id,$prev_sh_date ,$sh_date,$comment);
                if($sh_d>0){
                    $msg = base64_encode("Success");
                ?>
                    <script> window.location="../view/equipment.php?msg=<?php echo $msg;  ?>"</script>
                <?php
                }else{
                    throw new Exception("Error in Inserting Equipment");
                }
            }catch(Exception $e){
                $msg="Error $e";
                $msg=  base64_encode($msg);
                ?>
                <script> window.location="../view/equipment.php?msg=<?php echo $msg;  ?>"</script>
            <?php
            }
            
        break;

    }

}