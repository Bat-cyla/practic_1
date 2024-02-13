<?php
session_start();
$id=$_SESSION['id'];

$user = 'root';      // имя пользователя
$pass = 'root';          // пароль
$dsn = "mysql:host=mysql2;dbname=practic_bd;charset=utf8";
$pdo = new PDO($dsn, $user, $pass);

$sql = "SELECT * FROM users WHERE id='$id'";
$stmt = $pdo->query($sql);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<form action="" method="POST">
	<input name="phone_number" value="<?= $user['phone_number'] ?>"><br>
	<input name="mail" value="<?= $user['mail'] ?>"><br>
	<input type="submit" name="submit">
</form>

<?php
if(!empty($_POST['submit'])){
    $phone_number=$_POST['phone_number'];
    $mail=$_POST['mail'];

    $sql = "UPDATE users SET phone_number = '$phone_number', mail='$mail' WHERE id= '$id'";
    $stmt = $pdo->query($sql);
}
