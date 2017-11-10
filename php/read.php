<?php
require_once 'conn.php';

if(!isset($_POST['item'])){
    echo "没有数据";
}

$item = $_POST['item'];

$sql = "SELECT * FROM athlete WHERE item={$item} AND zubie={$zubie} ORDER BY position";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    $arr[] = $row;
}

echo json_encode($arr);