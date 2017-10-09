<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$id = $_POST['id'];
$password = $_POST['newpassword'];
$password = md5($password);
$sql = "update admin_table set password = '".$password."' where id = ".$id;
$query = query($conn, $sql);
echo '1';
