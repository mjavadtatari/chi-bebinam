<?php require __DIR__ . '\header.php'; ?>
<?php
function generateCsrfToken()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

?>

    <!--Login/Signup-->
    <div class="container py-4">
        <div class="row mb-5">
            <div class="col"></div>
            <div class="col-md-5 color2-bg p-5">
                <h4 class="text-center chi-peyda-regular color4-f mb-4">فرم ثبت نام</h4>
                <?php
                $status = $_GET['status'] ?? '';
                if ($status) { ?>
                    <div class="alert alert-danger chi-peyda-regular" role="alert">
                        <?php if ($status == 1) { ?>
                            خطایی رخ داد، لطفا دوباره تلاش کنید!
                        <?php } elseif ($status == 2) { ?>
                            کاربری با این مشخصات وجود دارد!
                        <?php } elseif ($status == 3) { ?>
                            رمز های عبور وارد شده یکسان نیستند!
                        <?php } elseif ($status == 4) { ?>
                            رمز عبور کوچکتر از 8 کاراکتر می باشد!
                        <?php } elseif ($status == 5) { ?>
                            رمز عبور باید حداقل شامل یک عدد باشد!
                        <?php } elseif ($status == 6) { ?>
                            رمز عبور باید حداقل شامل یک حرف باشد!
                        <?php } elseif ($status == 7) { ?>
                            نام کاربری کوچکتر از 8 کاراکتر یا تماما عدد است!
                        <?php } ?>
                    </div>
                <?php } ?>
                <form method="post" action="profile/signupcheck.php" class="chi-peyda-regular d-grid gap-2">
                    <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="ChiFullName" name="fullname" placeholder="fullName">
                        <label for="ChiFullName">نام شما</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="ChiUsername" name="username" placeholder="Username">
                        <label for="ChiUsername">نام کاربری</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="ChiEmail" name="email" placeholder="Email">
                        <label for="ChiEmail">ایمیل</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="ChiPassword1" name="password1"
                               placeholder="Password">
                        <label for="ChiPassword1">کلمه عبور</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="ChiPassword2" name="password2"
                               placeholder="RePassword">
                        <label for="ChiPassword2">تکرار کلمه عبور</label>
                    </div>
                    <button class="btn btn-lg btn-dark chi-btn-dark" type="submit">عضویت</button>

                </form>
                <div class="row chi-peyda-regular my-3">
                    <div class="col d-grid gap-2"><a class="btn btn-dark" href="login.php">ورود</a></div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <!--Login/Signup-->

<?php require __DIR__ . '\footer.php'; ?>