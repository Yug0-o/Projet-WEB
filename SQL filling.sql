-- Insertion de données dans la table `country`
INSERT INTO `country` (`country_name`) VALUES
('France'),
('Germany'),
('United States');

-- Insertion de données dans la table `locations`
INSERT INTO `locations` (`address`, `country_id`) VALUES
('10 Rue de la Paix, Paris', 1),
('123 Berliner Strasse, Berlin', 2),
('456 Broadway, New York', 3);

-- Insertion de données dans la table `centers`
INSERT INTO `centers` (`center_name`, `location_id`) VALUES
('Paris Centre', 1),
('Berlin Centre', 2),
('New York Centre', 3);

-- Insertion de données dans la table `promotions`
INSERT INTO `promotions` (`promotion_name`, `year`) VALUES
('Promo 2022', 2022),
('Promo 2023', 2023),
('Promo 2024', 2024);

-- Insertion de données dans la table `companies`
INSERT INTO `companies` (`company_name`, `sector`, `student_visible`) VALUES
('TechCorp', 'Technology', 1),
('GlobalBank', 'Finance', 1),
('FashionCo', 'Fashion', 1);

-- Insertion de données dans la table `internship`
INSERT INTO `internship` (`duration`, `remuneration`, `description`, `offer_date`, `available_places`, `number_students`, `location_id`, `company_id`) VALUES
('3 months', 'Paid', 'Software development internship', '2024-04-01', 5, 3, 1, 1),
('6 months', 'Unpaid', 'Finance internship', '2024-05-15', 3, 2, 2, 2),
('4 months', 'Paid', 'Fashion design internship', '2024-06-01', 4, 1, 3, 3);

-- Insertion de données dans la table `roles`
INSERT INTO `roles` (`role_name`) VALUES
('Student'),
('Admin'),
('Staff');

-- Insertion de données dans la table `account`
INSERT INTO `account` (`first_name`, `last_name`, `password`, `role_id`, `promotion_id`, `center_id`) VALUES
('John', 'Doe', 'password123', 1, 1, 1),
('Jane', 'Smith', 'password456', 1, 2, 2),
('Admin', 'Admin', 'adminpassword', 2, 3, 3);

-- Insertion de données dans la table `student_applied_for`
INSERT INTO `student_applied_for` (`internship_id`, `account_id`, `path_to_CV`, `path_to_motivation_letter`) VALUES
(1, 1, 'path/to/cv.pdf', 'path/to/motivation_letter.pdf'),
(2, 2, 'path/to/cv2.pdf', 'path/to/motivation_letter2.pdf');

-- Insertion de données dans la table `promotions_concerned_by_internship`
INSERT INTO `promotions_concerned_by_internship` (`internship_id`, `promotion_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- Insertion de données dans la table `skills`
INSERT INTO `skills` (`skill_name`) VALUES
('Programming'),
('Finance knowledge'),
('Design skills');

-- Insertion de données dans la table `internship_need_skill`
INSERT INTO `internship_need_skill` (`internship_id`, `skill_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- Insertion de données dans la table `account_has_skill`
INSERT INTO `account_has_skill` (`id_skill`, `account_id_account`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- Insertion de données dans la table `companies_has_locations`
INSERT INTO `companies_has_locations` (`id_company`, `id_locations`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- Insertion de données dans la table `students_has_wish_listed`
INSERT INTO `students_has_wish_listed` (`id_internship`, `account_id_account`) VALUES
(1, 1),
(2, 2);

-- Insertion de données dans la table `pilote_created_internship`
INSERT INTO `pilote_created_internship` (`id_internship`, `id_account`) VALUES
(1, 3),
(2, 3);

-- Insertion de données dans la table `ratings`
INSERT INTO `ratings` (`rating`, `comment`, `id_roles`, `id_company`, `id_account`) VALUES
(4.5, 'Great experience!', 1, 1, 1),
(3.8, 'Average internship.', 1, 2, 2),
(5.0, 'Fantastic work!', 1, 3, 3);
