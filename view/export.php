<?php
session_start();
include "connection.php";
if(isset($_SESSION['username'])){
    $id = $_SESSION['id'];
    //var_dump($id);
    $allData ="";
    //$sql = "SELECT * FROM userorder_items";
    //$result = mysqli_query($conn, $sql);
    //var_dump($sql);
    $sql1 = "SELECT id FROM userorders WHERE userid='" . $id . "'";
    $result2 = mysqli_query($conn, $sql1);
    //$row2 = mysqli_fetch_assoc($result2);
    //var_dump($sql1);
    //var_dump($result2);
    while ($row2 = mysqli_fetch_assoc($result2)) {
    $sql = "SELECT * FROM userorder_items where userorderid= '".$row2['id']."'";
    //var_dump($sql);
    $result = mysqli_query($conn, $sql);
   // var_dump($result2);
    while($data = mysqli_fetch_assoc($result)) {
        $allData .=$data['userorderid'].',' .$data['productname'].',' .$data['quantity'].','.$data['productprice']."\n";
        $response = "data:text/csv;charset=utf-8,Orderid,Name,Quantity,Price\n";
        $response .=$allData;
        //echo '<a href="'.$response.'" download="export.csv">Download</a>';
    }}
    echo '<a href="'.$response.'" download="export.csv">Download</a><br/>';
    echo "<a href='homeuser.php'>back</a><br/><br/>";
}
    ?>