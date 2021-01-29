<?php
require_once "init.php";
if(isset($_SESSION['loggedin'])){
    if($_SESSION['priv_id']==3){
        echo"Hello ".$_SESSION['username'];
    }else{
        header("location: loginRedirect.php");
    }
}
?>