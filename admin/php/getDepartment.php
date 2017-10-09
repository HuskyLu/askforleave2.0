<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$sql = "select * from department";
$query = query($conn, $sql);
$echo;
$i=0;
while ($result = mysqli_fetch_array($query)){
    $echo[$i]['id'] = $result['id'];
    $echo[$i]['department'] = $result['department'];
    $i++;
}
echo json_encode($echo);
