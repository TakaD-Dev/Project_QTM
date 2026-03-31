<?php
$host = "192.168.1.2"; // THAY BẰNG IP THẬT CỦA MÁY BẠN (Ví dụ 192.168.x.x)
$user = "root";        // Đảm bảo User root này có quyền truy cập từ xa (Remote Access)
$pass = "";            // Mật khẩu MySQL của bạn
$dbname = "web_basic";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>