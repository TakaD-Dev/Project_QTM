<?php
$host = "localhost"; // Hoặc IP của máy DB
$user = "root";
$pass = "";
$dbname = "web_basic";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>