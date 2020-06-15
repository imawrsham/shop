<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection Failed!" . mysqli_connect_error());
};
if (isset($_POST['new']) && $_POST['new'] == 1) {
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];
    $sql = "INSERT INTO costumers 
        (`firstname`, `lastname`, `email`, `address`) VALUES
        ('$firstname', '$lastname', '$email', '$address')";
    $costumer_id = 0;
    if (mysqli_query($conn, $sql)) {
        $costumer_id = mysqli_insert_id($conn);
    } else {
        mysqli_error($conn);
    }
    if ($costumer_id > 0) {
        $t = date("h:i:s");
        //$sql2 = "INSERT INTO orders (`costumerid`,`ordertime`) VALUES (".$costumer_id.",".$t.")";
        $sql2 = "INSERT INTO orders
        (`costumerid`, `ordertime`) VALUES
        ('$costumer_id', '$t')";
         //var_dump($sql2);
        //$sql2 = "INSERT INTO orders (`costumerid`) VALUES (" . $costumer_id . ")";
        $order_id = 0;
        if (mysqli_query($conn, $sql2)) {
            $order_id = mysqli_insert_id($conn);
        }
        if ($order_id > 0) {
            $sql4 = "SELECT * FROM baskets";
            $result4 = mysqli_query($conn, $sql4);
            if ($result4->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result4)) {
                    $sql6 = "SELECT name, price FROM products WHERE id='" . $row['productID'] . "'";
                    $result6 = mysqli_query($conn, $sql6);
                    //var_dump($result6);
                    if ($result6->num_rows > 0) {
                        $row1 = mysqli_fetch_assoc($result6);
                        $product_name = $row1['name'];
                        $product_price = $row1['price'];
                        //var_dump($product_price);
                        $sql3 = "INSERT INTO order_items 
                         (`orderid`, `productname`, `productprice`) VALUES
                         ('$order_id', '$product_name', '$product_price')";
                        //$sql3 = "INSERT INTO order_items (`orderid`,`productname`,`productprice`) VALUES (".$order_id.",".$product_name.",".$product_price.")";
                        //$result3 = mysqli_query($conn, $sql3);
                        //var_dump($result3);
                        if (mysqli_query($conn, $sql3)) {
                            $sql5 = "DELETE FROM baskets";
                            $result5 = mysqli_query($conn, $sql5);
                            //var_dump($result5);

                        }
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
    <!--- Font Awesome--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php include "header.php";?>
</head>
<body>
<div class="container">
    <h4 style="color: darkcyan">Your order was successfully added to your cart.</h4>
    <h4 style="color: darkcyan">Thank you very much for your shopping. We hope you enjoyed your purchase. </h4>
    <?php include "footer.html"; ?>
</div>
</body>
</html>
