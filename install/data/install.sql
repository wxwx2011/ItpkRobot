-- ------------------------------------------------------------------------------------
-- 由于没有写安装引导程序，所以需要自己手动添加必要的数据，直接复制本页的所有内容，然后在数据库里面执行即可
-- 添加完成后，可用来测试的管理员账号，登录邮箱：admin@xxx.com		登录密码：123456
-- ------------------------------------------------------------------------------------

-- -----------------------------------------------------
-- Table `itpk_system`
-- -----------------------------------------------------
CREATE TABLE `itpk_system` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`mark` VARCHAR(32) NOT NULL,
	`name` VARCHAR(64) NOT NULL,
	`content` TEXT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

ALTER TABLE `itpk_system` ADD CONSTRAINT itpk_system_unique UNIQUE(`mark`, `name`);

-- -----------------------------------------------------
-- Table `itpk_system_msg`
-- -----------------------------------------------------
CREATE TABLE `itpk_system_msg` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`content` TEXT NOT NULL,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_template`
-- -----------------------------------------------------
CREATE TABLE `itpk_template` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(16) NOT NULL,
	`folder` VARCHAR(16) NOT NULL,
	`author` VARCHAR(16) NOT NULL,
	`link` VARCHAR(128) NOT NULL,
	`version` VARCHAR(8) NOT NULL,
	`selected` TINYINT(1) NOT NULL DEFAULT 0,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_role`
-- -----------------------------------------------------
CREATE TABLE `itpk_role` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(16) NOT NULL,
	`jurisdiction` BIGINT NOT NULL,
	`robot_max_number` INT NOT NULL DEFAULT 0,
	`init_gold` INT NOT NULL DEFAULT 0,
	`sort` INT NOT NULL DEFAULT 0,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_user`
-- -----------------------------------------------------
CREATE TABLE `itpk_user` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`role_id` INT NOT NULL,
	`nickname` VARCHAR(16) NOT NULL UNIQUE,
	`password` VARCHAR(32) NOT NULL,
	`mail` VARCHAR(64) NOT NULL UNIQUE,
	`phone` BIGINT NULL,
	`qq` BIGINT NULL,
	`gold` INT NOT NULL DEFAULT 0,
	`invitation` VARCHAR(8) NOT NULL,
	`user_check` VARCHAR(64) NULL,
	`reg_ip` VARCHAR(15) NOT NULL,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_chat_content`
-- -----------------------------------------------------
CREATE TABLE `itpk_chat_content`(
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`user_id` INT NOT NULL,
	`content` TEXT NOT NULL,
	`content_backup` TEXT NULL,
	`is_top` TINYINT(1) NOT NULL DEFAULT 0,
	`is_update` TINYINT(1) NOT NULL DEFAULT 0,
	`is_delete` TINYINT(1) NOT NULL DEFAULT 0,
	`send_ip` VARCHAR(15) NOT NULL,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_renewal`
-- -----------------------------------------------------
CREATE TABLE `itpk_renewal` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(16) NOT NULL,
	`day_time` INT NOT NULL,
	`gold INT` NOT NULL,
	`sort INT` NOT NULL DEFAULT 0,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_robot`
-- -----------------------------------------------------
CREATE TABLE `itpk_robot` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`user_id` INT NOT NULL,
	`uin` BIGINT NOT NULL UNIQUE,
	`name` VARCHAR(16) NOT NULL,
	`secret` VARCHAR(8) NOT NULL,
	`status` TINYINT(1) NOT NULL DEFAULT 1,
	`is_run` TINYINT(1) NOT NULL DEFAULT 0,
	`is_reconnection` TINYINT(1) NOT NULL DEFAULT 0,
	`is_reply` TINYINT(1) NOT NULL DEFAULT 0,
	`is_hook` TINYINT(1) NOT NULL DEFAULT 0,
	`is_group_speech` TINYINT(1) NOT NULL DEFAULT 0,
	`is_personal_speech` TINYINT(1) NOT NULL DEFAULT 0,
	`create_uin` BIGINT NULL,
	`manager_uin` TEXT NULL,
	`verifysession` TEXT NULL,
	`cookie` TEXT NULL,
	`skey` VARCHAR(16) NULL,
	`bkn` INT NULL,
	`run_last_time` INT NULL,
	`limitdate` BIGINT NOT NULL DEFAULT 0,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_robot_qrcode`
-- -----------------------------------------------------
CREATE TABLE `itpk_robot_qrcode` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`robot_id` INT NOT NULL UNIQUE,
	`image` BLOB NOT NULL,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_robot_cookie`
-- -----------------------------------------------------
CREATE TABLE `itpk_robot_cookie` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`robot_id` INT NOT NULL UNIQUE,
	`cookie` TEXT NOT NULL,
	`ptwebqq` TEXT NOT NULL,
	`vfwebqq` TEXT NOT NULL,
	`psessionid` TEXT NOT NULL,
	`clientid` TEXT NOT NULL,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_robot_plugin`
-- -----------------------------------------------------
CREATE TABLE `itpk_robot_plugin` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(64) NOT NULL UNIQUE COMMENT '插件名字',
	`class_name` VARCHAR(64) NOT NULL UNIQUE COMMENT '插件类名',
	`author` VARCHAR(16) NOT NULL COMMENT '插件作者',
	`author_url` VARCHAR(64) NOT NULL COMMENT '作者主页地址',
	`description` TEXT NOT NULL COMMENT '插件说明',
	`instruction` TEXT NOT NULL COMMENT '插件指令',
	`instruction_type` TEXT NOT NULL COMMENT '插件指令类型',
	`type_id` VARCHAR(64) NOT NULL COMMENT '插件处理类型',
	`is_monitor_all_msg` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '是否监控所有消息',
	`is_cron` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '是否有计划任务',
	`is_able` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '是否禁用',
	`version` VARCHAR(16) NOT NULL COMMENT '插件版本号',
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_robot_plugin_cron`
-- -----------------------------------------------------
CREATE TABLE `itpk_robot_plugin_cron` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`robot_plugin_id` INT NOT NULL,
	`minute` VARCHAR(16) NOT NULL,
	`hour` VARCHAR(16) NOT NULL,
	`day` VARCHAR(16) NOT NULL,
	`month` VARCHAR(16) NOT NULL,
	`dayofweek` VARCHAR(16) NOT NULL,
	`instruction` VARCHAR(64) NOT NULL,
	`lastactiontime` INT NOT NULL DEFAULT 0,
	`is_able` TINYINT(1) NOT NULL DEFAULT 0,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_robot_system_msg`
-- -----------------------------------------------------
CREATE TABLE `itpk_robot_system_msg` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`robot_id` INT NOT NULL,
	`content` TEXT NOT NULL,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_robot_group_msg`
-- -----------------------------------------------------
CREATE TABLE `itpk_robot_group_msg` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`robot_id` INT NOT NULL,
	`group_code` BIGINT NOT NULL,
	`send_uin` BIGINT NOT NULL,
	`from_uin` BIGINT NOT NULL,
	`content` TEXT NOT NULL,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_robot_friend_msg`
-- -----------------------------------------------------
CREATE TABLE `itpk_robot_friend_msg` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`robot_id` INT NOT NULL,
	`from_uin` BIGINT NOT NULL,
	`content` TEXT NOT NULL,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_robot_plugin_msg`
-- -----------------------------------------------------
CREATE TABLE `itpk_robot_plugin_msg` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`robot_plugin_id` BIGINT NOT NULL,
	`content` TEXT NOT NULL,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_robot_friend`
-- -----------------------------------------------------
CREATE TABLE `itpk_robot_friend` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`robot_id` INT NOT NULL,
	`uin` BIGINT NOT NULL,
	`nickname` VARCHAR(128) NOT NULL,
	`plugin_id` INT NOT NULL DEFAULT 0,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_robot_friend_info`
-- -----------------------------------------------------
CREATE TABLE `itpk_robot_friend_info` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`robot_id` INT NOT NULL,
	`uin` BIGINT NOT NULL,
	`name` VARCHAR(128) NOT NULL,
	`gtype` INT NOT NULL,
	`gname` VARCHAR(24) NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_robot_group`
-- -----------------------------------------------------
CREATE TABLE `itpk_robot_group` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`robot_id` INT NOT NULL,
	`uin` BIGINT NOT NULL,
	`name` VARCHAR(128) NOT NULL,
	`owner` INT NOT NULL,
	`adm_max` INT NULL,
	`adm_num` INT NULL,
	`level` VARCHAR(128) NULL,
	`count` INT NULL,
	`max_count` INT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_robot_group_code`
-- -----------------------------------------------------
CREATE TABLE `itpk_robot_group_code` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`robot_id` INT NOT NULL,
	`from_uin` BIGINT NOT NULL,
	`group_code` BIGINT NOT NULL,
	`group_uin` BIGINT NOT NULL,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

ALTER TABLE `itpk_robot_group_code` ADD CONSTRAINT itpk_robot_group_code_unique UNIQUE(`robot_id`, `group_uin`);

-- -----------------------------------------------------
-- Table `itpk_robot_group_member`
-- -----------------------------------------------------
CREATE TABLE `itpk_robot_group_member` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`robot_id` INT NOT NULL,
	`group_uin` BIGINT NOT NULL,
	`member_uin` BIGINT NOT NULL,
	`nickname` VARCHAR(128) NOT NULL,
	`cardname` VARCHAR(128) NULL,
	`experience` INT NOT NULL DEFAULT 0,
	`point` INT NOT NULL DEFAULT 0,
	`plugin_id` INT NOT NULL DEFAULT 0,
	`createdate` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;

-- -----------------------------------------------------
-- Table `itpk_robot_group_member_info`
-- -----------------------------------------------------
CREATE TABLE `itpk_robot_group_member_info` (
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`group_uin` BIGINT NOT NULL,
	`member_uin` BIGINT NOT NULL,
	`nickname` VARCHAR(128) NOT NULL,
	`cardname` VARCHAR(128) NULL,
	`role` INT NOT NULL,
	`qage` INT NOT NULL,
	`qsex` INT NOT NULL,
	`level` INT NOT NULL,
	`point` INT NOT NULL,
	`join_time` INT NOT NULL,
	`last_speak_time` INT NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COLLATE utf8_general_ci;


INSERT INTO `itpk_role` (`id`, `name`, `jurisdiction`, `robot_max_number`, `init_gold`, `sort`, `createdate`) VALUES (1, '超凡大师', 64, 6, 0, 199, 1450000000);
INSERT INTO `itpk_role` (`id`, `name`, `jurisdiction`, `robot_max_number`, `init_gold`, `sort`, `createdate`) VALUES (2, '英勇黄铜', 1, 0, 0, 100, 1450000000);

INSERT INTO `itpk_template` (`name`, `folder`, `author`, `link`, `version`, `selected`, `createdate`) VALUES ('默认模板', 'default', '冬天的秘密', 'http://bbs.itpk.cn', '1.0', 1, 1450000000);

INSERT INTO `itpk_user` (`role_id`, `nickname`, `password`, `mail`, `gold`, `invitation`, `reg_ip`, `createdate`) VALUES (1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@xxx.com', 100000, 'itpktest', '127.0.0.1', 1450000000);

INSERT INTO `itpk_renewal` (`name`, `day_time`, `gold`, `sort`, `createdate`) VALUES ('试用卡', 1, 15, 1000, 1450000000);
INSERT INTO `itpk_renewal` (`name`, `day_time`, `gold`, `sort`, `createdate`) VALUES ('月卡', 30, 300, 1100, 1450000000);
INSERT INTO `itpk_renewal` (`name`, `day_time`, `gold`, `sort`, `createdate`) VALUES ('年费卡', 365, 3000, 1200, 1450000000);