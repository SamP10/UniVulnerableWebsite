<?php
session_start();
//Setting up database access credentials
$host='localhost';
$user='admin';
$password='tiaspbiqe2r';
$dbname='university';
//Database Connection with exit message upon error
$connect = mysqli_connect($host, $user, $password, $dbname) or exit("Unable to connect to database!");
?>