<?php
session_start();
if($_SESSION['auth']===true):
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Content</title>
    </head>
    <body>
    <div>
    <form>
        <p>Добрый день, <?php echo $_SESSION['login']; ?></p>
    </form>
    </div>
    <div>
    <form action="users.php" method="GET">
        <p>Перейти к списку пользователей</p>
        <p><input type="submit" value="Принять"></p>
    </form>
    </div>
    <div>
    <form action="account.php" method="GET">
        <input type="submit" name="login" value="Перейти на страницу пользователя">
    </form>
    </div>
    <div>
    <form action="changePassword.php" method="GET">
        <input type="submit" name="login" value="Сменить пароль">
    </form>
    </div>
    <div>
    <form action="logout.php" method="GET">
        <input type="submit" name="login" value="Выйти из аккаунта">
    </form>
    </div>
    <div>
    <form action="deleteAcc.php" method="GET">
        <input type="submit" name="login" value="Удалить аккаунт">
    </form>
        </div>
    </body>

    </html>



<?php else: ?>
    <p>пожалуйста, авторизуйтесь</p>
    <form action="login_page" method="GET">
        <input type="submit" name="login" value="Авторизоваться">
    </form>
<?php endif; ?>