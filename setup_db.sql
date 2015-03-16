CREATE DATABASE home_cont;
USE home_cont;
CREATE TABLE `dat` (
      `user_id` varchar(15) DEFAULT NULL,
      `room_alias` varchar(10) DEFAULT NULL,
      `appliance_alias` varchar(8) DEFAULT NULL,
      `appl_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `status` varchar(3) NOT NULL,
      PRIMARY KEY (`appl_id`),
      UNIQUE KEY `appl_id` (`appl_id`)
);


CREATE TABLE `userpass` (
      `username` varchar(15) NOT NULL,
      `pass` varchar(32) DEFAULT NULL,
      `home_ip` varchar(45),
      PRIMARY KEY (`username`)
);
