<?php
include 'conn.php';

$sql = "SELECT * FROM athlete WHERE item=25";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    $data[] = $row;
}
if(!empty($data)){
    foreach($data as $val){
        $sql = "SELECT * FROM athlete WHERE item=25 AND grade={$val['grade']} AND major='{$val['major']}' AND class={$val['class']} AND flag=1";        
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num<1){
            $sql = "UPDATE athlete SET flag=1 WHERE id={$val['id']}";
            mysqli_query($conn, $sql);
            echo $val['name'].$val['id']."<br>";
        }
    }
}
?>