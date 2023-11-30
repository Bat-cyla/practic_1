<?php
session_start();
$_SESSION['auth']=null;
$_SESSION['flash'] = 'User logged out';
header('Location: index.php');
die();
