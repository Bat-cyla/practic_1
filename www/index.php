<?php
session_start();
    $url = $_SERVER['REQUEST_URI'];
if (isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
}
    $layout  = file_get_contents('layout.php');
    $content = file_get_contents('view' . $url .'.php');

    $layout = str_replace('{{content}}', $content, $layout);

    echo $layout;

