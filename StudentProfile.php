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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<a href="">Modules</a>
<a href="">Email</a>
<a href="">My Details</a>
<a href="">Timetable</a>
</body>
</html>

