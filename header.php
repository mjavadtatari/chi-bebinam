<?php session_start();
function connectToDb()
{
    $conf = include "config.php";
    $host = $conf["host"];
    $username = $conf["DbUsername"];
    $password = $conf["DbPassword"];
    $dbname = $conf["DbName"];

    return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}

$pdo = connectToDb();
$key = 'acslgjwhrtt#$%&@@FDHN0.648d6a523';
?>

<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <title>چی ببینم؟</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>

<!--NavBar-->
<nav class="navbar navbar-expand-lg navbar-light color1-bg py-4">
    <div class="container">
        <a class="navbar-brand chi-peyda-black text-light" href="index.php">
            چی ببینم؟
        </a>
        <?php
        if (isset($_COOKIE["token"]) and isset($_SESSION['user'])) {
            if (hash_equals($_COOKIE["token"], hash_hmac('sha256', $_SESSION['user'], $key))) {
                $user = $_SESSION['user'];
                $sql = "SELECT `users`.`fullname`,`users`.`userid`  FROM `users` WHERE `username` = '$user'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $is_logged_in = true;
                $user_id = $result[0]['userid'];
                ?>
                <a class="btn btn-sm btn-success chi-peyda-regular chi-login-btn"
                   href="profile.php"><?php echo $result[0]['fullname']; ?></a>
            <?php }
        } else {
            $is_logged_in = false;
            $user_id = ''; ?>
            <a class="btn btn-sm btn-success chi-peyda-regular chi-login-btn" href="login.php">ورود کاربران</a>
        <?php } ?>
        <button class="navbar-toggler color3-bg" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse chi-peyda-regular" id="navbarToggler">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php">صفحه اصلی</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">مجموعه ها</a>
                    <ul class="dropdown-menu dropdown-menu-dark color2-bg bg-opacity-25">
                        <li><a class="dropdown-item text-light" href="movie_list.php?sub=nolan">فیلم های نولان</a></li>
                        <li><a class="dropdown-item text-light" href="movie_list.php?sub=dicaprio">فیلم های دیکاپریو</a></li>
                        <li><a class="dropdown-item text-light" href="movie_list.php?sub=iran">فیلم های ایرانی</a></li>
                        <li><a class="dropdown-item text-light" href="movie_list.php?sub=2021">فیلم های 2021</a></li>
                        <li><a class="dropdown-item text-light" href="movie_list.php?sub=animation">انیمیشن ها</a></li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light" href="movie_list.php?sub=oscar">برندگان اسکار</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="movie_list.php?sub=topimdb">250 فیلم برتر</a>
                </li>
            </ul>
            <form method="get" action="movie_list.php" class="d-flex">
                <input class="form-control me-1" type="search" placeholder="نام فیلم" name="key" aria-label="Search">
                <button class="btn btn-outline-light color2-bg" type="submit">بگرد</button>
            </form>
        </div>
    </div>
</nav>
<!--NavBar-->
