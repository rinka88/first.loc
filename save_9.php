<?php
$text = $_POST['text'];

$pdo = new PDO('mysql:host=localhost;dbname=first','root','root');
$sql = "INSERT INTO mytable(text) VALUES (:text)";
$statement = $pdo -> prepare($sql);
$statement -> execute(['text' => $text]);

header('Location: /task_9.php');