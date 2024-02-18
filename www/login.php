<?php
session_start();
$user = 'root';
$pass = 'root';
$dsn = "mysql:host=mysql2;dbname=practic_bd;charset=utf8";
$pdo=new PDO($dsn, $user, $pass);

if (empty($_POST)) {
    header('Location:main.php');
}else {


    if (!empty($_POST['login']) and !empty($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE login = '$login'";
        $stmt = $pdo->query($sql);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($user)) {
            $hash=$user['password'];
            if(password_verify($password,$hash) and $user['status_id']==2){
                $_SESSION['auth'] = true;
                $_SESSION['login']=$login;
                $_SESSION['id']=$user['id'];
                header('Location: view/admin_page.php');
                die();
            }
            elseif(password_verify($password,$hash)){
                $_SESSION['auth'] = true;
                $_SESSION['login']=$login;
                $_SESSION['id']=$user['id'];
                header('Location: view/content_page.php');
                die();
            }else {
                $_SESSION['auth'] = false;
                $_SESSION['flash'] = 'Неверный логин или пароль';
                header('Location: login_page');
                die();
            }
        } else {
            $_SESSION['auth'] = false;
            $_SESSION['flash'] = 'Неверный логин или пароль';
            header('Location: login_page');
            die();
        }
    }else {
        $_SESSION['auth'] = false;
        $_SESSION['flash'] = 'Неверный логин или пароль';
        header('Location: login_page');
        die();
    }
}
