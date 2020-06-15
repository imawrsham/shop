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
//$sql5 = "DELETE * FROM baskets WHERE id='".$row['ID']."'";
//$sql5 = "DELETE * FROM baskets WHERE id='".$_POST['new']."'";
//$result5  = mysqli_query($conn,$sql5);
header("Location: costumer.php");
?>