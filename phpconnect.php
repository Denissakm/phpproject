<?php
session_start();
$servername = "127.0.0.1:49635";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "localdb";

$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

