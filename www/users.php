<?php
session_start();
$user = 'root';      // имя пользователя
$pass = 'root';          // пароль
$dsn = "mysql:host=mysql2;dbname=practic_bd;charset=utf8";
$pdo = new PDO($dsn, $user, $pass);

$sql = "SELECT id,login,status_id FROM users";
$stmt = $pdo->query($sql);
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($user as $item){
    $id=$item['id'];
    $link=$item['login'];
    echo $id . "<a href='profile.php?id={$id}'> $link </a>" . '<br>';
}

echo "<a href='view/admin_page.php'> На главную </a><br>";





