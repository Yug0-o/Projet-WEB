-- -----------------------------------------------------
-- Table `country`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `country` (
  `id_country` INT NOT NULL AUTO_INCREMENT,
  `country_name` VARCHAR(50) NULL,
  PRIMARY KEY (`id_country`)
);


-- -----------------------------------------------------
-- Table `locations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locations` (
  `id_locations` INT NOT NULL AUTO_INCREMENT,
  `address` VARCHAR(50) NULL,
  `country_id` INT NOT NULL,
  PRIMARY KEY (`id_locations`),
  FOREIGN KEY (`country_id`) REFERENCES `country` (`id_country`)
);


-- -----------------------------------------------------
-- Table `centers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `centers` (
  `id_center` INT NOT NULL AUTO_INCREMENT,
  `center_name` VARCHAR(90) NULL,
  `location_id` INT NOT NULL,
  PRIMARY KEY (`id_center`),
  FOREIGN KEY (`location_id`) REFERENCES `locations` (`id_locations`)
);


-- -----------------------------------------------------
-- Table `promotions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `promotions` (
  `id_promotion` INT NOT NULL AUTO_INCREMENT,
  `promotion_name` VARCHAR(45) NULL,
  `year` YEAR(4) NULL,
  PRIMARY KEY (`id_promotion`)
);


-- -----------------------------------------------------
-- Table `companies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `companies` (
  `id_company` INT NOT NULL AUTO_INCREMENT,
  `company_name` VARCHAR(45) NULL,
  `sector` VARCHAR(45) NULL,
  `student_visible` TINYINT NULL,
  PRIMARY KEY (`id_company`)
);


-- -----------------------------------------------------
-- Table `internship`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `internship` (
  `id_internship` INT NOT NULL AUTO_INCREMENT,
  `duration` VARCHAR(45) NULL,
  `remuneration` VARCHAR(45) NULL,
  `description` VARCHAR(200),
  `offer_date` DATE NULL,
  `available_places` INT NULL,
  `number_students` INT NULL,
  `location_id` INT NOT NULL,
  `company_id` INT NOT NULL,
  PRIMARY KEY (`id_internship`),
  FOREIGN KEY (`location_id`) REFERENCES `locations` (`id_locations`),
  FOREIGN KEY (`company_id`) REFERENCES `companies` (`id_company`)
);


-- -----------------------------------------------------
-- Table `roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `roles` (
  `id_roles` INT NOT NULL AUTO_INCREMENT,
  `role_name` VARCHAR(45) NULL,
  PRIMARY KEY (`id_roles`)
);


-- -----------------------------------------------------
-- Table `account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `account` (
  `id_account` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NULL,
  `last_name` VARCHAR(45) NULL,
  `password` VARCHAR(50) NULL,
  `role_id` INT NOT NULL,
  `promotion_id` INT NOT NULL,
  `center_id` INT NOT NULL,
  PRIMARY KEY (`id_account`),
  FOREIGN KEY (`role_id`) REFERENCES `roles` (`id_roles`),
  FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id_promotion`),
  FOREIGN KEY (`center_id`) REFERENCES `centers` (`id_center`)
);


-- -----------------------------------------------------
-- Table `student_applied_for`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `student_applied_for` (
  `internship_id` INT NOT NULL,
  `account_id` INT NOT NULL,
  `path_to_CV` VARCHAR(45) NULL,
  `path_to_motivation_letter` VARCHAR(45) NULL,
  PRIMARY KEY (`internship_id`, `account_id`),
  FOREIGN KEY (`internship_id`) REFERENCES `internship` (`id_internship`),
  FOREIGN KEY (`account_id`) REFERENCES `account` (`id_account`)
);


-- -----------------------------------------------------
-- Table `promotions_concerned_by_internship`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `promotions_concerned_by_internship` (
  `internship_id` INT NOT NULL,
  `promotion_id` INT NOT NULL,
  PRIMARY KEY (`internship_id`, `promotion_id`),
  FOREIGN KEY (`internship_id`) REFERENCES `internship` (`id_internship`),
  FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id_promotion`)
);


-- -----------------------------------------------------
-- Table `skills`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `skills` (
  `id_skill` INT NOT NULL AUTO_INCREMENT,
  `skill_name` VARCHAR(45) NULL,
  PRIMARY KEY (`id_skill`)
);


-- -----------------------------------------------------
-- Table `internship_need_skill`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `internship_need_skill` (
  `internship_id` INT NOT NULL,
  `skill_id` INT NOT NULL,
  PRIMARY KEY (`internship_id`, `skill_id`),
  FOREIGN KEY (`internship_id`) REFERENCES `internship` (`id_internship`),
  FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id_skill`)
);


-- -----------------------------------------------------
-- Table `account_has_skill`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `account_has_skill` (
  `id_skill` INT NOT NULL,
  `account_id_account` INT NOT NULL,
  PRIMARY KEY (`id_skill`, `account_id_account`),
  FOREIGN KEY (`id_skill`) REFERENCES `skills` (`id_skill`),
  FOREIGN KEY (`account_id_account`) REFERENCES `account` (`id_account`));


-- -----------------------------------------------------
-- Table `companies_has_locations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `companies_has_locations` (
  `id_company` INT NOT NULL,
  `id_locations` INT NOT NULL,
  PRIMARY KEY (`id_company`, `id_locations`),
  FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  FOREIGN KEY (`id_locations`) REFERENCES `locations` (`id_locations`));


-- -----------------------------------------------------
-- Table `students_has_wish_listed`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `students_has_wish_listed` (
  `id_internship` INT NOT NULL,
  `account_id_account` INT NOT NULL,
  PRIMARY KEY (`id_internship`, `account_id_account`),
  FOREIGN KEY (`id_internship`) REFERENCES `internship` (`id_internship`),
  FOREIGN KEY (`account_id_account`) REFERENCES `account` (`id_account`));


-- -----------------------------------------------------
-- Table `pilote_created_internship`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pilote_created_internship` (
  `id_internship` INT NOT NULL,
  `id_account` INT NOT NULL,
  PRIMARY KEY (`id_internship`, `id_account`),
  FOREIGN KEY (`id_internship`) REFERENCES `internship` (`id_internship`),
  FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`));


-- -----------------------------------------------------
-- Table `ratings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ratings` (
  `id_rating` INT NOT NULL AUTO_INCREMENT,
  `rating` FLOAT NULL,
  `comment` VARCHAR(255) NULL,
  `id_roles` INT NOT NULL,
  `id_company` INT NOT NULL,
  `id_account` INT NOT NULL,
  PRIMARY KEY (`id_rating`, `id_roles`, `id_company`, `id_account`),
  FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id_roles`),
  FOREIGN KEY (`id_company`) REFERENCES `companies` (`id_company`),
  FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`));

