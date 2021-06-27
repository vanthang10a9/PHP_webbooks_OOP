<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function ketnoiCSDL()
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookstore";
    $con = mysqli_connect($server, $username, $password);
    if (!$con) {
        echo "Ket noi khong thanh cong";
    } else {        
        mysqli_select_db($con, $dbname);
        return $con;
    }
}
