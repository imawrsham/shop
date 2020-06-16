<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--- Font Awesome--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php include "header.php";?>
    <title>HomePage</title>
</head>
<style>
    body, html {
        height: 90%;
    }
    .bg {
        /* The image used */
        background-image: url("3.jpg");

        /* Half height */
        height: 60%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<body>
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed!". mysqli_connect_error());}
?>
<div class="bg"></div>
<div class="container">
    <div class="text-center">
    <h1 class="py-5 text-center">Unsere <br> Beste Produkt</h1>
<?php
$sql = "SELECT id, name, price, ram, image  FROM products where id = 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$id = $row["id"];
$name = $row["name"];
$price = $row["price"];
$ram = $row["ram"];
?>
    <form method="post" action="product.php?id=<?php echo $row["id"]; ?>">
        <input type="hidden" name="new" value="1">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <div class="card shadow">
            <img class="rounded mx-auto d-block" src="<?php echo $row["image"]; ?>" width="245" height="230" class="img-responsive">
            <h5 class="text-info"><?php echo $name; ?></h5>
            <h5 class="text-danger"><?php echo $price.' Euro'; ?></h5>
            <h4 class="text-danger"><?php echo $ram.' Gb'; ?></h4>
            <h6 class="text-danger"><?php echo '<a href="product.php?id=' . $id . '">Details</a>'; ?></h6>
            <?php
        }
    }
            ?>
        </div>
    </form>

<?php include "footer.html";?>
    </div>
</div>
</body>
</html>