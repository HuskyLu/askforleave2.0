<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
switch ($_SESSION['position']) {
    case 2:
        echo '0';
        break;
    case 5:
        echo '0';
        break;
    case 4:
        echo '1';
        break;
    case 3:
        echo '1';
        break;
    case 6:
        echo '1';
        break;
    default:
        echo 'error';
        break;
}
