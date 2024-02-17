<?php
session_start();
$_SESSION['auth']=null;
$_SESSION['flash']='User Logged out';
header('Location: main');
die();

