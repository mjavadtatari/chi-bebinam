<?php require __DIR__ . '\header.php'; ?>

    <!--Login/Signup-->
    <div class="container py-4">
        <div class="row mb-5" style="height: 25em">
            <div class="col"></div>
            <div class="col-md-5 color2-bg p-5">
                <h4 class="text-center chi-peyda-regular color4-f mb-4">خوش آمدید</h4>
                <form method="post" action="logincheck.php" class="chi-peyda-regular d-grid gap-2">
                    <div class="form-floating mb-3">
                        <input type="hidden" name="csrf_token" value="">
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
                    <div class="col d-grid gap-2"><a class="btn btn-dark" href="#">عضویت</a></div>
                    <div class="col d-grid gap-2"><a class="btn btn-dark" href="#">فراموشی</a></div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <!--Login/Signup-->

<?php require __DIR__ . '\footer.php'; ?>