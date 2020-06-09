<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <!--- Font Awesome--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php include "header.php";?>
</head>
<body>
<!doctype html>
<html lang="en">

<title>Products</title>
<div class="container">
    <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'test';

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Connection Failed!". mysqli_connect_error());
    }

    $sql = "SELECT id, name, price, ram, image  FROM products WHERE Id";
    $result = $conn->query($sql);
    if(mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {

            ?>
    <div class="container">
        <div class="row text-center py-5">
            <div class="col-md-3">

                <form method="post" action="product3.php?action=add&id=<?php echo $row["id"]; ?>">
                    <div class="card shadow">
                        <img src="<?php echo $row["image"]; ?>" width="200" height="200" class="img-responsive">
                        <h5 class="text-info"><?php echo $row["name"]; ?></h5>
                        <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                        <!--<input type="text" name="quantity" class="form-control" value="1">-->
                        <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                        <button type="submit" class="btn btn-warning my-3" name="add">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
            <?php
        }
    }
    ?>



</body>
<footer>
    <?php include "footer.html"; ?>
</footer>
