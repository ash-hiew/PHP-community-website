<?php
// insert data
$sql = "INSERT INTO `polls` VALUES (NULL, 'What feature would you like to see in the next maze level?', '1', 1)";
$db->insertRow($sql);

$sql = "INSERT INTO `polls` VALUES (NULL, 'How many levels have you passed?', '1', 2)";
$db->insertRow($sql);

$sql = "INSERT INTO `poll_options` VALUES
(NULL, 1, 'New avatars for Theseus and Minotaur', '1'),
(NULL, 1, 'Multiple Minotaurs', '1'),
(NULL, 1, 'Reward System - Collect coins in the maze', '1'),
(NULL, 1, 'No idea', '1')";
$db->insertRow($sql);

$sql = "INSERT INTO `poll_options` VALUES
(NULL, 2, 'Less than 5', '1'),
(NULL, 2, '5-10', '1'),
(NULL, 2, '11-19', '1'),
(NULL, 2, '20+', '1')";
$db->insertRow($sql);

$sql = "INSERT INTO poll_votes VALUES(NULL, 1, 1, 4)";
$db->insertRow($sql);

$sql = "INSERT INTO poll_votes VALUES(NULL, 1, 2, 1)";
$db->insertRow($sql);

$sql = "INSERT INTO poll_votes VALUES(NULL, 1, 3, 7)";
$db->insertRow($sql);

$sql = "INSERT INTO poll_votes VALUES(NULL, 1, 4, 10)";
$db->insertRow($sql);

$sql = "INSERT INTO poll_votes VALUES(NULL, 2, 1, 12)";
$db->insertRow($sql);

$sql = "INSERT INTO poll_votes VALUES(NULL, 2, 2, 8)";
$db->insertRow($sql);

$sql = "INSERT INTO poll_votes VALUES(NULL, 2, 3, 4)";
$db->insertRow($sql);

$sql = "INSERT INTO poll_votes VALUES(NULL, 2, 4, 3)";
$db->insertRow($sql);
?>