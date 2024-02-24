<?php
session_start();
if (isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
}
$conf=require 'config.php';

$pdo=new PDO($conf['dsn'],$conf['username'],$conf['password']);

    $id=$_SESSION['id'];
    $sql="SELECT * FROM users WHERE id= '$id'";
    $stmt=$pdo->query($sql);
    $user=$stmt->fetch(PDO::FETCH_ASSOC);

    $hash=$user['password'];
    $old_password=$_POST['old_password'];
    $new_password=$_POST['new_password'];

    if($_POST['new_password']==$_POST['new_password_confirm']){
        if(password_verify($old_password, $hash)){
            $new_passwordHash=password_hash($new_password,PASSWORD_DEFAULT);
            $sql="UPDATE users SET password= '$new_passwordHash' WHERE id= '$id'";
            $stmt=$pdo->query($sql);
            $_SESSION['auth'] = true;
            $_SESSION['login']=$user['login'];
            $_SESSION['id']=$user['id'];
            header('Location: view/content_page.php');
            die();
        }else{
            $_SESSION['flash'] = 'Старый пароль введен неправильно';
            header('Location: changePassword_page');
            die();
        }
    }else{
        $_SESSION['flash'] = 'Пароли не совпадают';
        header('Location: changePassword_page');
        die();
    }

