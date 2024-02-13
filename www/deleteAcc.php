<?php
session_start();

?>
    <form action="" method="POST">
        <input type="password" name="password">
        <input type="submit" name="submit">
    </form>

<?php
$id=$_SESSION['id'];
$user = 'root';      // имя пользователя
$pass = 'root';          // пароль
$dsn = "mysql:host=mysql2;dbname=practic_bd;charset=utf8";
$pdo = new PDO($dsn, $user, $pass);

 $sql="SELECT * FROM users WHERE id= '$id'";
 $stmt=$pdo->query($sql);
 $user=$stmt->fetch(PDO::FETCH_ASSOC);

 if(password_verify($_POST['password'], $user['password'])){
     $sql="DELETE FROM users WHERE id='$id'";
     $stmt=$pdo->query($sql);
 }else{
     echo 'Пароль введен неверно';
 }