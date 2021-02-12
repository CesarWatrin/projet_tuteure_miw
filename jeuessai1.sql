INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Utilisateur', 'Vous souhaitez parcourir les commerces disponibles sur la carte, synchroniser vos commerces favoris, et laisser des avis.', NULL, NULL),
(2, 'Commerçant', 'Vous avez un ou plusieurs commerces et vous souhaitez les faire apparaître sur notre plateforme.', NULL, NULL),
(3, 'Modérateur', NULL, NULL, NULL);

INSERT INTO `users` (`id`, `surname`, `firstname`, `phonenumber`, `email`, `password`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`, `role_id`) VALUES
(123456, 'Auboisdormant', 'Abdel', '0623568974', 'abdel-93@gmail.com', '5b3c97354ff11e0a9afa9b37529adbfd', NULL, NULL, NULL, NULL, 1),
(123457, 'Male', 'Annie', '0623568975', 'annie.male@gmail.com', '9d87679542089788abb49b2ef12ddd31', NULL, NULL, NULL, NULL, 1),
(123458, 'Tard', 'Guy', '0623568976', 'guy-tot@gmail.com', 'd042be8cf6c50a73c8734f5f78c7ef6b', NULL, NULL, NULL, NULL, 2),
(123459, 'Use', 'Jacques', '0623568977', 'jacky05@gmail.com', '02cfcaf1e3b1caf7e52540a53dc34138', NULL, NULL, NULL, NULL, 2),
(123460, 'Hule', 'Jules', '0623568978', 'Julule@gmail.com', '007cdf8e830929680a2d196df5d744e7', NULL, NULL, NULL, NULL, 3),
(123461, 'Evitable', 'Line', '0623568979', 'line.pro@gmail.com', 'fd2295a1420777e7342d3ec36cd87df4', NULL, NULL, NULL, NULL, 3),
(123462, 'Emique', 'Paul', '0623568980', 'emiquepolo@gmail.com', 'f4d1ede60bac7cd62e86b0a61c3de0e1', NULL, NULL, NULL, NULL, 1),
(123463, 'Masse', 'Sarah', '0623568981', 'sarahlala@gmail.com', '8be508f3f36708bcfefb6864a215433a', NULL, NULL, NULL, NULL, 2);

INSERT INTO `cities` (`id`, `name`, `zip`, `coordinates`, `created_at`, `updated_at`) VALUES
(5061, 'Gap', '5000', '44.5667,6.0833', NULL, NULL),
(69380, 'Lyon', '69000', '45.750000,4.850000', NULL, NULL);

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'restaurant', NULL, NULL),
(2, 'magasin', NULL, NULL),
(3, 'boucherie', NULL, NULL),
(4, 'fruit et legumes', NULL, NULL),
(5, 'debit de boisson', NULL, NULL),
(6, 'magasin de vetement', NULL, NULL),
(7, 'culture', NULL, NULL);

INSERT INTO `subcategories` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'restaurant asiatique', 1, NULL, NULL),
(2, 'restaurant traditionnel', 1, NULL, NULL),
(1, 'restauration rapide', 1, NULL, NULL),
(4, 'epicerie', 2, NULL, NULL),
(5, 'supermarche', 2, NULL, NULL),
(6, 'commerce de proximite', 2, NULL, NULL),
(7, 'boucherie traditionelle', 3, NULL, NULL),
(8, 'boucherie Halal', 3, NULL, NULL),
(9, 'boucherie cacher', 3, NULL, NULL);

INSERT INTO `stores` (`id`, `name`, `address1`, `address2`, `lat`, `lon`, `phonenumber`, `email`, `siret`, `description`, `delivery`, `delivery_conditions`, `state`, `comments_code`, `website`, `opening_hours`, `city_id`, `category_id`, `subcategory_id`, `manager_id`, `created_at`, `updated_at`) VALUES
(4, 'Le New Saigon', '5 Rue de Valserres', '', 44.556293, 6.078103, '0981487196', 'newsaig@on.fr', '72200393609037', 'Restaurant Vietnamien', 1, '', '4', '64de7f6af4', 'https://www.facebook.com/NewSaigonGap', 'Tous les jours : 11h-14h - 18h-23h', 5061, 1, 3, 123458, NULL, NULL),
(3, 'Burger grill', '8 Place du Revelly', '', 44.561208, 6.080099, '0981487195', 'bg@burger.com', '72200393609038', 'Restaurant de Hamburger', 1, '', '2', '64de7f6af3', 'https://burgergrills.business.site/', 'Tous les jours : 11h-14h - 18h-23h', 5061, 1, 1, 123457, NULL, NULL),
(2, 'O\'tacos', '11B Cours Ladoucette', '', 44.562039, 6.083195, '0981487194', 'otacos@gap.fr', '72200393609037', 'Le tacos à la française par excellence', 0, '', '4', '64de7f6af2', 'https://o-tacos.com/fr/', 'Tous les jours : 10h30 - 00h', 5061, 1, 1, 123457, NULL, NULL),
(1, 'Mac Donald Sud', '5 Avenue Fran', '', 44.545599, 6.063268, '0492560303', 'mac@donald.com', '72200393609036', 'Chaîne emblématique de restauration rapide proposant des menus de burgers-frites, des desserts et milk-shakes.', 0, '', '4', '64de7f6af1', 'https://www.mcdonalds.fr/', 'Tous les jours : 11h - 18h', 5061, 1, 1, 123459, NULL, NULL),
(5, 'Uniwok', '78 Avenue de Provence', NULL, 44.537526, 6.052018, '0981487197', 'uniwok@gmail.com', '72200393609038', 'Restaurant à volonté', 1, 'à partir de 15€', '4', '64de7f6af5', 'http://uniwok.fr/', 'Tous les jours : 11h-14h - 18h-23h', 5061, 1, 3, 123458, NULL, NULL),
(6, 'Leclerc Gap', 'Route des Fauvins', '', 44.563283, 6.093084, '0981487198', 'leclercgap@gmail.fr', '72200393609037', 'Hypermarché', 1, NULL, '4', '64de7f6af6', 'https://www.e-leclerc.com/gap', 'Tous les jours: 9h - 18h', 5061, 2, 5, 123460, NULL, NULL),
(7, 'Proxi de l\'Adret', 'Route de Veynes', 'Cité de l\'Adret', 44.558181, 6.069126, '0981487199', 'proxigap@gmail.com', '72200393609038', 'Epicerie - boulangerie', 0, NULL, '4', '64de7f6af7', 'https://boulangerie-proxi-de-ladret-en-passant.business.site/', 'Tous les jours: 9h-18h', 5061, 2, 6, 123461, NULL, NULL),
(8, 'Boucherie Perrot', '6 Rue Tronchet', '', 45.769584, 4.844217, '0981487200', 'perrotviande@boucher.com', '72200393609037', 'Boucherie Familiale', 0, NULL, '4', '64de7f6af8', 'https://www.boucherie-perrot-lyon.fr/', 'Tous les jours: 6h-19h30', 69380, 3, 8, 123462, NULL, NULL),
(9, 'Boucherie Djemai', '31 Rue Sébastien Gryphe', NULL, 45.752280, 4.843948, '0981487201', 'abdel@gmail.com', '72200393609038', 'Boucherie Halal', 0, NULL, '4', '64de7f6af9', 'http://boucherie-djemai.business.site/', 'Tous les jours: 8h30-19h30', 69380, 3, 9, 123456, NULL, NULL);
