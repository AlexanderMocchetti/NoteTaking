<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db = "note";

$conn = new mysqli($hostname, $username, $password, $db);

if ($conn->connect_error) {
    die("DB failure". $conn->connect_error);
}