<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if(!empty($_SESSION['name'])){
    echo $_SESSION['name'];
} else {
    echo 0;
}
