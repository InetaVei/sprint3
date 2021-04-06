<?php

require_once "bootstrap.php";

/*  LOGOUT   */
session_start();
if (isset($_POST['logout'])) {
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['logged_in']);
    header('Location: http://localhost/Sprint3');
    exit;
}

/*  LOGIN   */
if (isset($_POST['login'])
        && !empty($_POST['username'])
        && !empty($_POST['password'])) {
    if ($_POST['username'] == 'Name' && $_POST['password'] == '12345') {
        $_SESSION['logged_in'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = 'Name';
    } else {
        print('<p>Wrong username or password</p>');
    }
}

/*  SUCCESSFULLY LOGGED IN  */
if ($_SESSION['logged_in'] == true) {
}
