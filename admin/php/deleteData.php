<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$tbName = $_POST['table'];
$id = $_POST['id'];
$sql = "delete from ".$tbName." where id = ".$id;
$query = query($conn, $sql);
echo '1';
