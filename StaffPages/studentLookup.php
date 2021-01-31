<?php
session_start();
if(isset($_SESSION['loggedin'])){
    if($_SESSION['priv_id']==2){
        $host='localhost';
        $user='admin';
        $password='tiaspbiqe2r';
        $dbname='university';
//Database Connection with exit message upon error
        $connect = mysqli_connect($host, $user, $password, $dbname) or exit("Unable to connect to database!");
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
<legend>Student Lookup</legend>
    <form action="" method="post">
        By username:<input type="text" name="uname">
        By first name:<input type="text" name="fname">
        By surname:<input type="text" name="sname">
        By student ID:<input type="text" name="student_id">
        By date of birth:<input type="date" name="dob">
        <input type="submit" value="submit">
    </form>
</body>
</html>
<?php
if(!empty($_REQUEST['uname'])){
    $var = $_REQUEST['uname'];
    $sql="SELECT * FROM students WHERE username='$var'";
    $run=mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($run)){
        echo"Username: ".$row['username'];
        echo"<br />First Name: ".$row['fname'];
        echo"<br />Surname: ".$row['sname'];
        echo"<br />Student ID: ".$row['student_id'];
        echo"<br />D.O.B: ".$row['dob'];
        echo"<br />Address: ".$row['address'];
        echo"<br />Graduation Year: ".$row['graduation'];
        echo"<br /><img src=''>";
        echo"<br /><br />";
    }
}elseif (!empty($_REQUEST['fname'])){
    $var = $_REQUEST['fname'];
    $sql="SELECT * FROM students WHERE fname='$var'";
    $run=mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($run)){
        echo"Username: ".$row['username'];
        echo"<br />First Name: ".$row['fname'];
        echo"<br />Surname: ".$row['sname'];
        echo"<br />Student ID: ".$row['student_id'];
        echo"<br />D.O.B: ".$row['dob'];
        echo"<br />Address: ".$row['address'];
        echo"<br />Graduation Year: ".$row['graduation'];
        echo"<br /><img src=''>";
        echo"<br /><br />";
    }
}elseif (!empty($_REQUEST['sname'])){
    $var = $_REQUEST['sname'];
    $sql="SELECT * FROM students WHERE sname='$var'";
    $run=mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($run)){
        echo"Username: ".$row['username'];
        echo"<br />First Name: ".$row['fname'];
        echo"<br />Surname: ".$row['sname'];
        echo"<br />Student ID: ".$row['student_id'];
        echo"<br />D.O.B: ".$row['dob'];
        echo"<br />Address: ".$row['address'];
        echo"<br />Graduation Year: ".$row['graduation'];
        echo"<br /><img src=''>";
        echo"<br /><br />";
    }
}elseif (!empty($_REQUEST['student_id'])){
    $var = $_REQUEST['student_id'];
    $sql="SELECT * FROM students WHERE student_id='$var'";
    $run=mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($run)){
        echo"Username: ".$row['username'];
        echo"<br />First Name: ".$row['fname'];
        echo"<br />Surname: ".$row['sname'];
        echo"<br />Student ID: ".$row['student_id'];
        echo"<br />D.O.B: ".$row['dob'];
        echo"<br />Address: ".$row['address'];
        echo"<br />Graduation Year: ".$row['graduation'];
        echo"<br /><img src=''>";
        echo"<br /><br />";
    }
}elseif (!empty($_REQUEST['dob'])){
    $var = $_REQUEST['dob'];
    $sql="SELECT * FROM students WHERE dob='$var'";
    $run=mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($run)){
        echo"Username: ".$row['username'];
        echo"<br />First Name: ".$row['fname'];
        echo"<br />Surname: ".$row['sname'];
        echo"<br />Student ID: ".$row['student_id'];
        echo"<br />D.O.B: ".$row['dob'];
        echo"<br />Address: ".$row['address'];
        echo"<br />Graduation Year: ".$row['graduation'];
        echo"<br /><img src=''>";
        echo"<br /><br />";
    }
}else{
    echo"No Student Match";
}
