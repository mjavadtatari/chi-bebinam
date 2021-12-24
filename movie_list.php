<?php
require __DIR__ . '\header.php';
require __DIR__ . '\pagination.php';

$sql_addon = '';
$subject = $_GET['sub'] ?? null;

if ($subject == 'oscar') {
    $sql_addon = "WHERE `oscarawards` > 0";
} elseif ($subject == 'topimdb') {
    $sql_addon = "WHERE `imdbtop` > 0";
} elseif ($subject == 'nolan') {
    $sql_addon = "JOIN `persontomovie` ON `persontomovie`.`movieto` = `movies`.`movieid`
WHERE `persontomovie`.`personto` = 634240";
}

$sql = "SELECT * FROM `movies`" . $sql_addon;
$all_movies_list = $pdo->prepare($sql);
$all_movies_list->execute();

$per_page = 10;
$current_page = $_GET['page'] ?? 1;
$offset = (($current_page - 1) * $per_page);

$sql = "SELECT * FROM `movies` " . $sql_addon . " LIMIT $per_page OFFSET $offset";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$movies_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

$the_pages = getPaginationButtons($all_movies_list->rowCount(), $per_page, $current_page);
?>


    <!--MoviesList-->
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                <div class="card color2-bg">
                    <div class="card-body">
                        <div class="card-title chi-peyda-regular color4-f">
                            لیست فیلم ها
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 g-4 py-3">
                            <?php foreach ($movies_list as $j) { ?>
                                <div class="col mb-3 px-md-3 px-5">
                                    <div class="card bg-dark">
                                        <img class="card-img-top" src="<?php echo $j['thumb']; ?>"
                                             alt="<?php echo $j['name']; ?>">
                                        <div class="card-body pt-3 pb-1">
                                            <div class="card-title text-center chi-peyda-regular color4-f">
                                                <a class="text-decoration-none"
                                                   href="movie.php?id=<?php echo $j['movieid']; ?>">
                                                    <?php echo $j['name']; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <nav class="text-center" aria-label="Page navigation example">
                                <ul class="pagination chi-peyda-regular justify-content-center">
                                    <?php if ($the_pages[0]['text'] != "قبلی") { ?>
                                        <li class="page-item"><span class="page-link text-secondary">قبلی</span></li>
                                    <?php }
                                    foreach ($the_pages as $j) {
                                        if ($j['text'] == "...") { ?>
                                            <span class="page-link text-secondary"><?php echo $j['text']; ?></span>
                                        <?php } else { ?>
                                            <li class="page-item <?php if ($current_page == $j['number']) echo 'active'; ?>">
                                                <a class="page-link"
                                                   href="?page=<?php echo $j['number']; ?><?php if (isset($subject)) echo '&sub=' . $subject; ?>">
                                                    <?php echo $j['text']; ?></a></li>
                                        <?php }
                                    }
                                    if ($the_pages[count($the_pages) - 1]['text'] != "بعدی") { ?>
                                        <li class="page-item"><span class="page-link text-secondary">بعدی</span></li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--MoviesList-->

<?php require __DIR__ . '\footer.php'; ?>