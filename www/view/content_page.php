<?php
session_start();
if($_SESSION['auth']===true):
    ?>


    <div>
    <form>
        <p>Добрый день, <?php echo $_SESSION['login']; ?></p>
    </form>
    </div>
    <div>
    <form action="../account.php" method="GET">
        <input type="submit" name="login" value="Перейти на страницу пользователя">
    </form>
    </div>
    <div>
    <form action="changePassword_page.php" method="POST">
        <input type="submit" name="login" value="Сменить пароль">
    </form>
    </div>
    <div>
    <form action="../logout.php" method="GET">
        <input type="submit" name="login" value="Выйти из аккаунта">
    </form>
    </div>
    <div>
    <form action="deleteAcc_page.php" method="GET">
        <input type="submit" name="login" value="Удалить аккаунт">
    </form>
        </div>




<?php else: ?>
    <p>пожалуйста, авторизуйтесь</p>
    <form action="login_page.php" method="post">
        <input type="submit" name="login" value="Авторизоваться">
    </form>
<?php endif; ?>