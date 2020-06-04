<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'test';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed!". mysqli_connect_error());
};
$status = '';
if(isset($_POST['new']) && $_POST['new']==1){
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $address =$_REQUEST['address'];
    $sql = "INSERT INTO costumers 
        (`firstname`, `lastname`, `email`, `address`) VALUES
        ('$firstname', '$lastname', '$email', '$address')";
    mysqli_query($conn, $sql)
    or die(mysqli_error($conn));
    $status = "New Costumers Inserted Successfully. </br></br>
    <a href='view.php'>View Inserted Record</a>";

}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insert New Employee</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form">
    <p><a href="view.php">View Employees</a></p>
    <div>
        <h1>Insert New Employee</h1>
        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1">
            <p><input type="text" name="firstname" placeholder="Enter Firstname" required/></p>
            <p><input type="text" name="lastname" placeholder="Enter Lastname" required /></p>
            <p><input type="email" name="email" placeholder="Enter email" required /></p>
            <p><input type="text" name="address" placeholder="Enter address" required /></p>
            <p><input name="submit" type="submit" value="Submit" /></p>
        </form>
        <p style="color: red;"><?php echo $status; ?></p>
    </div>
</div>
</body>

</html>

