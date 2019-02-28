<?php

include_once('MySQLDB.php');
require('db.php');

// create a new empty database
$db->createDatabase();
$db->selectDatabase();


$sql = "drop table if exists poll_votes";
$result = $db->query($sql);

$sql = "drop table if exists poll_options";
$result = $db->query($sql);

$sql = "drop table if exists polls";
$result = $db->query($sql);

$sql = "drop table if exists user";
$result = $db->query($sql);

$sql = "drop table if exists community";
$result = $db->query($sql);


// create tables
$table = "community";
$sql = "CREATE TABLE community (
         `commID` int(11) NOT NULL AUTO_INCREMENT,
         `commName` varchar(11),
         PRIMARY KEY(`commID`)
         )";
$db->createTable($table, $sql);

$table = "user";
$sql = "CREATE TABLE user (
         `userID` int(11) NOT NULL AUTO_INCREMENT,
         `fName` varchar(20) NOT NULL,
         `lName` varchar(20) NOT NULL, 
         `username` varchar(50) NOT NULL UNIQUE,
         `password` varchar(60) NOT NULL, 
         `email` varchar(50) NOT NULL,
         `gender` varchar(10) NOT NULL,
         `country` varchar(20),
         `userType` varchar(10),
         `commID` int(11),
         FOREIGN KEY (`commID`) REFERENCES `community`(`commID`),
         PRIMARY KEY (`userID`)
         )";
$db->createTable($table, $sql);

$table = "polls";
$sql = "CREATE TABLE polls (
         `id` int(11) NOT NULL AUTO_INCREMENT,
         `subject` varchar(255) NOT NULL,
         `status` enum('1','0') NOT NULL DEFAULT '1',
         `userID` int(11),
         FOREIGN KEY (`userID`) REFERENCES `user`(`userID`),
         PRIMARY KEY (`id`)
        )";
$db->createTable($table, $sql);

$table = "poll_option";
$sql = "CREATE TABLE poll_options (
         `id` int(11) NOT NULL AUTO_INCREMENT,
         `poll_id` int(11) NOT NULL,
         `name` varchar(255) NOT NULL,
         `status` enum('1','0') NOT NULL DEFAULT '1',
         PRIMARY KEY (`id`),
         FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`)
        )";
$db->createTable($table, $sql);

$table = "poll_votes";
$sql = "CREATE TABLE poll_votes (
         `id` int(11) NOT NULL AUTO_INCREMENT,
         `poll_id` int(11) NOT NULL,
         `poll_option_id` int(11) NOT NULL,
         `vote_count` bigint(10) NOT NULL,
         PRIMARY KEY (`id`),
         KEY `poll_id` (`poll_id`),
         KEY `poll_option_id` (`poll_option_id`),
         FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`),
         FOREIGN KEY (`poll_option_id`) REFERENCES `poll_options` (`id`)
        )";
$db->createTable($table, $sql);

// insert data
include('insertComm.php');
include('insertUsers.php');
include('insertPoll.php');


?>
