<?php
include_once 'init.php'
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
 <div class="nav">
     <div class="navbar">
         <img class="navbar-brand" height="100" src="logo.png">
         <?php
         if($_SESSION['loggedin'] && $_SESSION['priv_id']==1){
             echo "<a class='nav-item' href='ITpages/accountSearch.php'>Account Search</a>";
         }elseif($_SESSION['loggedin'] && $_SESSION['priv_id']==2){
             echo "<a class='nav-item' href='/StaffPages/studentLookup.php'>Student Lookup</a>";
             echo "<a class='nav-item' href='modules.php'>Course</a>";
         }elseif($_SESSION['loggedin'] && $_SESSION['priv_id']==3){
             echo "<a class='nav-item' href='modules.php'>Course</a>";

         }

         ?>

         <a class="nav-item" href="accountDetails.php">My Account</a>
         <a class="nav-item" href="logout.php">Logout</a>


     </div>
 </div>
</body>
<footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</footer>
</html>
