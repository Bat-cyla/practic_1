<?php
$user = 'root';      // имя пользователя
$pass = 'root';          // пароль
$dsn = "mysql:host=mysql2;dbname=practic_bd;charset=utf8";
$pdo = new PDO($dsn, $user, $pass);

$sql = "SELECT * FROM users";
$stmt = $pdo->query($sql);
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($user as $elem){
    echo '<a href = profile.php>'/$elem['login']/'</a>'. '<br>';
}
