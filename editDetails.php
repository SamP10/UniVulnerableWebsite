<?php
include_once "init.php";
if(isset($_SESSION['loggedin'])){
    echo "<h1>Edit Details </h1>";
    $id = $_POST['id'];
    if ($_SESSION['priv_id'] == 1 || $_SESSION['priv_id'] == 2) {
        $sql = "SELECT * FROM staff WHERE staff_id='$id'";
        $result = mysqli_query($connect, $sql) or die(mysqli_error());
        while ($row = mysqli_fetch_array($result)) {
            echo "<form action='' method='POST'>";
            echo "<br>Contact: <input name='contact' value='0" . $row['contact']."'>";
            echo "<br>National Insurance: <input name='ni_number' value='".$row['ni_number']."'>";
            echo "<br>Address: <input name='address' value='".$row['address']."'>";
            echo "<button type='submit' name='updateD'>UPDATE DETAILS</button>";
            echo "</form>";
        }
        //Password change
        $sql = "SELECT password FROM useraccounts WHERE user_id='$id'";
        $passwd= mysqli_query($connect, $sql);

        echo"<h1>Password Change</h1>";
        echo"<form action='' method='post'>";
        echo"NEW PASSWORD: <input name='newPassword' type='password'>";
        echo"CONFIRM PASSWORD: <input name='confPassword' type='password'>";
        echo"<button type='submit' name='updateP'>UPDATE PASSWORD</button>";
        echo"</form>";
    } elseif ($_SESSION['priv_id'] == 3) {
        $sql = "SELECT * FROM students WHERE student_id='$id'";
        $result = mysqli_query($connect, $sql) or die(mysqli_error());
        while ($row = mysqli_fetch_array($result)) {
            echo "<br>Contact: <input name='contact' value='0" . $row['contact']."'>";
            echo "<br>Address: <input name='address' value='".$row['address']."'>";

        }
        echo"<h1>Password Change</h1>";
        echo"<form action='' method='post'>";
        echo"NEW PASSWORD: <input name='newPassword' type='password'>";
        echo"CONFIRM PASSWORD: <input name='confPassword' type='password'>";
        echo"<button type='submit' name='update'>UPDATE</button>";
        echo"</form>";
    }
    if(isset($_POST['updateD'])){
        if($_SESSION['priv_id'] == 1 || $_SESSION['priv_id'] == 2){
            if(!empty($_POST['contact']) && !empty($_POST['address']) && !empty($_POST['ni_number'])){
            //Initialize Data to update
            $contact=$_POST['contact'];
            $ni_number=$_POST['ni_number'];
            $address=$_POST['address'];
            $sql="UPDATE staff SET (contact=$contact, address=$address, ni_number=$ni_number) WHERE staff_id=$id";
            $run=mysqli_query($connect, $sql);
            header("Location: accountDetails.php");
            }else{
                echo"Please fill all fields";
            }

        }elseif ($_SESSION['priv_id'] == 3){
            if(!empty($_POST['contact']) && !empty($_POST['address'])){
                //Initialize Data to update
                $contact=$_POST['contact'];
                $address=$_POST['address'];
                $sql="UPDATE student SET (contact=$contact, address=$address) WHERE (student_id=$id)";
                $run=mysqli_query($connect, $sql);
                header("Location: accountDetails.php");
            }else{
                echo"Please fill all fields";
            }

        }
        }

    }elseif (isset($_POST['updateP'])){
        $sql = "SELECT password FROM useraccounts WHERE user_id='$id'";
        $result = mysqli_query($connect, $sql) or die(mysqli_error());
        if(!empty($_POST['newPassword']) && !empty($_POST['confPassword'])){
            $newpassword=$_POST['newPassword'];
            $confPassword=$_POST['confPassword'];
            if($newpassword==$confPassword){
                $hashedPassword=crypt($newpassword, gGouwXKp);
                $update="UPDATE useraccounts SET password='$hashedPassword' WHERE user_id='$id'";
                $run=mysqli_query($connect, $update);
                header("Location: accountDetails.php");
            }else{
                echo "Passwords do not match!";
            }
        }


}