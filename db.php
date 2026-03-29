<?php
$conn = new mysqli("localhost", "root", "", "web_basic");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

session_start();
