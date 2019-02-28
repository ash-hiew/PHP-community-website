drop database if exists TaM_gaming;
create database TaM_gaming;
use TaM_gaming;

CREATE TABLE community (
`commID` int(11) NOT NULL AUTO_INCREMENT,
`commName` varchar(11),
PRIMARY KEY(`commID`)
) ENGINE=InnoDB;

CREATE TABLE `users` (
 `userID` int(11) NOT NULL AUTO_INCREMENT,
 `fName` varchar(20) NOT NULL,
 `lName` varchar(20) NOT NULL, 
 `username` varchar(50) NOT NULL,
 `password` varchar(50) NOT NULL, 
 `email` varchar(50) NOT NULL,
 `gender` varchar(10) NOT NULL,
 `country` varchar(20),
 `userType` varchar(10),
 `commID` int(11),
 FOREIGN KEY (`commID`) REFERENCES `community`(`commID`)
 PRIMARY KEY (`userID`)
 ) ENGINE=InnoDB;


CREATE TABLE `polls` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `subject` varchar(255) NOT NULL,
 `status` enum('1','0') NOT NULL DEFAULT '1',
 `userID` int(11),
 FOREIGN KEY (`userID`) REFERENCES `users`(`userID`),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `poll_options` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `poll_id` int(11) NOT NULL,
 `name` varchar(255) NOT NULL,
 `status` enum('1','0') NOT NULL DEFAULT '1',
 PRIMARY KEY (`id`),
 FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `poll_votes` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `poll_id` int(11) NOT NULL,
 `poll_option_id` int(11) NOT NULL,
 `vote_count` bigint(10) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `poll_id` (`poll_id`),
 KEY `poll_option_id` (`poll_option_id`),
 FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`),
 FOREIGN KEY (`poll_option_id`) REFERENCES `poll_options` (`id`)
) ENGINE=InnoDB;

INSERT INTO community VALUES(NULL, 'tam');

INSERT INTO community VALUES(NULL, 'hindi');

INSERT INTO users VALUES(NULL,'Ashley', 'Hiew', 'mih0760', 'password123', 'luv2ashes@gmail.com', 'Female', 'nz', 'admin', '1');

INSERT INTO users VALUES(NULL,'Ashley', 'Hiew', 'mih0760', 'password123', 'luv2ashes@gmail.com', 'Female', 'nz', 'admin', '2');

INSERT INTO users VALUES(NULL,'John', 'Smith', 'jo440', 'js96', 'john_smith@gmail.com', 'Male', 'can', 'user', 2);

select * from users;

INSERT INTO `polls` VALUES (NULL, 'What feature would you like to see in the next maze level?', '1', 1);
INSERT INTO `polls` VALUES (NULL, 'How many levels have you passed?', '1', 2);

INSERT INTO `poll_options` VALUES
(NULL, 1, 'New avatars for Theseus and Minotaur', '1'),
(NULL, 1, 'Multiple Minotaurs', '1'),
(NULL, 1, 'Reward System - Collect coins in the maze', '1'),
(NULL, 1, 'No idea', '1');

INSERT INTO `poll_options` VALUES
(NULL, 2, 'Less than 5', '1'),
(NULL, 2, '5-10', '1'),
(NULL, 2, '11-19', '1'),
(NULL, 2, '20+', '1');

INSERT INTO poll_votes VALUES(NULL, 1, 1, 4);
INSERT INTO poll_votes VALUES(NULL, 1, 2, 1);
INSERT INTO poll_votes VALUES(NULL, 1, 3, 7);
INSERT INTO poll_votes VALUES(NULL, 1, 4, 10);

INSERT INTO poll_votes VALUES(NULL, 2, 1, 12);
INSERT INTO poll_votes VALUES(NULL, 2, 2, 8);
INSERT INTO poll_votes VALUES(NULL, 2, 3, 4);
INSERT INTO poll_votes VALUES(NULL, 2, 4, 3);


select * from polls;
select * from poll_options;
select * from poll_votes;

select polls.id, polls.subject, poll_options.name
from (polls
left join poll_options on poll_options.poll_id = polls.id);