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

        $sql = "SELECT * FROM `persontomovie` WHERE `personto` = '$imdb'";
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
            movieid, name, image, imdbpoint,
            imdbvote, imdbtop, metascore,
            yearproduced, oscarawards, oscarnominations, storyline)
            VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$imdb_id, $movie->title(), $movie->photo(false), $movie->rating(),
        $movie->votes(), $movie->top250(), $movie->metacriticRating(),
        $movie->year(), $won_oscars, $lost_oscars, $movie->storyline()]);

    setOrCreate($pdo, $imdb_id, $movie->genres(), "categories");
    setOrCreate($pdo, $imdb_id, $movie->languages(), "languages");
    setOrCreate($pdo, $imdb_id, $movie->country(), "countries");

    setOrCreatePerson($pdo, $imdb_id, $movie->actor_stars(), "actor");
    setOrCreatePerson($pdo, $imdb_id, $movie->director(), "director");
}


addMovie('0111161');