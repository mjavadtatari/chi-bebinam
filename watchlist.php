<?php require __DIR__ . '/session.php';

$sql = "SELECT `movies`.`movieid`,`movies`.`name`
FROM `movies` JOIN `watchlist`
ON `watchlist`.`watchmovie`=`movies`.`movieid`
WHERE `watchuser` = '$user_id'; ";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$the_watch_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <!--MainCard-->
    <div class="container">
        <div class="row py-3">
            <?php require __DIR__ . '/sidemenu.php' ?>
            <div class="col-md-9 col-12 mb-3">
                <div class="card color2-bg" style="height: 100%">
                    <div class="card-body">
                        <div class="card-title chi-peyda-regular color4-f">
                            لیست تماشا
                        </div>
                        <div class="card-text">
                            <div class="row row-cols-1 row-cols-md-2 pt-2 g-4 mx-auto">
                                <div class="col-md-10 mx-auto chi-peyda-regular">
                                    <?php
                                    $status = $_GET['status'] ?? '';
                                    if ($status == 0) { ?>
                                        <div class="alert alert-success chi-peyda-regular" role="alert">
                                            فیلم با موفقیت اضافه شد!
                                            <a href="movie.php?id=<?php echo $_GET['link']; ?>" class="alert-link">مشاهده
                                                فیلم</a>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    if ($status == 1) { ?>
                                        <div class="alert alert-danger chi-peyda-regular" role="alert">
                                            فیلم مورد نظر در سایت موجود است!
                                            <a href="movie.php?id=<?php echo $_GET['link']; ?>" class="alert-link">مشاهده
                                                فیلم</a>
                                        </div>
                                    <?php } ?>
                                    <table class="table color4-f">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">عنوان فیلم</th>
                                            <th scope="col">تنظیمات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($the_watch_list as $i => $j) { ?>
                                            <tr>
                                                <th scope="row"><?php echo $i + 1; ?></th>
                                                <td><a class="text-decoration-none"
                                                       href="movie.php?id=<?php echo $j['movieid']; ?>"><?php echo $j['name']; ?></a></td>
                                                <td><a class="text-decoration-none" href="profile/updatelist.php?watch=<?php echo $j['movieid']; ?>&delete=1&back=watchlist">
                                                        پاک کردن</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
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