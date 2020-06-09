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
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed!". mysqli_connect_error());}
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM products WHERE id='".$id."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $name = $row["name"];
        $price = $row["price"];
        $ram = $row["ram"];
        $desc = $row["description"];
        ?>
        <div class="container">
            <div class="row text-center ">
                <div class="col-md-3">
                    <form method="post" action="product.php?id=<?php echo $row["id"]; ?>">
                        <div class="card shadow">
                            <img src="<?php echo $row["image"]; ?>" width="245" height="230" class="img-responsive">
                            <h5 class="text-info"><?php echo $name; ?></h5>
                            <h5 class="text-danger"><?php echo $price.' Euro'; ?></h5>
                            <h4 class="text-danger"><?php echo $ram.' Gb'; ?></h4>
                            <h5 class="text-info"><?php echo $desc; ?></h5>
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
