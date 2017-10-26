<?php
include 'conn.php';

$name = $_POST['name'];
$gender = $_POST['gender'];
$student_id = $_POST['student_id'];
$phone_number = $_POST['phone_number'];
$major = $_POST['major'];
$grade = $_POST['grade'];
$class = $_POST['class'];
$item = $_POST['item'];
$zubie = $_POST['zubie'];
$position = $_POST['position'];
$minute = $_POST['minute'];
$second = $_POST['second'];
$msec = $_POST['msec'];
$run_time = $_POST['run_time'];
$distance = $_POST['distance'];
$points = $_POST['points'];

// $name = '李智文';
// $gender = '男';
// $student_id = '201627010409';
// $phone_number = '201627010409';
// $major = '软件工程';
// $grade = '2016';
// $class = '4';
// $item = 11;
// $zubie = 11;
// $position = 11;
// $minute = 11;
// $second = 11;
// $msec = 11;
// $run_time = 3.1;
// $distance = 2;
// $points = 1;

$sql = "INSERT INTO athlete(
    name,
    gender,
    student_id,
    phone_number,
    major,
    grade,
    class,
    item,
    zubie,
    position,
    minute,
    second,
    msec,
    run_time,
    distance,
    points
) VALUES(
    '{$name}',
    '{$gender}',
    '{$student_id}',
    '{$phone_number}',
    '{$major}',
    '{$grade}',
    '{$class}',
    {$item},
    {$zubie},
    {$position},
    {$minute},
    {$second},
    {$msec},
    {$run_time},
    {$distance},
    {$points}
)";

$result = mysqli_query($conn, $sql);
if($result == true){
    echo "连接成功！";
    header("Refresh:0.5; url=index.html"); //重定向到录入界面
    exit();
}
else{
    echo "发生错误：".$conn->error;
}

?>