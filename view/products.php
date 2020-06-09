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
<!doctype html>
<html lang="en">

<title>Products</title>
<div class="container">
    <div class="container d-inline-block">
        <div class="row text-center py-5">
    <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'test';

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Connection Failed!". mysqli_connect_error());
    }
    if (isset($_POST['new']) && $_POST['new'] == 1) {
        $id = $_POST['id'];
        $sql2 = "INSERT INTO baskets (`productID`) VALUES (".$id.")";
        $result2 = $conn->query($sql2);
    }

    $sql = "SELECT id, name, price, ram, image  FROM products";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $name = $row["name"];
            $price = $row["price"];
            $ram = $row["ram"];
            ?>

            <div class="col-md-4">
                <form method="post" action="products.php?id=<?php echo $row["id"]; ?>">
                     <input type="hidden" name="new" value="1">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <div class="card shadow">
                        <img src="<?php echo $row["image"]; ?>" width="338" height="280" class="img-responsive">

                        <h5 class="text-info"><?php echo $name; ?></h5>
                        <h5 class="text-danger"><?php echo $price.' Euro'; ?></h5>
                        <h4 class="text-danger"><?php echo $ram.' Gb'; ?></h4>
                        <h6 class="text-danger"><?php echo '<a href="product.php?id='.$id.'">Details</a>'; ?></h6>

                        <button type="submit" class="btn btn-warning my-3" name="add">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                    </div>
                </form>
            </div>
            <?php
        }
    }
    ?>
        </div>
    </div>

    <?php include "footer.html"; ?>
</body>