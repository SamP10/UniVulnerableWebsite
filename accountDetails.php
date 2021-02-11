<?php
include_once 'init.php';
include 'navBar.php';
if(isset($_SESSION['loggedin'])) {
    echo"<h1>My Details</h1>";
    $acc_id = $_SESSION['id'];
    $query = "SELECT user_id FROM useraccounts WHERE id='$acc_id'";
    $db = mysqli_query($connect, $query) or die(mysqli_error());
    while ($row = mysqli_fetch_array($db)) {
        $user_id = $row['user_id'];
    }
    if ($_SESSION['priv_id'] == 1 || $_SESSION['priv_id'] == 2) {
        $sql = "SELECT * FROM staff WHERE staff_id='$user_id'";
        $result = mysqli_query($connect, $sql) or die(mysqli_error());
        while ($row = mysqli_fetch_array($result)) {
            echo "Username: " . $row['username'];
            echo "<br>First Name: " . $row['fname'];
            echo "<br>Surname: " . $row['sname'];
            echo "<br>Email: " . $row['email'];
            echo "<br>DOB: " . $row['dob'];
            echo "<br>Contact: 0" . $row['contact'];
            echo "<br>ID: ".$row['staff_id'];
            echo "<br>National Insurance: ".$row['ni_number'];
            echo "<br>Address: ".$row['address'];
            echo "<form action='editDetails.php' method='POST'>";
            echo "<a href='editDetails.php'><button name='id' value='".$user_id."'>EDIT</button></a>";
            echo "</form>";


        }
    } elseif ($_SESSION['priv_id'] == 3) {
        $sql = "SELECT * FROM students WHERE student_id='$user_id'";
        $result = mysqli_query($connect, $sql) or die(mysqli_error());
        while ($row = mysqli_fetch_array($result)) {
            echo "Username: " . $row['username'];
            echo "<br>First Name: " . $row['fname'];
            echo "<br>Surname: " . $row['sname'];
            echo "<br>Email: " . $row['email'];
            echo "<br>DOB: " . $row['dob'];
            echo "<br>Contact: 0" . $row['contact'];
            echo "<br>ID: ".$row['student_id'];
            echo "<form action='editDetails.php' method='POST'>";
            echo "<a href='editDetails.php'><button name='id' value='".$user_id."'>EDIT</button></a>";
            echo "</form>";
        }
    }
}