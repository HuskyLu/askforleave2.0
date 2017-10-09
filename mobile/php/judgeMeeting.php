<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
session_start();
$id = $_POST['id'];
$type = $_POST['type'];
if ($type == 0){
    $sql = "update asking_meeting_table a set a.condition = '不通过' where a.id = ".$id;
} else if ($type == 1){
    $sql = "update asking_meeting_table a set a.condition = '通过' where a.id = ".$id;
}
$query = query($conn, $sql);
echo true;
