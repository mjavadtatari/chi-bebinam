<?php

require __DIR__ . '/imdbphp-7.2.0/bootstrap.php';

$movie = new \Imdb\Title($_GET["id"]);
$title = $movie->title();
$photo = $movie->photo(false);
$imdbid = $movie->imdbid();
$geners = $movie->genres();
$director = $movie->director();
$actor_stars = $movie->actor_stars();
$rating = $movie->rating();
$votes = $movie->votes();
$country = $movie->country();
$metacriticRating = $movie->metacriticRating();
$languages = $movie->languages();
$year = $movie->year();
$storyline = $movie->storyline();
$top250 = $movie->top250();
$awards = $movie->awards();
$plotOutline = $movie->plotoutline();
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
        <a class="navbar-brand chi-peyda-black text-light" href="#">
            چی ببینم؟
        </a>
        <a class="btn btn-sm btn-success chi-peyda-regular chi-login-btn" href="#">ورود کاربران</a>
        <button class="navbar-toggler color3-bg" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse chi-peyda-regular" id="navbarToggler">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">صفحه اصلی</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">مجموعه ها</a>
                    <ul class="dropdown-menu dropdown-menu-dark color2-bg bg-opacity-25">
                        <li><a class="dropdown-item text-light" href="#">برندگان اسکار</a></li>
                        <li><a class="dropdown-item text-light" href="#">برندگان گلدن گلوب</a></li>
                        <li><a class="dropdown-item text-light" href="#">250 فیلم برتر</a></li>
                        <li><a class="dropdown-item text-light" href="#">جدول باکس آفیس</a></li>
                        <li><a class="dropdown-item text-light" href="#">انیمیشن ها</a></li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-light" href="#">بازیگران</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">کارگردانان</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-1" type="search" placeholder="جستجو" aria-label="Search">
                <button class="btn btn-outline-light color2-bg" type="submit">بگرد</button>
            </form>
        </div>
    </div>
</nav>
<!--NavBar-->

<!--MainCard-->
<div class="container">
    <div class="row py-3">
        <div class="col-md-9 col-12 mb-3">
            <div class="card color2-bg">
                <div class="card-body">
                    <div class="card-title chi-peyda-regular color4-f">
                        فیلم
                        <?php echo $title ?>
                    </div>
                    <div class="card-text">
                        <div class="row row-cols-1 row-cols-md-2 pt-2 g-4 mx-auto">
                            <div class="col-md-4 text-center">
                                <img src="<?php echo $photo ?>" class="rounded " alt="..."
                                     style="width: 256px">
                            </div>
                            <div class="col-md-8 chi-peyda-regular">
                                <div class="row row-cols-1 row-cols-md-2">
                                    <div class="col-md-6 chi-peyda-regular">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-secondary border-secondary">IMDb</span>
                                            <span class="form-control bg-dark border-dark text-light">
                                                <a class="text-decoration-none text-light"
                                                   href="https://www.imdb.com/title/tt<?php echo $imdbid ?>"><?php echo $rating ?>/10</a>
                                            </span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-secondary border-secondary">تعداد رای</span>
                                            <span class="form-control bg-dark border-dark text-light">
                                                <a class="text-decoration-none text-light"
                                                   href="#"><?php echo number_format($votes) ?></a>
                                            </span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-secondary border-secondary">ژانر</span>
                                            <span class="form-control bg-dark border-dark text-light">
                                            <ul class="chi-movie-stars">
                                                <?php
                                                foreach ($geners as $j) {
                                                    echo '<li><a class="text-decoration-none text-light" href="#">' . $j . '</a></li>';
                                                }
                                                ?>
                                            </ul>
                                            </span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-secondary border-secondary">کارگردان</span>
                                            <span class="form-control bg-dark border-dark text-light">
                                                <ul class="chi-movie-stars">
                                                <?php
                                                foreach ($director as $j) {
                                                    echo '<li><a class="text-decoration-none text-light" href="https://www.imdb.com/name/nm' . $j["imdb"] . '">' . $j["name"] . '</a></li>';
                                                }
                                                ?>
                                            </ul>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 chi-peyda-regular">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-secondary border-secondary">Metascore</span>
                                            <span class="form-control bg-dark border-dark text-light">
                                                <a class="text-decoration-none text-light"
                                                   href="https://www.imdb.com/title/tt<?php echo $imdbid ?>/criticreviews"><?php echo $metacriticRating ?>/100</a>
                                            </span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-secondary border-secondary">زبان</span>
                                            <span class="form-control bg-dark border-dark text-light">
                                            <ul class="chi-movie-stars">
                                                <?php
                                                foreach ($languages as $j) {
                                                    echo '<li><a class="text-decoration-none text-light" href="#">' . $j . '</a></li>';
                                                }
                                                ?>
                                            </ul>
                                            </span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-secondary border-secondary">محصول</span>
                                            <span class="form-control bg-dark border-dark text-light">
                                            <ul class="chi-movie-stars">
                                                <?php
                                                foreach ($country as $j) {
                                                    echo '<li><a class="text-decoration-none text-light" href="#">' . $j . '</a></li>';
                                                }
                                                ?>
                                            </ul>
                                            </span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text bg-secondary border-secondary">سال تولید</span>
                                            <span class="form-control bg-dark border-dark text-light">
                                                <a class="text-decoration-none text-light"
                                                   href="#"><?php echo $year ?></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-cols-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-secondary border-secondary">ستارگان</span>
                                        <span class="form-control bg-dark border-dark text-light chi-justify">
                                            <ul class="chi-movie-stars">
                                                <?php
                                                foreach ($actor_stars as $j) {
                                                    echo '<li><a class="text-decoration-none text-light" href="https://www.imdb.com/name/nm' . $j["imdb"] . '">' . $j["name"] . '</a></li>';
                                                }
                                                ?>
                                            </ul>
                                        </span>
                                    </div>
                                </div>
                                <div class="row row-cols-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-secondary border-secondary">
                                            خلاصه
                                            <br>
                                            داستان
                                        </span>
                                        <span class="form-control bg-dark border-dark text-light chi-justify">
                                            <?php echo substr($storyline, 0, 300) . "..." ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-12 mb-3">
            <div class="row mb-3">
                <div class="col">
                    <div class="card color2-bg">
                        <div class="card-body">
                            <div class="card-title chi-peyda-regular color4-f">
                                منوی فیلم
                            </div>
                            <div class="card-text">
                                <div class="d-grid gap-2 col mx-auto chi-peyda-regular">
                                    <button class="btn btn-dark" type="button">افزودن به لیست تماشا</button>
                                    <button class="btn btn-dark" type="button">افزودن به دیده شده ها</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="card color2-bg">
                        <div class="card-body">
                            <div class="card-title chi-peyda-regular color4-f">
                                افتخارات
                            </div>
                            <div class="card-text">
                                <ul class="list-group list-group-flush">
                                    <?php
                                    if ($top250) {
                                        echo '<li class="list-group-item chi-list-item">رتبه ' . $top250 . ' از 250 فیلم برتر IMDb</li>';
                                    }

                                    $won_oscars = 0;
                                    $lost_oscars = 0;

                                    if (isset($awards["Academy Awards, USA"])){
                                        foreach ($awards["Academy Awards, USA"]["entries"] as $j) {
                                            if ($j["won"]) {
                                                $won_oscars++;
                                            } else {
                                                $lost_oscars++;
                                            }
                                        }
                                        echo '<li class="list-group-item chi-list-item">برنده ' . $won_oscars . ' اسکار</li>';
                                        echo '<li class="list-group-item chi-list-item">نامزد ' . $lost_oscars . ' اسکار</li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--MainCard-->

<!--Footer-->
<footer>
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8 col-sm-4 px-md-0 px-4 pe-lg-5 mb-md-0 mb-4">
                <h3 class="chi-peyda-footer color4-f">
                    چی ببینم؟
                </h3>
                <p class="chi-isx-regular chi-justify color4-f opacity-75">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها
                    و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.
                </p>
            </div>
            <div class="col-lg-2 col-sm-4 color4-f chi-peyda-regular mb-md-0 mb-4">
                <ul>
                    <li><a class="text-decoration-none" href="#">مجموعه ها</a></li>
                    <li><a class="text-decoration-none" href="#">بازیگران</a></li>
                    <li><a class="text-decoration-none" href="#">کارگردانان</a></li>
                    <li><a class="text-decoration-none" href="#">شبکه ها</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-sm-4 color4-f chi-peyda-regular mb-md-0 mb-4">
                <ul>
                    <li><a class="text-decoration-none" href="#">مجموعه ها</a></li>
                    <li><a class="text-decoration-none" href="#">بازیگران</a></li>
                    <li><a class="text-decoration-none" href="#">کارگردانان</a></li>
                    <li><a class="text-decoration-none" href="#">شبکه ها</a></li>
                </ul>
            </div>
        </div>
        <div class="row my-3">
            <p class="chi-isx-regular text-center color2-f chi-ltr">
                @mjavadtatari
            </p>
        </div>
    </div>
</footer>
<!--Footer-->

<!--JavaScript Files-->
<script src="js/all.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>