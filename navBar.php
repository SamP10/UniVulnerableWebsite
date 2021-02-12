<?php
include_once 'init.php'
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="layout.css">
</head>
<body>
 <div class="nav">
     <div class="navbar">
         <img class="navbar-brand" height="100" src="logo.png">
         <?php
         if(isset($_SESSION['loggedin'])) {
             echo '<button class="nav-item" id="homepage">Home</button>';
             if ($_SESSION['loggedin'] && $_SESSION['priv_id'] == 1) {
                 echo "<button class='nav-item d-inline' id='accSearch'>Account Search</button>";
             } elseif ($_SESSION['loggedin'] && $_SESSION['priv_id'] == 2) {
                 echo "<button class='nav-item d-inline' id='stuLook'>Student Lookup</button>";
                 echo "<button class='nav-item' id='modules'>Course</button>";
             } elseif ($_SESSION['loggedin'] && $_SESSION['priv_id'] == 3) {
                 echo "<button class='nav-item' id='modules'>Course</button>";

             }

             echo '<button class="nav-item" id="accountDetails">My Account</button>';
             echo '<button class="nav-item" id="logout">Logout</button>';
         }else{
             echo '<button class="nav-item" id="login">Login</button>';
         }
         ?>

     </div>
 </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script type="text/javascript">
        document.getElementById("modules").onclick = function () {
            location.href = "modules.php";
        };
    </script>
    <script type="text/javascript">
        document.getElementById("stuLook").onclick = function () {
            location.href = "studentLookup.php";
        };
      </script>
    <script>
        document.getElementById("accSearch").onclick = function () {
            location.href = "accountSearch.php";
        };
    </script>
    <script>
        document.getElementById("accountDetails").onclick = function () {
            location.href = "accountDetails.php";
        };
    </script>
    <script>
        document.getElementById("logout").onclick = function () {
            location.href = "logout.php";
        };
    </script>
    <script>
        document.getElementById("login").onclick = function () {
            location.href = "login.php";
        };
    </script>
    <script>
         document.getElementById("homepage").onclick = function () {
            location.href = "homepage.php";
        };
    </script>