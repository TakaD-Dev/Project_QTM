<?php
include "db.php";

if (isset($_SESSION['user_id'])) {
    $username = $_SESSION['username'];
    $logged_in = true;
} else {
    $logged_in = false;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php if ($logged_in): ?>
            <h1 class="title">Xin chào, <?php echo htmlspecialchars($username); ?>!</h1>
            <div class="actions">
                <a href="logout.php" class="btn login">Đăng xuất</a>
            </div>
        <?php else: ?>
            <h1 class="title">Chào mừng bạn đến</h1>
            <div class="actions">
                <a href="login.php" class="btn login">Đăng nhập</a>
                <a href="register.php" class="btn register">Đăng ký</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>