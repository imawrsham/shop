<?php
session_start();
if(!$_SESSION['username']){
    header('location: loginuser.php');
}
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
<h1>Welcome <?php echo $_SESSION['username']; ?></h1>
    <a href="homepage.php">Homepage</a><br/>
    <a href="userorders_list.php">Orderslist</a><br/>
    <a href="logoutuser.php">Logout</a>
</div>
</body>
