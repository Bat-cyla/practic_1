<?php
session_start();

if (isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
}
$conf=require 'config.php';

$pdo=new PDO($conf['dsn'],$conf['username'],$conf['password']);

    function loginCheck($login){
        $array=['A', 'a', 'B', 'b', 'C', 'c', 'D', 'd', 'E', 'e', 'F', 'f', 'G', 'g', 'H', 'h', 'I', 'i',
            'J', 'j', 'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P', 'p', 'Q', 'q', 'R', 'r',
            'S', 's', 'T', 't', 'U', 'u', 'V', 'v', 'W', 'w', 'X', 'x', 'Y', 'y', 'Z', 'z', 1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
        $loginArr = str_split($login, 1);
        foreach ($loginArr as $elem){
            if(in_array($elem,$array)===true){
                $result=true;
            }else return false;
        }
        return $result;
    }

if (empty($_POST['login']) and empty($_POST['password']) and empty($_POST['confirm'])) {
    $_SESSION['flash'] = 'Заполните поля регистрации';
    header("location: register_page");
    die();
}

if (strlen($_POST['login']) < 4 OR strlen($_POST['login']) > 10) {
    $_SESSION['flash'] = 'Логин должен быть от 4 до 10 символов';
    header("location: register_page");
    die();
}
if(loginCheck($_POST['login'])!==true) {
    $_SESSION['flash'] = 'Логин может содержать только латинские буквы и цифры';
    header("location: register_page");
    die();
}
if (strlen($_POST['password']) < 6 OR strlen($_POST['password']) > 12) {
    $_SESSION['flash']= "Пароль должен быть от 6 до 12 символов";
    header("location: register_page");
    die();
}
if ($_POST['password'] !== $_POST['confirm']) {
    $_SESSION['flash']= "Пароли не совпадают";
    header("location: register_page");
    die();
}

$login = $_POST['login'];
$phone_number = $_POST['phone_number'];
$mail = $_POST['mail'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "SELECT * FROM users WHERE login = '$login'";
$stmt = $pdo->query($sql);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (!empty($user)) {
    $_SESSION['flash']= "Пользователь с таким логином уже существует";
    header("location: register_page");
    die();
}


$sql = "INSERT INTO users SET login = '$login',phone_number = '$phone_number', mail='$mail', password = '$password', status_id=1";
$stmt = $pdo->query($sql);

$id = $pdo->lastInsertId($sql);

$_SESSION['login']=$login;
$_SESSION['id'] = $id;
$_SESSION['auth'] = true;
$_SESSION['status']=null;
    header("Location: view/content_page.php");











