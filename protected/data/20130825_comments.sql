CREATE TABLE `comments` (
	`id` INT (10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`dietary` text,
	`created_at` datetime DEFAULT NULL,
	`created_by` INT (10) DEFAULT NULL,
	`updated_at` datetime DEFAULT NULL,
	`updated_by` INT (11) DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE = INNODB  DEFAULT CHARSET = utf8;
CREATE TABLE `hotels` (
	`id` INT (10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`type` varchar(255) not null default '',
	`name` varchar(255) not null default '',
	`is_master` tinyint(1) not null default 0,
	`room_rate` decimal(10,2) not null default 0.00,
	`attriton_rate` decimal(10,2) not null default 0.00,
	`sell_rate` decimal(10,2) not null default 0.00,
	`created_at` datetime DEFAULT NULL,
	`created_by` INT (10) DEFAULT NULL,
	`updated_at` datetime DEFAULT NULL,
	`updated_by` INT (11) DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE = INNODB  DEFAULT CHARSET = utf8;
CREATE TABLE `rooms` (
	`id` INT (10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`is_master` tinyint(1) not null default 0,
	`hotel_id` varchar(255) not null default '',
	`date` varchar(255) not null default '',
	`number` tinyint(4) not null default 0,
	`created_at` datetime DEFAULT NULL,
	`created_by` INT (10) DEFAULT NULL,
	`updated_at` datetime DEFAULT NULL,
	`updated_by` INT (11) DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE = INNODB  DEFAULT CHARSET = utf8;
ALTER TABLE `rooms` ADD UNIQUE `hotel_date` USING BTREE (hotel_id, date);

alter table comments add column room text;



