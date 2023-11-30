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
<p>Добрый день, <?php echo $_SESSION['login'];?></p>
</body>
</html>

    <form action="logout.php" method="GET">
        <input type="submit" name="login" value="Выйти из аккаунта">
    </form>

<?php else: ?>
    <p>пожалуйста, авторизуйтесь</p>
    <form action="login.php" method="GET">
        <input type="submit" name="login" value="Авторизоваться">
    </form>
<?php endif; ?>
