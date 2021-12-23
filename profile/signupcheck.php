<?php

session_start();

$pdo = include '../dbfiles/dbconnect.php';

if (empty($_POST['csrf_token']) or !hash_equals($_POST['csrf_token'], $_SESSION['csrf_token'])) {
    header("Location: ../signup.php?status=1");
}

$username = $_POST['username'];
$email = $_POST['email'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$full_name = $_POST['fullname'];

function isUserExists($pdo, $username, $email)
{
    $email_sql = "SELECT * FROM `users` WHERE `username` = '$username'; ";
    $username_sql = "SELECT * FROM `users` WHERE `email` = '$email'; ";
    $email_result = $pdo->prepare($email_sql);
    $email_result->execute();
    $username_result = $pdo->prepare($username_sql);
    $username_result->execute();
    if (!empty($email_result->fetchAll(PDO::FETCH_ASSOC)) or !empty($username_result->fetchAll(PDO::FETCH_ASSOC))) {
        header("Location: ../signup.php?status=2");
        return true;
    } else {
        return false;
    }
}

function checkStrength($username, $password1, $password2)
{
    if ($password1 != $password2) {
        header("Location: ../signup.php?status=3");
        return false;
    }
    if (strlen($password1) < 8) {
        header("Location: ../signup.php?status=4");
        return false;
    }
    if (!preg_match("#[0-9]+#", $password1)) {
        header("Location: ../signup.php?status=5");
        return false;
    }
    if (!preg_match("#[a-zA-Z]+#", $password1)) {
        header("Location: ../signup.php?status=6");
        return false;
    }
    if (!strlen($username) > 8 and !ctype_digit($username)) {
        header("Location: ../signup.php?status=7");
        return false;
    }
    return true;
}

function createUser($pdo, $username, $email, $password1, $password2, $full_name)
{
    if (!isUserExists($pdo, $username, $email)) {
        if (checkStrength($username, $password1, $password2)) {
            $password = md5($password1);
            $create_sql = "INSERT INTO `users` (`fullname`, `username`, `email`, `password`, `type`)
                           VALUES (?,?,?,?,?);";
            $stmt = $pdo->prepare($create_sql);
            $stmt->execute([$full_name, $username, $email, $password, "normal"]);
            if (isUserExists($pdo, $username, $email)){
                header("Location: ../login.php?status=0");
            }
        }
    }
}


createUser($pdo, $username, $email, $password1, $password2, $full_name);