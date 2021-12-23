<?php
$conf = include "..\config.php";
//require __DIR__ . '\dblogger.php';

$host = $conf["host"];
$username = $conf["DbUsername"];
$password = $conf["DbPassword"];
$dbname = $conf["DbName"];

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//try {
//    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    logTheMessage("DATABASE", "SUCCESS", "Connected to DataBase Successfully!");
//} catch (PDOException $e) {
//    logTheMessage("DATABASE", "ERROR", $e->getMessage());
//}

if (!empty($pdo)) {
    return $pdo;
} else {
    return false;
}