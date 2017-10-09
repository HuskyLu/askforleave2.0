<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
session_start();
$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$sql = "select * from login_table where number=".$_SESSION['number'];
$query = query($conn, $sql);
$result = mysqli_fetch_array($query);
if(md5($oldPassword) == $result['password']){
    $sql = "update login_table set password = '".md5($newPassword)."'";
    $query = query($conn, $sql);
    echo 1;
} else {
    echo 0;
}