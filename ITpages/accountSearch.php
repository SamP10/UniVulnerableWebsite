<?php
include_once "init.php";
if(!isset($_SESSION['loggedin']) && $_SESSION['priv_id']!=1){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
<h1>User Account Edit</h1>
<h2>Search user account</h2>
<form action="" method="POST">
    Username:<input name="username"><br>
    Email:<input name="email"><br>
    Privilege Level:<input name="priv_id"><br>
    User ID:<input name="user_id"><br>
    <button type="submit" name="submit">Submit</button>
</form>
<br><br>
<?php
if(isset($_POST['submit'])){

    $fields=array('username', 'email', 'priv_id', 'user_id');
    $conditions=array();

    foreach($fields as $field){
        if(isset($_POST[$field]) && $_POST[$field] != ''){
            $conditions[]="$field LIKE '%" . $_POST[$field] . "%'";
        }
    }

    $query = "SELECT * FROM useraccounts ";
    if(count($conditions) > 0){
        $query .= "WHERE " . implode(' AND ', $conditions);
    }
    $result = mysqli_query($connect, $query) or die(mysqli_error());


    while($row=mysqli_fetch_array($result)){
        echo"Username: ".$row['username'];
        echo"<br>Email: ".$row['email'];
        echo"<br>Privilege: ".$row['priv_id'];
        echo"<br>User ID: ".$row['user_id'];
        echo"<form action='accountEdit.php' method='POST'>";
        echo'<button name="id" value="'.$row['id'].'" type="submit">EDIT</button>';
        echo"</form>";
        echo"<br><br>";
    }
}
?>
</body>
</html>
