-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 17 mars 2023 à 15:04
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `restaurant_qa`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'maguzer89pot@aduai.com', '$2y$10$3HB11s9eGsF9tWviqh1QfOjzKVzQXCnmIA6cPKEuhvgxqNq9/QnuK');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Burger'),
(2, 'Pates'),
(3, 'Pizza'),
(4, 'Poisson'),
(5, 'Viande'),
(6, 'Salade'),
(7, 'Soupe'),
(8, 'Dessert');

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE `customer` (
  `customer_id` char(36) NOT NULL,
  `customer_mail` varchar(255) NOT NULL,
  `customer_password` varchar(60) NOT NULL,
  `customer_nbconv` int(2) NOT NULL,
  `customer_allergen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_mail`, `customer_password`, `customer_nbconv`, `customer_allergen`) VALUES
('026bf3d6-c3fb-11ed-9911-a74c88c74b23', 'mai@mail.com', '$2y$10$UeRROU2gYNbNAYXKAHGGve2TWIDzNPZEQXrQmjXRERjZNVci9Lb6e', 1, 'eeee'),
('1cabfaa6-c3fc-11ed-9911-a74c88c74b23', 'eeeee@lll.fr', '$2y$10$nPCQCkTf3r7fCia3OgCfV.hnDAkadZi5CTCcCWoZ8mQGvNRZknOm6', 2, 'eeee'),
('5b65dd08-c4c8-11ed-97d9-033812b03c1f', 'magiemail@mail.fr', '$2y$10$jFSxGOvX1M5g8ExUROXWQ.Xr0R9LQhRMA0MOTEcFck9P7joy6gOiO', 3, 'Pain, viande, cacahuète'),
('bb8f66d4-c3fd-11ed-9911-a74c88c74b23', 'mail@mail.com', '$2y$10$Qoqh9TRjXSLc6/kliwr9hORBdPTKVvGT5LsxFFAkFd8671OqKhLwC', 4, 'Aucun'),
('d2e8ffa8-c41f-11ed-9911-a74c88c74b23', 'testmailcompte@mail.com', '$2y$10$Eb/V.cp99li5zFECqKuPdeDEMO91RVd24u3nTTS8NJYKoqwEsbMdS', 1, 'Oeufs, gluten'),
('e52d7a6c-c358-11ed-b0be-f620be577b61', 'test@test.fr', '$2y$10$DndZzji9kqt3tetZNTX7AOJ26vJDKe/KWikTqL9vZdJM3il4qvtXe', 1, 'non'),
('eca98782-c3fc-11ed-9911-a74c88c74b23', 'eeee@mdzkdok.com', '$2y$10$AnyApVrAqmgGgqg31/wpp.7Zdh.8G78HdzlzLYnRWAHVVE1CuST1K', 4, 'zzzzz'),
('xab', 'yoyo@mail.com', '12345preee', 0, 'Oeufs, cacahuète'),
('Zdzd', 'mama@mail.com', '12345pzrerr', 0, 'Gluten, lait, plein de trucs ajoutés pour remplir le champ et voir la réaction du tableau');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(3) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_f_options` varchar(255) NOT NULL,
  `menu_f_description` varchar(255) NOT NULL,
  `menu_f_price` decimal(4,2) NOT NULL,
  `menu_s_options` varchar(255) DEFAULT NULL,
  `menu_s_description` varchar(255) DEFAULT NULL,
  `menu_s_price` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `menu_f_options`, `menu_f_description`, `menu_f_price`, `menu_s_options`, `menu_s_description`, `menu_s_price`) VALUES
(1, 'Menu du marché', 'Formule déjeuner', '(du lundi au vendredi)\r\nEntrée + plat + dessert', '20.50', 'Formule diner', '(du lundi au vendredi)\r\nPlat + dessert', '17.50'),
(2, 'Menu du truc', 'Truc du matin', 'Halalalala', '15.60', '', '', NULL),
(3, 'Menu enfant', 'Moins de 10 ans', 'Nuggets frites', '10.00', 'Moins de 5 ans', 'Purée de viande et purée de patate', '5.00'),
(4, 'Menu presque vide', 'Rien', 'Rien non plus', '0.10', '', '', NULL),
(5, 'Encore un menu', 'Menu du encore plus', 'Demandez en plus et encore bien plus', '45.00', 'Menu big ben', 'Grosse horloge de viande', '65.00');

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `picture_id` int(3) NOT NULL,
  `picture_name` varchar(100) NOT NULL,
  `picture_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`picture_id`, `picture_name`, `picture_image`) VALUES
(1, 'Cafe marrant', '84478_Cafe.jpeg'),
(2, 'Mamamia', '16083_Chef-pate.jpeg'),
(3, 'Service du midi', '25211_Chef-services.jpeg'),
(4, 'Service avec des gants', '17885_Cuisine-chef.jpeg'),
(5, 'Pitite tranche', '31329_Cuisine-service.jpeg'),
(6, 'Hummmmmm', '31660_Grande-table.jpeg'),
(7, 'Miam miam miam Miam', '67039_Interieur-resto.jpeg'),
(8, 'Terrasse du restaurant', '73492_Resto-ext.jpeg'),
(9, 'Plats servis parfois', '1151_Table-duo.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `product_id` int(3) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` decimal(4,2) NOT NULL,
  `product_picture` varchar(255) NOT NULL,
  `category_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_price`, `product_picture`, `category_id`) VALUES
(1, 'Burger au fromage coulant', 'Burger avec du fromage coulant autour', '16.00', '17037_Burger-fromage-coulant.jpeg', 1),
(2, 'Big Burger', 'Bien gros burger bien fat', '16.50', '53507_Burger-zoom.jpeg', 1),
(3, 'Classis Burger', 'Traditionnel burger tranquille', '13.00', '4835_Burger.jpg', 1),
(4, 'Cupcake', 'Cupcake aux fruits rouges', '8.00', '5063_Dessert-cupcake.jpeg', 8),
(5, 'Glace au chocolat', 'Glace aux boules chocolat, chocolat blanc et caramel avec coulis chocolat', '9.00', '90155_Dessert-glace-chocolat.jpeg', 8),
(6, 'Boules de glace', 'Boules de glace au choix', '7.50', '39987_Dessert-glace.jpeg', 8),
(7, 'Pain perdu', 'Brioche chaude avec bananes et coulis caramel', '7.00', '8350_Dessert-pain-perdu.jpeg', 8),
(8, 'Cheesecake', 'Cheesecake aux fruits rouges', '5.00', '58073_Dessert.jpeg', 8),
(9, 'Pates fraiches', 'Pates fraiches sauce au choix', '13.00', '51987_Pate-fraiche.jpeg', 2),
(10, 'Ptes aux lgumes', 'Pâtes avec tout plein de légumes', '14.00', '26454_Pate-legumes.jpeg', 2),
(11, 'Pates au pesto', 'Pates farfalle sauce pesto', '14.50', '40836_Pate-pesto.jpeg', 2),
(12, 'Pates sauce tomate', 'Pates spaghetti sauce tomate maison', '19.00', '25429_Pate-tomate-herbes.jpeg', 2),
(13, 'Pates simples', 'Pates Panzanouille sauce rouge', '9.00', '62358_Pate-tomate.jpeg', 2),
(14, 'Wok de pates', 'Wok de pates avec tomates, crevettes et herbes', '18.00', '14534_Pates-sautees.jpeg', 2),
(15, 'Pizza classico', 'Pizza sauce PST - OK', '19.00', '59576_Pizza-epice.jpeg', 3),
(16, 'Pizza fromage', 'Pizza aux 92 fromages', '28.33', '25166_Pizza-filament.jpeg', 3),
(17, 'Pizza jambon', 'Pizza au jambon pate fine', '12.00', '50867_Pizza-jambon.jpeg', 3),
(18, 'Pizza pomme de terre', 'Pizza à la pomme de terre et reblochon', '15.00', '77570_Pizza-pdt.jpeg', 3),
(19, 'Pizza aux épices', 'Pizza ultra-épicé qui va faire mal', '16.66', '44971_Pizza-piment.jpeg', 3),
(20, 'Saumon orange', 'Saumon dans sa sauce rouille', '18.00', '33066_Poisson-saumon.jpeg', 4),
(21, 'Saumon samouraille', 'Saumon sauce racaille', '14.45', '38814_Saumon.jpeg', 4),
(22, 'Salade tomate mozza', 'Salade avec des tomates cerises et billes de mozzarella', '42.00', '40766_Salade-mozza.jpeg', 6),
(23, 'Oeufs', 'Oeufs durs', '12.00', '68011_Salade-oeuf.jpeg', 6),
(24, 'Oeufs mollet', 'Oeufs coulant sur pain toasté aillé', '11.00', '54595_Salade-toast.jpeg', 6),
(25, 'Salade sans gluten', 'De l&#039;herbe et des fruits avec des légumes', '88.88', '36536_Salade.jpeg', 6),
(26, 'Soupe crémeuse', 'Soupe à la crème', '12.23', '4948_Soupe-blanche.jpeg', 7),
(27, 'Soupe potimaron', 'Soupe petite aux marrons', '15.00', '13977_Soupe-legumes.jpeg', 7),
(28, 'Soupe Alo', 'Soupe avec de l&#039;eau et des tomates', '15.00', '6208_Soupe-minime.jpeg', 7),
(29, 'Soupe aux légumineuses', 'Soupe qui s&#039;illumine', '15.20', '81860_Soupe.jpeg', 7),
(30, 'Brochette de viandes', 'Brochettes de boeuf, poulet et dindes', '17.00', '89849_Viande-brochette.jpeg', 5),
(31, 'Ribs', 'Ribs sauce barbecue', '17.00', '21520_viande-planche.jpeg', 5),
(32, 'Viande grillé', 'Viande cuite au feu de bois (1kg)', '75.75', '6933_viande.jpeg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(3) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_hour` time NOT NULL,
  `reservation_nbcustomer` int(2) NOT NULL,
  `reservation_mail` varchar(255) NOT NULL,
  `reservation_allergen` varchar(255) NOT NULL,
  `customer_id` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `reservation_date`, `reservation_hour`, `reservation_nbcustomer`, `reservation_mail`, `reservation_allergen`, `customer_id`) VALUES
(1, '2023-04-25', '12:00:00', 4, 'tatayoyo@mail.com', 'Rien', NULL),
(2, '2023-04-25', '12:00:00', 4, 'tatayoyo@mail.com', 'Rien', NULL),
(4, '2023-08-12', '13:30:00', 8, 'tatoyo@mail.com', 'Oeufs, cacahuète, gluten', NULL),
(5, '2023-04-25', '12:00:00', 4, 'tatayoyo@mail.com', 'Rien', NULL),
(6, '2023-12-25', '12:15:00', 2, 'tata@mail.com', 'Rien', 'xab'),
(7, '2023-04-25', '12:00:00', 4, 'tatayoyo@mail.com', 'Rien', NULL),
(9, '2023-08-12', '13:30:00', 8, 'tatoyo@mail.com', 'Oeufs, cacahuète, gluten', NULL),
(13, '2023-03-14', '19:19:00', 1, 'test@mail.com', 'aucun', NULL),
(14, '2023-03-12', '10:16:00', 1, '', '', NULL),
(15, '2023-03-12', '10:21:00', 1, '', '', NULL),
(16, '2023-03-12', '11:28:00', 1, 'rrr@eee.com', 'rrrr', NULL),
(17, '2023-03-24', '11:41:00', 1, '', '', NULL),
(18, '2023-03-19', '11:48:00', 1, 'tttt@dd.cm', 'gg', NULL),
(19, '2023-03-17', '14:08:00', 1, 'gggg@ll.com', 'rien', NULL),
(20, '2023-03-20', '14:34:00', 3, 'magiemail@mail.fr', 'Pain, viande, cacahuète', NULL),
(21, '2023-03-31', '17:17:00', 2, 'jetestsanscon@test.com', 'Nope', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `website_setting`
--

CREATE TABLE `website_setting` (
  `setting_id` int(3) NOT NULL,
  `setting_restaurant_name` varchar(255) NOT NULL,
  `setting_restaurant_mail` varchar(255) NOT NULL,
  `setting_restaurant_phone` varchar(255) NOT NULL,
  `setting_restaurant_address` varchar(255) NOT NULL,
  `setting_restaurant_monday_hours` varchar(255) NOT NULL,
  `setting_restaurant_tuesday_hours` varchar(255) NOT NULL,
  `setting_restaurant_wednesday_hours` varchar(255) NOT NULL,
  `setting_restaurant_thursday_hours` varchar(255) NOT NULL,
  `setting_restaurant_friday_hours` varchar(255) NOT NULL,
  `setting_restaurant_saturday_hours` varchar(255) NOT NULL,
  `setting_restaurant_sunday_hours` varchar(255) NOT NULL,
  `setting_restaurant_nbcustomers` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `website_setting`
--

INSERT INTO `website_setting` (`setting_id`, `setting_restaurant_name`, `setting_restaurant_mail`, `setting_restaurant_phone`, `setting_restaurant_address`, `setting_restaurant_monday_hours`, `setting_restaurant_tuesday_hours`, `setting_restaurant_wednesday_hours`, `setting_restaurant_thursday_hours`, `setting_restaurant_friday_hours`, `setting_restaurant_saturday_hours`, `setting_restaurant_sunday_hours`, `setting_restaurant_nbcustomers`) VALUES
(1, 'Quai ANTIQUE', 'quai.antique@mail.com', '0606060606', '1 rue Martin - 00001 Martinville', '12h00 - 14h00 et 19h00 - 22h00', '12h00 - 14h00 et 19h00 - 22h00', 'Fermé', '12h00 - 14h00 et 19h00 - 22h00', '12h00 - 14h00 et 19h00 - 22h00', '19h00 - 23h00', '12h00 - 14h00', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `customer`
--
ALTER TABLE `customer`
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`picture_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Index pour la table `website_setting`
--
ALTER TABLE `website_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `picture_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `website_setting`
--
ALTER TABLE `website_setting`
  MODIFY `setting_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
