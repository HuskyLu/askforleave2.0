<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
session_start();
$page = $_POST['page'];
$page = $page*10;
$sql = "select * from asking_work_table where name = '".$_SESSION['name']."' order by askDate desc limit ".$page.",10";
$query = query($conn, $sql);
$i=0;
$echo;
while($result = mysqli_fetch_array($query)){
    $echo[$i]['id'] = $result['id'];
    $echo[$i]['date'] = $result['date'];
    $echo[$i]['day'] = $result['day'];
    $echo[$i]['askDate'] = $result['askDate'];
    $echo[$i]['time'] = $result['time'];
    $echo[$i]['reason'] = $result['reason'];
    $i++;
}
if($i == 0){
    echo [];
} else {
    echo json_encode($echo);
}

