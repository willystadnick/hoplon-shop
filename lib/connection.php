<?php

$servername = "localhost:33063";
$username = "framework";
$password = "framework";
$dbname = "estore";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ( ! $conn) {
    die("Connection failed: " . mysqli_connect_error());
}
