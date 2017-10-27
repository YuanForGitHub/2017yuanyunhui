<?php

include 'conn.php';

$item = $_POST['item'];
$zubie = $_POST['zubie'];

// $zubie = 1;
// $item = '男子50米蛙泳';
if($item == '男子4x100米'){
    $sql = "SELECT * FROM xuanshou WHERE zubie=$zubie AND item='{$item}' AND flag=1";
}
else{
    $sql = "SELECT * FROM xuanshou WHERE zubie=$zubie AND item='{$item}'";
}
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    $arr[] = $row;    
}

$data = json_encode($arr);
?>