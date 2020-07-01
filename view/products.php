<?php
session_start();
include "connection.php";
require_once('connectDB.php');
$database = new CreateDb("baskets");
$status = "";
if (isset($_POST['new']) && $_POST['new'] == 1 && (!$_SESSION['username'])) {
    header("location: loginuser.php");
}
if (isset($_POST['new']) && $_POST['new'] == 1 && ($_SESSION['username'])) {
    $data = array('productID'=>$_POST['id'], 'userID'=>$_SESSION['id'], 'quantity'=>$_POST['quantity']);
    $result = $database->insert($data);
    $status = "  New Product add to basket Successfully.";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php include "header.php";?>
    <title>Products</title>
</head>
<body>
<div class="container">
    <div class="container d-inline-block">
        <div class="row text-center py-5">
 <?php
    $database1 = new CreateDb("products");
     $result = $database1->selectData();
         while ($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="col-md-4">
                <form method="post" action="products.php?id=<?php echo $row["id"]; ?>">
                     <input type="hidden" name="new" value="1">
                    <input type="hidden" name="id" value="<?php echo $row["id"]?>">
                    <div class="card shadow">
                        <img src="<?php echo '../local/'.$row['image']; ?>" width="338" height="280" class="img-responsive">
                        <h2><?php echo $row["name"]; ?></h2>
                        <h5 class="text-secondary">$ <?php echo $row["price"]; ?></h5>
                        <h6 class="text-secondary"><?php echo $row["ram"]; ?> GB</h6>
                        <h6 style="color: yellowgreen";>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </h6>
                        <br>
                        <?php echo '<a class="btn btn-secondary" href="product.php?id=' . $row["id"] . '">Details</a>'; ?>
                        <br>
                        <p>
                            <input type="text" name="quantity" id="<?php echo $row["id"] ?>" value="0" />
                        </p>
                        <p>
                            <button type="button" value="Décrémenter" id="btnDecrement" onclick="decrementer(<?php echo $row["id"] ?>)" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button>
                            <button type="button" value="Incrémenter" id="btnIncrement" onclick="incrementer(<?php echo $row["id"] ?>)" class="btn bg-light border rounded-circle"><i class="fas fa-plus"></i></button>
                        </p>

                    <button type="submit" class="btn btn-warning my-3" name="add_to_cart">Add to Cart <i class="fas fa-shopping-cart"></i></button>

                    </div>
                </form>
            </div>
            <?php
    }
    ?>
        </div>
    </div>

    <?php include "footer.html"; ?>

                <script>
                    function incrementer(id){
                        var i = document.getElementById(id);
                        i.value++;
                    }

                    function decrementer(id){
                        var i = document.getElementById(id);
                        i.value--;
                    }
                </script>
</body>