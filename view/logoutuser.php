<?php
session_start();
if(isset($_SESSION['username'])) {
    session_destroy();
    header("Location: homepage.php");
}else{
    header("Location: loginuser.php");
}
