<?php
//session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed!". mysqli_connect_error());
}
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
            $sql= "SELECT * FROM baskets WHERE userID = '".$id."'";
            $result = $conn->query($sql);
            //var_dump($result);
            $count = mysqli_num_rows($result);?>
            <a class="text-danger" href="userlist.php"><?php echo $count;} ?></a>
        </ul>
    </nav>
</div>
