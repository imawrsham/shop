<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test2';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed!". mysqli_connect_error());
}

$sql = "CREATE TABLE Person (
    PersonID INT(10) AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL
    )";

$sql1 = "CREATE TABLE Orders (
    OrderID int NOT NULL,
    OrderNumber int NOT NULL,
    PersonID int,
    PRIMARY KEY (OrderID)
)";
if(mysqli_query($conn, $sql)){
    echo "Table costumers created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
