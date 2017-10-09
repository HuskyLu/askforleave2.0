<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
session_start();
$meeting = $_POST['meeting'];
$time = $_POST['time'];
$sql = "select count(*) as num from meeting_table where meetingName = '".$meeting."' and meetingTime = '".$time."'";
$query = query($conn, $sql);
$row = mysqli_fetch_array($query);
if($row['num'] == 0){
    $values = array($meeting,$time);
    $judge = insert($conn,"meeting_table",$values);
    echo 1;
} else {
    echo 0;
}
