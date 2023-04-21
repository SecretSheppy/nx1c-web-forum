<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nx1c";

$db = new mysqli($servername, $username, $password, $dbname);

if ($db->connect_error) {
    header("Location: err.php");
    exit();
}