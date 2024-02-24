<?php
session_start();
$id=$_SESSION['id'];

$conf=require 'config.php';

$pdo=new PDO($conf['dsn'],$conf['username'],$conf['password']);

$sql = "SELECT * FROM users WHERE id='$id'";
$stmt = $pdo->query($sql);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

    <div>
        <form action="" method="POST">
            <input name="phone_number" value="<?= $user['phone_number'] ?>"><br>
            <input name="mail" value="<?= $user['mail'] ?>"><br>
            <input type="submit" name="submit">
        </form>
    </div>
<?php
if(!empty($_POST['submit'])){
    $phone_number=$_POST['phone_number'];
    $mail=$_POST['mail'];

    $sql = "UPDATE users SET phone_number = '$phone_number', mail='$mail' WHERE id= '$id'";
    $stmt = $pdo->query($sql);
    $_SESSION['flash']="Данные обновлены";
    header("location: account.php");
    die();
}
