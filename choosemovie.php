<?php
require __DIR__ . '/header.php';
require __DIR__ . '/pagination.php';

//$pdo = include 'dbfiles/dbconnect.php';

$simple_sql = "
SELECT DISTINCT `movies`.`movieid`, `movies`.`name`, `movies`.`thumb` FROM `movies` 
INNER JOIN `countrytomovie`
      ON `countrytomovie`.`moviectm` = `movies`.`movieid`
INNER JOIN `categorytomovie`
      ON `categorytomovie`.`moviektm` = `movies`.`movieid`
INNER JOIN `languagetomovie`
      ON `languagetomovie`.`movieltm` = `movies`.`movieid`

WHERE ";

$put_and = false;

if (isset($_GET['genres'])) {
    $simple_sql .= " (";
    foreach ($_GET['genres'] as $i => $j) {
        $simple_sql .= "`categorytomovie` . `categoryktm` = $j";
        if (count($_GET['genres']) != $i + 1) {
            $simple_sql .= " OR ";
        }
    }
    $simple_sql .= ") ";
    $put_and = true;
} elseif (isset($_GET['country'])) {
    if ($put_and) {
        $simple_sql .= " AND ";
    }
    $simple_sql .= " (";
    foreach ($_GET['country'] as $i => $j) {
        $simple_sql .= "`countrytomovie` . `countryctm` = $j";
        if (count($_GET['country']) != $i + 1) {
            $simple_sql .= " OR ";
        }
    }
    $simple_sql .= ") ";
    $put_and = true;
} elseif (isset($_GET['language'])) {
    if ($put_and) {
        $simple_sql .= " AND ";
    }
    $simple_sql .= " (";
    foreach ($_GET['language'] as $i => $j) {
        $simple_sql .= "`languagetomovie` . `languageltm` = $j";
        if (count($_GET['language']) != $i + 1) {
            $simple_sql .= " OR ";
        }
    }
    $simple_sql .= ") ";
    $put_and = true;
} elseif (isset($_GET['year'])) {
    if ($put_and) {
        $simple_sql .= " AND ";
    }
    $simple_sql .= " (";
    foreach ($_GET['year'] as $i => $j) {
        $simple_sql .= "`movies` . `yearproduced` = $j";
        if (count($_GET['year']) != $i + 1) {
            $simple_sql .= " OR ";
        }
    }
    $simple_sql .= ") ";
    $put_and = true;
} elseif (isset($_GET['imdb'])) {
    if ($put_and) {
        $simple_sql .= " AND ";
    }
    $simple_sql .= " (";
    foreach ($_GET['imdb'] as $i => $j) {
        $simple_sql .= "`movies` . `imdbpoint` = $j";
        if (count($_GET['imdb']) != $i + 1) {
            $simple_sql .= " OR ";
        }
    }
    $simple_sql .= ") ";
    $put_and = true;
} elseif (isset($_GET['meta'])) {
    if ($put_and) {
        $simple_sql .= " AND ";
    }
    $simple_sql .= " (";
    foreach ($_GET['meta'] as $i => $j) {
        $simple_sql .= "`movies` . `metascore` = $j";
        if (count($_GET['meta']) != $i + 1) {
            $simple_sql .= " OR ";
        }
    }
    $simple_sql .= ") ";
    $put_and = true;
}

$simple_sql .= " ORDER BY RAND () LIMIT 5";

$stmt = $pdo->prepare($simple_sql);
$stmt->execute();
$output_list = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>



<!--MoviesList-->
<div class="container">
    <div class="row mb-5">
        <div class="col">
            <div class="card color2-bg">
                <div class="card-body">
                    <div class="card-title chi-peyda-regular color4-f">
                        انتخاب شده برای شما
                    </div>
                    <div class="row row-cols-1 row-cols-md-5 g-4 py-3">
                        <?php foreach ($output_list as $j) { ?>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!--MoviesList-->

<?php require __DIR__ . '/footer.php'; ?>
