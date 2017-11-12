<?php
/*
	我提供参数
	1.$_POST["item"];
		项目
	2.$_POST["group"];
		组别
	3.$_POST["grade"];
		成绩
		这是一个二维数组，grade[8][2] ,一定会有8个，
		然后grade[i][0]指的是minute ， grade[i][1]指的是second

	请求数据
	1.如果成功修改则返回 "OK"
	 否则返回 "fail"
*/
	$item = $_POST["item"];
	$zubie = $_POST["group"];
	$grade = $_POST["grade"];


	require_once 'conn.php';
	$stmt = mysqli_stmt_init($conn);
	$i=1; // 赛道
	// 田赛
	if($item<=7 || ($item>=13 && $item<=18) || $item==25){
		$sql = "UPDATE athlete SET minute=?, second=?, run_time=? WHERE item=? AND zubie=? AND position=?";
		mysqli_stmt_prepare($stmt, $sql);
		foreach($grade as $val){
			if($val[0]==NULL) break;
			$run_time = $val[0]*60 + $val[1];
			mysqli_stmt_bind_param($stmt, "iddiii", $val[0], $val[1], $run_time, $item, $zubie, $i);
			mysqli_stmt_execute($stmt);
			$i++;
		}
	}
	// 跳高跳远、铅球
	else if($item<=10 || $item==12 || ($item>=20 && $item<=23)){
		$sql = "UPDATE athlete SET distance=? WHERE item=? AND zubie=? AND position=?";
		mysqli_stmt_prepare($stmt, $sql);
		foreach($grade as $val){
			if($val[0]==NULL) break;
			mysqli_stmt_bind_param($stmt, "diii", $val[0], $item, $zubie, $i);
			mysqli_stmt_execute($stmt);
			$i++;
		}
	}
	// 引体向上
	else{
		$sql = "UPDATE athlete SET points=? WHERE item=? AND zubie=? AND position=?";
		$stmt = mysqli_stmt_prepare($stmt, $sql);
		foreach($grade as $val){
			if($val[0]==NULL) break;
			mysqli_stmt_bind_param($stmt, "iiii", $val[0], $item, $zubie, $i);
			mysqli_stmt_execute($stmt);
			$i++;
		}
	}


	mysqli_stmt_close($stmt);
	echo "完全O蛇皮棒棒K";
?>