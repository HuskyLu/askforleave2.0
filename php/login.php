<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$user = $_POST['user'];
$password = $_POST['password'];
$width = $_POST['width'];
$sql = "select * from askforleave.login where number = " . $user . ";";
$query = query($conn, $sql);
$result = mysqli_fetch_array($query);
if (!empty($result)) {
    $password = md5($password);
    if ($result['password'] == $password && $result['status'] != 0) {
        session_start();
        $_SESSION['number'] = $result['number'];
        $_SESSION['name'] = $result['name'];
        $_SESSION['department'] = $result['department'];
        $_SESSION['department_'] = $result['department_'];
        $_SESSION['position'] = $result['position_'];
        if((int)$width > 769){
            if($_SESSION['position'] == '2' || $_SESSION['position'] == '5'){
                echo '10';
            } else {
                echo '11';
            }
        } else {
            if($_SESSION['position'] == '2' || $_SESSION['position'] == '5'){
                echo '0';
            } else {
                echo '1';
            }
        }
    } else if ($result['status'] == 0) {
        echo '2';
    } else {
        echo '3';
    }
} else {
    echo '3';
}