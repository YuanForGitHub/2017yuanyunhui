<?php
require_once 'conn.php';

if(!isset($_POST['item'])){
    echo "没有数据";
}

$item = $_POST['item'];
$zubie = $_POST['zubie'];
$data = $_POST['data']; // 传进来的二维数组，一维下标表示赛道

// 田赛
if($item<=7 || ($item>=13 && $item<=19) || $item==25){
    $sql = "UPDATE athlete SET minute=?, second=?, msec=?, run_time=? WHERE item=? AND zubie=? AND position=?";
    $stmt = mysqli_stmt_init($conn);
    foreach($data as $index => $val){
        $minute = $_POST['minute'];
        $second = $_POST['second'];
        $msec = $_POST['msec'];
        $run_time = $minute * 60 + $second + $msec/1000;
        mysqli_stmt_bind_param($stmt, "iiid", $minute, $second, $msec, $run_time);
        mysqli_stmt_execute($stmt);
    }
}

// 跳高跳远铅球
else if($item<=10 || $item==12 || ($item>=20 && $item<=23)){
    $distance = $_POST['di']
}

// 引体向上、仰卧起坐
else{

}

mysqli_stmt_close($stmt);