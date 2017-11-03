<?php
include 'conn.php';

function paiDao($item){
    global $conn;
    if($item==25){
        $sql = "SELECT * FROM athlete WHERE item={$item} AND flag=1";
    }
	else{
        $sql = "SELECT * FROM athlete WHERE item={$item}";
    }
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
		$data[] = $row;
	}
	$i=1;
	$j=1;
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

// $item=13;
// while($item<=25){
// 	paiDao($item);
// 	$item++;
// }
paiDao(25);

echo "OK";
?>