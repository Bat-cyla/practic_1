<?php
session_start();

if (isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
}
    $user = 'root';      // имя пользователя
    $pass = 'root';          // пароль
    $dsn = "mysql:host=mysql2;dbname=practic_bd;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass);

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

if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm'])) {
    if (strlen($_POST['login']) >= 4 and strlen($_POST['login']) <= 10) {
            if(loginCheck($_POST['login'])===true){
                    if (strlen($_POST['password']) >= 6 and strlen($_POST['password']) <= 12) {
                        if ($_POST['password'] == $_POST['confirm']) {
                            if (!empty($_POST['login']) and !empty($_POST['phone_number']) and
                                !empty($_POST['mail']) and !empty($_POST['password'])) {

                                $login = $_POST['login'];
                                $phone_number = $_POST['phone_number'];
                                $mail = $_POST['mail'];
                                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                                $sql = "SELECT * FROM users WHERE login = '$login'";
                                $stmt = $pdo->query($sql);
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                if (empty($user)) {
                                    $sql = "INSERT INTO users SET login = '$login',phone_number = '$phone_number', mail='$mail', password = '$password'";
                                    $stmt = $pdo->query($sql);

                                    $id = $pdo->lastInsertId($sql);

                                    $_SESSION['login']=$login;
                                    $_SESSION['id'] = $id;
                                    $_SESSION['auth'] = true;
                                    header("Location: ./content_page.php");
                                } else {
                                    echo 'Пользователь с таким Логином уже существует';
                                }
                            }
                        } else {
                            echo 'Пароли не совпадают';
                        }
                    } else {
                        echo 'Пароль должен быть от 6 до 12 символов';
                    }
                }else{
                $_SESSION['flash'] = 'Логин может содержать только латинские буквы и цифры';
            }
    } else {
                    echo 'Логин должен быть от 4 до 10 символов';
            }

    } else {
        echo 'Заполните поля регистрации';
    }







