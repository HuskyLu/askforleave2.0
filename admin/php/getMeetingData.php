<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$limit = $_POST['limit'];
$start = $_POST['start'];
$end = $_POST['end'];
$searchStr = $_POST['searchStr'];
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
$sql = "select * from meeting_table ".$where." order by meetingTime desc limit ".$limit.",25 ";
$query = query($conn, $sql);
$i=0;
$echo;
while($result = mysqli_fetch_array($query)){
    $echo[$i]['id'] = $result['id'];
    $echo[$i]['meetingName'] = $result['meetingName'];
    $echo[$i]['meetingTime'] = $result['meetingTime'];
    $i++;
}
if($i == 0){
    echo "[]";
} else {
    echo json_encode($echo);
}