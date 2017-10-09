<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$name = $_POST['username'];
$number = $_POST['studentNum'];
$department = $_POST['department'];
$position = $_POST['position'];
$longphone = $_POST['longphone'];
$shortphone = $_POST['shortphone'];
$status = $_POST['status'];
$period = $_POST['period'];
$id = $_POST['id'];
$sql = "update login_table set name = '".$name."' , number = '".$number."' , department = ".$department." , position = ".$position." , longphone = ".$longphone." , shortphone = ".$shortphone." , status = ".$status." , period = ".$period." where id = ".$id;
$query = query($conn, $sql);
echo '1';
