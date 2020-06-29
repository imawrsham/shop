<?php
include "connection.php";
$sql = "DELETE FROM baskets WHERE id='".$_REQUEST['id']."'";
$result = mysqli_query($conn, $sql) or die ( mysqli_error());
header("Location: userlist.php");
?>