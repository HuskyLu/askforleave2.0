<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$id = $_POST['id'];
$meeting = $_POST['meeting'];
$time = $_POST['time'];
$reason = $_POST['reason'];
$sql = "update asking_meeting_table set meetingName = '".$meeting."', meetingTime = '".$time."', reason = '".$reason."',askTime = curdate() where id=".$id;
$query = query($conn, $sql);
echo true;
