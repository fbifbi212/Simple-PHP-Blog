<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = loginUser($email, $password);
    if ($user) {
        // Oturum başlatma işlemi - Örnek olarak kullanıcı adını oturumda saklayalım
        session_start();
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
    } else {
        echo "Hatalı e-posta veya şifre.";
    }
}
?>
<!-- Giriş formu -->
<form method="post" action="">
    <label>E-posta:</label>
    <input type="text" name="email"><br>
    <label>Şifre:</label>
    <input type="password" name="password"><br>
    <input type="submit" value="Giriş Yap">
</form>