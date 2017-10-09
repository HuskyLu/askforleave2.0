<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
session_start();
$department = $_POST['department'];
$sql = "select count(*) as num from department where department = '".$department."'";
$query = query($conn, $sql);
$row = mysqli_fetch_array($query);
if($row['num'] == 0){
    $values = array($department);
    $judge = insert($conn,"department",$values);
    echo 1;
} else {
    echo 0;
}
