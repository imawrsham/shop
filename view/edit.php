<?php
include "connection.php";
$id = $_REQUEST['id'];
$sql = "SELECT * FROM products WHERE id='".$id."'";
$result = mysqli_query($conn, $sql) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--- Font Awesome--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php include "header.php";?>
    <title>Orders</title>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
<div class="container">
<div class="form">
    <h1>Update Product</h1>
    <?php
    $msg = "";
    $status = '';
    if (isset($_POST['submit']) && $_REQUEST['new']==1 )
    {
        $id=$_REQUEST['id'];
        $name =$_REQUEST['name'];
        $price =$_REQUEST['price'];
        $ram =$_REQUEST['ram'];
        $image = $_FILES['image']['name'];
        $target = "../local/".basename($image);
        $des =$_REQUEST['description'];
        $update = "UPDATE products SET name='".$name."', price='".$price."', ram='".$ram."', image='".$image."', description='".$des."' WHERE id='".$id."'";
        $result = mysqli_query($conn, $update) or die(mysqli_error());
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        header("Location: productlist.php");
        }else {
    ?>
    <div>
        <form name="form" method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="new" value="1"/>
            <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
            Name:
            <p><input name="name" type="text" placeholder="Enter Name"
                      required value="<?php echo $row['name'];?>"/></p>
            Price:
            <p><input type="text" name="price" placeholder="Enter price"
                      required value="<?php echo $row['price'];?>" /></p>
            Ram:
            <p><input type="text" name="ram" placeholder="Enter ram"
                      required value="<?php echo $row['ram'];?>" /></p>
            Image:
            <img src="<?php echo '../local/'.$row['image']; ?>" width="338" height="280" class="img-responsive">
            <p><input type="file" name="image" placeholder="Enter image"/></p>
            Description:
            <p><textarea cols="40"
                      rows="4" name="description" placeholder="Enter description"
                         ><?php echo $row['description'];?></textarea></p>
            <p><input name="submit" type="submit" value="Update" /></p>
        </form>
        <?php } ?>

    </div>
</div>
</div>
</body>
</html>
