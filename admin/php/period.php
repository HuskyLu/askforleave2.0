<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$period = $_GET['period'];
$sql = "select count(*) as num from period where period = ".$period;
$query = query($conn, $sql);
$result = mysqli_fetch_array($query);
if($result['num'] == 0){
    $sql = "update period set current = 0";
    $query = query($conn, $sql);
    $values = array($period,'1');
    $judge = insert($conn,"period",$values);
    echo 1;
} else if($result['num'] == 1){
    $sql = "update period set current = 0";
    $query = query($conn, $sql);
    $sql = "update period set current = 1 where period = ".$period;
    $query = query($conn, $sql);
    echo 1;
} else {
    echo 0;
}

