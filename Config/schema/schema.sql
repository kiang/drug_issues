SET NAMES utf8;

DROP TABLE IF EXISTS `acos`;
CREATE TABLE IF NOT EXISTS `acos`(
	`id` int(11) NOT NULL AUTO_INCREMENT, 
	`parent_id` int(11), 
	`model` varchar(64), 
	`foreign_key` int(11), 
	`alias` varchar(128), 
	`lft` int(11), 
	`rght` int(11), 
	PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `aros`;
CREATE TABLE IF NOT EXISTS `aros`(
	`id` int(11) NOT NULL AUTO_INCREMENT, 
	`parent_id` int(11), 
	`model` varchar(64), 
	`foreign_key` int(11), 
	`alias` varchar(128), 
	`lft` int(11), 
	`rght` int(11), 
	PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE IF NOT EXISTS `aros_acos`(
	`id` int(11) NOT NULL AUTO_INCREMENT, 
	`aro_id` int(11), 
	`aco_id` int(11), 
	`_create` int(2) DEFAULT NULL, 
	`_read` int(2) DEFAULT NULL, 
	`_update` int(2) DEFAULT NULL, 
	`_delete` int(2) DEFAULT NULL, 
	PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members`(
	`id` int(11) NOT NULL AUTO_INCREMENT, 
	`group_id` int(11), 
	`username` varchar(64), 
	`password` varchar(48), 
	`user_status` varchar(1) DEFAULT 'N', 
	`created` datetime, 
	`modified` datetime, 
	PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups`(
	`id` int(11) NOT NULL AUTO_INCREMENT, 
	`parent_id` int(11), 
	`name` varchar(64), 
	PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `group_permissions`;
CREATE TABLE IF NOT EXISTS `group_permissions`(
	`id` int(11) NOT NULL AUTO_INCREMENT, 
	`parent_id` int(11), 
	`order` int(11), 
	`name` varchar(64), 
	`description` varchar(255) DEFAULT NULL, 
	`acos` varchar(255), 
	PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `licenses`;
CREATE TABLE IF NOT EXISTS `licenses`(
	`id` int(11) NOT NULL AUTO_INCREMENT, 
	`name_english` varchar(255) DEFAULT NULL, 
	`name_chinese` varchar(255) DEFAULT NULL, 
	`license` varchar(255) DEFAULT NULL, 
	PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `issues`;
CREATE TABLE IF NOT EXISTS `issues`(
	`id` int(11) NOT NULL AUTO_INCREMENT, 
	`license_id` varchar(255) DEFAULT NULL, 
	`license_uuid` varchar(255) DEFAULT NULL, 
	`info_source` varchar(255) DEFAULT NULL, 
	`status` varchar(255) DEFAULT NULL, 
	`name_english` varchar(255) DEFAULT NULL, 
	`name_chinese` varchar(255) DEFAULT NULL, 
	`license` varchar(255) DEFAULT NULL, 
	`dosage_form` varchar(255) DEFAULT NULL, 
	`dosage` varchar(255) DEFAULT NULL, 
	`batch_no` varchar(255) DEFAULT NULL, 
	`pic_old` varchar(255) DEFAULT NULL, 
	`pic_new` varchar(255) DEFAULT NULL, 
	`label_old` varchar(255) DEFAULT NULL, 
	`label_old_file` varchar(255) DEFAULT NULL, 
	`label_new` varchar(255) DEFAULT NULL, 
	`label_new_file` varchar(255) DEFAULT NULL, 
	`evidence` varchar(255) DEFAULT NULL, 
	`modified` varchar(255) DEFAULT NULL, 
	`modified_by` varchar(255) DEFAULT NULL, 
	PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `issue_logs`;
CREATE TABLE IF NOT EXISTS `issue_logs`(
	`id` int(11) NOT NULL AUTO_INCREMENT, 
	`issue_id` varchar(255) DEFAULT NULL, 
	`status` varchar(255) DEFAULT NULL, 
	`comment` varchar(255) DEFAULT NULL, 
	`created` varchar(255) DEFAULT NULL, 
	`created_by` varchar(255) DEFAULT NULL, 
	PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

