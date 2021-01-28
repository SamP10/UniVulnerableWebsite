<?php
include_once "init.php";
if(isset($_SESSION["loggedin"])){
}else{
    header("location: login.php");
}
 ?>

