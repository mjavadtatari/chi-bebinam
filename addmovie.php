<?php require __DIR__.'/session.php' ?>

    <!--MainCard-->
    <div class="container">
        <div class="row py-3">
            <?php require __DIR__ . '/sidemenu.php' ?>
            <div class="col-md-9 col-12 mb-3">
                <div class="card color2-bg" style="height: 100%">
                    <div class="card-body">
                        <div class="card-title chi-peyda-regular color4-f">
                            افزودن فیلم
                        </div>
                        <div class="card-text">
                            <div class="row row-cols-1 row-cols-md-2 pt-2 g-4 mx-auto">
                                <div class="col-md-7 mx-auto chi-peyda-regular">
                                    <?php
                                    $status = $_GET['status'] ?? '';
                                    if ($status == 2) { ?>
                                        <div class="alert alert-success chi-peyda-regular" role="alert">
                                            فیلم با موفقیت اضافه شد!
                                            <a href="movie.php?id=<?php echo $_GET['link']; ?>" class="alert-link">مشاهده فیلم</a>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if ($status == 1) { ?>
                                        <div class="alert alert-danger chi-peyda-regular" role="alert">
                                            فیلم مورد نظر در سایت موجود است!
                                            <a href="movie.php?id=<?php echo $_GET['link']; ?>" class="alert-link">مشاهده فیلم</a>
                                        </div>
                                    <?php } ?>
                                    <div class="alert alert-warning" role="alert">
                                        فقط قسمت عددی آدرس را وارد نمایید!
                                        <br>
                                        <span class="d-block chi-ltr">
                                        https://www.imdb.com/title/tt
                                        <span class="badge rounded-pill bg-success">0111161</span>
                                        /
                                        </span>
                                    </div>
                                    <form method="get" action="profile/add-movie.php">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control chi-ltr" id="basic-url"
                                                   placeholder="0111161"
                                                   aria-describedby="basic-addon3" name="movie">
                                            <span class="input-group-text" id="basic-addon3">https://www.imdb.com/title/tt</span>
                                        </div>
                                        <div class="text-center d-grid">
                                            <button type="submit" class="btn btn-success mb-3">ثبت درخواست</button>
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