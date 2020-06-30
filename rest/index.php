<?php
require_once ('func3.php');
$database = new CreateDb("test", "func");?>
        <div class="row text-center py-5">
            <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                echo $row['Firstname'];
                echo $row['Lastname'];
                echo $row['Age'];
                }
            ?>
        </div>
