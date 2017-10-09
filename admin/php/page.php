<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$sql = $_POST['sql'];
$query = query($conn, $sql);
$result = mysqli_fetch_array($query);
echo $result['data'];
