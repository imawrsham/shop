<?php
require_once('connectDB.php');
$database = new CreateDb("test", "func");?>
<div class="row text-center py-5">
    <?php
    $data = array(
        'id'=>'1'
    );
       $result = $database->getData($data);
    while ($row = mysqli_fetch_assoc($result)){
       echo $row['Firstname'];
       echo $row['Lastname'];
       echo $row['Age'];
       }
    ?>
</div>
<?php
$data = array(
    'Firstname'=>'hasan',
    'Lastname'=>'Rezaie',
    'Age'=>'32'
);

$result = $database->insert($data);


?>