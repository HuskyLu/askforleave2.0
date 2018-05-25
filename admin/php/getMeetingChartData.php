<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$start = $_POST['start'];
$end = $_POST['end'];
$where = " where 1=1 ";
if($start != ""){
    $where = $where." and meetingTime >= '".$start."'";
}
if($end != ""){
    $where = $where." and meetingTime <= '".$end."'";
}
$sql = "select count(department) as num,department from asking_meeting ".$where." GROUP BY department order by count(department) ";
$query = query($conn, $sql);
$i=0;
$echo;
while($result = mysqli_fetch_array($query)){
    $echo[$i]['name'] = $result['department'];
    $echo[$i]['value'] = $result['num'];
    $i++;
}
if($i == 0){
    echo "[]";
} else {
    echo json_encode($echo);
}