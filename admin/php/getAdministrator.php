<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
session_start();
$type = $_SESSION['type'];
if($type == 0){
    $sql = "select id,name,type from admin_table";
    $query = query($conn, $sql);
    $echo;
    $i = 0;
    while($result = mysqli_fetch_array($query)){
        $echo[$i]['id'] = $result['id'];
        $echo[$i]['name'] = $result['name'];
        $echo[$i]['type'] = $result['type'];
        $i++;
    }
    echo json_encode($echo);
} else if($type == 1){
    $sql = "select id,name,type from admin_table where type = 1";
    $query = query($conn, $sql);
    $echo;
    $i = 0;
    while($result = mysqli_fetch_array($query)){
        $echo[$i]['id'] = $result['id'];
        $echo[$i]['name'] = $result['name'];
        $echo[$i]['type'] = $result['type'];
        $i++;
    }
    echo json_encode($echo);
}
