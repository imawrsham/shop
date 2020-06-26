<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed!". mysqli_connect_error());
}
$sql = "DELETE FROM baskets WHERE id='".$_REQUEST['id']."'";
$result = mysqli_query($conn, $sql) or die ( mysqli_error());
header("Location: userlist.php");
?>