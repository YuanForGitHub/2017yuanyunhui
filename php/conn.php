<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "2017yuanyunhui";
 
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
 
mysqli_set_charset($conn, "utf8");
?>