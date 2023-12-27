<?php
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (registerUser($username, $email, $password)) {
        echo "Kullanıcı başarıyla kaydedildi.";
    } else {
        echo "Kullanıcı kaydedilemedi.";
    }
}
?>
<!-- Kayıt formu -->
<form method="post" action="">
    <label>Kullanıcı Adı:</label>
    <input type="text" name="username"><br>
    <label>E-posta:</label>
    <input type="text" name="email"><br>
    <label>Şifre:</label>
    <input type="password" name="password"><br>
    <input type="submit" value="Kayıt Ol">
</form>