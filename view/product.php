<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<head>
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
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $name = $row["name"];
            $price = $row["price"];
            $ram = $row["ram"];
            echo "<div class = 'row'><img src='../".$row["image"]."'  width=\"200\" height=\"200\" />";
            echo '<a href="product.php?id='.$id.'"><br>Model: '.$name.'</a>';
            echo "<br>";
            echo '<a href="product.php?id='.$id.'"><br><br><br>Price: '.$price.'</a>';
            echo "<br>";
            echo '<a href="product.php?id='.$id.'"><br><br><br><br><br>Ram:'.$ram.'</a>';
            echo "<br></div>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</div>
</body>
<footer>
    <?php include "footer.html"; ?>
</footer>
