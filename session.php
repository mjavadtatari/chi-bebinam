<?php
require __DIR__ . '/header.php';

$pdo = connectToDb();

function generateCsrfToken()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

if (isset($_COOKIE["token"]) and isset($_SESSION['user'])) {
    if (hash_equals($_COOKIE["token"], hash_hmac('sha256', $_SESSION['user'], $key))) {
        $user = $_SESSION['user'];
        $sql = "SELECT * FROM `users` WHERE `username` = '$user'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} else {
    header("Location: login.php");
}