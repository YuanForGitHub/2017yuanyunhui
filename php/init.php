<?php
include 'conn.php';

$sql = "CREATE TABLE athlete(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30),
	gender VARCHAR(15),
	student_id VARCHAR(12),
	phone_number VARCHAR(30),
	major VARCHAR(30),
	grade VARCHAR(4),
	class VARCHAR(2),
	item INT(2),
	zubie INT(11),
	position INT(11),
	ADD_TIME timestamp,
	minute INT(11),
	second INT(11),
	msec INT(11),
	run_time FLOAT,
	distance FLOAT,
	points INT(11),
	flag INT(4)
	) CHARACTER SET utf8 COLLATE utf8_general_ci";

$result = mysqli_query($conn, $sql);

var_dump($result);
?>