-- Veritabanını oluştur
CREATE DATABASE IF NOT EXISTS blog_db;
USE blog_db;

-- Kullanıcılar tablosunu oluştur
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Gönderiler tablosunu oluştur
CREATE TABLE IF NOT EXISTS posts (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Örnek kullanıcı ekle
INSERT INTO users (username, email, password) VALUES
('user1', 'user1@example.com', 'hashed_password_1'),
('user2', 'user2@example.com', 'hashed_password_2');

-- Örnek gönderi ekle
INSERT INTO posts (user_id, title, content) VALUES
(1, 'Başlık 1', 'İçerik 1'),
(1, 'Başlık 2', 'İçerik 2'),
(2, 'Başlık 3', 'İçerik 3');
