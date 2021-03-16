INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Utilisateur', 'Vous souhaitez parcourir les commerces disponibles sur la carte, synchroniser vos commerces favoris, et laisser des avis.', NULL, NULL),
(2, 'Commerçant', 'Vous avez un ou plusieurs commerces et vous souhaitez les faire apparaître sur notre plateforme.', NULL, NULL),
(3, 'Modérateur', NULL, NULL, NULL);

INSERT INTO `users` (`id`, `surname`, `firstname`, `phonenumber`, `email`, `password`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`, `role_id`) VALUES
(123456, 'Auboisdormant', 'Abdel', '0623568974', 'abdel-93@gmail.com', '5b3c97354ff11e0a9afa9b37529adbfd', NULL, NULL, NULL, NULL, 1),
(123457, 'Male', 'Annie', '0623568975', 'annie.male@gmail.com', '9d87679542089788abb49b2ef12ddd31', NULL, NULL, NULL, NULL, 1),
(123458, 'Tard', 'Guy', '0623568976', 'guy-tot@gmail.com', '$2y$10$C/YPcw0e8GiMIYSbgRZ5web6dM8r4mJdbsyXeRaeLo4KFe9gdBehe', NULL, NULL, NULL, NULL, 2),
(123459, 'Use', 'Jacques', '0623568977', 'jacky05@gmail.com', '02cfcaf1e3b1caf7e52540a53dc34138', NULL, NULL, NULL, NULL, 2),
(123460, 'Hule', 'Jules', '0623568978', 'Julule@gmail.com', '007cdf8e830929680a2d196df5d744e7', NULL, NULL, NULL, NULL, 3),
(123461, 'Evitable', 'Line', '0623568979', 'line.pro@gmail.com', 'fd2295a1420777e7342d3ec36cd87df4', NULL, NULL, NULL, NULL, 3),
(123462, 'Emique', 'Paul', '0623568980', 'emiquepolo@gmail.com', 'f4d1ede60bac7cd62e86b0a61c3de0e1', NULL, NULL, NULL, NULL, 1),
(123463, 'Masse', 'Sarah', '0623568981', 'sarahlala@gmail.com', '8be508f3f36708bcfefb6864a215433a', NULL, NULL, NULL, NULL, 2),
(123464, 'Commerçant', 'Yohan', '0629351379', 'yohan.salamone@outlook.com', '$2y$10$VjLec.LNYB587W6Rp9AQ7exkTFjMq0u2x2n/Ahx2mZn7302ebr6O.', NULL, NULL, '2021-02-19 12:18:17', '2021-02-25 07:57:00', 2),
(123465, 'Je suis', 'Utilisateur', NULL, 'iam@user.com', '$2y$10$pp2.y6Fvs.OiecMG8xeI0.VvfOLsrj48uR4/oo5mvdktpjZF26WOy', NULL, NULL, '2021-02-19 12:18:40', '2021-03-06 15:30:34', 1),
(123466, 'Client', 'Yohan', NULL, 'yohan.salamone@gmail.com', '$2y$10$sxyTFMtEpMw5q4MdinPBtuToiM.vCjta5GBKZvd2PMwQul3sn.sOe', NULL, NULL, '2021-02-25 07:56:17', '2021-03-06 16:50:00', 1),
(123467, 'Modérateur', 'Yohan', '0629351379', 'yohan.salamone.services@gmail.com', '$2y$10$sxyTFMtEpMw5q4MdinPBtuToiM.vCjta5GBKZvd2PMwQul3sn.sOe', NULL, NULL, '2021-03-05 09:55:58', '2021-03-05 09:55:58', 3),
(123468, 'Administrateur', 'Yohan', '0629351379', 'yoyodu05@icloud.com', '$2y$10$iIpdiq8IykWZhYj1e7I.D.fnq2G0Fu3qJZWXu1PnbdtO73nWqgHyy', NULL, NULL, '2021-03-05 10:05:03', '2021-03-05 16:23:19', 3),
(123469, 'Salamone', 'Yohan', '0629351379', 'yohan.admin@gmail.com', '$2y$10$cyGDm9jtPMbCuqGEzc6Av.XaJubGUc7z5XK29763lVSB9a7iP2dIe', NULL, NULL, '2021-03-05 13:48:20', '2021-03-05 13:48:20', 3),
(123473, 'Salamone', 'Yohan', NULL, 'y.s@gmail.com', '$2y$10$Yi5XspGg/L80nSZwDu/Ys.ryywYf0n6bLI3KNok7KfkSpJNq6UsXi', NULL, NULL, '2021-03-09 10:24:37', '2021-03-09 10:24:37', 1);


INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Restaurant', NULL, NULL),
(2, 'Magasin', NULL, NULL),
(3, 'Boucherie', NULL, NULL),
(4, 'Fruits et légumes', NULL, NULL),
(5, 'Débit de boissons', NULL, NULL),
(6, 'Magasin de vêtements', NULL, NULL),
(7, 'Culture', NULL, NULL);

INSERT INTO `subcategories` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Restauration rapide', 1, NULL, NULL),
(2, 'Restaurant traditionnel', 1, NULL, NULL),
(3, 'Restaurant asiatique', 1, NULL, NULL),
(4, 'Épicerie', 2, NULL, NULL),
(5, 'Supermarché', 2, NULL, NULL),
(6, 'Commerce de proximité', 2, NULL, NULL),
(7, 'Boucherie traditionnelle', 3, NULL, NULL),
(8, 'Boucherie Halal', 3, NULL, NULL),
(9, 'Boucherie Cacher', 3, NULL, NULL);

INSERT INTO `stores` (`id`, `name`, `address1`, `address2`, `zip`, `city`, `lat`, `lon`, `phonenumber`, `email`, `siret`, `description`, `catalog`, `delivery`, `delivery_conditions`, `state`, `comments_code`, `website`, `opening_hours`, `category_id`, `subcategory_id`, `manager_id`, `created_at`, `updated_at`) VALUES
(1, 'McDonald\'s Sud', '5 Avenue François Mitterand', '', '05000', 'Gap', 44.545599, 6.063268, '0492560303', 'gapsud@mcdonalds.com', '72200393609036', 'Chaîne emblématique de restauration rapide proposant des menus de burgers-frites, des desserts et des milk-shakes.', '', 0, '', '4', '64de7f6af1', 'https://www.mcdonalds.fr/', 'Tous les jours : 11h - 18h', 1, 1, 123459, NULL, NULL),
(2, 'O\'tacos', '11B Cours Ladoucette', '', '05000', 'Gap', 44.562039, 6.083195, '0981487194', 'otacos@gap.fr', '72200393609037', 'Le tacos à la française par excellence', '', 0, '', '4', '64de7f6af2', 'https://o-tacos.com/fr/', 'Tous les jours : 10h30 - 00h', 1, 1, 123457, NULL, NULL),
(3, 'Burger grill', '8 Place du Revelly', '', '05000', 'Gap', 44.561208, 6.080099, '0981487195', 'bg@burger.com', '72200393609038', 'Restaurant de hamburgers', '', 1, '', '2', '64de7f6af3', 'https://burgergrills.business.site/', 'Tous les jours : 11h-14h - 18h-23h', 1, 1, 123457, NULL, NULL),
(4, 'Le New Saigon', '5 Rue de Valserres', '', '05000', 'Gap', 44.556293, 6.078103, '0981487196', 'newsaig@on.fr', '72200393609037', 'Restaurant Vietnamien', '', 1, '', '4', '64de7f6af4', 'https://www.facebook.com/NewSaigonGap', 'Tous les jours : 11h-14h - 18h-23h', 1, 3, 123458, NULL, NULL),
(5, 'Uniwok', '78 Avenue de Provence', NULL, '05000', 'Gap', 44.537526, 6.052018, '0981487197', 'uniwok@gmail.com', '72200393609038', 'Restaurant à volonté', '', 1, 'à partir de 15€', '4', '64de7f6af5', 'http://uniwok.fr/', 'Tous les jours : 11h-14h - 18h-23h', 1, 3, 123458, NULL, NULL),
(6, 'E.Leclerc Gap', 'Route des Fauvins', '', '05000', 'Gap', 44.563283, 6.093084, '0981487198', 'leclercgap@gmail.fr', '72200393609037', 'Hypermarché', '', 1, NULL, '4', '64de7f6af6', 'https://www.e-leclerc.com/gap', 'Tous les jours: 9h - 18h', 2, 5, 123460, NULL, NULL),
(7, 'Proxi de l\'Adret', 'Route de Veynes', 'Cité de l\'Adret', '05000', 'Gap', 44.558181, 6.069126, '0981487199', 'proxigap@gmail.com', '72200393609038', '', 'Épicerie - boulangerie', 0, NULL, '4', '64de7f6af7', 'https://boulangerie-proxi-de-ladret-en-passant.business.site/', 'Tous les jours: 9h-18h', 2, 6, 123461, NULL, NULL),
(8, 'Boucherie Perrot', '6 Rue Tronchet', '', '69006', 'Lyon', 45.769584, 4.844217, '0981487200', 'perrotviande@boucher.com', '72200393609037', 'Boucherie Familiale', '', 0, NULL, '4', '64de7f6af8', 'https://www.boucherie-perrot-lyon.fr/', 'Tous les jours: 6h-19h30', 3, 8, 123462, NULL, NULL),
(9, 'Boucherie Djemai', '31 Rue Sébastien Gryphe', NULL, '69007', 'Lyon', 45.752280, 4.843948, '0981487201', 'abdel@gmail.com', '72200393609038', 'Boucherie Halal', '', 0, NULL, '4', '64de7f6af9', 'http://boucherie-djemai.business.site/', 'Tous les jours: 8h30-19h30', 3, 9, 123456, NULL, NULL);

INSERT INTO `favorites` (`user_id`, `store_id`, `created_at`, `updated_at`) VALUES
(123456, 2, NULL, NULL),
(123456, 5, NULL, NULL),
(123456, 8, NULL, NULL),
(123457, 1, NULL, NULL),
(123457, 3, NULL, NULL),
(123458, 5, NULL, NULL),
(123459, 2, NULL, NULL),
(123459, 5, NULL, NULL);

INSERT INTO `ratings` (`id`, `user_id`, `store_id`, `rating`, `comment`, `reported`, `created_at`, `updated_at`) VALUES
(1, 123456, 1, '5', NULL, '0', NULL, NULL),
(2, 123456, 2, '5', 'Les tacos sont délicieux !', '0', NULL, NULL),
(3, 123456, 3, '3', 'Bien mangé, mais le service était trop long.', '0', NULL, NULL),
(4, 123456, 7, '4', NULL, '0', NULL, NULL),
(5, 123457, 1, '5', NULL, '0', NULL, NULL),
(6, 123457, 4, '1', 'Une honte!!!', '1', NULL, NULL),
(7, 123457, 5, '5', 'Bien mieux que l\'autre restau chinois de la ville', '0', NULL, NULL),
(8, 123458, 2, '4', NULL, '0', NULL, NULL),
(9, 123458, 7, '4', NULL, '0', NULL, NULL),
(10, 123458, 8, '4', NULL, '0', NULL, NULL),
(11, 123459, 2, '5', 'Très bon rapport qualité/prix.', '0', NULL, NULL),
(12, 123459, 4, '5', 'J\'ai apprécié mon repas, personnel serviable.', '0', NULL, NULL),
(13, 123459, 6, '4', 'Rien à dire, tout est super.', '0', NULL, NULL),
(14, 123459, 8, '2', 'J\'ai attendu 1h avant de me faire servir !!', '1', NULL, NULL),
(15, 123466, 1, '3', 'D\'habitude on y mange bien, mais la dernière fois les frites étaient froides... Dommage.', '0', '2021-02-26 14:11:56', '2021-03-04 14:40:07'),
(16, 123466, 2, '5', NULL, '0', '2021-03-04 15:07:11', '2021-03-05 08:25:07'),
(17, 123466, 3, '5', 'C\'était vraiment super !!', '0', '2021-03-04 20:58:00', '2021-03-04 20:58:00'),
(18, 123466, 4, '4', 'Le service était un peu long mais le personnel très agréable : je recommande.', '0', '2021-03-04 20:58:24', '2021-03-04 20:58:24'),
(19, 123466, 5, '2', 'Nous avons été très mal reçus !', '1', '2021-03-04 20:58:42', '2021-03-04 20:58:42');



