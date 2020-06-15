<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed!". mysqli_connect_error());
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel='stylesheet' type='text/css' href='style.css'>
    </head>
    <body>
        <div class="form">
            <h2 style="text-align: center;">View Products</h2>
            <table class="table">
                <thead>
                    <tr class="success">
                        <th><strong>No</strong></th>
                        <th><strong>ProductID</strong></th>
                        <th><strong>ProductName</strong></th>
                        <th><strong>PriceName</strong></th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $count = 1;
                  $sql = "SELECT * FROM baskets ORDER BY id asc;";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($result)) {?>
                    <tr class="info">
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['productID']; ?></td>
                        <?php
                        $sql2 ="SELECT name, price FROM products WHERE  id='".$row['productID']."'";
                        $result2 = $conn->query($sql2);
                        if ($result2->num_rows > 0) {
                        while($row = $result2->fetch_assoc()) {
                        $name = $row["name"];
                        $price = $row["price"];?>
                        <td><?php echo $row['name'] ;?></td>
                        <td><?php echo $row['price'] ;?></td>
                    </tr>
                  <?php $count++;} }}?>
                </tbody>
            </table>

    </body>
</html>


<?php
$sql3 ="SELECT productID from baskets WHERE id ='".$row['ID']."'";
$result2 = $conn->query($sql3);
while($row = mysqli_fetch_assoc($result)) {?>
<td><a href="delete.php?id=<?php echo $row["ID"]; }?>">Cancel</a></td>
