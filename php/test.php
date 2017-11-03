<?php

include 'conn.php';

// $item = $_GET['item'];
// $zubie = $_POST['zubie'];

// $zubie = 2;
$item = '男子100米';
if($item == '男子4x100米'){
    $sql = "SELECT * FROM athlete WHERE AND item='{$item}' AND flag=1";
}
else{
    $sql = "SELECT * FROM athlete WHERE item='{$item}' ORDER BY zubie";
}
$result = mysqli_query($conn, $sql);
$i=0;
while($row = mysqli_fetch_array($result)){
	$arr[$i]["zubie"] = $row['zubie'];
	$arr[$i]["name"] = $row['name'];
	$arr[$i]["major"] = $row['major'];
	$arr[$i]["class"] = $row['class'];
	$arr[$i]["grade"] = $row['grade'];
	$i++;
	// $arr[] = $row;
}
var_dump($arr);
// $arr = array(
// 				array("zubie"=>1,"name"=>"ben","major"=>"计机","class"=>1,"grade"=>17),
// 				array("zubie"=>1,"name"=>"ooo","major"=>"计机","class"=>2,"grade"=>17),
// 				array("zubie"=>1,"name"=>"xxx","major"=>"计机","class"=>3,"grade"=>17),
// 				array("zubie"=>1,"name"=>"yyy","major"=>"计机","class"=>4,"grade"=>17),
// 				array("zubie"=>1,"name"=>"ben","major"=>"计机","class"=>1,"grade"=>17),
// 				array("zubie"=>1,"name"=>"ooo","major"=>"计机","class"=>2,"grade"=>17),
// 				array("zubie"=>1,"name"=>"xxx","major"=>"计机","class"=>3,"grade"=>17),
// 				array("zubie"=>1,"name"=>"yyy","major"=>"计机","class"=>4,"grade"=>17),

// 				array("zubie"=>2,"name"=>"ben","major"=>"计机","class"=>1,"grade"=>17),
// 				array("zubie"=>2,"name"=>"ooo","major"=>"计机","class"=>2,"grade"=>17),
// 				array("zubie"=>2,"name"=>"xxx","major"=>"计机","class"=>3,"grade"=>17),
// 				array("zubie"=>2,"name"=>"yyy","major"=>"计机","class"=>4,"grade"=>17),
// 				array("zubie"=>2,"name"=>"ben","major"=>"计机","class"=>1,"grade"=>17),
// 				array("zubie"=>2,"name"=>"ooo","major"=>"计机","class"=>2,"grade"=>17),
// 				array("zubie"=>2,"name"=>"xxx","major"=>"计机","class"=>3,"grade"=>17),
// 				array("zubie"=>2,"name"=>"yyy","major"=>"计机","class"=>4,"grade"=>17),

// 				array("zubie"=>3,"name"=>"ooo","major"=>"计机","class"=>2,"grade"=>17),
// 				array("zubie"=>3,"name"=>"xxx","major"=>"计机","class"=>3,"grade"=>17),
// 				array("zubie"=>3,"name"=>"yyy","major"=>"计机","class"=>4,"grade"=>17),
// 	);

?>