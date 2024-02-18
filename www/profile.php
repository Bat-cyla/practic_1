<?php
session_start();

$user = 'root';      // имя пользователя
$pass = 'root';          // пароль
$dsn = "mysql:host=mysql2;dbname=practic_bd;charset=utf8";
$pdo = new PDO($dsn, $user, $pass);

$id=$_GET['id'];
$sql = "SELECT * FROM users LEFT JOIN user_status ON users.status_id=user_status.id WHERE users.id='$id'";
$stmt = $pdo->query($sql);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

echo $user['login']. '<br>';
echo $user['status']. '<br>';
echo $user['phone_number']. '<br>';
echo $user['mail']. '<br>';
if($user['status']=='user') {
    echo "<a href='giveAdmRights.php?id={$id}'> Дать права админа </a><br>";
}else{
    echo "<a href='rmAdmRights.php?id={$id}'> Забрать права админа </a><br>";
}
echo "<a href='users.php'> К профилям </a><br>";