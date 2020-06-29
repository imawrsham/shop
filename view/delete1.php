<?php
include "connection.php";
$sql = "DELETE FROM products WHERE id='" . $_REQUEST['id'] . "'";
var_dump($sql);
$result = mysqli_query($conn, $sql) or die (mysqli_error());
var_dump($result);
header("Location: productlist.php");

