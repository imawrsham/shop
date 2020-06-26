<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed!". mysqli_connect_error());
};?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--- Font Awesome--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php include "header.php";?>
    <title>Orders</title>
</head>
<body>
<div class="container">
    <div class="form">
        <h2 style="text-align:left;">View Products</h2>
        <a class="nav-link" href="../view/add.php"><h5>Create new Product</h5></a>
        <table class="table" style="text-align: center">
            <thead>
            <tr class="success">
                <th><strong>No.</strong></th>
                <th><strong>ProductName</strong></th>
                <th><strong>edit</strong></th>
                <th><strong>delete</strong></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            $sql = "SELECT * FROM products ORDER BY id asc;";
            $result = mysqli_query($conn, $sql);
            $total_price = 0;
            while($row = mysqli_fetch_assoc($result)) {?>
                <td><?php echo $count; ?>.</td>
                <td><?php echo $row['name'] ?></td>

                        </tr>
                        <?php
                        $count++;};?>

            </tbody>
        </table>