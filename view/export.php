<?php
session_start();
include "connection.php";
if(isset($_SESSION['username'])){
    $id = $_SESSION['id'];
    $allData ="";
    $sql1 = "SELECT id FROM userorders WHERE userid='" . $id . "'";
    $result2 = mysqli_query($conn, $sql1);
    while ($row2 = mysqli_fetch_assoc($result2)) {
    $sql = "SELECT * FROM userorder_items where userorderid= '".$row2['id']."'";
    $result = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_assoc($result)) {
        $allData .=$data['userorderid'].',' .$data['productname'].',' .$data['quantity'].','.$data['productprice']."\n";
        $response = "data:text/csv;charset=utf-8,Orderid,Name,Quantity,Price\n";
        $response .=$allData;
    }}
    echo '<a href="'.$response.'" download="export.csv">Download</a><br/>';
    echo "<a href='homeuser.php'>back</a><br/><br/>";
}
    ?>