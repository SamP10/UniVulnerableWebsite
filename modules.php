<?php
include"init.php";
if(isset($_SESSION['loggedin'])){
if($_SESSION['priv_id']==3){
    header("Location: ModulePages/student.php");
}elseif($_SESSION['priv_id']==2){
    include("ModulePages/staff.php");
    header("Location: ModulesPages/staff.php");
    }
}
