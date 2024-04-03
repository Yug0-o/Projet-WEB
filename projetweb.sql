-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 02 avr. 2024 à 14:04
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `promotion_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`id_account`, `first_name`, `last_name`, `email`, `password`, `role_id`, `promotion_id`, `center_id`) VALUES
(1, 'John', 'Doe', 'John.Doe@gmail.com', 'password123', 1, 1, 1),
(2, 'Jane', 'Smith', 'Jane.Smith@gmail.com', 'password456', 1, 2, 2),
(3, 'Admin', 'Admin', 'Adim@gmail.com', 'adminpassword', 2, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `account_has_skill`
--

CREATE TABLE `account_has_skill` (
  `id_skill` int(11) NOT NULL,
  `account_id_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `account_has_skill`
--

INSERT INTO `account_has_skill` (`id_skill`, `account_id_account`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `centers`
--

CREATE TABLE `centers` (
  `id_center` int(11) NOT NULL,
  `center_name` varchar(90) DEFAULT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `centers`
--

INSERT INTO `centers` (`id_center`, `center_name`, `location_id`) VALUES
(1, 'Paris Centre', 1),
(2, 'Berlin Centre', 2),
(3, 'New York Centre', 3);

-- --------------------------------------------------------

--
-- Structure de la table `companies`
--

CREATE TABLE `companies` (
  `id_company` int(11) NOT NULL,
  `company_name` varchar(45) DEFAULT NULL,
  `sector` varchar(45) DEFAULT NULL,
  `student_visible` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `companies`
--

INSERT INTO `companies` (`id_company`, `company_name`, `sector`, `student_visible`) VALUES
(1, 'TechCorp', 'Technology', 1),
(2, 'GlobalBank', 'Finance', 1),
(3, 'FashionCo', 'Fashion', 1);

-- --------------------------------------------------------

--
-- Structure de la table `companies_has_locations`
--

CREATE TABLE `companies_has_locations` (
  `id_company` int(11) NOT NULL,
  `id_locations` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `companies_has_locations`
--

INSERT INTO `companies_has_locations` (`id_company`, `id_locations`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `id_country` int(11) NOT NULL,
  `country_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`id_country`, `country_name`) VALUES
(1, 'France'),
(2, 'Germany'),
(3, 'United States');

-- --------------------------------------------------------

--
-- Structure de la table `internship`
--

CREATE TABLE `internship` (
  `id_internship` int(11) NOT NULL,
  `duration` varchar(45) DEFAULT NULL,
  `remuneration` varchar(45) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `offer_date` date DEFAULT NULL,
  `available_places` int(11) DEFAULT NULL,
  `number_students` int(11) DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `internship`
--

INSERT INTO `internship` (`id_internship`, `duration`, `remuneration`, `title`, `description`, `offer_date`, `available_places`, `number_students`, `location_id`, `company_id`) VALUES
(1, '3 months', 'Paid', 'Généraliste', 'Exploration professionnelle, polyvalence, acquisition compétences, immersion entreprise, développement professionnel, expérience pratique, collaboration équipe, apprentissage continu.', '2024-04-01', 5, 3, 1, 1),
(2, '6 months', 'Unpaid', 'BTP', 'Travaux pratiques sur site, supervision chantier, gestion projet, suivi technique, sécurité sur site, apprentissage matériaux, collaboration équipes techniques.', '2024-05-15', 3, 2, 2, 2),
(3, '4 months', 'Paid', 'Informatique', 'Développement logiciel, analyse de données, gestion de projet informatique, résolution de problèmes, programmation, apprentissage de nouvelles technologies.', '2024-06-01', 4, 1, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `internship_need_skill`
--

CREATE TABLE `internship_need_skill` (
  `internship_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `internship_need_skill`
--

INSERT INTO `internship_need_skill` (`internship_id`, `skill_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

CREATE TABLE `locations` (
  `id_locations` int(11) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `locations`
--

INSERT INTO `locations` (`id_locations`, `address`, `country_id`) VALUES
(1, '10 Rue de la Paix, Paris', 1),
(2, '123 Berliner Strasse, Berlin', 2),
(3, '456 Broadway, New York', 3);

-- --------------------------------------------------------

--
-- Structure de la table `pilote_created_internship`
--

CREATE TABLE `pilote_created_internship` (
  `id_internship` int(11) NOT NULL,
  `id_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pilote_created_internship`
--

INSERT INTO `pilote_created_internship` (`id_internship`, `id_account`) VALUES
(1, 3),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

CREATE TABLE `promotions` (
  `id_promotion` int(11) NOT NULL,
  `promotion_name` varchar(45) DEFAULT NULL,
  `year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `promotions`
--

INSERT INTO `promotions` (`id_promotion`, `promotion_name`, `year`) VALUES
(1, 'Promo 2022', '2022'),
(2, 'Promo 2023', '2023'),
(3, 'Promo 2024', '2024');

-- --------------------------------------------------------

--
-- Structure de la table `promotions_concerned_by_internship`
--

CREATE TABLE `promotions_concerned_by_internship` (
  `internship_id` int(11) NOT NULL,
  `promotion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `promotions_concerned_by_internship`
--

INSERT INTO `promotions_concerned_by_internship` (`internship_id`, `promotion_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE `ratings` (
  `id_rating` int(11) NOT NULL,
  `rating` float DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `id_roles` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ratings`
--

INSERT INTO `ratings` (`id_rating`, `rating`, `comment`, `id_roles`, `id_company`, `id_account`) VALUES
(1, 4.5, 'Great experience!', 1, 1, 1),
(2, 3.8, 'Average internship.', 1, 2, 2),
(3, 5, 'Fantastic work!', 1, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `role_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_roles`, `role_name`) VALUES
(1, 'Student'),
(2, 'Admin'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id_skill` int(11) NOT NULL,
  `skill_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`id_skill`, `skill_name`) VALUES
(1, 'Généraliste'),
(2, 'BTP'),
(3, 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `students_has_wish_listed`
--

CREATE TABLE `students_has_wish_listed` (
  `id_internship` int(11) NOT NULL,
  `account_id_account` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `students_has_wish_listed`
--

INSERT INTO `students_has_wish_listed` (`id_internship`, `account_id_account`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `student_applied_for`
--

CREATE TABLE `student_applied_for` (
  `internship_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `path_to_CV` varchar(45) DEFAULT NULL,
  `path_to_motivation_letter` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `student_applied_for`
--

INSERT INTO `student_applied_for` (`internship_id`, `account_id`, `path_to_CV`, `path_to_motivation_letter`) VALUES
(1, 1, 'path/to/cv.pdf', 'path/to/motivation_letter.pdf'),
(2, 2, 'path/to/cv2.pdf', 'path/to/motivation_letter2.pdf');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `promotion_id` (`promotion_id`),
  ADD KEY `center_id` (`center_id`);

--
-- Index pour la table `account_has_skill`
--
ALTER TABLE `account_has_skill`
  ADD PRIMARY KEY (`id_skill`,`account_id_account`),
  ADD KEY `account_id_account` (`account_id_account`);

--
-- Index pour la table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id_center`),
  ADD KEY `location_id` (`location_id`);

--
-- Index pour la table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id_company`);

--
-- Index pour la table `companies_has_locations`
--
ALTER TABLE `companies_has_locations`
  ADD PRIMARY KEY (`id_company`,`id_locations`),
  ADD KEY `id_locations` (`id_locations`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id_country`);

--
-- Index pour la table `internship`
--
ALTER TABLE `internship`
  ADD PRIMARY KEY (`id_internship`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Index pour la table `internship_need_skill`
--
ALTER TABLE `internship_need_skill`
  ADD PRIMARY KEY (`internship_id`,`skill_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Index pour la table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id_locations`),
  ADD KEY `country_id` (`country_id`);

--
-- Index pour la table `pilote_created_internship`
--
ALTER TABLE `pilote_created_internship`
  ADD PRIMARY KEY (`id_internship`,`id_account`),
  ADD KEY `id_account` (`id_account`);

--
-- Index pour la table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id_promotion`);

--
-- Index pour la table `promotions_concerned_by_internship`
--
ALTER TABLE `promotions_concerned_by_internship`
  ADD PRIMARY KEY (`internship_id`,`promotion_id`),
  ADD KEY `promotion_id` (`promotion_id`);

--
-- Index pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id_rating`,`id_roles`,`id_company`,`id_account`),
  ADD KEY `id_roles` (`id_roles`),
  ADD KEY `id_company` (`id_company`),
  ADD KEY `id_account` (`id_account`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id_skill`);

--
-- Index pour la table `students_has_wish_listed`
--
ALTER TABLE `students_has_wish_listed`
  ADD PRIMARY KEY (`id_internship`,`account_id_account`),
  ADD KEY `account_id_account` (`account_id_account`);

--
-- Index pour la table `student_applied_for`
--
ALTER TABLE `student_applied_for`
  ADD PRIMARY KEY (`internship_id`,`account_id`),
  ADD KEY `account_id` (`account_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `centers`
--
ALTER TABLE `centers`
  MODIFY `id_center` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `companies`
--
ALTER TABLE `companies`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `country`
--
ALTER TABLE `country`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `internship`
--
ALTER TABLE `internship`
  MODIFY `id_internship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `locations`
--
ALTER TABLE `locations`
  MODIFY `id_locations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id_promotion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id_skill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id_roles`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id_promotion`),
  ADD CONSTRAINT `account_ibfk_3` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id_center`);

--
-- Contraintes pour la table `account_has_skill`
--
ALTER TABLE `account_has_skill`
  ADD CONSTRAINT `account_has_skill_ibfk_1` FOREIGN KEY (`id_skill`) REFERENCES `skills` (`id_skill`),
  ADD CONSTRAINT `account_has_skill_ibfk_2` FOREIGN KEY (`account_id_account`) REFERENCES `account` (`id_account`);

--
-- Contraintes pour la table `centers`
--
ALTER TABLE `centers`
  ADD CONSTRAINT `centers_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id_locations`);

--
-- Contraintes pour la table `companies_has_locations`
--
ALTER TABLE `companies_has_locations`
  ADD CONSTRAINT `companies_has_locations_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `companies_has_locations_ibfk_2` FOREIGN KEY (`id_locations`) REFERENCES `locations` (`id_locations`);

--
-- Contraintes pour la table `internship`
--
ALTER TABLE `internship`
  ADD CONSTRAINT `internship_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id_locations`),
  ADD CONSTRAINT `internship_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id_company`);

--
-- Contraintes pour la table `internship_need_skill`
--
ALTER TABLE `internship_need_skill`
  ADD CONSTRAINT `internship_need_skill_ibfk_1` FOREIGN KEY (`internship_id`) REFERENCES `internship` (`id_internship`),
  ADD CONSTRAINT `internship_need_skill_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id_skill`);

--
-- Contraintes pour la table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id_country`);

--
-- Contraintes pour la table `pilote_created_internship`
--
ALTER TABLE `pilote_created_internship`
  ADD CONSTRAINT `pilote_created_internship_ibfk_1` FOREIGN KEY (`id_internship`) REFERENCES `internship` (`id_internship`),
  ADD CONSTRAINT `pilote_created_internship_ibfk_2` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`);

--
-- Contraintes pour la table `promotions_concerned_by_internship`
--
ALTER TABLE `promotions_concerned_by_internship`
  ADD CONSTRAINT `promotions_concerned_by_internship_ibfk_1` FOREIGN KEY (`internship_id`) REFERENCES `internship` (`id_internship`),
  ADD CONSTRAINT `promotions_concerned_by_internship_ibfk_2` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id_promotion`);

--
-- Contraintes pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id_roles`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  ADD CONSTRAINT `ratings_ibfk_3` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`);

--
-- Contraintes pour la table `students_has_wish_listed`
--
ALTER TABLE `students_has_wish_listed`
  ADD CONSTRAINT `students_has_wish_listed_ibfk_1` FOREIGN KEY (`id_internship`) REFERENCES `internship` (`id_internship`),
  ADD CONSTRAINT `students_has_wish_listed_ibfk_2` FOREIGN KEY (`account_id_account`) REFERENCES `account` (`id_account`);

--
-- Contraintes pour la table `student_applied_for`
--
ALTER TABLE `student_applied_for`
  ADD CONSTRAINT `student_applied_for_ibfk_1` FOREIGN KEY (`internship_id`) REFERENCES `internship` (`id_internship`),
  ADD CONSTRAINT `student_applied_for_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`id_account`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
