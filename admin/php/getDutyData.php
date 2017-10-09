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
    $where = $where." and date >= '".$start."'";
}
if($end != ""){
    $where = $where." and date <= '".$end."'";
}
if($searchStr != ""){
    $where = $where." and department like '%".$searchStr."%'";
}
$sql = "select * from asking_duty ".$where." order by date desc, department desc limit ".$limit.",25 ";
$query = query($conn, $sql);
$i=0;
$echo;
while($result = mysqli_fetch_array($query)){
    $echo[$i]['name'] = $result['name'];
    $echo[$i]['department'] = $result['department'];
    $echo[$i]['date'] = $result['date'];
    $echo[$i]['id'] = $result['id'];
    $echo[$i]['askDate'] = $result['askDate'];
    $echo[$i]['reason'] = $result['reason'];
    $echo[$i]['time'] = $result['time'];
    $i++;
}
if($i == 0){
    echo "[]";
} else {
    echo json_encode($echo);
}