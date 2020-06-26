<?php

$databasehost = "localhost";
$databasename = "test";
$databasetable = "products";
$databaseusername="root";
$databasepassword = "";
$conn = mysqli_connect($databasehost, $databaseusername, $databasepassword, $databasename);
$fieldseparator = ";";
$lineseparator = "\n";
$csvfile = "arsham.csv";

if(!$conn){
    die("Connection Failed!". mysqli_connect_error());
}

if (isset($csvfile)) {

    $csv = fopen($csvfile, 'r');


    while ($line = fgetcsv($csv, 1000, ";")) {

        $auto_id = $line[0];
        $id = $line[1];
        $name = $line[2];
        $price = $line[3];
        $ram = $line[4];
        $image = $line[5];
        $description = $line[6];

        $prevQuery = "SELECT * FROM products WHERE id = $line[1]";
        $prevResult = $conn->query($prevQuery);

        if ($prevResult->num_rows > 0) {
            $conn->query("UPDATE products SET name = '" . $name . "', price = '" . $price . "', ram = '" . $ram . "', image = '" . $image . "', description = '" . $description . "'  WHERE id = '" . $line[1] . "'");
            $conn->query("DELETE FROM products WHERE id != '" . $line[1] . "'");
        } else {
            $conn->query("INSERT INTO products (id, name, price, ram, image, description) VALUES ('" . $id . "','" . $name . "', '" . $price . "', '" . $ram . "', '" . $image . "', '" . $description . "')");
        }
    }
}