<?php
include 'conn.php';

// 待定————item对应的编号:
// 男子100m   1
// 男子200m   2
// 男子400m   3
// 男子800m   4
// 男子1500m  5
// 男子5000m  6
// 男子110栏   7
// 男子跳高     8
// 男子三级跳远   9
// 男子跳远     10
// 男子铅球     11
// 男子引体向上   12

// 女子100m   13
// 女子200m   14
// 女子400m   15
// 女子800m   16
// 女子1500m  17
// 女子3000m  18
// 女子100栏   19
// 女子跳高     20
// 女子三级跳远       21
// 女子跳远     22
// 女子铅球     23
// 女子仰卧起坐   24

// 男子4x100m接力   25


$name = $_POST['name'];
$gender = $_POST['gender'];
$student_id = $_POST['student_id'];
$phone_number = $_POST['phone_number'];
$major = $_POST['major'];
$grade = $_POST['grade'];
$class = $_POST['class'];
$item = $_POST['item'];
$flag = 0; //接力赛代表，没有设为null

echo "name:".$name."  gender:".$gender."  student_id:".$student_id."  major:".$major." grade:".$grade;

// $name = '李智文';
// $gender = '男';
// $student_id = '201627010409';
// $phone_number = '201627010409';
// $major = '软件工程';
// $grade = '2016';
// $class = '4';
// $item = '男子100米';
// $zubie = 11;
// $position = 11;
// $minute = 11;
// $second = 11;
// $msec = 11;
// $run_time = 3.1;
// $distance = 2;
// $points = 1;
// $flag = 0;
if($item == 25){
$sql = "SELECT * FROM athlete WHERE item = {$item} AND grade={$grade} AND major='{$major}' AND class='{$class}' AND flag=1";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if($num<1){
    $flag=1;
}
}
$sql = "INSERT INTO athlete(
    name,
    gender,
    student_id,
    phone_number,
    major,
    grade,
    class,
    item,
    flag
) VALUES(
    '{$name}',
    '{$gender}',
    '{$student_id}',
    '{$phone_number}',
    '{$major}',
    '{$grade}',
    '{$class}',
    '{$item}',
    {$flag}
)";

$result = mysqli_query($conn, $sql);
if($result == true){
    exit();
}
else{
    echo "发生错误：".$conn->error;
}

?>