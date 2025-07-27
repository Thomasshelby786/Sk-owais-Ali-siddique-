<?php
$servername = "sql12.freesqldatabase.com";
$username = "sql12792201";
$password = "KRl28aDYUU";
$dbname = "sql12792201";
$port = 3306;

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
