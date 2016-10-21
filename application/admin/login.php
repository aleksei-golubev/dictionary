<?php
session_start();

if (isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
    require_once('../conf/app_conf.php');
    
    if ($_REQUEST['login'] == $app_conf['user'] && $_REQUEST['password'] == $app_conf['password']) {
        setcookie('DICT_AUTH_COOKIE', session_id(), time() + 600, '/admin', $_SERVER['HTTP_HOST']);
        $_SESSION['loggedIn'] = true;
        echo '/admin/page.php';
    } else {
        session_destroy();
        header("HTTP/1.1 401 Unauthorized");
    }
} else {
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true && isset($_COOKIE['DICT_AUTH_COOKIE']) && $_COOKIE['DICT_AUTH_COOKIE'] == session_id()) {
        echo '/admin/page.php';
    } else {
        session_destroy();
        header("HTTP/1.1 401 Unauthorized");
    }
}