<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($username) || empty($password)) {
        echo "Vui lòng nhập đầy đủ tài khoản và mật khẩu!";
        exit();
    }

    $query = "SELECT * FROM user WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && isset($user['password']) && $password === $user['password']) { // Kiểm tra tồn tại key 'password'
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] === 'admin') {
            header("Location: admin.php"); // Điều hướng Admin
        } else {
            header("Location: index.php"); // Điều hướng User
        }
        exit();
    } else {
        echo "Sai tài khoản hoặc mật khẩu!";
    }
}
?>



<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Đăng Nhập</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="post">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" name="username" required>
            
            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" required>

            <button type="submit">Đăng Nhập</button>
        </form>
    </div>
</body>
</html>
