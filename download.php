<?php
include 'conn.php';
header('Content-Type: application//vnd.ms-excel');
header('Content-Disposition: attachment; filename="院运会.xls"');

$sql = "SELECT * FROM xuanshou";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
    echo $row['id']."\t".$row['nam']."\t".$row['event']."\n";
    // 未写完整，后期完善
}

?>