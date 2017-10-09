<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$meeting = $_POST['meeting'];
$time = $_POST['time'];
$id = $_POST['id'];
$sql = "update meeting_table set meetingName = '".$meeting."' , meetingTime = '".$time."' where id = ".$id;
$query = query($conn, $sql);
echo '1';
