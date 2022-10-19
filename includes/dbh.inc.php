<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "inventory_system";

$connection = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
if ($connection->connect_error) {
    die('Connection Failed : '.$connection->connect_error);
}