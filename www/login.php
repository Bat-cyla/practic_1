<?php
session_start();
if (empty($_POST)) {
    ?>
    <form action="" method="POST">

        <p><input name="login"> Введите логин</p>
        <p><input name="password" type="password">Введите пароль</p>
        <p><input type="submit" value="Подтвердить"></p>

    </form>
    <?php
}else {
    $user = 'root';      // имя пользователя
    $pass = 'root';          // пароль
    $dsn = "mysql:host=mysql2;dbname=practic_bd;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass);

    if (!empty($_POST['login']) and !empty($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE login='$login' AND password='$password'";
        $stmt = $pdo->query($sql);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($user)) {
            $_SESSION['auth'] = true;
            $_SESSION['login']=$login;
            header('Location: content.php');
            die();
        } else {
            $_SESSION['auth'] = false;
            header('Location: content.php');
            die();
        }
    }
    $_SESSION['auth'] = false;
    header('Location: content.php');
    die();
}
?>