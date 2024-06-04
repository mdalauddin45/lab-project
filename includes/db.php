<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "project_db";

$conn = new mysqli($servername, $username, $password);
// $sql = "CREATE DATABASE project_db";
// $sql = "create table users(id int AUTO_INCREMENT PRIMARY KEY, fullname varchar(55), username varchar(55),email varchar(55),password varchar(55),gender varchar(50))";

// if($conn->query($sql)==true){
//     echo "created";
// }
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>