<?php
$servername = "192.168.1.3"; // Thay bằng IP máy Ubuntu của ní
$username = "root";          // User MySQL của ní
$password = "123";           // Pass MySQL của ní
$dbname = "project_qtm";     // Tên database ní đã tạo

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công rực rỡ!";
?>