<?php
require_once('connectDB.php');
$database = new CreateDb("test", "func");?>
<div class="row text-center py-5">
    <?php
    $data = array(
        'id'=>'48'
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
$data1 = array(
    'Firstname'=>'hasan',
    'Lastname'=>'Rezaie',
    'Age'=>'42'
);

$result = $database->insert($data1);

$data2 = array('id'=> '49');
$result = $database->delete($data2);



?>