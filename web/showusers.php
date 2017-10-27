<?php
header("ACCESS-CONTROL-ALLOW-ORIGIN: *");
$conn = new mysqli("localhost", "root", "", "large_donut");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->close();
?>