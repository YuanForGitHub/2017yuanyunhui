<?php
include 'conn.php';

$sql = "UPDATE xuanshou SET zubie=NULL, position=NULL";
$result = mysqli_query($conn, $sql);

// $sql = "SELECT * FROM xuanshou WHERE zubie IS NULL AND event='男子50米自由泳' LIMIT 8";
// $result = mysqli_query($conn, $sql);
// while($row=mysqli_fetch_array($result)){
//     echo $row['nam'];
//     echo "<br>";
// }
echo $conn->error;

?>