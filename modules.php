<?php
include_once "init.php";
include "navBar.php";
?>
<div class="container">
<?php
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
            echo "<h3>Course: <a href='./modulesDisplay.php'>".$row['course_name']."</a></h3>";
        }

    }elseif($_SESSION['priv_id']==2){
        $username=$_SESSION['username'];
        $sql="SELECT staff_id FROM staff WHERE username='$username'";
        $query=mysqli_query($connect, $sql);

        $result=$query->fetch_row();
        $staff_id=$result[0];
        $_SESSION['staff_id']=$staff_id;
        header("location: modulesDisplay.php");
    }
}
?>
</div>
</body>
</html>
