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
    <form action="" method="POST">
        By username:<input type="text" name="username"><br>
        By first name:<input type="text" name="fname"><br>
        By surname:<input type="text" name="sname"><br>
        By student ID:<input type="text" name="student_id"><br>
        By date of birth:<input type="date" name="dob"><br>
        <button type="submit" name="submit" value="submit">Submit</button>
    </form>
<br><br>

<?php
if(isset($_POST['submit'])){

    $fields=array('username', 'fname', 'sname', 'student_id', 'dob');
    $conditions=array();

    foreach($fields as $field){
        if(isset($_POST[$field]) && $_POST[$field] != ''){
            $conditions[]="$field LIKE '%" . $_POST[$field] . "%'";
        }
    }

    $query = "SELECT * FROM students ";
    if(count($conditions) > 0){
        $query .= "WHERE " . implode(' AND ', $conditions);
    }
    $result = mysqli_query($connect, $query) or die(mysqli_error());


    while($row=mysqli_fetch_array($result)){
        echo"Username: ".$row['username'];
        echo"<br>Name: ".$row['fname']." ".$row['sname'];
        echo"<br>Student ID: ".$row['student_id'];
        echo"<br>D.O.B: ".$row['dob'];
        echo"<br>Email: ".$row['email'];
        echo"<br>Contact number: ".$row['contact'];
        if($row['course_id']==0){
            echo"<br>Studies: Mathematics";
        }elseif($row['course_id']==1){
            echo"<br>Studies: English";
        }elseif($row['course_id']==2){
            echo"<br>Studies: Computing";
        }
        echo"<br>Address: ".$row['address'];
        echo"<br>Graduates: ".$row['graduation'];
        echo"<br><br>";
    }
}else{
    echo"Please search for students";
}
?>
</body>
</html>
