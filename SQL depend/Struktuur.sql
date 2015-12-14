-- UNCOOOOOOOOOOOOOOOOOOOOOOOOO
--
-- Seoste kaotamine
--

ALTER TABLE doti_fields
DROP FOREIGN KEY FKFieldAuthor;

ALTER TABLE doti_user_fields
DROP FOREIGN KEY FKFieldOwner,
DROP FOREIGN KEY FKField;

ALTER TABLE doti_habits
DROP FOREIGN KEY FKHabitAuthor;

ALTER TABLE doti_user_habits
DROP FOREIGN KEY FKHabitOwner,
DROP FOREIGN KEY FKhabit,
DROP FOREIGN KEY FKhabitSpec;

ALTER TABLE doti_habitspec
DROP FOREIGN KEY FKHSpecAuthor;

DROP TABLE doti_fields;
DROP TABLE doti_habits;
DROP TABLE doti_users;
DROP TABLE doti_user_fields;
DROP TABLE doti_habitspec;
DROP TABLE doti_user_fields_habits;

-- =============================================================================================
-- TABELI STRUKTUUR ============================================================================
-- =============================================================================================

DROP TABLE IF EXISTS `doti_fields`;
CREATE TABLE IF NOT EXISTS `doti_fields` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` text NOT NULL,
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

DROP TABLE IF EXISTS `doti_habits`;
CREATE TABLE IF NOT EXISTS `doti_habits` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `habitauthor_users_id` int(11) NOT NULL,
  KEY `habitauthor_users_id` (`habitauthor_users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci 
COMMENT='Erinevad tegevused/sündmused, mida kasutaja soovib trackida/tagida.';

DROP TABLE IF EXISTS `doti_user_fields_habits`;
CREATE TABLE IF NOT EXISTS `doti_user_fields_habits` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `users_fields_id` int(11) NOT NULL,
  `habits_id` int(11) NOT NULL,
  `habitspec_id` int(11) NOT NULL,
  KEY `users_fields_id` (`users_fields_id`),
  KEY `habits_id` (`habits_id`),
  KEY `habitspec_id` (`habitspec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci 
COMMENT='Kasutajaga seotud (Tema Sektoriga) Tegevused';

DROP TABLE IF EXISTS `doti_habitspec`;
CREATE TABLE IF NOT EXISTS `doti_habitspec` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `habitspec_author_users_id` int(11) NOT NULL,
  KEY `habitspec_author_users_id` (`habitspec_author_users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci 
COMMENT='Sündmuste täpsustus, näiteks koht, aeg, olukord vms, mitte sassi ajada väärtuse ehk tegevuse mõõduga, nt trenni aeg, ostu summa, kcal jne.';

-- =============================================================================================
-- FOREIGN KEYD ================================================================================
-- =============================================================================================

ALTER TABLE `doti_fields`
  ADD CONSTRAINT `FKFieldAuthor` FOREIGN KEY (`author_users_id`) REFERENCES `doti_users` (`id`);

ALTER TABLE `doti_user_fields`
  ADD CONSTRAINT `FKField` FOREIGN KEY (`fields_id`) REFERENCES `doti_fields` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  ADD CONSTRAINT `FKFieldOwner` FOREIGN KEY (`users_id`) REFERENCES `doti_users` (`id`);
  
ALTER TABLE `doti_habits`
  ADD CONSTRAINT `FKHabitAuthor` 
    FOREIGN KEY (`habitauthor_users_id`) 
        REFERENCES `doti_users` (`id`)
          ON DELETE NO ACTION
          ON UPDATE NO ACTION;

ALTER TABLE `doti_user_fields_habits`
  ADD CONSTRAINT `FKHabitOwnerField` FOREIGN KEY (`users_fields_id`) REFERENCES `doti_user_fields` (`id`),
  ADD CONSTRAINT `FKhabit` FOREIGN KEY (`habits_id`) REFERENCES `doti_habits` (`id`),
  ADD CONSTRAINT `FKhabitSpec` FOREIGN KEY (`habitspec_id`) REFERENCES `doti_habitspec` (`id`);
  
ALTER TABLE `doti_habitspec`
  ADD CONSTRAINT `FKHSpecAuthor` FOREIGN KEY (`habitspec_author_users_id`) REFERENCES `doti_users` (`id`);

  
  