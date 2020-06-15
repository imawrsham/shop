<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed!". mysqli_connect_error());
}
$sql = "CREATE TABLE orders (
    id int(10) AUTO_INCREMENT PRIMARY KEY,
    basketid int NOT NULL,
    costumerid int NOT NULL
    )";
$sql3 = "ALTER TABLE orders ADD FOREIGN KEY (basketid) REFERENCES baskets(ID)";


if(mysqli_query($conn, $sql)){
    echo "Table Products created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);


