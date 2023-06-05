<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'weather';
$conn = new mysqli($dbhost, $dbuser, $dbpass);


if(! $conn ) {
    die('Could not connect: ' . mysql_error());
}

$sql = 'CREATE DATABASE IF NOT EXISTS weather';
$retval = $conn->query( $sql );

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

$sql = '
CREATE TABLE IF NOT EXISTS `frar963_mohajer`.`temperature` 
(
    `id` INT NOT NULL AUTO_INCREMENT ,
    `themp` VARCHAR(5) NOT NULL ,
    `currnt_date` DATE NOT NULL ,
    `device_id` INT NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
';
$retval = $conn->query( $sql );

$sql = '
CREATE TABLE IF NOT EXISTS `frar963_mohajer`.`users` 
(
    `id` INT NOT NULL AUTO_INCREMENT ,
    `mobile` VARCHAR(5) NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
';
$retval = $conn->query( $sql );

$sql = '
CREATE TABLE IF NOT EXISTS `weather`.`device` 
(
    `id` INT NOT NULL AUTO_INCREMENT ,
    `user_id` INT NOT NULL ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
';
$retval = $conn->query( $sql );

