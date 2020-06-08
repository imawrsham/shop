<div class="card" style="width: 18rem;">
  <img src="http://localhost/shop/images/DellA.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">
        <?php
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'test';

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!$conn){
            die("Connection Failed!". mysqli_connect_error());
        }

        $sql = "SELECT id, name, price, ram  FROM products WHERE id='1'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Price: " . $row["price"]. "- ram:".$row["ram"]. "<br>";
        }
        } else {
        echo "0 results";
        }
        $conn->close();
        ?>





    </p>
  </div>
</div>
