<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
session_start();
$date = $_POST['date'];
$shift = $_POST['shift'];
$reason = $_POST['reason'];
$values = array($_SESSION['name'],date("y-m-d"),date("w"),$date,$shift,$reason,$_SESSION['department_']);
//echo $values[];
$judge = insert($conn,"asking_work_table",$values);