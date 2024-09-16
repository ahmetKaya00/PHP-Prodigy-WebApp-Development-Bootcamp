<?php
$server_name = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";

$conn = mysqli_connect($server_name,$username,$password,$dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>