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
$reason = $_POST['reason'];
$values = array($_SESSION['name'],$meeting,$time,date("y-m-d"),$_SESSION['department_'],$reason,"待审核",$_SESSION['position']);
$judge = insert($conn,"asking_meeting_table",$values);
echo true;
