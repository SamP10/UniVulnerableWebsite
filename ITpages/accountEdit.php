<?php
include 'navBar.php';
include_once "init.php";
if(!isset($_SESSION['loggedin']) && $_SESSION['priv_id']!=1){
    header("Location: login.php");
}
$id=$_POST['id'];
$sql="SELECT * FROM useraccounts WHERE id=$id";
$result=mysqli_query($connect, $sql) or die (mysqli_error());
while($row=mysqli_fetch_array($result)){
    echo"<form action='' method='POST'>";
    echo"Username: <input name='username' value='".$row['username']."'>";
    echo"Email: <input name='email' value='".$row['email']."'>";
    echo"User Privilege: <input name='priv_id' value='".$row['priv_id']."'>";
    echo"User ID: <input name='user_id' value='".$row['user_id']."'>";
    echo "<input type='hidden' name='id' value='".$id."'>";
    echo "<button type='submit' name='updateA'>UPDATE</button>";
    echo"</form>";
}
echo"<h1>Password Change</h1>";
echo"<form action='' method='post'>";
echo"NEW PASSWORD: <input name='newPassword' type='password'>";
echo"CONFIRM PASSWORD: <input name='confPassword' type='password'>";
echo "<input type='hidden' name='id' value='".$id."'>";
echo"<button type='submit' name='updateP'>UPDATE</button>";
echo"</form>";

if(isset($_POST['updateP'])) {
    if (!empty($_POST['newPassword']) && !empty($_POST['confPassword'])) {
        $newpassword = $_POST['newPassword'];
        $confPassword = $_POST['confPassword'];

        if ($newpassword == $confPassword) {
            $hashedPassword = crypt($newpassword, gGouwXKp);
            $update = "UPDATE useraccounts SET password='$hashedPassword' WHERE user_id=$id";
            mysqli_query($connect, $update);
            header("Location: accountSearch.php");
        } else {
            echo "Passwords do not match!";
        }
    } else {
        echo "Password cannot be empty";
    }
}elseif(isset($_POST['updateA'])){
    if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['priv_id']) && !empty($_POST['id'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $priv_id=$_POST['priv_id'];
        $user_id=$_POST['user_id'];
        $sql="UPDATE useraccounts SET username='$username', email='$email', priv_id='$priv_id', user_id='$user_id' WHERE id=$id ";
        mysqli_query($connect, $sql);
        header("Location: accountSearch.php");
    }
}
?>
