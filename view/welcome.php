<?php
session_start();
include "connection.php";
$name = 'atiyeh';
$password = '123456';
if(isset($_SESSION['name'])) {
    echo '<h1>Welcome ' . $_SESSION['name'] . '</h1>';
    echo "<a href='productlist.php' style='color: blue; font-size: x-large;'>Productslist</a><br><br>";
    echo '<a href="logout.php"><input type="button" value="logout" name="logout"></a>';
}else{

    if($_POST['name']==$name && $_POST['pwd']==$password){
        $_SESSION['name'] =$name;
        header("Location: welcome.php");
    }else{
        echo "username or password incorrect!";
        }



}
?>
