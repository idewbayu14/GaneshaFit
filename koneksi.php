<?php

$localhost = "localhost";
$username = 'root';
$password = '';
$db = 'ganeshafit';

$conn = mysqli_connect($localhost, $username, $password, $db);


if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}
?>