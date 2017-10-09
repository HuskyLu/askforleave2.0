<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$name = $_POST['username'];
$num = $_POST['studentNum'];
$longphone = $_POST['longphone'];
$shortphone = $_POST['shortphone'];
if(empty($shortphone)){
    $shortphone = 0;
}
$department = $_POST['department'];
$position = $_POST['position'];
$status = $_POST['status'];
$sql = "select * from period where current = 1";
$query = query($conn, $sql);
$result = mysqli_fetch_array($query);
$values = array($num,'e10adc3949ba59abbe56e057f20f883e',$name,$department,$position,$longphone,$shortphone,$status,$result['period']);
$judge = insert($conn,"login_table",$values);
echo true;
