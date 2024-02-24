<?php
session_start();

$conf=require 'config.php';

$pdo=new PDO($conf['dsn'],$conf['username'],$conf['password']);

 $sql="SELECT * FROM users WHERE id= '$id'";
 $stmt=$pdo->query($sql);
 $user=$stmt->fetch(PDO::FETCH_ASSOC);

 if(password_verify($_POST['password'], $user['password'])){
     $sql="DELETE FROM users WHERE id='$id'";
     $stmt=$pdo->query($sql);
     $_SESSION['flash']= "User {$_SESSION['login']} was deleted";
     header("location: main");
     die();
 }else{
     echo 'Пароль введен неверно';
 }