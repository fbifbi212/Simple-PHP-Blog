<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "blog_db";

// MySQL bağlantısı
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
}

// Kullanıcı kaydı işlemi
function registerUser($username, $email, $password)
{
    global $conn;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
    return $conn->query($sql);
}

// Kullanıcı girişi işlemi
function loginUser($email, $password)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            return $row;
        }
    }
    return false;
}

// Blog yazısı gönderme işlemi
function submitPost($user_id, $title, $content)
{
    global $conn;
    $sql = "INSERT INTO posts (user_id, title, content) VALUES ('$user_id', '$title', '$content')";
    return $conn->query($sql);
}

// Tüm blog yazılarını getirme işlemi
function getAllPosts()
{
    global $conn;
    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
    return $conn->query($sql);
}

// Kullanıcı adına göre blog yazılarını getirme işlemi
function getUserPosts($user_id)
{
    global $conn;
    $sql = "SELECT * FROM posts WHERE user_id='$user_id' ORDER BY created_at DESC";
    return $conn->query($sql);
}
