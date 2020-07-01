<?php
session_start();
include "connection.php";
require_once('connectDB.php');
$database = new CreateDb("products");
if(isset($_SESSION['username'])){
?>
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
    <title>Userlist</title>
</head>
<body>
<div class="container">
    <div class="form">
        <h2 style="text-align: center;">View Orders</h2>
        <a href='homeuser.php'><input type='button' name='back' value='back'></a>
        <a href="logoutuser.php"><input type='button' name='Logout' value='Logout'></a>
        <table class="table" style="text-align: center">
            <thead>
            <tr class="success">
                <th><strong>No.</strong></th>
                <th><strong>Cancel</strong></th>
                <th><strong>Quantity</strong></th>
                <th><strong>ProductName</strong></th>
                <th><strong>Price</strong></th>
                <th><strong>Total Price</strong></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
            $id2 = $_SESSION['id'];
            $sql = "SELECT * FROM baskets where userID= ".$id2.";";
            $result = mysqli_query($conn, $sql);
            $total_price = 0;
            while($row = mysqli_fetch_assoc($result)) {?>
                <td><?php echo $count; ?>.</td>
                <td><a class="nav-link" href="delete.php?id=<?php echo $row["ID"]; ?>"><i class="fa fa-trash"></i></a></td>
                <td><?php echo $row['quantity']; ?></td>
                <?php
                $data = array('id'=>$row['productID']);
                $result2 = $database->getData($data);
                    while($row2 = $result2->fetch_assoc()) {
                        $name = $row2["name"];
                        $price = $row2["price"];?>
                        <td><?php echo $row2['name'] ;?></td>
                        <td>$ <?php echo $row2['price'] ;?></td>
                        <?php  $total = ($row["quantity"] * $row2["price"]); ?>
                        <td>$ <?php echo $total?> </td>
                        </tr>
                        <?php
                        $total_price += ($row["quantity"] * $row2["price"]);
                        $count++;}};?>
            <hr class="mb-4">
            </tbody>
        </table>
        <?php echo"<h5 style='text-align: right'>Total Price: $ ".$total_price."</h5>";?>
        <form name="form" method="post" action="success2.php" novalidate>
            <input type="hidden" name="new" value="1">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </form>
        <?php
        }else{
            echo "<script>location.href='loginuser.php'</script>";
        }?>
