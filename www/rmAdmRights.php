<?php
$conf=require 'config.php';

$pdo=new PDO($conf['dsn'],$conf['username'],$conf['password']);

$id=$_GET['id'];

$sql="UPDATE users SET status_id=1 WHERE id= '$id'";
$stmt = $pdo->query($sql);
header("Location:profile.php?id={$id}");