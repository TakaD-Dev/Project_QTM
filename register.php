<?php
include 'db.php';
if(isset($_POST['register'])){
    $u = $_POST['username'];
    $p = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password) VALUES ('$u', '$p')";
    if(mysqli_query($conn, $sql)) echo "Đăng ký thành công!";
}
?>
<form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="register">Đăng ký</button>
</form>