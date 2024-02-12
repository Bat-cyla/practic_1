<?php
session_start();
$_SESSION['auth']=null;
$_SESSION['flash'] = 'User logged out';
unset($_SESSION['flash']);
header('Location: index.php');
die();
