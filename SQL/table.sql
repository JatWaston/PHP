DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (`user_account` VARCHAR(20) NOT NULL,`user_pwd` VARCHAR(20) NOT NULL,`user_email` VARCHAR(64) NOT NULL,`user_registerDate` DATE NOT NULL,
PRIMARY KEY(`user_account`));