<?php
require_once "init.php";
if(isset($_SESSION['loggedin'])){
    if($_SESSION['priv_id']==3){
        echo "<a href='modules.php'>Modules</a>";
    }elseif($_SESSION['priv_id']==2){
        echo "<a href='StaffPages/studentLookup.php'>Student Search</a>";
        echo "<a href='modules.php'>Modules</a>";
    }elseif($_SESSION['priv_id']==1){
        header("Location: ITAdmin.php");
    }else{
        header("Location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<h1>Hello <?php echo $_SESSION['username']; ?></h1>
<a href="accountDetails.php">My Details</a>
</body>
</html>
