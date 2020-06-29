<?php
session_start();
include "connection.php";
$id = $_POST['id'];
$name = $_POST['user'];
$password = $_POST['password'];
$sql = "SELECT * FROM user WHERE name='" . $name . "' && password='" . $password . "'  ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$num = mysqli_num_rows($result);
if($num > 0){
    $_SESSION['username'] = $name;
    $_SESSION['id'] =$row['id'];
    header("location: homeuser.php");
}else{
    header("location: loginuser.php");
}?>
