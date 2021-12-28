<?php

session_start();

$pdo = include '../dbfiles/dbconnect.php';

if (empty($_POST['csrf_token']) or !hash_equals($_POST['csrf_token'], $_SESSION['csrf_token'])) {
    header("Location: ../login.php?status=1");
}


$username = $_POST['username'] ?? null;
$old_password = $_POST['prvpswd'] ?? null;
$new_password = $_POST['newpswd1'] ?? null;
$new_password_repeat = $_POST['newpswd2'] ?? null;

function checkStrength($password1, $password2)
{
    if ($password1 != $password2) {
        header("Location: ../changepswd.php?status=3");
        return false;
    }
    if (strlen($password1) < 8) {
        header("Location: ../changepswd.php?status=4");
        return false;
    }
    if (!preg_match("#[0-9]+#", $password1)) {
        header("Location: ../changepswd.php?status=5");
        return false;
    }
    if (!preg_match("#[a-zA-Z]+#", $password1)) {
        header("Location: ../changepswd.php?status=6");
        return false;
    }
    return true;
}

function change_password($pdo, $username, $old_password, $new_password, $new_password_repeat)
{
    if (!isset($old_password) or !isset($new_password) or !isset($new_password_repeat)) {
        header("Location: ../changepswd.php?status=2");
    }

    if ($new_password != $new_password_repeat) {
        header("Location: ../changepswd.php?status=8");
    }
    $pswd_status = checkStrength($new_password, $new_password_repeat);
    $sql = "SELECT `users`.`password` FROM `users` WHERE `username` = '$username'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $the_password = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $the_password = $the_password[0]['password'];

    if ($pswd_status and password_verify($old_password, $the_password)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE `users` SET `password`='$hashed_password' WHERE `username` = '$username'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        header("Location: ../changepswd.php?status=1");
    }
}

change_password($pdo, $username, $old_password, $new_password, $new_password_repeat);