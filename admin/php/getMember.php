<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql.php';
$limit = $_POST['limit'];
$searchStr = $_POST['searchStr'];
$where = " where 1=1 ";
if($searchStr != ""){
    $where = $where." and (name like '%".$searchStr."%' or number like '%".$searchStr."%')";
}
$sql = "select * from member ".$where." order by department desc,field(position,'主席','秘书长','部长','委员','干事')  limit ".$limit.",25 ";
$query = query($conn, $sql);
$i=0;
$echo;
while($result = mysqli_fetch_array($query)){
    $echo[$i]['name'] = $result['name'];
    $echo[$i]['department'] = $result['department'];
    $echo[$i]['number'] = $result['number'];
    $echo[$i]['id'] = $result['id'];
    $echo[$i]['longphone'] = $result['longphone'];
    if($result['shortphone'] != 0)
        $echo[$i]['shortphone'] = $result['shortphone'];
    else 
        $echo[$i]['shortphone'] = "";
    $echo[$i]['period'] = $result['period'];
    $echo[$i]['position'] = $result['position'];
    $i++;
}
if($i == 0){
    echo "[]";
} else {
    echo json_encode($echo);
}