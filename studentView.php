<?php
include_once 'init.php';
include "navBar.php";
$id= $_POST['id'];
$sql="SELECT * FROM students WHERE id='$id'";
$result=mysqli_query($connect, $sql) or die(mysqli_error());
while($row=mysqli_fetch_array($result)){
    echo"Username: ".$row['username'];
    echo"<br>Name: ".$row['fname']." ".$row['sname'];
    echo"<br>Student ID: ".$row['student_id'];
    echo"<br>D.O.B: ".$row['dob'];
    echo"<br>Email: ".$row['email'];
    echo"<br>Contact number: 0".$row['contact'];
    if($row['course_id']==0){
        echo"<br>Studies: Mathematics";
    }elseif($row['course_id']==1){
        echo"<br>Studies: English";
    }elseif($row['course_id']==2){
        echo"<br>Studies: Computing";
    }
    echo"<br>Address: ".$row['address'];
    echo"<br>Graduates: ".$row['graduation'];
}
