<form action="" method="POST">
    <p><input name="login"> Логин</p>
    <p><input name="phone_number"> Номер телефона</p>
    <p><input name="mail">Почта</p>
    <p><input name="password" type="password">Пароль</p>
    <p><input type="password" name="confirm">Подтвердить пароль</p>
    <p> <input type="submit" value="Зарегистрироваться"></p>
</form>
<?php
    $user = 'root';      // имя пользователя
    $pass = 'root';          // пароль
    $dsn = "mysql:host=mysql2;dbname=practic_bd;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass);

    function generateSalt(){
        $salt='';
        $saltLength=8;
        for($i=0;$i<$saltLength;$i++){
            $salt.=chr(mt_rand(33,126));
        }
        return $salt;
    }
if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm'])) {
    if (strlen($_POST['login'])>=4 and strlen($_POST['login'])<=10) {
        if (strlen($_POST['password']) >= 6 and strlen($_POST['password']) <= 12) {
            if ($_POST['password'] == $_POST['confirm']) {
                if (!empty($_POST['login']) and !empty($_POST['phone_number']) and
                    !empty($_POST['mail']) and !empty($_POST['password'])) {

                    $login = $_POST['login'];
                    $phone_number = $_POST['phone_number'];
                    $mail = $_POST['mail'];
                    $salt=generateSalt();
                    $password = md5($salt . $_POST['password']);

                    $sql = "SELECT * FROM users WHERE login = '$login'";
                    $stmt = $pdo->query($sql);
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    if (empty($user)) {
                        $sql = "INSERT INTO users SET login = '$login',phone_number = '$phone_number', mail='$mail', password = '$password', salt='$salt'";
                        $stmt = $pdo->query($sql);

                        $id = $pdo->lastInsertId($sql);

                        $_SESSION['id'] = $id;
                        $_SESSION['auth'] = true;
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
    } else {
        echo 'Логин должен быть от 4 до 10 символов';
    }

}else{
    echo 'Заполните поля регистрации';
}

