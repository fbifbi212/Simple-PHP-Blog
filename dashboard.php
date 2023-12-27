<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'functions.php';

// Kullanıcının gönderdiği blog yazılarını alalım
$user_id = $_SESSION['user_id']; // Kullanıcı kimliği
$posts = getUserPosts($user_id);
?>
<!-- Kullanıcı paneli -->
<h1>Merhaba, <?php echo $_SESSION['username']; ?>!</h1>
<p>Bu sizin panelinizdir.</p>

<!-- Kullanıcının gönderdiği blog yazılarını listeleme -->
<h2>Gönderdiğiniz Yazılar</h2>
<?php while ($post = $posts->fetch_assoc()) { ?>
    <h3><?php echo $post['title']; ?></h3>
    <p><?php echo $post['content']; ?></p>
<?php } ?>