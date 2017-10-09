<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$id = $_POST['id'];
$sql = "update login_table set password = 'e10adc3949ba59abbe56e057f20f883e' where id = ".$id;
$query = query($conn, $sql);
echo '1';

