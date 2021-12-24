<?php
session_start();
function connectToDb()
{
    $conf = include "../config.php";
    $host = $conf["host"];
    $username = $conf["DbUsername"];
    $password = $conf["DbPassword"];
    $dbname = $conf["DbName"];

    return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}

$pdo = connectToDb();
$username = $_SESSION['user'];

$sql = "SELECT * FROM `users` WHERE `username` = '$username'; ";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$user_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
$user_id = $user_id[0]['userid'];


if (isset($_GET['watch'])) {
    $movie_id = $_GET['watch'];
    $sql = "SELECT * FROM `chibebinam`.`watchlist` WHERE `watchuser` = '$user_id' AND `watchmovie` = '$movie_id'; ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    if (!empty($stmt->fetchAll(PDO::FETCH_ASSOC))) {
        if (isset($_GET['delete'])) {
            $sql = "DELETE FROM `chibebinam`.`watchlist` WHERE `watchuser` = '$user_id' AND `watchmovie` = '$movie_id'; ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            if (isset($_GET['back'])) {
                $where_to_back = $_GET['back'];
                header("Location: ../$where_to_back.php");
            } else {
                header("Location: ../movie.php?id=$movie_id&status=1");
            }
        } else {
            header("Location: ../movie.php?id=$movie_id&status=0");
        }
    } else {
        $sql = "INSERT INTO `chibebinam`.`watchlist` (`watchmovie`, `watchuser`) VALUES (?,?); ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$movie_id, $user_id]);
        header("Location: ../movie.php?id=$movie_id&status=2");
    }
} elseif (isset($_GET['watched'])) {
    $movie_id = $_GET['watched'];
    $sql = "SELECT * FROM `chibebinam`.`watchedlist` WHERE `watcheduser` = '$user_id' AND `watchedmovie` = '$movie_id'; ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    if (!empty($stmt->fetchAll(PDO::FETCH_ASSOC))) {
        if (isset($_GET['delete'])) {
            $sql = "DELETE FROM `chibebinam`.`watchedlist` WHERE `watcheduser` = '$user_id' AND `watchedmovie` = '$movie_id'; ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            if (isset($_GET['back'])) {
                $where_to_back = $_GET['back'];
                header("Location: ../$where_to_back.php");
            } else {
                header("Location: ../movie.php?id=$movie_id&status=1");
            }
        } else {
            header("Location: ../movie.php?id=$movie_id&status=0");
        }
    } else {
        $sql = "INSERT INTO `chibebinam`.`watchedlist` (`watchedmovie`, `watcheduser`) VALUES (?,?); ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$movie_id, $user_id]);
        header("Location: ../movie.php?id=$movie_id&status=2");
    }
}
