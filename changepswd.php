<?php require __DIR__ . '/session.php' ?>

    <!--MainCard-->
    <div class="container">
        <div class="row py-3">
            <?php require __DIR__ . '/sidemenu.php' ?>
            <div class="col-md-9 col-12 mb-3">
                <div class="card color2-bg">
                    <div class="card-body">
                        <div class="card-title chi-peyda-regular color4-f">
                            تغییر کلمه عبور
                        </div>
                        <div class="card-text">
                            <div class="row row-cols-1 row-cols-md-2 pt-2 g-4 mx-auto">
                                <div class="col-md-7 mx-auto chi-peyda-regular">
                                    <?php
                                    $status = $_GET['status'] ?? '';
                                    if ($status == 1) { ?>
                                        <div class="alert alert-success chi-peyda-regular" role="alert">
                                            کلمه عبور شما با موفقیت بروز شد!
                                        </div>
                                    <?php }
                                    if ($status > 1) { ?>
                                        <div class="alert alert-danger chi-peyda-regular" role="alert">
                                            <?php if ($status == 2) { ?>
                                                مقادیر را به درستی وارد کنید!
                                            <?php } elseif ($status == 3) { ?>
                                                کلمه های عبور وارد شده یکسان نیستند!
                                            <?php } elseif ($status == 4) { ?>
                                                کلمه عبور کوچکتر از 8 کاراکتر می باشد!
                                            <?php } elseif ($status == 5) { ?>
                                                کلمه عبور باید حداقل شامل یک عدد باشد!
                                            <?php } elseif ($status == 6) { ?>
                                                کلمه عبور باید حداقل شامل یک حرف باشد!
                                            <?php } elseif ($status == 7) { ?>
                                                نام کاربری کوچکتر از 8 کاراکتر یا تماما عدد است!
                                            <?php } elseif ($status == 8) { ?>
                                                کلمه عبور های وارد شده صحیح نمی باشند!
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <form method="post" action="profile/chpswdcheck.php">
                                        <input type="hidden" name="csrf_token"
                                               value="<?php echo generateCsrfToken(); ?>">
                                        <input type="hidden" name="username"
                                               value="<?php echo $result[0]['username']; ?>">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">کلمه عبور فعلی</span>
                                            <input type="password" class="form-control" id="basic-url"
                                                   aria-describedby="basic-addon3" name="prvpswd">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">کلمه عبور جدید</span>
                                            <input type="password" class="form-control" id="basic-url"
                                                   aria-describedby="basic-addon3" name="newpswd1">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">تکرار کلمه عبور جدید</span>
                                            <input type="password" class="form-control" id="basic-url"
                                                   aria-describedby="basic-addon3" name="newpswd2">
                                        </div>
                                        <div class="text-center d-grid">
                                            <button type="submit" class="btn btn-primary mb-3">تغییر کلمه عبور</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--MainCard-->

<?php require __DIR__ . '/footer.php'; ?>