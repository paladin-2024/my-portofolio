<?php
// Connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');

// Fetch the message to edit
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM messages WHERE id = ?');
$stmt->execute([$id]);
$message = $stmt->fetch();

// Update the message
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $stmt = $pdo->prepare('UPDATE messages SET content = ? WHERE id = ?');
    $stmt->execute([$content, $id]);
    header('Location: your_page.php');
}
?>
