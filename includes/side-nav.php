<div class="col-md-2">
    <ul class="list-group">
        <a class="list-group-item" style="font-size:14px" href="../view/dashboard.php">Dashboard</a>
       
        <?php
            include_once '../model/module_model.php';     
            include_once '../model/employee_model.php';

            $emp_obj = new Employee();  ///  creating the user Object
            
            $role_id=$_SESSION["employee"]["role_id"];
            $module_result=$emp_obj->get_modules_by_role($role_id);
                
            $module_obj = new Module();
            while($row=$module_result->fetch_assoc()){
        ?>
            <a class="list-group-item" style="font-size:14px" href="<?php echo strtolower($row["module_path"]);  ?>">
        <?php
            echo ucfirst($row["module_name"]);
        ?>
            </a>
        <?php }?>
    </ul>
</div>