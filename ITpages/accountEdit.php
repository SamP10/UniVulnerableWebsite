<?php
include_once "init.php";
if(!isset($_SESSION['loggedin']) && $_SESSION['priv_id']!=1){
    header("Location: login.php");
}
$id=$_POST['id'];
$sql="SELECT * FROM useraccounts WHERE id=$id";

?>
