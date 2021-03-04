<?php

$serverName = "localhost";
$dataBaseUserName = "root";
$dataBasePassword = "";
$dataBaseName = "flyyrin-web";
$connectDataBase = mysqli_connect($serverName, $dataBaseUserName, $dataBasePassword, $dataBaseName);

if (!$connectDataBase) {
    die("Connection failed: " . mysqli_connect_error());  
}