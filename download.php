<?php
include 'conn.php';
header('Content-Type: application//vnd.ms-excel');
header('Content-Disposition: attachment; filename="院运会.xls"');

$sql = "SELECT * FROM xuanshou";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
    echo $row['id']."\t".$row['nam']."\t".$row['event']."\n";
}
/*---------------------------------------------------------------------
    要使用PHPExcel类下载Excel文件的话，必须要先重定向Classes文件的位置
    服务器上面有PHPExcel文件夹
    还有数据库方面要设置成部门的数据库，这里测试用的是本地的数据表
----------------------------------------------------------------------*/

// <?php

// include 'conn.php';

// /**
//  * PHPExcel
//  *
//  * Copyright (c) 2006 - 2015 PHPExcel
//  *
//  * This library is free software; you can redistribute it and/or
//  * modify it under the terms of the GNU Lesser General Public
//  * License as published by the Free Software Foundation; either
//  * version 2.1 of the License, or (at your option) any later version.
//  *
//  * This library is distributed in the hope that it will be useful,
//  * but WITHOUT ANY WARRANTY; without even the implied warranty of
//  * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
//  * Lesser General Public License for more details.
//  *
//  * You should have received a copy of the GNU Lesser General Public
//  * License along with this library; if not, write to the Free Software
//  * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
//  *
//  * @category   PHPExcel
//  * @package    PHPExcel
//  * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
//  * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
//  * @version    ##VERSION##, ##DATE##
//  */

// /** Error reporting */
// error_reporting(E_ALL);
// ini_set('display_errors', TRUE);
// ini_set('display_startup_errors', TRUE);
// date_default_timezone_set('Europe/London');

// if (PHP_SAPI == 'cli')
// 	die('This example should only be run from a Web Browser');

// /** Include PHPExcel */
// require_once dirname(__FILE__) . '/Classes/PHPExcel.php';


// // Create new PHPExcel object
// $objPHPExcel = new PHPExcel();

// // Set document properties
// $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
// 							 ->setLastModifiedBy("Maarten Balliauw")
// 							 ->setTitle("Office 2007 XLSX Test Document")
// 							 ->setSubject("Office 2007 XLSX Test Document")
// 							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
// 							 ->setKeywords("office 2007 openxml php")
// 							 ->setCategory("Test result file");

// // 取出数据
// $sql = "SELECT * FROM xuanshou";
// $result = mysqli_query($conn, $sql);
// $objPHPExcel->setActiveSheetIndex(0)
// 			->setCellValue('A1', 'id')
// 			->setCellValue('B1', '姓名')
// 			->setCellValue('C1', '项目')
// 			->setCellValue('D1', '成绩');
// $i=2;
// while($row = mysqli_fetch_array($result)){
// 	$A = 'A'.$i;
// 	$B = 'B'.$i;
// 	$C = 'C'.$i;
// 	$D = 'D'.$i;
// 	$i++;
// 	$objPHPExcel->setActiveSheetIndex(0)
// 				->setCellValue($A, $row['id'])
// 				->setCellValue($B, $row['nam'])
// 				->setCellValue($C, $row['event'])
// 				->setCellValue($D, $row['grade']);
// }

// // Add some data
// // $objPHPExcel->setActiveSheetIndex(0)
// //             ->setCellValue('A1', 'Hello')
// //             ->setCellValue('B2', 'world!')
// //             ->setCellValue('C1', 'Hello')
// //             ->setCellValue('D2', 'world!');

// // Miscellaneous glyphs, UTF-8
// // $objPHPExcel->setActiveSheetIndex(0)
// //             ->setCellValue('A4', 'Miscellaneous glyphs')
// //             ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

// // Set active sheet index to the first sheet, so Excel opens this as the first sheet
// $objPHPExcel->setActiveSheetIndex(0);


// // Redirect output to a client’s web browser (Excel2007)
// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// header('Content-Disposition: attachment;filename="测试.xlsx"');
// header('Cache-Control: max-age=0');
// // If you're serving to IE 9, then the following may be needed
// header('Cache-Control: max-age=1');

// // If you're serving to IE over SSL, then the following may be needed
// header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
// header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
// header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
// header ('Pragma: public'); // HTTP/1.0

// $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
// $objWriter->save('php://output');
// exit;


// ?>

?>