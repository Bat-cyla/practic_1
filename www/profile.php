<?php
$user = 'root';      // имя пользователя
$pass = 'root';          // пароль
$dsn = "mysql:host=mysql2;dbname=practic_bd;charset=utf8";
$pdo = new PDO($dsn, $user, $pass);

$id=$_GET['id'];

$sql = "SELECT * FROM users WHERE id='$id'";
$stmt = $pdo->query($sql);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

echo $user['login']. '<br>';
echo $user['phone_number']. '<br>';
echo $user['mail'];


