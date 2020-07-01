<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php include "header.php";
    require_once('connectDB.php');
    $database = new CreateDb("products");?>
    ?>
    <title>HomePage</title>
</head>
<style>
    body, html {
        height: 80%;
    }
    .bg {
        background-image: url("../local/3.jpg");

        height: 100%;

        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<body>
<div class="bg"></div>
<div class="container">
    <div class="text-center">
    <h1 class="py-5 text-center">Unsere <br> Beste Produkt</h1>
<?php
    $data = array('id'=>'31');
    $result = $database->getData($data);
        while ($row = mysqli_fetch_assoc($result)){
?>
    <form method="post" action="product.php?id=<?php echo $row["id"]; ?>">
        <input type="hidden" name="new" value="1">
        <input type="hidden" name="id" value="<?php echo $row["id"]?>">
        <div class="card shadow bg-light">
            <img class="rounded mx-auto d-block" src="<?php echo '../local/'.$row['image']; ?>" width="245" height="230" class="img-responsive">
            <h2><?php echo $row["name"]; ?></h2><br>
            <h5 class="text-secondary">$ <?php echo $row["price"]; ?></h5>
            <h5 class="text-secondary"><?php echo $row["ram"]; ?> GB</h5>
            <h6 style="color: yellowgreen";>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </h6>
            <?php echo '<a class="btn btn-secondary" href="product.php?id=' . $row['id'] . '">Details</a>'; ?>
            <?php
    }
            ?>
        </div>
    </form>

<?php include "footer.html";?>
    </div>
</div>
</body>
</html>