<?php
include 'conn.php';

$sql = "SELECT DISTINCT event FROM xuanshou";
$result = mysqli_query($conn, $sql);
if($result==TRUE){
    while($row = mysqli_fetch_array($result)){
        $arr[] = $row['event'];
    }
}
else{
    echo "Error:".$conn->error;
}

    $val = '男子50米蛙泳';
    $sql = "SELECT * FROM xuanshou WHERE event = '{$val}'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    
    $i=1;//组别
    $j=1;//赛道
    if(!empty($data)){
        shuffle($data);
        foreach($data as $val){
            if($j==9){
                $j=1;
                $i++;
            }
            $sql = "UPDATE xuanshou SET position=$j, zubie=$i WHERE id={$val['id']} ";
            $result = mysqli_query($conn, $sql);
            
            $j++;
        }
    }

?>