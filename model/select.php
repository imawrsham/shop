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
    <title>View Products</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
<div class="form">
    <h2 style="text-align: center;">View Products</h2>
    <table class="table">
        <thead>
        <tr class="success">
            <th><strong>No</strong></th>
            <th><strong>Name</strong></th>
            <th><strong>Price</strong></th>
            <th><strong>Ram</strong></th>
            <th><strong>Select</strong></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $count = 1;
        $sql = "SELECT * FROM products ORDER BY id asc;";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {?>
            <tr class="info">
                <td align="center"><?php echo $count; ?></td>
                <td align="center"><?php echo $row['name']; ?></td>
                <td align="center"><?php echo $row["price"]; ?></td>
                <td align="center"><?php echo $row["ram"]; ?></td>
                <td align="center">
                    <a href="edit.php?id=<?php echo $row["id"]; ?>">Select</a>
                </td>
            </tr>
            <?php $count++;} ?>
        </tbody>
    </table>
</body>
</html>
