<?php
include "connection.php";
require_once('connectDB.php');
$database1 = new CreateDb("costumers");
$database2 = new CreateDb("orders");
$database3 = new CreateDb("baskets");
$database4 = new CreateDb("products");
$database5 = new CreateDb("order_items");
if (isset($_POST['new']) && $_POST['new'] == 1) {
    $data = array('firstname'=>$_REQUEST['firstname'], 'lastname'=>$_REQUEST['lastname'], 'email'=>$_REQUEST['email'], 'address'=>$_REQUEST['address']);
    $result = $database1->insert($data);
    $costumer_id = 0;
    if (mysqli_query($conn, $sql)) {
        $costumer_id = mysqli_insert_id($conn);
    } else {
        mysqli_error($conn);
    }
    if ($costumer_id > 0) {
        $t = date("h:i:s");
        $data = array('costumerid'=>$costumer_id, 'ordertime'=>$t);
        $result2 = $database2->insert($data);
        $order_id = 0;
        if (mysqli_query($conn, $sql)) {
            $order_id = mysqli_insert_id($conn);
        }
        if ($order_id > 0) {

            $result3 = $database3->selectData();
                while ($row = mysqli_fetch_assoc($result3)) {
                    $result4 = $database4->selectData();
                        $row1 = mysqli_fetch_assoc($result4);
                    $data = array('orderid'=>$order_id, 'quantity'=>$row['quantity'], 'productname'=>$row1['name'], 'productprice'=>$row1['price']);
                    $result = $database1->insert($data);
                            $sql5 = "DELETE FROM baskets";
                            $result5 = mysqli_query($conn, $sql5);
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
