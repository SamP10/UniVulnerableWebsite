<?php
include_once "init.php";

if(isset($_SESSION["loggedin"])){
    $id = $_SESSION['id'];
    $sql= "SELECT priv_id FROM useraccounts WHERE (id=$id)";
    $db = mysqli_query($connect, $sql);
    while($row=mysqli_fetch_array($db)){
        $authority = $row['priv_id'];
        $_SESSION['priv_id']=$authority;
        if($authority==1){
            header("location: ITAdmin.php");
        }elseif($authority==2){
            header("location: StaffProfile.php");
        }elseif($authority==3){
            header("location: StudentProfile.php");
        }else{
            echo"Failed to establish authority";
            session_destroy();
            header("location: login.php");
        }
    }
}else{
    header("location: login.php");
}
 ?>

