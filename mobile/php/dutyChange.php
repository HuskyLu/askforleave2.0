<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$id = $_POST['id'];
$date = $_POST['date'];
$shift = $_POST['shift'];
$reason = $_POST['reason'];
$sql = "update asking_work_table set date = '".$date."', time = '".$shift."', reason = '".$reason."',askDate = curdate() where id=".$id;
$query = query($conn, $sql);
echo true;
