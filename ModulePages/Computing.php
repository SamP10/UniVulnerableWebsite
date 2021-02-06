<?php
include 'init.php';
if(isset($_SESSION['loggedin'])&&$_SESSION['course_id']==2){
    if($_SESSION['priv_id']==3){
        echo"working student";

    }elseif ($_SESSION['priv_id']==2){

    }
}