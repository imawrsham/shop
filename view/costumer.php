<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed!". mysqli_connect_error());
};?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--- Font Awesome--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php include "header.php";?>
    <title>Orders</title>
</head>
<body>
<div class="container">
        <div class="form">
            <h2 style="text-align: center;">View Orders</h2>
            <table class="table">
                <thead>
                <tr class="success">
                    <th><strong>No.</strong></th>
                    <th><strong>Cancel</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>ProductName</strong></th>
                    <th><strong>Price</strong></th>
                    <th><strong>Total Price</strong></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $count = 1;
                $sql = "SELECT * FROM baskets ORDER BY id asc;";
                $result = mysqli_query($conn, $sql);
                $total_price = 0;
                while($row = mysqli_fetch_assoc($result)) {?>
                    <td><?php echo $count; ?></td>
                    <td><a class="nav-link" href="delete.php?id=<?php echo $row["ID"]; ?>"><i class="fa fa-trash"></i></a></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <?php
                    $sql2 ="SELECT name, price FROM products WHERE  id='".$row['productID']."'";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                        while($row2 = $result2->fetch_assoc()) {
                            $name = $row2["name"];
                            $price = $row2["price"];?>
                            <td><?php echo $row2['name'] ;?></td>
                            <td>$ <?php echo $row2['price'] ;?></td>
                            <?php  $total = ($row["quantity"] * $row2["price"]); ?>
                            <td>$ <?php echo $total?> </td>
                            </tr>
                            <?php $total_price += ($row["quantity"] * $row2["price"]);
                            $count++;}}};?>

                </tbody>
            </table>
            <?php echo"<h5 style='text-align: right'>Total Price:".$total_price."</h5>";?>
    <div>
            <h4 class="mb-3">Costumer Information</h4>
            <form name="form" method="post" action="success.php" class="needs-validation" novalidate>
                <input type="hidden" name="new" value="1">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstname">First name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastname">Last name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" class="form-control" name="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>
    <?php include "footer.html";?>
        </div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>
</html>