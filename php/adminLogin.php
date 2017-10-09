<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$user = $_POST['user'];
$password = $_POST['password'];
$sql = "select * from askforleave.admin_table where name = '" . $user . "'";
$query = query($conn, $sql);
$result = mysqli_fetch_array($query);
if (!empty($result)) {
    $password = md5($password);
    if ($result['password'] == $password) {
        session_start();
        $_SESSION['name'] = $result['name'];
        $_SESSION['type'] = $result['type'];
        if($result['type'] == 1){
            echo '0';//admin
        } else if ($result['type'] == 2){
            echo '1';//mishubu
        }
    } else {
        echo '3';
    }
} else {
    echo '3';
}