<?php
require_once "init.php";
if(isset($_SESSION['loggedin'])){
    if($_SESSION['priv_id']==2){
        echo"Hello ".$_SESSION['username'];
    }else{
        header("location: loginRedirect.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<a href="StaffPages/studentLookup.php">Student Search</a>
<a href="">Module Management</a>
<a href="">My Details</a>
<a href="">Email</a>
<a href=""></a>
</body>
</html>

