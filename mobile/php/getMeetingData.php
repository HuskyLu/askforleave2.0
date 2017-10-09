<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
session_start();
$page = $_POST['page']*10;
$sql = "select * from asking_meeting_table a where a.name = '".$_SESSION['name']."' order by field(a.condition,'未通过','通过','待审核') desc,a.meetingTime desc limit ".$page.",10";
$query = query($conn, $sql);
$i=0;
$echo;
while($result = mysqli_fetch_array($query)){
    $echo[$i]['id'] = $result['id'];
    $echo[$i]['name'] = $result['name'];
    $echo[$i]['meetingName'] = $result['meetingName'];
    $echo[$i]['meetingTime'] = $result['meetingTime'];
    $echo[$i]['askTime'] = $result['askTime'];
    $echo[$i]['condition'] = $result['condition'];
    $echo[$i]['reason'] = $result['reason'];
    $i++;
}
echo json_encode($echo);
