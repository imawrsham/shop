<?php
session_start();
include "connection.php";
if (isset($_POST['new']) && $_POST['new'] == 1 && ($_SESSION['username'])) {
    $id = $_SESSION['id'];
    $t = date("Y-m-d h:i:s");
    $sql2 = "INSERT INTO userorders
        (`userid`, `ordertime`) VALUES
        ('$id', '$t')";
    $result7 = mysqli_query($conn, $sql2);
    $costumer_id = 0;
    $costumer_id = mysqli_insert_id($conn);
    if (isset($id)) {
        $sql4 = "SELECT * FROM baskets where userID = '".$id."'";
        $result4 = mysqli_query($conn, $sql4);
        if ($result4->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result4)) {
                $quantity = $row['quantity'];
                $sql6 = "SELECT name, price FROM products WHERE id='" . $row['productID'] . "'";
                $sql7 = "SELECT id FROM userorders WHERE userid='" . $id . "'";
                $result6 = mysqli_query($conn, $sql6);
                $result7 = mysqli_query($conn, $sql7);
                $row2 = mysqli_fetch_assoc($result7);
                if ($result6->num_rows > 0) {
                    $row1 = mysqli_fetch_assoc($result6);
                    $product_name = $row1['name'];
                    $product_price = $row1['price'];
                    $order_id = $row2['id'];
                    $sql3 = "INSERT INTO userorder_items 
                         (`userorderid`, `quantity`, `productname`, `productprice`) VALUES
                         ('$costumer_id', '$quantity', '$product_name', '$product_price')";
                    if (mysqli_query($conn, $sql3)) {
                        $sql5 = "DELETE FROM baskets where userID = '".$id."'";
                        $result5 = mysqli_query($conn, $sql5);
                    }
                }
            }

        }
    }

}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php include "header.php";?>
</head>
<body>
<div class="container">
    <h4 style="color: darkcyan">Your order was successfully added to your cart.</h4>
    <h4 style="color: darkcyan">Thank you very much for your shopping. We hope you enjoyed your purchase. </h4>
    <a href='homeuser.php'><input type='button' name='back' value='back'></a>
    <h4><a href="logoutuser.php" style="color: crimson;">Logout</a></h4>
    <?php include "footer.html"; ?>
</div>
</body>
</html>
