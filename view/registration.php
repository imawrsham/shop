<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed!". mysqli_connect_error());
}
$name = $_POST['user'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM user WHERE email='" . $email . "'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if($num > 0){
    echo "Username already taken";
}else{
    $sql2 = "INSERT INTO user 
        (`name`, `password`,`email`) VALUES
        ('$name', '$password','$email')";
    $result2= mysqli_query($conn, $sql2);
    echo "Registration Successfully!";
    header('location:loginuser.php');
}
