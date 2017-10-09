<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
session_start();
$tbName = $_POST["table"];
$id = $_POST["id"];
if($_SESSION['position'] == 1 || $_SESSION['position'] == 0){
    $sql = "delete from ".$tbName." where id = ".$id;
    $query = query($conn, $sql);
    echo true;
} else {
    if($tbName == "asking_work_table"){
        $sql = "select * from ".$tbName." where id = ".$id;
        $query = query($conn, $sql);
        $result = mysqli_fetch_array($query);
        $time = $result['askDate'];
        if(strtotime($time) > strtotime(date('y-m-d'))){
            $sql = "delete from ".$tbName." where id = ".$id;
            $query = query($conn, $sql);
            echo '0';
        } else {
            echo '1';
        }
    } else if($tbName == "asking_meeting_table"){
        $sql = "select * from ".$tbName." where id = ".$id;
        $query = query($conn, $sql);
        $result = mysqli_fetch_array($query);
        $time = $result['meetingTime'];
        if(strtotime($time) > strtotime(date('y-m-d'))){
            $sql = "delete from ".$tbName." where id = ".$id;
            $query = query($conn, $sql);
            echo '0';
        } else {
            echo '1';
        }
    }
}
