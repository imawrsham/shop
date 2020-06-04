<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed!". mysqli_connect_error());
}
$sql = "CREATE TABLE products (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    price VARCHAR(30) NOT NULL,
    ram VARCHAR(30) NOT NULL
    )";
if(mysqli_query($conn, $sql)){
    echo "Table Products created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
