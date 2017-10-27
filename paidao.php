<?php

class Paidao {
    private $item;

    public function __construct(){
    }

    public function run($item){
        require_once 'conn.php';
        $this->item = $item;
        $sql = "SELECT * FROM xuanshou WHERE event='{$item}'";
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
        $sql = "UPDATE xuanshou SET zubie=$i, position=$j WHERE id={$val['id']}";
        $result = mysqli_query($conn, $sql);
        $j++;
        }
    }

    }
}

$item = $_POST['item'];

$fenzu = new Paidao();
$fenzu->run('男子50米蛙泳');//后面替换

?>