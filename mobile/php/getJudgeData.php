<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
session_start();
$page = $_POST['page'];
$page *= 10;
if($_SESSION['position'] == 2){
    $sqlWhere = " and department = ".$_SESSION['department_']." and name != '".$_SESSION['name']."'";
} else if ($_SESSION['position'] == 5){
    $sqlWhere = " and (department = ".$_SESSION['department_']." || position = 2 || position = 5) ";
}
$sql = "select * from asking_meeting_table a where 1=1 ".$sqlWhere." order by field(a.condition,'未通过','通过','待审核') desc,a.meetingTime desc limit ".$page.",10";//field('a.condition','待审核','通过','未通过')
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
