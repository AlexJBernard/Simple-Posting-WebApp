-- BASE TABLES (Have no references)
CREATE TABLE IF NOT EXISTS `databasePhp`.`users` (
  user_id int NOT NULL AUTO_INCREMENT,
  username varchar(12) NOT NULL,
  firstname varchar(50) NOT NULL,
  lastname varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE = innoDB DEFAULT CHARSET=utf8mb4;


