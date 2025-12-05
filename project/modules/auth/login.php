<?php
// Jika sudah login, redirect
if (isset($_SESSION['login'])) {
    header("Location: index.php?page=dashboard");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/auth.css">
</head>
<body>

<div class="auth-container">
    <h2>Login</h2>

    <form method="post">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button name="login" class="auth-btn">Masuk</button>
    </form>
</div>

<script src="assets/js/script.js"></script>

</body>
</html>

<?php
if (isset($_POST['login'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Dummy auth (bisa hubungkan ke database jika mau)
    if ($user === "admin" && $pass === "admin123") {

        $_SESSION['login'] = true;

        echo "<script>
            showAlert('Login berhasil', 'success');
            setTimeout(() => {
                window.location = 'index.php?page=dashboard';
            }, 1200);
        </script>";

    } else {
        echo "<script>showAlert('Username atau password salah!', 'error');</script>";
    }
}
?>
