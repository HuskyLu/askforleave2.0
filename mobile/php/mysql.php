<?php

define('host', 'localhost:3306');
define('user', 'root');
define('password', 'asdwsx.06.27');
define('database', 'askforleave');

$conn = conn();

function conn() {
    $CONN = mysqli_connect(host, user, password, database);
    return $CONN;
}

function query($conn, $sql) {
    $query = mysqli_query($conn, $sql);
    if ($query) {
        return $query;
    } else {
        return null;
    }
}

function close($conn) {
    mysqli_close($conn);
}

function insert($conn, $tableName, $values = array()) {
    $sql = 'insert into ' . $tableName . ' values (null';
    for ($i = 0; $i < sizeof($values); $i++) {
        $sql = $sql . ',' . '"' . $values[$i] . '"';
    }
    $sql = $sql . ')';
    mysqli_query($conn, $sql, MYSQLI_STORE_RESULT);
    return true;
}

function update($conn, $tableName, $columns = array(), $values = array(), $type, $condition) {
    $sql = 'update ' . $tableName . ' set ';
    if (sizeof($columns) == sizeof($values)) {
        for ($i = 0; i < sizeof($columns); $i++) {
            if ($i == 0) {
                $sql = $sql . $columns[0] . ' = ' . $values;
            } else {
                $sql = $sql . ',' . $columns[0] . ' = ' . $values;
            }
        }
        $sql = $sql."where ".$type."=".$condition;
    } else {
        return false;
    }
    mysqli_query($conn, $sql);
    return true;
}

function delete($conn, $tableName, $id) {
    $sql = 'delete from ' . $tableName . ' where id=' . $id;
    mysqli_query($conn, $sql);
    return true;
}

function select($conn, $tableName, $columns = array(), $values = array()) {
    $sql = 'select * from ' . $tableName;
    if (sizeof($columns) == sizeof($values) && sizeof($columns) != 0 && sizeof($values) != 0) {
        $sql = $sql . ' where ';
        for ($i = 0; $i < sizeof($columns); $i++) {
            if ($i == 0) {
                $sql = $sql . $columns[$i] . ' = ' . $values[$i];
            } else {
                $sql = $sql . ',' . $columns[$i] . ' = ' . $values[$i];
            }
        }
    }
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);
    return $result;
}

function selectAll($conn, $tableName, $desc) {
    $sql = 'select * from ' . $tableName . $desc;
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($query);
    return $result;
}
