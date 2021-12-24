<?php

session_start();

$pdo = include '../dbfiles/dbconnect.php';

if (empty($_POST['csrf_token']) or !hash_equals($_POST['csrf_token'], $_SESSION['csrf_token'])) {
    header("Location: ../login.php?status=1");
}

$username = $_POST['username'];
$password = $_POST['password'];

function isUserExists($pdo, $username)
{
    $username_sql = "SELECT * FROM `users` WHERE `username` = '$username'; ";
    $username_result = $pdo->prepare($username_sql);
    $username_result->execute();
    if (!empty($username_result->fetchAll(PDO::FETCH_ASSOC))) {
        return true;
    } else {
        return false;
    }
}

function checkPWD($pdo, $username, $password)
{
    $sql = "SELECT * FROM `users` WHERE `username` = '$username';";
    $sql_result = $pdo->prepare($sql);
    $sql_result->execute();
    $right_password = $sql_result->fetchAll(PDO::FETCH_ASSOC);

    if (password_verify($password, $right_password[0]['password'])) {
        $key = 'acslgjwhrtt#$%&@@FDHN0.648d6a523';
        $_SESSION['user'] = $username;
        setcookie("token", hash_hmac('sha256', $username, $key), time() + 604800, "/", ".localhost");
        header("Location: ../profile.php");
    } else {
        header("Location: ../login.php?status=3");
    }
}


if (isUserExists($pdo, $username)) {
    checkPWD($pdo, $username, $password);
} else {
    header("Location: ../login.php?status=2");
}