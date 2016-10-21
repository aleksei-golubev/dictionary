<?php
session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true && isset($_COOKIE['DICT_AUTH_COOKIE']) && $_COOKIE['DICT_AUTH_COOKIE'] == session_id()) {
        require_once('../conf/app_conf.php');
        setcookie('DICT_AUTH_COOKIE', session_id(), time() + 600, '/admin', $_SERVER['HTTP_HOST']);
        require_once('../functions/base.php');
} else {
    session_destroy();
    header("HTTP/1.1 401 Unauthorized"); die;
}