<?php
$servername = "192.168.1.3"; // Địa chỉ IP máy Ubuntu của ní
$username = "root";          // Tên đăng nhập MySQL
$password = "123";           // Mật khẩu MySQL của ní
$dbname = "project_qtm";     // Tên database ní đã tạo

// Khởi tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra xem có thông không
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

?>