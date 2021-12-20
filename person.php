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
        <div class="col-md-3 col-12 mb-3">
            <div class="card color2-bg">
                <div class="card-body">
                    <div class="card-title chi-peyda-regular color4-f">
                        افتخارات
                    </div>
                    <div class="card-text">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item chi-list-item">رتبه 1 از 250 فیلم برتر IMDb</li>
                            <li class="list-group-item chi-list-item">برنده 0 اسکار</li>
                            <li class="list-group-item chi-list-item">نامزد 7 اسکار</li>
                            <li class="list-group-item chi-list-item">برنده 21 جایزه دیگر</li>
                            <li class="list-group-item chi-list-item">نامزد 43 جایزه دیگر</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-12 mb-3">
            <div class="card color2-bg">
                <div class="card-body">
                    <div class="card-title chi-peyda-regular color4-f">
                        پروفایل Morgan Freeman
                    </div>
                    <div class="card-text">
                        <div class="row row-cols-1 row-cols-md-2 pt-2 g-4 mx-auto">
                            <div class="col-md-3 text-center pt-md-0">
                                <img src="/image/MorganFreeman.jpg" class="rounded" alt="..."
                                     style="height: 300px;">
                            </div>
                            <div class="col-md-8 mx-auto chi-peyda-regular">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-secondary border-secondary">IMDb</span>
                                    <span class="form-control bg-dark border-dark text-light">
                                        <a class="text-decoration-none text-light" href="#">Morgan Freeman</a>
                                    </span>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-secondary border-secondary">رتبه</span>
                                    <span class="form-control bg-dark border-dark text-light">
                                                <a class="text-decoration-none text-light" href="#">5000 برتر</a>
                                    </span>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-secondary border-secondary">تولد</span>
                                    <span class="form-control bg-dark border-dark text-light">
                                                <a class="text-decoration-none text-light" href="#"> June 1, 1937 in Memphis, Tennessee, USA</a>
                                            </span>
                                </div>
                                <div class="row row-cols-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-secondary border-secondary">
                                            بیوگرافی
                                        </span>
                                        <span class="form-control bg-dark border-dark text-light chi-justify">
                                            با صدایی معتبر و رفتاری آرام، این بازیگر همیشه محبوب آمریکایی به یکی از معتبرترین چهره‌های سینمای مدرن ایالات متحده تبدیل شده است. مورگان در 1 ژوئن 1937 در ممفیس، تنسی، در خانواده میمه ادنا (ریور)، معلم و مورگان پورترفیلد فریمن، آرایشگر به دنیا آمد. فریمن جوان قبل از خدمت به کالج شهر لس آنجلس رفت…
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--MainCard-->

<!--MoviesList-->
<div class="container">
    <div class="row mb-5">
        <div class="col">
            <div class="card color2-bg">
                <div class="card-body">
                    <div class="card-title chi-peyda-regular color4-f">
                        لیست فیلم های بازیگر
                    </div>
                    <div class="row row-cols-1 row-cols-md-6 g-4 py-3">
                        <div class="col mb-3 px-md-3 px-5">
                            <div class="card bg-dark">
                                <img class="card-img-top" src="image/tt2382320.jpg" alt="...">
                                <div class="card-body pt-3 pb-1">
                                    <div class="card-title text-center chi-peyda-regular color4-f">
                                        <a class="text-decoration-none" href="#">
                                            The Shawshank Redemption
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3 px-md-3 px-5">
                            <div class="card bg-dark">
                                <img class="card-img-top" src="image/tt0111161.jpg" alt="...">
                                <div class="card-body pt-3 pb-1">
                                    <div class="card-title text-center chi-peyda-regular color4-f">
                                        <a class="text-decoration-none" href="#">
                                            The Shawshank Redemption
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3 px-md-3 px-5">
                            <div class="card bg-dark">
                                <img class="card-img-top" src="image/tt10696784.jpg" alt="...">
                                <div class="card-body pt-3 pb-1">
                                    <div class="card-title text-center chi-peyda-regular color4-f">
                                        <a class="text-decoration-none" href="#">
                                            The Shawshank Redemption
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3 px-md-3 px-5">
                            <div class="card bg-dark">
                                <img class="card-img-top" src="image/tt2382320.jpg" alt="...">
                                <div class="card-body pt-3 pb-1">
                                    <div class="card-title text-center chi-peyda-regular color4-f">
                                        <a class="text-decoration-none" href="#">
                                            The Shawshank Redemption
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3 px-md-3 px-5">
                            <div class="card bg-dark">
                                <img class="card-img-top" src="image/tt0111161.jpg" alt="...">
                                <div class="card-body pt-3 pb-1">
                                    <div class="card-title text-center chi-peyda-regular color4-f">
                                        <a class="text-decoration-none" href="#">
                                            The Shawshank Redemption
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3 px-md-3 px-5">
                            <div class="card bg-dark">
                                <img class="card-img-top" src="image/tt10696784.jpg" alt="...">
                                <div class="card-body pt-3 pb-1">
                                    <div class="card-title text-center chi-peyda-regular color4-f">
                                        <a class="text-decoration-none" href="#">
                                            The Shawshank Redemption
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3 px-md-3 px-5">
                            <div class="card bg-dark">
                                <img class="card-img-top" src="image/tt2382320.jpg" alt="...">
                                <div class="card-body pt-3 pb-1">
                                    <div class="card-title text-center chi-peyda-regular color4-f">
                                        <a class="text-decoration-none" href="#">
                                            The Shawshank Redemption
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3 px-md-3 px-5">
                            <div class="card bg-dark">
                                <img class="card-img-top" src="image/tt0111161.jpg" alt="...">
                                <div class="card-body pt-3 pb-1">
                                    <div class="card-title text-center chi-peyda-regular color4-f">
                                        <a class="text-decoration-none" href="#">
                                            The Shawshank Redemption
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3 px-md-3 px-5">
                            <div class="card bg-dark">
                                <img class="card-img-top" src="image/tt10696784.jpg" alt="...">
                                <div class="card-body pt-3 pb-1">
                                    <div class="card-title text-center chi-peyda-regular color4-f">
                                        <a class="text-decoration-none" href="#">
                                            The Shawshank Redemption
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3 px-md-3 px-5">
                            <div class="card bg-dark">
                                <img class="card-img-top" src="image/tt2382320.jpg" alt="...">
                                <div class="card-body pt-3 pb-1">
                                    <div class="card-title text-center chi-peyda-regular color4-f">
                                        <a class="text-decoration-none" href="#">
                                            The Shawshank Redemption
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <nav class="text-center" aria-label="Page navigation example">
                            <ul class="pagination chi-peyda-regular justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">قبلی</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">بعدی</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--MoviesList-->

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