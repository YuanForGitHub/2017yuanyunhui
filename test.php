<?php

class Paixu {
    private $num;
    private $left;
    private $right;
    private $range;
    private $arr;

    public function __construct(){
        $this->arr = array(1, 2, 3, 4, 5, 6, 7, 8);
        $this->left = 1;
        $this->right = 8;
        $this->range = 8;

        include 'conn.php';
        $sql = "SELECT * FROM athlete";
        $result = mysqli_query($conn, $sql);
        $this->num = mysqli_num_rows($result);
    }

    public function numbers(){
        echo $this->num;
    }

    public function shuffle(){
        shuffle($this->arr);
        $this->left=1;
        $this->right=8;
        while($this->right <= $this->num){
            for($i=0; $i<$this->range; $i++){
                $sql = "UPDATE athlete SET zubie {$this->arr[$i]}";
                mysqli_query($conn, $sql);
                $this->left++;
            }
        }
    }

    public function show(){
        $sql = "SELECT * FROM athlete";
        $result = mysqli_query($conn, $sql);
        foreach(mysqli_fetch_array($result) as $val){
            echo $val['id']."<br>";
        }
    }
}

$mem = new Paixu();
$mem->shuffle();

?>