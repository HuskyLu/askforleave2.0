<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$id = $_POST['id'];
$tbName = $_POST['table'];
$sql = "select * from ".$tbName." where id="."$id";
$query = query($conn, $sql);
$result = mysqli_fetch_array($query);
echo json_encode($result);
