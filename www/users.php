<?php
session_start();
$conf=require 'config.php';

$pdo=new PDO($conf['dsn'],$conf['username'],$conf['password']);

$sql = "SELECT id,login,status_id FROM users";
$stmt = $pdo->query($sql);
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($user as $item){
    $id=$item['id'];
    $link=$item['login'];
    echo $id . "<a href='profile.php?id={$id}'> $link </a>" . '<br>';
}

echo "<a href='view/admin_page.php'> На главную </a><br>";





