<?php require __DIR__ . '/session.php';
require __DIR__ . '/pagination.php';

$sql = "SELECT `movies`.`movieid`,`movies`.`name`
FROM `movies` JOIN `watchedlist`
ON `watchedlist`.`watchedmovie`=`movies`.`movieid`
WHERE `watcheduser` = '$user_id'; ";
$all_watched_list = $pdo->prepare($sql);
$all_watched_list->execute();
$all_watched_list->fetchAll(PDO::FETCH_ASSOC);

$per_page = 8;
$current_page = $_GET['p'] ?? 1;
$offset = (($current_page - 1) * $per_page);

$sql = "SELECT `movies`.`movieid`,`movies`.`name`
FROM `movies` JOIN `watchedlist`
ON `watchedlist`.`watchedmovie`=`movies`.`movieid`
WHERE `watcheduser` = '$user_id' LIMIT $per_page OFFSET $offset ";
$page_watched_list = $pdo->prepare($sql);
$page_watched_list->execute();
$page_watched_list = $page_watched_list->fetchAll(PDO::FETCH_ASSOC);

$the_pages = getPaginationButtons($all_watched_list->rowCount(), $per_page, $current_page);
?>

    <!--MainCard-->
    <div class="container">
        <div class="row py-3">
            <?php require __DIR__ . '/sidemenu.php' ?>
            <div class="col-md-9 col-12 mb-3">
                <div class="card color2-bg" style="height: 100%">
                    <div class="card-body">
                        <div class="card-title chi-peyda-regular color4-f">
                            لیست دیده شده ها
                        </div>
                        <div class="card-text">
                            <div class="row row-cols-1 row-cols-md-2 pt-2 g-4 mx-auto">
                                <div class="col-md-10 mx-auto chi-peyda-regular">
                                    <?php
                                    $status = $_GET['status'] ?? '';
                                    if ($status == 2) { ?>
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
                                        <?php foreach ($page_watched_list as $i => $j) { ?>
                                            <tr>
                                                <th scope="row"><?php echo $offset + $i + 1; ?></th>
                                                <td><a class="text-decoration-none"
                                                       href="movie.php?id=<?php echo $j['movieid']; ?>"><?php echo $j['name']; ?></a>
                                                </td>
                                                <td><a class="text-decoration-none"
                                                       href="profile/updatelist.php?watched=<?php echo $j['movieid']; ?>&delete=1&back=watchedlist">
                                                        پاک کردن</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <nav class="text-center" aria-label="Page navigation example">
                                            <ul class="pagination chi-peyda-regular justify-content-center">
                                                <?php if ($the_pages[0]['text'] != "قبلی") { ?>
                                                    <li class="page-item"><span
                                                                class="page-link text-secondary">قبلی</span></li>
                                                <?php }
                                                foreach ($the_pages as $j) {
                                                    if ($j['text'] == "...") { ?>
                                                        <span class="page-link text-secondary"><?php echo $j['text']; ?></span>
                                                    <?php } else { ?>
                                                        <li class="page-item <?php if ($current_page == $j['number']) echo 'active'; ?>">
                                                            <a class="page-link"
                                                               href="?p=<?php echo $j['number']; ?>">
                                                                <?php echo $j['text']; ?></a></li>
                                                    <?php }
                                                }
                                                if ($the_pages[count($the_pages) - 1]['text'] != "بعدی") { ?>
                                                    <li class="page-item"><span
                                                                class="page-link text-secondary">بعدی</span></li>
                                                <?php } ?>
                                            </ul>
                                        </nav>
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

<?php require __DIR__ . '/footer.php'; ?>