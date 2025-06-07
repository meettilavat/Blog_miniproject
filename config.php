<?php

$dbServer = getenv('DB_SERVER') ?: 'localhost';
$dbUsername = getenv('DB_USERNAME') ?: 'root';
$dbPassword = getenv('DB_PASSWORD') ?: 'password';
$dbName = getenv('DB_NAME') ?: 'test';

define('DB_SERVER', $dbServer);
define('DB_USERNAME', $dbUsername);
define('DB_PASSWORD', $dbPassword);
define('DB_NAME', $dbName);

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

function GetALL() {
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $sql = "SELECT * FROM contents ORDER BY id DESC";
    $result = $conn->query($sql);
    return $result;
}
?>

