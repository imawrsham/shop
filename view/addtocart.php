<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed!". mysqli_connect_error());
}
else{
    echo "ok";
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
    <?php
}
}
?>

<?php
if (isset($_POST['id']) == 1) {
    $id = $_GET[$row['id']];
    $sql = "INSERT INTO baskets ('id') VALUES
        ('$id')";
}
?>