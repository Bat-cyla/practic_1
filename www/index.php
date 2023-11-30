<?php
session_start();

if (isset($_SESSION['flash'])) {
echo $_SESSION['flash'];
unset($_SESSION['flash']);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="login.php" method="GET">
    <input type="submit" name="login" value="Авторизоваться">
</form>

<form action="register.php" method="GET">
    <input type="submit" name="login" value="Зарегистрироваться">
</form>

</body>
</html>





