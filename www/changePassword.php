<?php
session_start();
$user = 'root';      // имя пользователя
$pass = 'root';          // пароль
$dsn = "mysql:host=mysql2;dbname=practic_bd;charset=utf8";
$pdo = new PDO($dsn, $user, $pass);

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
        }else{
            echo 'старый пароль введен неправильно';
        }
    }
    ?>
<form action="" method="POST">
    <input type="password" name="old_password">
    <input type="password" name="new_password">
    <input type="password" name="new_password_confirm">
    <input type="submit" name="submit">
</form>