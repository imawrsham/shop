<?php
session_start();
include "connection.php";
if(isset($_SESSION['username'])){
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <?php include "header.php";?>
        <title>Orders</title>
    </head>
<body>
<div class="container">
    <div class="form">
    <h2 style="text-align:left;">View Orders</h2>
    <table class="table" style="text-align: center">
        <thead>
        <tr class="success">
            <th><strong>No.</strong></th>
            <th><strong>Orderid</strong></th>
            <th><strong>Orderdate</strong></th>
            <th><strong>Details</strong></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $count = 1;
        $id = $_SESSION['id'];
        $sql1 = "SELECT * FROM userorders WHERE userid='" . $id . "'";
        $result2 = mysqli_query($conn, $sql1);
        while($row = mysqli_fetch_assoc($result2)) {?>
            <td><?php echo $count; ?>.</td>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['ordertime'];?></td>
            <td><a class="nav-link" href="Details.php?id=<?php echo $row["id"]; ?>">Details</a></td>
            </tr>
            <?php
            $count++;};?>

        </tbody>
    </table>
    <?php
    echo "<a href='homeuser.php'><input type='button' name='back' value='back'></a><br/><br/>";
    echo "<a href='export.php'><input type='button' name='export' value='export'></a>";
}else{
    echo "<script>location.href='loginuser.php'</script>";
}?>