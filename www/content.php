<?php
session_start();
if(!empty($_SESSION['auth'])):
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Practic_AUTH</title>
</head>
<body>
<form>
<p>Добрый день, <?php echo $_SESSION['login']; ?></p>
</form>
<form action="users.php" method="GET">
    <p>Перейти к списку пользователей</p>
    <p><input type="submit" value="Принять"></p>
</form>
<form action="account.php" method="GET">
    <input type="submit" name="login" value="Перейти на страницу пользователя">
</form>
<form action="changePassword.php" method="GET">
    <input type="submit" name="login" value="Сменить пароль">
</form>
<form action="logout.php" method="GET">
    <input type="submit" name="login" value="Выйти из аккаунта">
</form>
<form action="deleteAcc.php" method="GET">
    <input type="submit" name="login" value="Удалить аккаунт">
</form>
</body>

</html>



<?php else: ?>
    <p>пожалуйста, авторизуйтесь</p>
    <form action="login.php" method="GET">
        <input type="submit" name="login" value="Авторизоваться">
    </form>
<?php endif; ?>
