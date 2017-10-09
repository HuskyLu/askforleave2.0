<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
//header("Content-Type: text/html;charset=utf-8");
include 'PHPExcel/Classes/PHPExcel.php';
include 'PHPExcel/Classes/PHPExcel/Reader/Excel2007.php';
@$start = $_GET['datemin'];
@$end = $_GET['datemax'];
@$searchStr = $_GET['searchStr'];
$where = " where 1=1 ";
if($start != ""){
    $where = $where." and meetingTime >= '".$start."'";
}
if($end != ""){
    $where = $where." and meetingTime <= '".$end."'";
}
if($searchStr != ""){
    $where = $where." and meetingName like '%".$searchStr."%'";
}
$sql = "select * from asking_meeting ".$where;
$query = query($conn, $sql);

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('会议请假导出');
$objPHPExcel->getActiveSheet()->setCellValue('A1', '会议名称');
$objPHPExcel->getActiveSheet()->setCellValue('B1', '请假日期');
$objPHPExcel->getActiveSheet()->setCellValue('C1', '姓名');
$objPHPExcel->getActiveSheet()->setCellValue('D1', '部门');
$objPHPExcel->getActiveSheet()->setCellValue('E1', '职位');
$objPHPExcel->getActiveSheet()->setCellValue('F1', '请假理由');
$objPHPExcel->getActiveSheet()->setCellValue('G1', '部长意见');
$i = 2;
while($result = mysqli_fetch_array($query)){
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $result['meetingName']);
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $result['askTime']);
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $result['name']);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $result['department']);
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $result['position']);
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $result['reason']);
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $result['condition']);
    $i++;
}
$filename = '导出.xls';
ob_end_clean();//清除缓冲区,避免乱码 
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$filename.'.xls"');
header('Cache-Control: max-age=0');
$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
$objWriter->save('php://output');
