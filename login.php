<?php require __DIR__ . '/header.php'; ?>
<?php
function generateCsrfToken()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

$key = 'acslgjwhrtt#$%&@@FDHN0.648d6a523';
if (isset($_COOKIE["token"]) and isset($_SESSION['token'])) {
    if (hash_equals($_COOKIE["token"], hash_hmac('sha256', $_SESSION['user'], $key))) {
        header('Location: profile.php');
    }
}

?>

    <!--Login/Signup-->
    <div class="container py-4">
        <div class="row mb-5" style="height: auto;">
            <div class="col"></div>
            <div class="col-md-5 color2-bg p-5">
                <h4 class="text-center chi-peyda-regular color4-f mb-4">خوش آمدید</h4>
                <?php
                $status = $_GET['status'] ?? '';
                if ($status == 0) { ?>
                    <div class="alert alert-success chi-peyda-regular" role="alert">
                        ثبت نام با موفقیت انجام شد، میتوانید وارد شوید!
                    </div>
                <?php }
                if ($status) { ?>
                    <div class="alert alert-danger chi-peyda-regular" role="alert">
                        <?php if ($status == 1) { ?>
                            خطایی رخ داد، لطفا دوباره تلاش کنید!
                        <?php } elseif ($status == 2) { ?>
                            کاربری با این مشخصات وجود ندارد!
                        <?php } elseif ($status == 3) { ?>
                            اطلاعات را به درستی وارد کنید!
                        <?php } ?>
                    </div>
                <?php } ?>
                <form method="post" action="profile/logincheck.php" class="chi-peyda-regular d-grid gap-2">
                    <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="ChiUsername" placeholder="Username" name="username">
                        <label for="ChiUsername">نام کاربری</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="ChiPassword" placeholder="Password"
                               name="password">
                        <label for="ChiPassword">کلمه عبور</label>
                    </div>
                    <button class="btn btn-lg btn-dark chi-btn-dark" type="submit">ورود</button>

                </form>
                <div class="row chi-peyda-regular my-3">
                    <div class="col d-grid gap-2"><a class="btn btn-dark" href="signup.php">عضویت</a></div>
                    <div class="col d-grid gap-2"><a class="btn btn-dark" href="#">فراموشی</a></div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <!--Login/Signup-->

<?php require __DIR__ . '/footer.php'; ?>