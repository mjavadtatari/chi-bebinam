<?php
$pdo = include "dbconnect.php";

$persons = "
CREATE TABLE `persons` (
  `personid` INT NOT NULL,
  `fullname` VARCHAR(150) NOT NULL,
  `picture` VARCHAR(255) NULL,
  `birthdate` DATE NOT NULL,
  `biography` TEXT NOT NULL,
  `type` ENUM('actor', 'director') NOT NULL,
  PRIMARY KEY (`personid`));
";

$categories = "
CREATE TABLE `categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));
";

$languages = "
CREATE TABLE `languages` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));
";

$countries = "
CREATE TABLE `countries` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));
";

$movies = "
CREATE TABLE `movies` (
  `movieid` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `thumb` VARCHAR(255) NOT NULL,
  `imdbpoint` TINYINT NOT NULL,
  `imdbvote` MEDIUMINT NULL,
  `imdbtop` TINYINT UNSIGNED NOT NULL,
  `metascore` TINYINT NULL,
  `yearproduced` YEAR NOT NULL,
  `oscarawards` TINYINT NULL,
  `oscarnominations` TINYINT NULL,
  `storyline` TEXT NOT NULL,
  PRIMARY KEY (`movieid`));
";

$users = "
CREATE TABLE `users` (
  `userid` INT NOT NULL AUTO_INCREMENT,
  `fullname` VARCHAR(120) NULL,
  `username` VARCHAR(45) NOT NULL,
  `email` VARCHAR(120) NOT NULL,
  `picture` VARCHAR(255) NULL,
  `imdbpage` VARCHAR(120) NULL,
  `password` VARCHAR(120) NOT NULL,
  `type` ENUM('admin', 'vip', 'normal') NOT NULL,
  `birthdate` DATE NULL,
  `joindate` DATETIME NOT NULL DEFAULT NOW(),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  PRIMARY KEY (`userid`));
";

$watched_list = "
CREATE TABLE `watchedlist` (
  `watchedid` INT NOT NULL AUTO_INCREMENT,
  `watchedmovie` INT NOT NULL,
  `watcheduser` INT NOT NULL,
  PRIMARY KEY (`watchedid`),
  INDEX `watchedmovie_idx` (`watchedmovie` ASC) ,
  INDEX `watcheduser_idx` (`watcheduser` ASC) ,
  CONSTRAINT `watchedmovie`
    FOREIGN KEY (`watchedmovie`)
    REFERENCES `movies` (`movieid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `watcheduser`
    FOREIGN KEY (`watcheduser`)
    REFERENCES `users` (`userid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
";

$watch_list = "
CREATE TABLE `watchlist` (
  `watchid` INT NOT NULL AUTO_INCREMENT,
  `watchmovie` INT NOT NULL,
  `watchuser` INT NOT NULL,
  PRIMARY KEY (`watchid`),
  INDEX `watchmovie_idx` (`watchmovie` ASC),
  INDEX `watchuser_idx` (`watchuser` ASC),
  CONSTRAINT `watchmovie`
    FOREIGN KEY (`watchmovie`)
    REFERENCES `movies` (`movieid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `watchuser`
    FOREIGN KEY (`watchuser`)
    REFERENCES `users` (`userid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
";

$person_to_movie = "
CREATE TABLE `persontomovie` (
  `persontomovieid` INT NOT NULL AUTO_INCREMENT,
  `personto` INT NOT NULL,
  `movieto` INT NOT NULL,
  PRIMARY KEY (`persontomovieid`),
  INDEX `personto_idx` (`personto` ASC) ,
  INDEX `movieto_idx` (`movieto` ASC) ,
  CONSTRAINT `personto`
    FOREIGN KEY (`personto`)
    REFERENCES `persons` (`personid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `movieto`
    FOREIGN KEY (`movieto`)
    REFERENCES `movies` (`movieid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
";

$country_to_movie = "
CREATE TABLE `countrytomovie` (
  `ctmid` INT NOT NULL AUTO_INCREMENT,
  `moviectm` INT NOT NULL,
  `countryctm` INT NOT NULL,
  PRIMARY KEY (`ctmid`),
  INDEX `moviectm_idx` (`moviectm` ASC) ,
  INDEX `countryctm_idx` (`countryctm` ASC) ,
  CONSTRAINT `moviectm`
    FOREIGN KEY (`moviectm`)
    REFERENCES `movies` (`movieid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `countryctm`
    FOREIGN KEY (`countryctm`)
    REFERENCES `countries` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
";

$language_to_movie = "
CREATE TABLE `languagetomovie` (
  `ltmid` INT(11) NOT NULL AUTO_INCREMENT,
  `movieltm` INT(11) NOT NULL,
  `languageltm` INT(11) NOT NULL,
  PRIMARY KEY (`ltmid`),
  INDEX `movieltm_idx` (`movieltm` ASC) ,
  INDEX `languageltm_idx` (`languageltm` ASC) ,
  CONSTRAINT `movieltm`
    FOREIGN KEY (`movieltm`)
    REFERENCES `movies` (`movieid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `languageltm`
    FOREIGN KEY (`languageltm`)
    REFERENCES `languages` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
";

$category_to_movie = "
CREATE TABLE `categorytomovie` (
  `ktmid` INT(11) NOT NULL AUTO_INCREMENT,
  `moviektm` INT(11) NOT NULL,
  `categoryktm` INT(11) NOT NULL,
  PRIMARY KEY (`ktmid`),
  INDEX `moviektm_idx` (`moviektm` ASC) ,
  INDEX `categoryktm_idx` (`categoryktm` ASC) ,
  CONSTRAINT `moviektm`
    FOREIGN KEY (`moviektm`)
    REFERENCES `movies` (`movieid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `categoryktm`
    FOREIGN KEY (`categoryktm`)
    REFERENCES `categories` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);
";


$pdo->exec($persons);
$pdo->exec($categories);
$pdo->exec($languages);
$pdo->exec($countries);
$pdo->exec($movies);
$pdo->exec($users);
$pdo->exec($watched_list);
$pdo->exec($watch_list);
$pdo->exec($person_to_movie);
$pdo->exec($country_to_movie);
$pdo->exec($language_to_movie);
$pdo->exec($category_to_movie);