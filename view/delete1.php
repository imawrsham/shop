<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection Failed!" . mysqli_connect_error());
}
$sql = "DELETE FROM products WHERE id='" . $_REQUEST['id'] . "'";
var_dump($sql);
$result = mysqli_query($conn, $sql) or die (mysqli_error());
var_dump($result);
header("Location: productlist.php");

