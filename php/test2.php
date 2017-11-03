<?php
include 'conn.php';

$sql = "SELECT * FROM athlete WHERE item=25 ORDER BY flag";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    echo $row['id']."---".$row['name']."---".$row['zubie']."---".$row['position']."---".$row['flag'];
    echo "<br>";
}

?>