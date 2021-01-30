<?php
require_once "init.php";
if(isset($_SESSION['loggedin'])){
    if($_SESSION['priv_id']==1){
        echo"Hello ".$_SESSION['username'];
    }else{
        header("location: loginRedirect.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<a href="ITpages/accountAdminEdit.php">Account Admin Edit</a>
<a href="ITpages/personalAdminEdit.php">Personal Details Edit</a>
</body>
</html>
