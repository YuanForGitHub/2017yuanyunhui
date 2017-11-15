<?php
/*
	提供的参数
	1.$_GET["item"]
		要查询的项目

	请求的数据
	1.必须包含如下字段：
	  name
	  grade
	  major
	  class
	  minute
	  second

	 ps:
	 	我这里成绩用的是minute里的数据，不知道对于田赛会怎么样
 */
 
$item = $_GET['item'];
$i=0;

require_once 'conn.php';
// 田赛
if($item<=7 || ($item>=13 && $item<=18) || $item==25){
	$sql = "SELECT zubie, name, major, class, grade, run_time FROM athlete WHERE item=? ORDER BY run_time ASC";
}
// 跳高跳远、铅球
else if($item<=10 || $item==12 || ($item>=20 && $item<=23)){
	$sql = "SELECT zubie, name, major, class, grade, distance FROM athlete WHERE item=? ORDER BY distance DESC";
}
// 引体向上、仰卧起坐
else{
	$sql = "SELECT zubie, name, major, class, grade, points FROM athlete WHERE item=? ORDER BY points DESC";
}

$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "i", $item);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $zubie, $name, $major, $class, $grade, $result);
while(mysqli_stmt_fetch($stmt)){
	if($result==0 || $result==NULL) continue;
	$arr[$i]['zubie'] = $zubie;
	$arr[$i]['name'] = $name;
	$arr[$i]['major'] = $major;
	$arr[$i]['class'] = $class;
	$arr[$i]['grade'] = $grade;
	$arr[$i]['minute'] = $result;
	$arr[$i]['second'] = 0;
	$i++;
}
mysqli_stmt_close($stmt);

$arr = (isset($arr)) ? $arr : NULL;
echo json_encode($arr);
?>