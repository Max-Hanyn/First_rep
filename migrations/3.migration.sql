ALTER TABLE `users` ADD `verified` INT(10) NULL DEFAULT NULL AFTER `password`, ADD `token` TEXT NOT NULL AFTER `verified`, ADD `role_id` INT(10) NOT NULL AFTER `token`, ADD INDEX (`role_id`);
