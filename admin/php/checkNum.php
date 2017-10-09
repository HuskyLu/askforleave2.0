<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$num = $_GET['studentNum'];
$sql = "select * from login_table where number = '".$num."'";
$query = query($conn, $sql);
$result = mysqli_fetch_array($query);
if(sizeof($result) == 0){
    echo 'true';
} else {
    echo 'false';
}
//if(empty($result)){
//    echo 0;
//} else {
//    echo 1;
//}
