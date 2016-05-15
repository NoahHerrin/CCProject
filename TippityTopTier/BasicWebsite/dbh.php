<?php
global $db_host;
$db_host= "198.71.225.59:3306";
global $db_username;
$db_username = "root";
global $db_password ;
$db_password = "root";
global $db_name;
$db_name = "AllTheData;";
global $conn;
try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}