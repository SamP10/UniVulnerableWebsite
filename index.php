<?php
include_once "init.php";

if(isset($_SESSION["loggedin"])){
    $id = $_SESSION['id'];
    $sql= "SELECT priv_id FROM useraccounts WHERE (id=$id)";
    $db = mysqli_query($connect, $sql);
    while($row=mysqli_fetch_array($db)){
        $authority = $row['priv_id'];
        if($authority==1){
            echo"You are IT";
        }elseif($authority==2){
            echo"You are Staff";
        }elseif($authority==3){
            echo"You are Student";
        }else{
            echo"Failed to understand authority";
        }
    }

}else{
    header("location: login.php");
}
 ?>

