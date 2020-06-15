<?php
if(isset($_POST['new']) && $_POST['new']==1){
    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $address =$_REQUEST['address'];
    $sql = "INSERT INTO costumers 
        (`firstname`, `lastname`, `email`, `address`) VALUES
        ('$firstname', '$lastname', '$email', '$address')";
    $costumer_id = 0;
    if(mysqli_query($conn, $sql)){
        $costumer_id = mysqli_insert_id($conn);
    }else{
        mysqli_error($conn);
    }
    if($costumer_id > 0){
        //$t = date('H:i:s');
        //$sql2 = "INSERT INTO orders (`costumerid`,`ordertime`) VALUES (".$costumer_id.",".$t.")";
        $sql2 = "INSERT INTO orders (`costumerid`) VALUES (".$costumer_id.")";
        $order_id = 0;
        if(mysqli_query($conn,$sql2)){
            $order_id = mysqli_insert_id($conn);
        }
        if($order_id > 0){
            $sql4 = "SELECT * FROM baskets";
            $result4 = mysqli_query($conn,$sql4);
            if ($result4->num_rows > 0) {
                while($row = mysqli_fetch_assoc($result4)) {
                    $product_id = $row['productID'];
                    $sql3 = "INSERT INTO order_items (`orderid`,`productid`) VALUES (".$order_id.",".$product_id.")";
                    $result3 = mysqli_query($conn,$sql3);
                    if(mysqli_query($conn,$sql3)){
                        $sql5 = "DELETE FROM baskets";
                        $result5  = mysqli_query($conn,$sql5);
                        var_dump($result5);
                    }
                }
            }

        }
    }
}



























