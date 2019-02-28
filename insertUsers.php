<?php
// insert data
// create hash password for initial data



$passwordHash = password_hash('password123', PASSWORD_BCRYPT);
$sql = "INSERT INTO user VALUES(NULL,'Ashley', 'Hiew', 'mih0760', '$passwordHash', 'luv2ashes@gmail.com', 'Female', 'nz', 'admin', 1)";
$db->insertRow($sql);

$passwordHash = password_hash('kitkat245', PASSWORD_BCRYPT);
$sql = "INSERT INTO user VALUES(NULL,'Millie', 'Moon', 'mom956', '$passwordHash', 'milmoon956@gmail.com', 'Female', 'aus', 'user', 1)";
$db->insertRow($sql);

$passwordHash = password_hash('carnival343', PASSWORD_BCRYPT);
$sql = "INSERT INTO user VALUES(NULL,'Ashley', 'Hiew', 'mih1001', '$passwordHash', 'luv2ashes@gmail.com', 'Female', 'mal', 'admin', 2)";
$db->insertRow($sql);

$passwordHash = password_hash('teacup196', PASSWORD_BCRYPT);
$sql = "INSERT INTO user VALUES(NULL,'John', 'Smith', 'jo440', '$passwordHash', 'john_smith@gmail.com', 'Male', 'can', 'user', 2)";
$db->insertRow($sql);
?>