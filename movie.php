<?php
require __DIR__ . '\header.php';

$pdo = connectToDb();

$the_movie = $_GET['id'];
$sql = "SELECT * FROM `movies` WHERE `movieid` = '$the_movie'; ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$movie = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "
SELECT `categories`.`id`, `categories`.`name` FROM `categorytomovie`
JOIN `categories` ON `categorytomovie`.`categoryktm`= `categories`.`id`
WHERE `moviektm` = '$the_movie'; 
";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$genres = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "
SELECT `countries`.`id`, `countries`.`name` FROM `countrytomovie`
JOIN `countries` ON `countrytomovie`.`countryctm`= `countries`.`id`
WHERE `moviectm` = '$the_movie'; 
";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$countries = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "
SELECT `languages`.`id`, `languages`.`name` FROM `languagetomovie`
JOIN `languages` ON `languagetomovie`.`languageltm`= `languages`.`id`
WHERE `movieltm` = '$the_movie';  
";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$languages = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "
SELECT `persons`.`personid`, `persons`.`fullname` FROM `persontomovie`
JOIN `persons` ON `persontomovie`.`personto`= `persons`.`personid`
WHERE `movieto` = '$the_movie' AND `persons`.`type` = 'actor' ; 
";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$actors = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "
SELECT `persons`.`personid`, `persons`.`fullname` FROM `persontomovie`
JOIN `persons` ON `persontomovie`.`personto`= `persons`.`personid`
WHERE `movieto` = '$the_movie' AND `persons`.`type` = 'director' ; 
";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$directors = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <!--MainCard-->
    <div class="container">
        <div class="row py-3">
            <div class="col-md-9 col-12 mb-3">
                <div class="card color2-bg">
                    <div class="card-body">
                        <div class="card-title chi-peyda-regular color4-f">
                            فیلم
                            <?php echo $movie[0]['name']; ?>
                        </div>
                        <div class="card-text">
                            <div class="row row-cols-1 row-cols-md-2 pt-2 g-4 mx-auto">
                                <div class="col-md-4 text-center">
                                    <img src="<?php echo $movie[0]['image']; ?>" class="rounded "
                                         alt="<?php echo $movie[0]['name']; ?>"
                                         style="width: 256px">
                                </div>
                                <div class="col-md-8 chi-peyda-regular">
                                    <div class="row row-cols-1 row-cols-md-2">
                                        <div class="col-md-6 chi-peyda-regular">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-secondary border-secondary">IMDb</span>
                                                <span class="form-control bg-dark border-dark text-light">
                                                <a class="text-decoration-none text-light"
                                                   href="https://www.imdb.com/title/tt<?php echo str_pad($movie[0]['movieid'], 7, "0", STR_PAD_LEFT); ?>">
                                                    <?php echo $movie[0]['imdbpoint']; ?>/10</a>
                                            </span>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-secondary border-secondary">تعداد رای</span>
                                                <span class="form-control bg-dark border-dark text-light">
                                                <a class="text-decoration-none text-light"
                                                   href="https://www.imdb.com/title/tt<?php echo str_pad($movie[0]['movieid'], 7, "0", STR_PAD_LEFT); ?>/ratings/">
                                                    <?php echo number_format($movie[0]['imdbvote']); ?></a>
                                            </span>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-secondary border-secondary">ژانر</span>
                                                <span class="form-control bg-dark border-dark text-light">
                                            <ul class="chi-movie-stars">
                                                <?php
                                                foreach ($genres as $j) {
                                                    echo '<li><a class="text-decoration-none text-light" href="genre.php?id=' . $j['id'] . '">' . $j['name'] . '</a></li>';
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
                                                foreach ($directors as $j) {
                                                    echo '<li><a class="text-decoration-none text-light" href="https://www.imdb.com/name/nm' . str_pad($j["personid"], 7, "0", STR_PAD_LEFT) . '">' . $j["fullname"] . '</a></li>';
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
                                                   href="https://www.imdb.com/title/tt<?php echo str_pad($movie[0]['movieid'], 7, "0", STR_PAD_LEFT); ?>/criticreviews">
                                                    <?php echo $movie[0]['metascore']; ?>/100</a>
                                            </span>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-secondary border-secondary">زبان</span>
                                                <span class="form-control bg-dark border-dark text-light">
                                            <ul class="chi-movie-stars">
                                                <?php
                                                foreach ($languages as $j) {
                                                    echo '<li><a class="text-decoration-none text-light" href="#">' . $j['name'] . '</a></li>';
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
                                                foreach ($countries as $j) {
                                                    echo '<li><a class="text-decoration-none text-light" href="#">' . $j['name'] . '</a></li>';
                                                }
                                                ?>
                                            </ul>
                                            </span>
                                            </div>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-secondary border-secondary">سال تولید</span>
                                                <span class="form-control bg-dark border-dark text-light">
                                                <a class="text-decoration-none text-light"
                                                   href="#"><?php echo $movie[0]['yearproduced']; ?></a>
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
                                                foreach ($actors as $j) {
                                                    echo '<li><a class="text-decoration-none text-light" href="https://www.imdb.com/name/nm' . str_pad($j["personid"], 7, "0", STR_PAD_LEFT) . '">' . $j["fullname"] . '</a></li>';
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
                                            <?php echo substr($movie[0]['storyline'], 0, 300) . "..."; ?>
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
                <?php if ($is_logged_in) { ?>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="card color2-bg">
                                <div class="card-body">
                                    <div class="card-title chi-peyda-regular color4-f">
                                        منوی فیلم
                                    </div>
                                    <div class="card-text">
                                        <div class="d-grid gap-2 col mx-auto chi-peyda-regular">
                                            <?php
                                            $movie_id = $movie[0]['movieid'];


                                            $sql = "SELECT * FROM `chibebinam`.`watchlist` WHERE `watchuser` = '$user_id' AND `watchmovie` = '$movie_id'; ";
                                            $stmt = $pdo->prepare($sql);
                                            $stmt->execute();

                                            if (empty($stmt->fetchAll(PDO::FETCH_ASSOC))) { ?>
                                                <a class="btn btn-dark"
                                                   href="profile/updatelist.php?watch=<?php echo $movie[0]['movieid']; ?>">افزودن
                                                    به لیست تماشا</a>
                                            <?php } else { ?>
                                                <a class="btn btn-dark text-danger"
                                                   href="profile/updatelist.php?watch=<?php echo $movie[0]['movieid']; ?>&delete=1">پاک
                                                    کردن
                                                    از لیست تماشا</a>
                                            <?php }
                                            $movie_id = $movie[0]['movieid'];


                                            $sql = "SELECT * FROM `chibebinam`.`watchedlist` WHERE `watcheduser` = '$user_id' AND `watchedmovie` = '$movie_id'; ";
                                            $stmt = $pdo->prepare($sql);
                                            $stmt->execute();

                                            if (empty($stmt->fetchAll(PDO::FETCH_ASSOC))) { ?>
                                                <a class="btn btn-dark"
                                                   href="profile/updatelist.php?watched=<?php echo $movie[0]['movieid']; ?>">افزودن
                                                    به دیده شده ها</a>
                                            <?php } else { ?>
                                                <a class="btn btn-dark text-danger"
                                                   href="profile/updatelist.php?watched=<?php echo $movie[0]['movieid']; ?>&delete=1">پاک
                                                    کردن
                                                    از دیده شده ها</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
                                        if ($movie[0]['imdbtop']) {
                                            echo '<li class="list-group-item chi-list-item">رتبه ' . $movie[0]['imdbtop'] . ' از 250 فیلم برتر IMDb</li>';
                                        }

                                        if ($movie[0]['oscarawards']) {
                                            echo '<li class="list-group-item chi-list-item">برنده ' . $movie[0]['oscarawards'] . ' اسکار</li>';
                                        }
                                        if ($movie[0]['oscarnominations']) {
                                            echo '<li class="list-group-item chi-list-item">نامزد ' . $movie[0]['oscarnominations'] . ' اسکار</li>';
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

<?php require __DIR__ . '\footer.php'; ?>