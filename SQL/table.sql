DROP TABLE IF EXISTS `t_user`;
DROP TABLE IF EXISTS `lbs_bbs`;

CREATE TABLE `t_user` (`user_account` VARCHAR(20),`user_pwd` VARCHAR(20),`user_name` VARCHAR(64),
PRIMARY KEY(`user_account`));