<!DOCTYPE html>
<html>
<head>
    <title>Web PHP của Hào</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>🔥 Xin chào Minh Hào</h1>

        <form method="POST">
            <input type="text" name="name" placeholder="Nhập tên...">
            <button type="submit">Gửi</button>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                echo "<p class='result'>Hello $name 😎</p>";
            }
        ?>
    </div>

</body>
</html>