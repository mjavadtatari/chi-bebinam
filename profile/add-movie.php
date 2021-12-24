<?php

require __DIR__ . '/imdbphp-7.2.0/bootstrap.php';

function setOrCreate($pdo, $movie_id, $the_list, $type)
{
    $set_sql = [
        "categories" => "INSERT INTO `categorytomovie` (`moviektm`, `categoryktm`) VALUES ",
        "categories2" => "SELECT * FROM `categorytomovie` WHERE (`moviektm`) = ",
        "languages" => "INSERT INTO `languagetomovie` (`movieltm`, `languageltm`) VALUES ",
        "languages2" => "SELECT * FROM `languagetomovie` WHERE (`movieltm`) = ",
        "countries" => "INSERT INTO `countrytomovie` (`moviectm`, `countryctm`) VALUES ",
        "countries2" => "SELECT * FROM `countrytomovie` WHERE (`moviectm`) = "
    ];

    $sql = $set_sql[$type . "2"] . "$movie_id";
    $result = $pdo->query($sql);
    if (!empty($result->fetchAll(PDO::FETCH_ASSOC))) {
        return false;
    }

    foreach ($the_list as $j) {
        $sql = "SELECT * FROM `$type` WHERE `name` = '$j'";
        $result = $pdo->query($sql);
        if (empty($result->fetchAll(PDO::FETCH_ASSOC))) {
            $create_sql = "INSERT INTO `$type` (`name`) VALUES ('$j')";
            $pdo->exec($create_sql);
        }
        $tmp_query = "SELECT `id` FROM `$type` WHERE `name` = '$j'";
        $result = $pdo->query($tmp_query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $result = $result[0]['id'];
        $tmp_sql = $set_sql[$type] . "($movie_id, $result)";
        $pdo->exec($tmp_sql);
    }

    return true;
}

function setOrCreatePerson($pdo, $movie_id, $the_list, $type)
{
    foreach ($the_list as $j) {
        $imdb = $j['imdb'];

        $sql = "SELECT * FROM `persontomovie` WHERE `personto` = '$imdb' AND `movieto` = '$movie_id'";
        $result = $pdo->query($sql);
        if (!empty($result->fetchAll(PDO::FETCH_ASSOC))) {
            continue;
        }

        $person = new \Imdb\Person($imdb);
        $name = $person->name();
        $photo = $person->photo(false);
        $bio = $person->bio();
        if ($bio) {
            $bio = substr($bio[0]["desc"], 0, 400);
            $bio = str_replace("'", "", $bio);
        } else {
            $bio = '';
        }
        $born = $person->born();
        $born = $born["year"] . "-" . $born["mon"] . "-" . $born["day"];


        $sql = "SELECT * FROM `persons` WHERE `personid` = '$imdb'";
        $result = $pdo->query($sql);
        if (empty($result->fetchAll(PDO::FETCH_ASSOC))) {
            $create_sql = "INSERT INTO `chibebinam`.`persons` (`personid`,`fullname`,`picture`,`biography`, `birthdate`, `type`)
                           VALUES ($imdb, '$name', '$photo', '$bio', '$born', '$type')";
            $pdo->exec($create_sql);
        }
        $tmp_query = "SELECT `personid` FROM `persons` WHERE `fullname` = '$name'";
        $result = $pdo->query($tmp_query);
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        $result = $result[0]['personid'];
        $tmp_sql = "INSERT INTO `persontomovie` (`personto`, `movieto`) VALUES ($result, $movie_id)";
        $pdo->exec($tmp_sql);
    }

    return true;
}

function addMovie($imdb_id)
{
    if (!is_numeric($imdb_id)) {
        return false;
    }
    $pdo = include '../dbfiles/dbconnect.php';

    $sql = "SELECT * FROM `movies` WHERE `movieid` = $imdb_id";
    $result = $pdo->query($sql);
    if (!empty($result->fetchAll(PDO::FETCH_ASSOC))) {
        return false;
    }

    $config = new \Imdb\Config();
    $config->language = 'en-US';

    $movie = new \Imdb\Title($imdb_id, $config);
    $awards = $movie->awards();

    $won_oscars = 0;
    $lost_oscars = 0;

    if (isset($awards["Academy Awards, USA"])) {
        foreach ($awards["Academy Awards, USA"]["entries"] as $j) {
            if ($j["won"]) {
                $won_oscars++;
            } else {
                $lost_oscars++;
            }
        }
    }

    $sql = "INSERT INTO `chibebinam`.`movies` (
            movieid, name, image, thumb, imdbpoint,
            imdbvote, imdbtop, metascore,
            yearproduced, oscarawards, oscarnominations, storyline)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$imdb_id, $movie->title(), $movie->photo(false), $movie->photo(), $movie->rating(),
        $movie->votes(), $movie->top250(), $movie->metacriticRating(),
        $movie->year(), $won_oscars, $lost_oscars, $movie->storyline()]);

    setOrCreate($pdo, $imdb_id, $movie->genres(), "categories");
    setOrCreate($pdo, $imdb_id, $movie->languages(), "languages");
    setOrCreate($pdo, $imdb_id, $movie->country(), "countries");

    setOrCreatePerson($pdo, $imdb_id, $movie->actor_stars(), "actor");
    setOrCreatePerson($pdo, $imdb_id, $movie->director(), "director");

    return true;
}

if (isset($_GET['movie'])) {
    $link = intval($_GET['movie']);
    if (addMovie($_GET['movie'])) {
        header("Location: ../addmovie.php?status=0&link=$link");
    } else {
        header("Location: ../addmovie.php?status=1&link=$link");
    }

}

//
//$the_list = ['0111161', '0068646', '0071562', '0468569', '0050083', '0108052', '0167260', '0110912', '10872600', '0060196',
//    '0120737', '0137523', '0109830', '1375666', '0167261', '0080684', '0133093', '0099685', '0073486', '0047478', '0114369',
//    '0102926', '0317248', '0038650', '0118799', '0120815', '0076759', '0816692', '0245429', '0120689', '6751668', '0110413',
//    '0056058', '0253474', '0103064', '0088763', '0114814', '0054215', '0110357', '0027977', '0120586', '0095327', '2582802',
//    '0172495', '0021749', '0407887', '1675434', '0482571', '0034583', '0064116', '0047396', '0095765', '0078748', '0078788',
//    '0209144', '0082971', '0032553', '1853728', '0405094', '0050825', '0043014', '0910970', '4154756', '0051201', '0081505',
//    '4633694', '0057012', '0119698', '0364569', '7286456', '5311514', '2380307', '1345836', '0090605', '0087843', '4154796',
//    '8267604', '0082096', '0057565', '1187043', '0114709', '0169547', '0086879', '0112573', '0361748', '8503618', '0119217',
//    '0086190', '0062622', '0105236', '0091251', '0986264', '0022100', '0052357', '0033467', '2106476', '0180093', '0045152',
//    '0053125', '0338013', '0044741', '0040522', '0056172', '0012349', '0093058', '5074352', '1255953', '0053604', '10272386',
//    '0036775', '0017136', '0066921', '0075314', '1832382', '0070735', '0086250', '0208092', '0048473', '8579674', '0211915',
//    '0056592', '0435761', '0059578', '1049413', '0097576', '0113277', '0119488', '0055630', '0095016', '0089881', '0042876',
//    '6966692', '15097216', '0363163', '0071853', '0042192', '0053291', '0372784', '0105695', '0118849', '0347149', '0993846',
//    '0055031', '0057115', '0469494', '0112641', '0040897', '0457430', '0268978', '1305806', '0081398', '0071411', '0071315',
//    '0096283', '0120735', '1130884', '0477348', '0015864', '0046912', '0084787', '4729430', '0050976', '5027774', '0080678',
//    '0167404', '0050986', '0120382', '0107290', '0041959', '0353969', '0434409', '0083658', '0117951', '2096673', '0050212',
//    '0116282', '0266543', '1291584', '1160419', '0266697', '0031381', '0046438', '0047296', '0476735', '3011894', '0079944',
//    '0077416', '1392214', '2278388', '0017925', '1205489', '0015324', '0065234', '0060827', '0112471', '0978762', '0264464',
//    '0031679', '0107207', '0072684', '3170832', '2267998', '2119532', '0019254', '8108198', '1950186', '2024544', '0035446',
//    '0118715', '0097165', '0892769', '0077711', '1392190', '0052618', '1201607', '0405159', '4016934', '0046268', '0092005',
//    '0074958', '1954470', '3315342', '0061512', '1028532', '0113247', '5323662', '0053198', '0091763', '1895587', '0198781',
//    '0032976', '0079470', '0116231', '0395169', '0118694', '1979320', '0758758', '0245712', '0075148', '0087544', '0025316',
//    '0060107', '0381681', '0169858', '0083922', '0058946', '0050783', '0093779', '0087884', '10431500'];
//foreach ($the_list as $i) {
//    addMovie($i);
//}