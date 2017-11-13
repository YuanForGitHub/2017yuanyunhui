<?php
/*
	提供的参数
	1.$_GET["item"]
		要查询的项目
	2.$_GET["group"]
		要查询的组别

	请求的数据
	1.必须包含如下字段：
	  name
	  grade
	  major
	  class
	  minute
	  second
 */

require_once 'conn.php';

$item = ($_GET['item']==0) ? 1 : $_GET['item'];
$zubie = ($_GET['group']==NULL) ? 1 : $_GET['group'];

$sql = "SELECT * FROM athlete WHERE item={$item} AND zubie={$zubie} ORDER BY position";
$result = mysqli_query($conn, $sql);
$i=0;

// 田赛
if($item<=7 || ($item>=13 && $item<=18) || $item==25)
	while($row = mysqli_fetch_assoc($result)){
		$arr[$i]['zubie'] = $row['zubie'];
		$arr[$i]['name'] = $row['name'];
		$arr[$i]['major'] = $row['major'];
		$arr[$i]['class'] = $row['class'];
		$arr[$i]['grade'] = $row['grade'];
		$arr[$i]['minute'] = ($row['minute']==NULL) ? 0 : $row['minute'];
		$arr[$i]['second'] = ($row['second']==NULL) ? 0 : $row['second'];
		$i++;
	}
// 跳高跳远、铅球
else if($item<=10 || $item==12 || ($item>=20 && $item<=23))
	while($row = mysqli_fetch_assoc($result)){
		$arr[$i]['zubie'] = $row['zubie'];
		$arr[$i]['name'] = $row['name'];
		$arr[$i]['major'] = $row['major'];
		$arr[$i]['class'] = $row['class'];
		$arr[$i]['grade'] = $row['grade'];
		$arr[$i]['minute'] = ($row['distance']==NULL) ? 0 : $row['distance'];
		$i++;
	}
// 引体向上
else
	while($row = mysqli_fetch_assoc($result)){
		$arr[$i]['zubie'] = $row['zubie'];
		$arr[$i]['name'] = $row['name'];
		$arr[$i]['major'] = $row['major'];
		$arr[$i]['class'] = $row['class'];
		$arr[$i]['grade'] = $row['grade'];
		$arr[$i]['minute'] = ($row['points']==NULL) ? 0 : $row['points'];
		$i++;
	}

$arr = (isset($arr)) ? $arr : NULL;
echo json_encode($arr);
?>
