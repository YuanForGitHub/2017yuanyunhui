<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/../../PHPExcel-1.8/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

require_once 'conn.php';
$item = $_GET['item'];
if($item==0)
    $sql = "SELECT grade, major, class, name, item, zubie, position, run_time, distance, points FROM athlete";
else
    $sql = "SELECT grade, major, class, name, item, zubie, position, run_time, distance, points FROM athlete WHERE item={$item}";
$result = mysqli_query($conn, $sql);
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '年级')
            ->setCellValue('B1', '专业')
            ->setCellValue('C1', '班级')
            ->setCellValue('D1', '姓名')
            ->setCellValue('E1', '项目')
            ->setCellValue('F1', '小组')
            ->setCellValue('G1', '赛道')
            ->setCellValue('H1', '成绩');
$i=2;
while($row = mysqli_fetch_assoc($result)){
    $A = 'A'.$i;
    $B = 'B'.$i;
    $C = 'C'.$i;
    $D = 'D'.$i;
    $E = 'E'.$i;
    $F = 'F'.$i;
    $G = 'G'.$i;
    $H = 'H'.$i;
    switch($row['item']){
        case 1: $item = '男子100米'; $score = ($row['run_time']==NULL) ? 0 : $row['run_time']; break;
        case 2: $item = '男子200米'; $score = ($row['run_time']==NULL) ? 0 : $row['run_time']; break;
        case 3: $item = '男子400米'; $score = ($row['run_time']==NULL) ? 0 : $row['run_time']; break;
        case 4: $item = '男子800米'; $score = ($row['run_time']==NULL) ? 0 : $row['run_time']; break;
        case 5: $item = '男子1500米'; $score = ($row['run_time']==NULL) ? 0 : $row['run_time']; break;
        case 6: $item = '男子5000米'; $score = ($row['run_time']==NULL) ? 0 : $row['run_time']; break;
        case 7: $item = '男子110栏'; $score = ($row['run_time']==NULL) ? 0 : $row['run_time']; break;
        case 8: $item = '男子跳高'; $score = ($row['distance']==NULL) ? 0 : $row['distance']; break;
        case 9: $item = '男子三级跳远'; $score = ($row['distance']==NULL) ? 0 : $row['distance']; break;
        case 10: $item = '男子铅球'; $score = ($row['distance']==NULL) ? 0 : $row['distance']; break;
        case 11: $item = '引体向上'; $score = ($row['points']==NULL) ? 0 : $row['points']; break;
        case 12: $item = '男子跳远'; $score = ($row['distance']==NULL) ? 0 : $row['distance']; break;
        case 13: $item = '女子100米'; $score = ($row['run_time']==NULL) ? 0 : $row['run_time']; break;
        case 14: $item = '女子200米'; $score = ($row['run_time']==NULL) ? 0 : $row['run_time']; break;
        case 15: $item = '女子400米'; $score = ($row['run_time']==NULL) ? 0 : $row['run_time']; break;
        case 16: $item = '女子800米'; $score = ($row['run_time']==NULL) ? 0 : $row['run_time']; break;
        case 17: $item = '女子1500米'; $score = ($row['run_time']==NULL) ? 0 : $row['run_time']; break;
        case 18: $item = '女子3000米'; $score = ($row['run_time']==NULL) ? 0 : $row['run_time']; break;
        case 19: $item = '女子100米栏'; $score = ($row['run_time']==NULL) ? 0 : $row['run_time']; break;
        case 20: $item = '女子跳高'; $score = ($row['distance']==NULL) ? 0 : $row['distance']; break;
        case 21: $item = '女子跳远'; $score = ($row['distance']==NULL) ? 0 : $row['distance']; break;
        case 22: $item = '女子三级跳远'; $score = ($row['distance']==NULL) ? 0 : $row['distance']; break;
        case 23: $item = '女子铅球'; $score = ($row['distance']==NULL) ? 0 : $row['distance']; break;
        case 24: $item = '仰卧起坐'; $score = ($row['points']==NULL) ? 0 : $row['points']; break;
        case 25: $item = '男子4x100m接力'; $score = ($row['run_time']==NULL) ? 0 : $row['run_time']; break;
    }
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($A, $row['grade'])
                ->setCellValue($B, $row['major'])
                ->setCellValue($C, $row['class'])
                ->setCellValue($D, $row['name'])
                ->setCellValue($E, $item)
                ->setCellValue($F, $row['zubie'])
                ->setCellValue($G, $row['position'])
                ->setCellValue($H, $score);
    $i++;
}
// Add some data
// $objPHPExcel->setActiveSheetIndex(0)
//             ->setCellValue('A1', 'Hello')
//             ->setCellValue('B2', 'world!')
//             ->setCellValue('C1', 'Hello')
//             ->setCellValue('D2', 'world!');

// Miscellaneous glyphs, UTF-8
// $objPHPExcel->setActiveSheetIndex(0)
//             ->setCellValue('A4', 'Miscellaneous glyphs')
//             ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('数据');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="2017数学与信息学院、软件学院-运动会数据备份.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
