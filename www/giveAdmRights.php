<?php
$user = 'root';      // имя пользователя
$pass = 'root';          // пароль
$dsn = "mysql:host=mysql2;dbname=practic_bd;charset=utf8";
$pdo = new PDO($dsn, $user, $pass);

$id=$_GET['id'];

$sql="UPDATE users SET status_id=2 WHERE id= '$id'";
$stmt = $pdo->query($sql);
header("Location:profile.php?id={$id}");

