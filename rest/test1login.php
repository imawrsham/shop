<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--- Font Awesome--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <?php include "header.php";?>
    <title>Login</title>
</head>
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed!". mysqli_connect_error());
}

    if (isset($_POST['new']) && $_POST['new'] == 1) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = ("SELECT * FROM login WHERE username='" . $username . "' AND password='" . $password . "'");
        $result = mysqli_query($conn, $sql);
        var_dump($username);
        var_dump($result);
        if ($result->num_rows > 0) {
            echo "connect successfully!";}else{
            echo 'username and password is not correct';}}

    ?>
<body class="text-center">
<div class="container">
<form class= 'form-singin' action='../view/add.php' method= 'POST'>
    <input type="hidden" name="new" value="1">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputName" class="sr-only">Username</label>
    <input type= 'text' name="username" id="inputName" class="form-control" placeholder="Name" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type= 'password' name= 'password' id="inputPassword" class="form-control" placeholder="Password" required><br/>
    <button class="btn btn-lg btn-primary btn-block" type="submit">log in</button>
</form>
</div>
</body>
</html>
