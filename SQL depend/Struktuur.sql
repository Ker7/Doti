
DROP TABLE doti_user_habits;
DROP TABLE doti_user_fields;
DROP TABLE doti_habits;
DROP TABLE doti_spec;
DROP TABLE doti_field_datalog;
DROP TABLE doti_habit_datalog;
DROP TABLE doti_fields;
DROP TABLE doti_users;

-- =============================================================================================
-- TABELI STRUKTUUR ============================================================================
-- =============================================================================================

DROP TABLE IF EXISTS `doti_fields`;
CREATE TABLE IF NOT EXISTS `doti_fields` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` text NOT NULL,
  `color` varchar(7) NOT NULL DEFAULT '#FFFFFF',
  `author_users_id` int(11) NOT NULL,
  KEY `author_users_id` (`author_users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci 
COMMENT='Kõik võimalikud kasutaja poolt kirja pandud hobid, valdkonnad või alad, mille üle soovitakse järge/arvestust pidada.';

DROP TABLE IF EXISTS `doti_users`;
CREATE TABLE IF NOT EXISTS `doti_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  
  `active` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(3) DEFAULT 'No',
  
  `privilegeLevel` int(11) DEFAULT NULL,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci 
COMMENT='Doti kasutajad, users table';

DROP TABLE IF EXISTS `doti_user_fields`;
CREATE TABLE IF NOT EXISTS `doti_user_fields` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `fields_id` int(11) NOT NULL,
  KEY `users_id` (`users_id`),
  KEY `fields_id` (`fields_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci 
COMMENT='Kasutajaga seotud fieldid';

DROP TABLE IF EXISTS `doti_field_datalog`;
CREATE TABLE IF NOT EXISTS `doti_field_datalog` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_field_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL,
  KEY `user_field_id` (`user_field_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci
COMMENT='Fieldide väärtuste ajalugu ja kommentaarid';

DROP TABLE IF EXISTS `doti_habits`;
CREATE TABLE IF NOT EXISTS `doti_habits` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `habitauthor_users_id` int(11) NOT NULL,
  KEY `habitauthor_users_id` (`habitauthor_users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci 
COMMENT='Erinevad tegevused/sündmused, mida kasutaja soovib trackida/tagida.';

DROP TABLE IF EXISTS `doti_user_habits`;
CREATE TABLE IF NOT EXISTS `doti_user_habits` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_fields_id` int(11) NOT NULL,
  `habits_id` int(11) NOT NULL,
  KEY `user_fields_id` (`user_fields_id`),
  KEY `habits_id` (`habits_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci 
COMMENT='Kasutajaga seotud (Tema Sektoriga) Tegevused';

DROP TABLE IF EXISTS `doti_habit_datalog`;
CREATE TABLE IF NOT EXISTS `doti_habit_datalog` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_fields_habits_id` int(11) NOT NULL,
  `event_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `unit` text CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `value` decimal(10,2) NOT NULL,
  KEY `user_fields_habits_id` (`user_fields_habits_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci
COMMENT='Fieldide väärtuste ajalugu ja kommentaarid';

DROP TABLE IF EXISTS `doti_spec`;
CREATE TABLE IF NOT EXISTS `doti_spec` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `habitspec_author_users_id` int(11) NOT NULL,
  KEY `habitspec_author_users_id` (`habitspec_author_users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci 
COMMENT='Sündmuste täpsustus, näiteks koht, aeg, olukord vms, mitte sassi ajada väärtuse ehk tegevuse mõõduga, nt trenni aeg, ostu summa, kcal jne.';
