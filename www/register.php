<form action="" method="POST">
    <p><input name="login"> Логин</p>
    <p><input name="phone_number"> Номер телефона</p>
    <p><input name="mail">Почта</p>
    <p><input name="password" type="password">Пароль</p>
    <p> <input type="submit" value="Зарегистрироваться"></p>
</form>
<?php
    $user = 'root';      // имя пользователя
    $pass = 'root';          // пароль
    $dsn = "mysql:host=mysql2;dbname=practic_bd;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass);

    if (!empty($_POST['login']) and !empty($_POST['phone_number']) and !empty($_POST['mail']) and !empty($_POST['password'])) {
        $login = $_POST['login'];
        $phone_number = $_POST['phone_number'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users SET login = '$login',phone_number = '$phone_number', mail='$mail', password = '$password'";
        $stmt = $pdo->query($sql);

        $_SESSION['auth'] = true;
        header('Location: content.php');
        die();

    }

