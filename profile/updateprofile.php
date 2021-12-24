<?php

session_start();

$pdo = include '../dbfiles/dbconnect.php';

if (empty($_POST['csrf_token']) or !hash_equals($_POST['csrf_token'], $_SESSION['csrf_token'])) {
    header("Location: ../profile.php?status=1");
}

$username = $_SESSION['user'];
$new_username = $_POST['username'];
$new_full_name = $_POST['fullname'];
$new_email = $_POST['email'];
$new_picture = $_POST['picture'];

function updateUser($pdo, $username, $new_username, $new_full_name, $new_email, $new_picture)
{
    $old_user_sql = "SELECT * FROM `users` WHERE `username` = '$username'; ";
    $old_user_result = $pdo->prepare($old_user_sql);
    $old_user_result->execute();
    if (!empty($old_user_result->fetchAll(PDO::FETCH_ASSOC))) {
        $new_user_sql = "UPDATE `users` SET `username` = '$new_username', `fullname`='$new_full_name',
                         `email` = '$new_email', `picture` = '$new_picture' WHERE `username` = '$username'; ";
        $new_user_result = $pdo->prepare($new_user_sql);
        $new_user_result->execute();
        header("Location: ../profile.php?status=1");
        return true;
    } else {
        return false;
    }
}

updateUser($pdo, $username, $new_username, $new_full_name, $new_email, $new_picture);