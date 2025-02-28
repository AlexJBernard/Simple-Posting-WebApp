-- BASE TABLES (Have no references)
CREATE TABLE IF NOT EXISTS `databasePhp`.`users` (
  user_id int NOT NULL AUTO_INCREMENT,
  username varchar(12) NOT NULL,
  firstname varchar(50) NOT NULL,
  lastname varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE = innoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `databasePhp`.`posts` (
  post_id int NOT NULL AUTO_INCREMENT,
  post_text varchar(255) NOT NULL,
  post_user_id int NOT NULL,
  PRIMARY KEY (`post_id`),
  FOREIGN KEY (`post_user_id`) REFERENCES `users`(`user_id`)
) ENGINE = innoDB DEFAULT CHARSET=utf8mb4;