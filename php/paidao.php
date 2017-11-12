<?php

class Paidao {

    public function __construct(){
    }

    public function run($item){
        require_once 'conn.php';
        if($item=='男子4x100米'){
            $sql = "SELECT * FROM athlete WHERE item={$item} AND flag=1";
        }
        else{
            $sql = "SELECT * FROM athlete WHERE item={$item}";
        }
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
        $i=1; //组别
        $j=1; //赛道
        if(!empty($data)){
            shuffle($data);
            foreach($data as $val){
            if($j == 9){
                $j=1;
                $i++;
            }
        $sql = "UPDATE athlete SET zubie=$i, position=$j WHERE id={$val['id']}";
        $result = mysqli_query($conn, $sql);
        $j++;
        }
    }

    }
}

// $item = $_POST['item'];//输入项目名

$fenzu = new Paidao();
$fenzu->run('男子100米');//后面替换

?>