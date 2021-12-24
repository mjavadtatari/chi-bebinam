<?php require __DIR__ . '/session.php' ?>

    <!--MainCard-->
    <div class="container">
        <div class="row py-3">
            <?php require __DIR__ . '/sidemenu.php' ?>
            <div class="col-md-9 col-12 mb-3">
                <div class="card color2-bg">
                    <div class="card-body">
                        <div class="card-title chi-peyda-regular color4-f">
                            پروفایل شما
                        </div>
                        <div class="card-text">
                            <div class="row row-cols-1 row-cols-md-2 pt-2 g-4 mx-auto">
                                <div class="col-md-3 text-center pt-md-3 ms-md-5">
                                    <img src="<?php echo $result[0]['picture']; ?>" class="rounded-circle"
                                         alt="<?php echo $result[0]['fullname']; ?>"
                                         style="object-fit:cover; height: 200px; width: 200px;">
                                </div>
                                <div class="col-md-7 mx-auto chi-peyda-regular">
                                    <?php
                                    $status = $_GET['status'] ?? '';
                                    if ($status == 1) { ?>
                                        <div class="alert alert-success chi-peyda-regular" role="alert">
                                            پروفایل شما با موفقیت بروز شد!
                                        </div>
                                    <?php } ?>
                                    <form method="post" action="profile/updateprofile.php">
                                        <input type="hidden" name="csrf_token"
                                               value="<?php echo generateCsrfToken(); ?>">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">نام کاربری</span>
                                            <input type="text" class="form-control" id="basic-url"
                                                   value="<?php echo $result[0]['username']; ?>"
                                                   aria-describedby="basic-addon3" name="username">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">نام و نام خانوادگی</span>
                                            <input type="text" class="form-control" id="basic-url"
                                                   value="<?php echo $result[0]['fullname']; ?>"
                                                   aria-describedby="basic-addon3" name="fullname">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">آدرس ایمیل</span>
                                            <input type="email" class="form-control" id="basic-url"
                                                   value="<?php echo $result[0]['email']; ?>"
                                                   aria-describedby="basic-addon3" name="email">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">آدرس تصویر پروفایل</span>
                                            <input type="url" class="form-control" id="basic-url"
                                                   value="<?php echo $result[0]['picture']; ?>"
                                                   aria-describedby="basic-addon3" name="picture">
                                        </div>
                                        <!--                                        <div class="input-group mb-3">-->
                                        <!--                                            <label class="input-group-text" for="inputGroupFile02">تصویر پروفایل</label>-->
                                        <!--                                            <input type="file" class="form-control chi-ltr" id="inputGroupFile02">-->
                                        <!--                                        </div>-->
                                        <div class="text-center d-grid">
                                            <button type="submit" class="btn btn-primary mb-3">ثبت تغییرات</button>
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