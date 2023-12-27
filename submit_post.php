<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id']; // Kullanıcı kimliği

    if (submitPost($user_id, $title, $content)) {
        echo "Yazı başarıyla gönderildi.";
    } else {
        echo "Yazı gönderilemedi.";
    }
}
?>
<!-- Yazı gönderme formu -->
<form method="post" action="">
    <label>Başlık:</label>
    <input type="text" name="title"><br>
    <label>İçerik:</label>
    <textarea name="content"></textarea><br>
    <input type="submit" value="Gönder">
</form>