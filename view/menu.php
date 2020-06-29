<?php
include "connection.php";
?>
<div class="float-right">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item ml-3">
                <a class="nav-link" href="homepage.php"><i class="fa fa-home" style="font-size:35px"></i></span></a>
            </li>
            <li class="nav-item ml-3">
                <a class="nav-link" href="products.php"><i class="fa fa-list" style="font-size:35px"></i></a>
            </li>
            <li class="nav-item ml-3">
                <a class="nav-link" href="loginuser.php"><i class="fas fa-user-plus" style="font-size:35px"></i></a>
            </li>
            <li class="active ml-3">
                <a class="nav-link" href="userlist.php"><i class="fa fa-shopping-cart" style="font-size:35px"></i></a>
            </li>
            <?php
            if(isset($_SESSION['username'])){
            $id = $_SESSION['id'];

            $count = 0;
            $sql= "SELECT * FROM baskets WHERE userID = '".$id."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $count += $row["quantity"];
                }
            }
            ?>
            <a class="text-danger" href="userlist.php"><?php echo $count;} ?></a>
        </ul>
    </nav>
</div>
