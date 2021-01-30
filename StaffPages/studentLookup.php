<?php
session_start();
if(isset($_SESSION['loggedin'])){
    if($_SESSION['priv_id']==2){
        $host='localhost';
        $user='admin';
        $password='tiaspbiqe2r';
        $dbname='university';
//Database Connection with exit message upon error
        $connect = mysqli_connect($host, $user, $password, $dbname) or exit("Unable to connect to database!");
    }else{
        header("location: loginRedirect.php");
    }
}
?>