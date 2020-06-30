<?php
session_start();
include "connection.php";
require_once('../rest/connectDB.php');
$database = new CreateDb("test", "products");
$msg = "";
if (isset($_POST['upload'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $ram = mysqli_real_escape_string($conn, $_POST['ram']);
    $image = $_FILES['image']['name'];
    $des = mysqli_real_escape_string($conn, $_POST['description']);
    $target = "../local/".basename($image);

    $data = array('name'=>$name, 'price'=>$price, 'ram'=>$ram, 'image'=>$image, 'description'=>$des);
    $result = $database->insert($data);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
    header("Location: productlist.php");
}
if(isset($_SESSION['name'])){
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--- Font Awesome--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php include "header.php";?>
    <title>Upload</title>
    <style type="text/css">
        #content{
            width: 50%;
            margin: 20px auto;
            border: 1px solid lightgrey;
        }
        form{
            width: 50%;
            margin: 20px auto;
        }
        form div{
            margin-top: 5px;
        }
        #img_div{
            width: 80%;
            padding: 5px;
            margin: 15px auto;
            border: 1px solid #cbcbcb;
        }
        #img_div:after{
            content: "";
            display: block;
            clear: both;
        }
        img{
            float: left;
            margin: 5px;
            width: 300px;
            height: 140px;
        }
    </style>
</head>

<body>
<div id="content">
    <form method="POST" action="" enctype="multipart/form-data">
        <h1>Create new Product</h1>
        <input type="hidden" name="size" value="1000000">
        <div>
            name of laptop:
            <input type="text" name="name">
        </div>
        <div>
            price of laptop:
            <input type="number" name="price">
        </div>
        <div>
            Ram of laptop:
            <input type="number" name="ram">
        </div>
        <div>
            Select image to upload:
            <input type="file" name="image">
        </div>
        <div>
      <textarea
              id="text"
              cols="40"
              rows="4"
              name="description"
              placeholder="describe the product"></textarea>
        </div>
        <div>
            <button type="submit" name="upload">submit</button>
        </div>
    </form>
    <a href='welcome.php'><input type='button' name='back' value='back'></a>
</div>
</body>
<?php
}else{
    header("Location: login.php");
}?>
</html>