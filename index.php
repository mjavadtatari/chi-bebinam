<?php
require __DIR__ . '\header.php';

$pdo = connectToDb();

$latest = "SELECT * FROM `chibebinam`.`movies` ORDER BY RAND() LIMIT 6";
$stmt = $pdo->prepare($latest);
$stmt->execute();
$latest_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

$carousel = "SELECT * FROM `chibebinam`.`movies` LIMIT 3";
$stmt = $pdo->prepare($carousel);
$stmt->execute();
$carousel_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <!--MainCard-->
    <div class="container">
        <div class="row py-3">
            <div class="col-md-9 col-12 mb-md-3 mb-4">
                <div class="card color2-bg">
                    <div class="card-body">
                        <div class="card-title chi-peyda-regular color4-f">
                            ویژگی های مورد نظرت رو انتخاب کن:
                        </div>
                        <form class="chi-peyda-regular mx-auto">
                            <div class="row row-cols-1 row-cols-md-3 pt-2 g-4 mx-auto">
                                <div class="col">
                                    <div class="card color2-bg chi-border-light" style="height: 10em;">
                                        <div class="card-body">
                                            <h5 class="card-title chi-card-title color4-f">ژانر</h5>
                                            <p class="card-text">
                                            <div class="form-check color4-f">
                                                <input class="form-check-input" type="checkbox" value="" id="1">
                                                <label class="form-check-label" for="1">
                                                    کمدی
                                                </label>
                                            </div>
                                            <div class="form-check color4-f">
                                                <input class="form-check-input" type="checkbox" value="" id="2">
                                                <label class="form-check-label" for="2">
                                                    جنایی
                                                </label>
                                            </div>
                                            <div class="form-check color4-f">
                                                <input class="form-check-input" type="checkbox" value="" id="3">
                                                <label class="form-check-label" for="3">
                                                    ترسناک
                                                </label>
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card color2-bg chi-border-light" style="height: 10em;">
                                        <div class="card-body">
                                            <h5 class="card-title chi-card-title color4-f">ژانر</h5>
                                            <div class="card-text overflow-auto" style="height: 6.2em;">
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="1">
                                                    <label class="form-check-label" for="1">
                                                        کمدی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="2">
                                                    <label class="form-check-label" for="2">
                                                        جنایی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="3">
                                                    <label class="form-check-label" for="3">
                                                        ترسناک
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="1">
                                                    <label class="form-check-label" for="1">
                                                        کمدی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="2">
                                                    <label class="form-check-label" for="2">
                                                        جنایی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="3">
                                                    <label class="form-check-label" for="3">
                                                        ترسناک
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="1">
                                                    <label class="form-check-label" for="1">
                                                        کمدی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="2">
                                                    <label class="form-check-label" for="2">
                                                        جنایی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="3">
                                                    <label class="form-check-label" for="3">
                                                        ترسناک
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card color2-bg chi-border-light" style="height: 10em;">
                                        <div class="card-body">
                                            <h5 class="card-title chi-card-title color4-f">زبان</h5>
                                            <div class="card-text overflow-auto" style="height: 6.2em;">
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="10">
                                                    <label class="form-check-label" for="10">
                                                        انگلیسی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="20">
                                                    <label class="form-check-label" for="20">
                                                        فرانسوی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="30">
                                                    <label class="form-check-label" for="30">
                                                        فارسی
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card color2-bg chi-border-light" style="height: 10em;">
                                        <div class="card-body">
                                            <h5 class="card-title chi-card-title color4-f">ژانر</h5>
                                            <div class="card-text overflow-auto" style="height: 6.2em;">
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="1">
                                                    <label class="form-check-label" for="1">
                                                        کمدی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="2">
                                                    <label class="form-check-label" for="2">
                                                        جنایی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="3">
                                                    <label class="form-check-label" for="3">
                                                        ترسناک
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card color2-bg chi-border-light" style="height: 10em;">
                                        <div class="card-body">
                                            <h5 class="card-title chi-card-title color4-f">ژانر</h5>
                                            <div class="card-text overflow-auto" style="height: 6.2em;">
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="1">
                                                    <label class="form-check-label" for="1">
                                                        کمدی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="2">
                                                    <label class="form-check-label" for="2">
                                                        جنایی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="3">
                                                    <label class="form-check-label" for="3">
                                                        ترسناک
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card color2-bg chi-border-light" style="height: 10em;">
                                        <div class="card-body">
                                            <h5 class="card-title chi-card-title color4-f">ژانر</h5>
                                            <div class="card-text overflow-auto" style="height: 6.2em;">
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="1">
                                                    <label class="form-check-label" for="1">
                                                        کمدی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="2">
                                                    <label class="form-check-label" for="2">
                                                        جنایی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="3">
                                                    <label class="form-check-label" for="3">
                                                        ترسناک
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="1">
                                                    <label class="form-check-label" for="1">
                                                        کمدی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="2">
                                                    <label class="form-check-label" for="2">
                                                        جنایی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="3">
                                                    <label class="form-check-label" for="3">
                                                        ترسناک
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="1">
                                                    <label class="form-check-label" for="1">
                                                        کمدی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="2">
                                                    <label class="form-check-label" for="2">
                                                        جنایی
                                                    </label>
                                                </div>
                                                <div class="form-check color4-f">
                                                    <input class="form-check-input" type="checkbox" value="" id="3">
                                                    <label class="form-check-label" for="3">
                                                        ترسناک
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="d-grid gap-2 col-md-6 col-12 mx-auto">
                                    <button type="submit" class="btn chi-btn-outline-c3">چی ببینم؟</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12 mb-3">
                <div class="card color2-bg" style="height: 100%">
                    <div class="card-body">
                        <div class="card-title chi-peyda-regular color4-f">
                            پیشنهاد امروز:
                        </div>
                        <div id="chiCarousel" class="carousel carousel-dark slide pt-md-3 my-3 mx-5 m-sm-3"
                             data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <a class="" href="movie.php?id=<?php echo $carousel_list[0]['movieid']; ?>"><img
                                                src="<?php echo $carousel_list[0]['thumb']; ?>" class="d-block w-100"
                                                alt="<?php echo $carousel_list[0]['name']; ?>"></a>
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <a class="" href="movie.php?id=<?php echo $carousel_list[1]['movieid']; ?>"><img
                                                src="<?php echo $carousel_list[1]['thumb']; ?>" class="d-block w-100"
                                                alt="<?php echo $carousel_list[1]['name']; ?>"></a>
                                </div>
                                <div class="carousel-item">
                                    <a class="" href="movie.php?id=<?php echo $carousel_list[2]['movieid']; ?>"><img
                                                src="<?php echo $carousel_list[2]['thumb']; ?>" class="d-block w-100"
                                                alt="<?php echo $carousel_list[2]['name']; ?>"></a>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#chiCarousel"
                                    data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#chiCarousel"
                                    data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--MainCard-->

    <!--Random-->
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <div class="card color2-bg">
                    <div class="card-body">
                        <div class="card-title chi-peyda-regular color4-f">
                            تصادفی ها
                        </div>
                        <div class="row row-cols-1 row-cols-md-6 g-4 py-3">
                            <?php foreach ($latest_list as $i) { ?>
                                <div class="col mb-3 px-md-3 px-5">
                                    <div class="card bg-dark">
                                        <img class="card-img-top" src="<?php echo $i['thumb']; ?>"
                                             alt="<?php echo $i['name']; ?>">
                                        <div class="card-body pt-3 pb-1">
                                            <div class="card-title text-center chi-peyda-regular color4-f">
                                                <a class="text-decoration-none"
                                                   href="movie.php?id=<?php echo $i['movieid']; ?>">
                                                    <?php echo $i['name']; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Random-->

<?php require __DIR__ . '\footer.php'; ?>