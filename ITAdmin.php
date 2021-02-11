<?php
include("navBar.php");
require_once "init.php";
if(isset($_SESSION['loggedin'])){
    if($_SESSION['priv_id']==1){

    }else{
        header("location: loginRedirect.php");
    }
}
?>

