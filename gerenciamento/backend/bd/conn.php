<?php

function connBD()
{
    $host = "localhost";
    $dbUsername = "root";
    $dbpassword = "";
    $dbName = "trabalho";

    $conn = new mysqli($host, $dbUsername, $dbpassword, $dbName);
    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    }
    return $conn;
}
