<?php
session_start();
$text = $_POST['text'];

$pdo = new PDO('mysql:host=localhost;dbname=first','root','root');

$sql = 'SELECT * FROM mytable WHERE text=:text';
$statement = $pdo -> prepare($sql);
$statement -> execute(['text' => $text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($task)) {
    $message = 'Введенная запись уже существует.';
    $_SESSION['danger'] = $message;

    header('Location: /task_10.php');
    exit;
}


$sql = "INSERT INTO mytable(text) VALUES (:text)";
$statement = $pdo -> prepare($sql);
$statement -> execute(['text' => $text]);

$message = 'Введенная запись записалось в базу данных.';
$_SESSION['success'] = $message;

header('Location: /task_10.php');