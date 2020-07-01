<?php
session_start();
include "connection.php";
require_once('../rest/connectDB.php');
$database = new CreateDb("user");
$sql = "SELECT * FROM user WHERE email='" . $_POST['email'] . "'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if($num > 0){
    echo "Username already taken";
}else{
    $data = array('name'=>$_POST['user'], 'password'=>$_POST['password'], 'email'=>$_POST['email']);
    $result = $database->insert($data);
    echo "Registration Successfully!";
    header('location:loginuser.php');
}
