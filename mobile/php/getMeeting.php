<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$sql = "select meetingName,meetingTime from meeting_table where meetingTime >= '".date('y-m-d')."' order by meetingTime desc";
$query = query($conn, $sql);
$echo;
$i = 0;
while($result = mysqli_fetch_array($query)){
    $echo[$i]['meetingName'] = $result['meetingName'];
    $echo[$i]['meetingTime'] = $result['meetingTime'];
    $i++;
}
echo json_encode($echo);
