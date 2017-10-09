<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
session_start();
$position = $_SESSION['position'];
$table = $_POST['table'];
$type = $_POST['type'];//1为值班请假，2为会议请假，3为审核
if($position == 1){
    if($type == 1){
        
    }
} else if($position == 2){
    if($type == 1){
        $sql = "select count(name) from ".$table." where name = '".$_SESSION['name']."'";
    } else if($type == 2){
        $sql = "select count(name) from ".$table." where name = '".$_SESSION['name']."'";
    } else if($type == 3){
        $sql = "select count(department) from ".$table." where department = ".$_SESSION['department_'];
    }
} else if($position == 0){
    
} else if($position == 5){
    if($type == 1){
        $sql = "select count(name) from ".$table." where name = '".$_SESSION['name']."'";
    } else if($type == 2){
        $sql = "select count(name) from ".$table." where name = '".$_SESSION['name']."'";
    } else if($type == 3){
        $sql = "select count(department) from ".$table." where department = ".$_SESSION['department_']." || position = 2 || position = 5";
    }
} else {
    if($type == 1){
        $sql = "select count(name) from ".$table." where name = '".$_SESSION['name']."'";
    } else if($type == 2){
        $sql = "select count(name) from ".$table." where name = '".$_SESSION['name']."'";
    }
}
$query = query($conn, $sql);
$result = mysqli_fetch_array($query);
echo json_encode(ceil($result[0]/10));