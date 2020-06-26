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
if(isset($_SESSION['username'])){
    $id = $_SESSION['id'];
    //var_dump($id);
    $allData ="";
    $sql = "SELECT * FROM userorder_items";
    $result = mysqli_query($conn, $sql);
    //var_dump($sql);
    //$sql1 = "SELECT id FROM userorders WHERE id='" . $id . "'";
   // $result2 = mysqli_query($conn, $sql1);
    //$row2 = mysqli_fetch_assoc($result2);
    //var_dump($sql1);
    //$sql = "SELECT * FROM userorder_items where userorderid= '".$row2['id']."'";
    //var_dump($sql);
    //$result = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_assoc($result)) {
        $allData .= $data['productname'].','.$data['productprice']."\n";
        $response = "data:text/csv;charset=utf-8,Name,Price\n";
        $response .=$allData;

    }
    echo '<a href="'.$response.'" download="export.csv">Download</a>';
}
    ?>