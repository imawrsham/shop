<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed!". mysqli_connect_error());
}
$sql = "CREATE TABLE baskets (
    basketID int NOT NULL,
    basketNumber int NOT NULL,
    ID int,
    PRIMARY KEY (basketID)
)";
$sql1 = "ALTER TABLE baskets ADD FOREIGN KEY (id) REFERENCES products (id)";


if(mysqli_query($conn, $sql1)){
    echo "Table Products created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
