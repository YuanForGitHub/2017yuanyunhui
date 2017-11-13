<?php
/*
	提供的参数
	1.$_GET["item"]
		要查询的项目

	请求的数据
	1.必须包含如下字段：
	  name
	  grade
	  major
	  class
	  minute
	  second

	 ps:
	 	我这里成绩用的是minute里的数据，不知道对于田赛会怎么样
 */

	  $arr0 = array(
				array("zubie"=>1,"name"=>"ben","major"=>"计机","class"=>1,"grade"=>17,"minute"=>16.6,"second"=>0.66),
				array("zubie"=>1,"name"=>"ooo","major"=>"计机","class"=>2,"grade"=>17,"minute"=>16.6,"second"=>0.66),
				array("zubie"=>1,"name"=>"xxx","major"=>"计机","class"=>3,"grade"=>17,"minute"=>16.6,"second"=>0.66),
				array("zubie"=>1,"name"=>"yyy","major"=>"计机","class"=>4,"grade"=>17,"minute"=>16.6,"second"=>0.66),
				array("zubie"=>1,"name"=>"ben","major"=>"计机","class"=>1,"grade"=>17,"minute"=>16.6,"second"=>0.66),
				array("zubie"=>1,"name"=>"ooo","major"=>"计机","class"=>2,"grade"=>17,"minute"=>16.6,"second"=>0.66),
				array("zubie"=>1,"name"=>"xxx","major"=>"计机","class"=>3,"grade"=>17,"minute"=>16.6,"second"=>0.66),
				array("zubie"=>1,"name"=>"yyy","major"=>"计机","class"=>4,"grade"=>17,"minute"=>16.6,"second"=>0.66),

				array("zubie"=>2,"name"=>"ben","major"=>"计机","class"=>1,"grade"=>17,"minute"=>16.6,"second"=>0.66),
				array("zubie"=>2,"name"=>"ooo","major"=>"计机","class"=>2,"grade"=>17,"minute"=>16.6,"second"=>0.66),
				array("zubie"=>2,"name"=>"xxx","major"=>"计机","class"=>3,"grade"=>17,"minute"=>16.6,"second"=>0.66),
				array("zubie"=>2,"name"=>"yyy","major"=>"计机","class"=>4,"grade"=>17,"minute"=>16.6,"second"=>0.66),
				array("zubie"=>2,"name"=>"ben","major"=>"计机","class"=>1,"grade"=>17,"minute"=>16.6,"second"=>0.66),
				array("zubie"=>2,"name"=>"ooo","major"=>"计机","class"=>2,"grade"=>17,"minute"=>16.6,"second"=>0.66),
				array("zubie"=>2,"name"=>"xxx","major"=>"计机","class"=>3,"grade"=>17,"minute"=>16.6,"second"=>0.66),
				array("zubie"=>2,"name"=>"yyy","major"=>"计机","class"=>4,"grade"=>17,"minute"=>16.6,"second"=>0.66),
	);

$arr1 =array(
			array("zubie"=>3,"name"=>"ooo","major"=>"计机","class"=>2,"grade"=>17,"minute"=>16.6,"second"=>0.66),
			array("zubie"=>3,"name"=>"xxx","major"=>"计机","class"=>3,"grade"=>17,"minute"=>16.6,"second"=>0.66),
			array("zubie"=>3,"name"=>"yyy","major"=>"计机","class"=>4,"grade"=>17,"minute"=>16.6,"second"=>0.66),
	);

if($_GET["item"]==1)
	$arr = $arr0;
else $arr = $arr1;

echo json_encode($arr);
?>