<?php
include("../../DB.php");

function registration($login, $email)
{
    $check_logins = check_logins($login);
    $check_emails = check_emails($email);
    if ($check_logins > 0) {
        echo "*Такой логин уже существует, придумайте новый.";
    }
    if ($check_emails > 0) {
        echo "*Пользователь с такой электронной почтой уже существует.";
    }
    if ($check_logins > 0 || $check_emails > 0) {
        return;
    } else {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle($permitted_chars), 0, 8);
        require_once "../registration/activation_mail.php";
        echo $code;
    }
}



if ($_POST['action'] == "registration") {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    setcookie("login", $login, time() + 3600);
    setcookie("email", $email, time() + 3600);
    setcookie("password", $password, time() + 3600);

    registration($login, $email);
}
if ($_POST['action'] == "complete_reg") {
    $login =  $_COOKIE['login'];
    $email =  $_COOKIE['email'];
    $password =  $_COOKIE['password'];
    add_new_user($login, $email, $password);

    setcookie("login", $login, time() - 3600);
    setcookie("email", $email, time() - 3600);
    setcookie("password", $password, time() - 3600);


    echo "Регистрация прошла успешно.";
}
if ($_POST['action'] == "recoding") {
    $login =  $_COOKIE['login'];
    $email =  $_COOKIE['email'];

    registration($login, $email);
}
if ($_POST['action'] == "login") {

    $login = $_POST['login'];
    $password = $_POST['password'];

    $result = get_login_data($login, $password);
    if ($result != "Неверный логин или пароль.") {
        session_start();

        $_SESSION['login'] = $result['login'];
        $_SESSION['password'] = $result['password'];
        exit;
    }
    print_r($result);
}
