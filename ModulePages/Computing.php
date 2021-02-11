<?php
include 'init.php';
include 'navBar.php';
if(isset($_SESSION['loggedin'])&&$_SESSION['course_id']==2){
    if($_SESSION['priv_id']==3){
        $username=$_SESSION['username'];
        $sql="SELECT graduation FROM students WHERE username='$username'";
        $query=mysqli_query($connect, $sql);
        $result=$query->fetch_row();
        $graduates=$result[0];
        $year=$graduates-2021;
        if($year==0){
            $course_id=$_SESSION['course_id'];

            $ThirdYears=$year+3;
            $SecondYears=$year+2;
            $FirstYears=$year+1;
            $data="SELECT * FROM modules WHERE course_id=$course_id AND year=$ThirdYears OR course_id=$course_id AND year=$SecondYears OR course_id=$course_id AND year=$FirstYears";
            $run=mysqli_query($connect, $data);
            while($row=mysqli_fetch_assoc($run)){
                echo "<form method='POST' action='/UniSprint1/ModulePages/moduleView.php'>";
                echo $row['module_name'];
                echo "<button type='submit' name='module_id' value='".$row['module_id']."'>VIEW</button><br>";
                echo "</form>";
            }
            echo"You are third year";

        }elseif($year==1){
            $course_id=$_SESSION['course_id'];
            $FirstYears=$year;
            $SecondYears=$year+1;


            $data="SELECT * FROM modules WHERE course_id=$course_id AND year=$FirstYears OR course_id=$course_id AND year=$SecondYears ";
            $run=mysqli_query($connect, $data);
            while($row=mysqli_fetch_assoc($run)){
                echo $row['module_name']."<br>";
            }
            echo"You are second year";
        }elseif($year==2 || $year==3){
            $course_id=$_SESSION['course_id'];
            $FirstYears=$year-1;
            $data="SELECT * FROM modules WHERE course_id=$course_id AND year=$FirstYears";
            $run=mysqli_query($connect, $data);
            while($row=mysqli_fetch_assoc($run)){
                echo $row['module_name']."<br>";
            }
            echo"You are first year";
        }

    }elseif ($_SESSION['priv_id']==2){

    }
}