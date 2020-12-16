<?php
$servername = "vulnweb-db.cu9ebuznnyd1.us-east-1.rds.amazonaws.com";
$username = "myvulnweb";
$password = "******";
$dbname = "myvulnweb";

$conn=  mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Cannot connect to the database due to" . mysqli_connect_error());
}
?>