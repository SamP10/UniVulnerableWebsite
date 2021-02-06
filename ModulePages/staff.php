<?php
include_once "init.php";
if(isset($_SESSION['loggedin'])){
    if($_SESSION['priv_id']==1){
        $sql="SELECT * FROM course WHERE ";
    }else{
        echo"You are not a staff member?";
    }
}else{
    header("Location: /login.php");
}