CREATE TABLE `users` (
    `id` int(10) UNSIGNED NOT NULL,
    `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`)
VALUES (2, 'Marcelo', 'Soares', 'marceloxramos3d@gmail.com', 'eadcdb445738536aaab897dd24ba9e08', '2018-02-22 18:30:00', '2018-02-22 18:30:00');

ALTER TABLE `users`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `users_email_unique` (`email`);

ALTER TABLE `users`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- Token table
CREATE TABLE `tokens` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `usuarios_id` int(11) NOT NULL,
    `token` varchar(1000) NOT NULL,
    `refresh_token` varchar(1000) NOT NULL,
    `expired_at` datetime NOT NULL,
    `active` tinyint(4) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
