
--
-- Andmete tõmmistamine tabelile `dotbl_users`
--

INSERT INTO `dotbl_users` (`id`, `username`, `password`, `email`, `active`, `privilegeLevel`, `created_timestamp`, `edited_timestamp`) VALUES
(1, 'Kert', '$2y$10$xbuZsvtigS2G8k44hWrN9.yQc7gVO6I1Bofytkx2UAPG0Vo3Mkgnu', 'kert@mail.ee', 'Yes', 1, '2015-11-26 15:57:27', '2015-11-26 15:57:27'),
(2, 'Andrus', '$2y$10$xbuZsvtigS2G8k44hWrN9.yQc7gVO6I1Bofytkx2UAPG0Vo3Mkgnu', 'andrus@mail.ee', 'Yes', 2, '2015-11-26 16:00:26', '2015-11-26 15:57:27'),
(3, 'JohSenna', '$2y$10$xbuZsvtigS2G8k44hWrN9.yQc7gVO6I1Bofytkx2UAPG0Vo3Mkgnu', 'aare@mail.ee', 'Yes', 2, '2015-11-26 16:00:26', '2015-11-26 15:57:27'),
(4, 'Diana', '$2y$10$xbuZsvtigS2G8k44hWrN9.yQc7gVO6I1Bofytkx2UAPG0Vo3Mkgnu', 'diana@mail.ee', 'Yes', 1, '2015-11-26 16:00:45', '2015-11-26 15:57:27');

--
-- Andmete tõmmistamine tabelile `dotbl_fields`
--

INSERT INTO `dotbl_fields` (`name`, `color`, `author_users_id`) VALUES
('Muusika', '#FFFFFF', 1),
('Pere', '#FFFFFF', 1),
('Programming', '#FFFFFF', 1),
('Vaimsus', '#FFFFFF', 1),
('Tervist', '#FFFFFF', 1),
('Töö', '#FFFFFF', 1),
('Raha', '#FFFFFF', 1),
('Gaming', '#FFFFFF', 1),
('Tervis', '#FFFFFF', 1),
('Raha', '#FFFFFF', 1),
('Nahakunst', '#FFFFFF', 1),
('Õpetamine', '#FFFFFF', 1);


INSERT INTO `dotbl_user_fields` (`users_id`, `fields_id`) VALUES 
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


INSERT INTO `dotbl_habits` (`name`, `habitauthor_users_id`) VALUES 
('Käi jooksmas', '3'), 
('Kätekõverdused', '2'), 
('Teeni raha :D', '3'), 
('Ostan poest', '1'), 
('Mängi instrumenti', '2');

INSERT INTO `dotbl_spec` (`name`, `habitspec_author_users_id`) VALUES 
('Anne kaupluse tiir', '3'), 
('3tk iga päev', '2'), 
('Ordi Palgatöö', '1'), 
('Süüa', '1'), 
('Alhkoholi', '1'), 
('Suitsu', '1'), 
('30 minutit kitarri päevas', '1'), 
('Tee KODULEHTI!', '3');

INSERT INTO `dotbl_field_habits` (`user_fields_id`, `habits_id`) VALUES
('1', '5'),
('5', '1'),
('5', '2'),
('7', '4'),
('7', '3');






