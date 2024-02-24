<?php
session_start();
const USER = 1;
const ADMIN = 2;

$conf=require 'config.php';

$pdo=new PDO($conf['dsn'],$conf['username'],$conf['password']);

if (empty($_POST)) {
    header('Location:main.php');
}

if (empty($_POST['login']) and empty($_POST['password'])) {
    $_SESSION['auth'] = false;
    $_SESSION['flash'] = 'Введите логин и пароль';
    header('Location: login_page');
    die();
}

$login = $_POST['login'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE login = '$login'";
$stmt = $pdo->query($sql);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($user)) {
    $_SESSION['auth'] = false;
    $_SESSION['flash'] = 'Пользователь с таким логином не найден';
    header('Location: login_page');
    die();
}

$hash=$user['password'];
$isCorrectPassword = password_verify($password,$hash);

if (!$isCorrectPassword) {
    $_SESSION['auth'] = false;
    $_SESSION['flash'] = 'Неверный логин или пароль';
    header('Location: login_page');
    die();
}

switch ($user['status_id']) {
    case ADMIN:
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $user['id'];
        header('Location: view/admin_page.php');
        die();
    case USER:
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $user['id'];
        header('Location: view/content_page.php');
        die();
}
