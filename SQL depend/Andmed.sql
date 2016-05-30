
--
-- Andmete tõmmistamine tabelile `doti_users`
--

INSERT INTO `doti_users` (`id`, `username`, `password`, `email`, `active`, `privilegeLevel`, `created_timestamp`, `edited_timestamp`) VALUES
(1, 'Kert', '$2y$10$xbuZsvtigS2G8k44hWrN9.yQc7gVO6I1Bofytkx2UAPG0Vo3Mkgnu', 'kert@mail.ee', 'Yes', 1, '2015-11-26 15:57:27', '2015-11-26 15:57:27'),
(2, 'Andrus', '$2y$10$xbuZsvtigS2G8k44hWrN9.yQc7gVO6I1Bofytkx2UAPG0Vo3Mkgnu', 'andrus@mail.ee', 'Yes', 2, '2015-11-26 16:00:26', '2015-11-26 15:57:27'),
(3, 'JohSenna', '$2y$10$xbuZsvtigS2G8k44hWrN9.yQc7gVO6I1Bofytkx2UAPG0Vo3Mkgnu', 'aare@mail.ee', 'Yes', 2, '2015-11-26 16:00:26', '2015-11-26 15:57:27'),
(4, 'Diana', '$2y$10$xbuZsvtigS2G8k44hWrN9.yQc7gVO6I1Bofytkx2UAPG0Vo3Mkgnu', 'diana@mail.ee', 'Yes', 1, '2015-11-26 16:00:45', '2015-11-26 15:57:27');

--
-- Andmete tõmmistamine tabelile `doti_fields`
--

INSERT INTO `doti_fields` (`name`, `author_users_id`) VALUES
('Muusika', 1),
('Pere', 1),
('Programming', 1),
('Vaimsus', 1),
('Tervist', 1),
('Töö', 1),
('Raha', 1),
('Gaming', 1),
('Tervis', 1),
('Raha', 1),
('Nahakunst', 1),
('Õpetamine', 1);


INSERT INTO `doti_user_fields` (`users_id`, `fields_id`) VALUES 
('1', '1'), 
('1', '2'), 
('1', '3'), 
('1', '4'), 
('1', '5'), 
('1', '6'), 
('1', '7'), 
('1', '8'), 
('2', '1'), 
('2', '3'), 
('2', '4'), 
('3', '2'), 
('3', '3'), 
('3', '4');


INSERT INTO `doti_habits` (`name`, `habitauthor_users_id`) VALUES 
('Käi jooksmas', '3'), 
('Kätekõverdused', '2'), 
('Teeni raha :D', '3'), 
('Ostan poest', '1'), 
('Mängi instrumenti', '2');

INSERT INTO `doti_spec` (`name`, `habitspec_author_users_id`) VALUES 
('Anne kaupluse tiir', '3'), 
('3tk iga päev', '2'), 
('Ordi Palgatöö', '1'), 
('Süüa', '1'), 
('Alhkoholi', '1'), 
('Suitsu', '1'), 
('30 minutit kitarri päevas', '1'), 
('Tee KODULEHTI!', '3')

INSERT INTO `doti_user_habits` (`id`, `user_fields_id`, `habits_id`, `habitspec_id`) VALUES
(NULL, '1', '1', '1'),
(NULL, '1', '4', '4'),
(NULL, '1', '4', '5'),
(NULL, '2', '5', '7'),
(NULL, '1', '3', '3');






