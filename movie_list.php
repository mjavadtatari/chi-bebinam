<?php
require __DIR__ . '/header.php';
require __DIR__ . '/pagination.php';

$sql_addon = '';
$subject = $_GET['sub'] ?? "null";

$sql_addon = [
    "null" => "",
    "oscar" => "WHERE `oscarawards` > 0 ORDER BY `movies`.`yearproduced` DESC",
    "topimdb" => "WHERE `imdbtop` > 0 ORDER BY `movies`.`imdbtop`",
    "2021" => "WHERE `yearproduced` = 2021",
    "iran" => "JOIN `countrytomovie` ON `countrytomovie`.`moviectm` = `movies`.`movieid`
WHERE `countrytomovie`.`countryctm` = (SELECT `countries`.`id` FROM `countries` WHERE `name` LIKE '%iran%')",
    "dicaprio" => "JOIN `persontomovie` ON `persontomovie`.`movieto` = `movies`.`movieid`
WHERE `persontomovie`.`personto` = (SELECT `persons`.`personid` FROM `persons` WHERE `fullname` LIKE '%dicaprio%')",
    "animation" => "JOIN `categorytomovie` ON `categorytomovie`.`moviektm` = `movies`.`movieid`
WHERE `categorytomovie`.`categoryktm` = (SELECT `categories`.`id` FROM `categories` WHERE `name` = 'Animation')",
    "nolan" => "JOIN `persontomovie` ON `persontomovie`.`movieto` = `movies`.`movieid`
WHERE `persontomovie`.`personto` = 634240"
];

preg_match('!\d+!', $subject, $the_id);

if (preg_match('/(genre)\d+/', $subject)) {
    $sql_addon[$subject] = "JOIN `categorytomovie` ON `categorytomovie`.`moviektm` = `movies`.`movieid`
WHERE `categorytomovie`.`categoryktm` =  '$the_id[0]'";
} elseif (preg_match('/(lang)\d+/', $subject)) {
    $sql_addon[$subject] = "JOIN `languagetomovie` ON `languagetomovie`.`movieltm` = `movies`.`movieid`
WHERE `languagetomovie`.`languageltm` =  '$the_id[0]'";
} elseif (preg_match('/(cntry)\d+/', $subject)) {
    $sql_addon[$subject] = "JOIN `countrytomovie` ON `countrytomovie`.`moviectm` = `movies`.`movieid`
WHERE `countrytomovie`.`countryctm` = '$the_id[0]'";
} elseif (preg_match('/(person)\d+/', $subject)) {
    $sql_addon[$subject] = "JOIN `persontomovie` ON `persontomovie`.`movieto` = `movies`.`movieid`
WHERE `persontomovie`.`personto` = '$the_id[0]'";
} elseif (preg_match('/(year)\d+/', $subject)) {
    $sql_addon[$subject] = "WHERE `yearproduced` = '$the_id[0]'";
}

if (isset($_GET['key'])) {
    $search = $_GET['key'];
    $sql_addon["s"] = "WHERE `name` LIKE '%$search%'";
    $subject = "s";
}

$sql = "SELECT * FROM `movies`" . $sql_addon[$subject];
$all_movies_list = $pdo->prepare($sql);
$all_movies_list->execute();

$per_page = 10;
$current_page = $_GET['page'] ?? 1;
$offset = (($current_page - 1) * $per_page);

$sql = "SELECT * FROM `movies` " . $sql_addon[$subject] . " LIMIT $per_page OFFSET $offset";
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
                                                   href="?page=<?php echo $j['number']; ?><?php if (isset($subject) and $subject != "s") {
                                                       echo '&sub=' . $subject;
                                                   } elseif (isset($_GET['key'])) {
                                                       echo '&key=' . $_GET['key'];
                                                   } ?>">
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

<?php require __DIR__ . '/footer.php'; ?>