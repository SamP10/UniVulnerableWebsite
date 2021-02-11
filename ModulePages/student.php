<?php
include_once "init.php";
if(isset($_SESSION['loggedin'])){
    if($_SESSION['priv_id']==3){
        $username=$_SESSION['username'];
        $sql="SELECT course_id FROM students WHERE username='$username' limit 1";
        $query=mysqli_query($connect, $sql);

        $result=$query->fetch_row();
        $course_id=$result[0];
        $sql2="SELECT * FROM course WHERE course_id=$course_id";

        $run=mysqli_query($connect, $sql2);
        while($row=mysqli_fetch_array($run)){
            $_SESSION['course_id']=$course_id;
            echo "Course: <a href='./".$row['course_name'].".php'>".$row['course_name']."</a>";
        }

    }
}
