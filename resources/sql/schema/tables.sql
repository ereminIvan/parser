DROP DATABASE IF EXISTS parser;
CREATE DATABASE parser CHARACTER SET utf8 COLLATE utf8_general_ci;

USE parser;

CREATE TABLE _sessions (
  id int(11) unsigned NOT NULL AUTO_INCREMENT,
  last_page int(11) DEFAULT NULL,
  last_page_url varchar(2048) DEFAULT NULL,
  _source_id int(11) DEFAULT NULL,
  created_at datetime NOT NULL,
  finished_at datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE _sources (
  id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  title VARCHAR(256),
  batch_url VARCHAR(2048) NOT NULL,
  results_total INT(11) DEFAULT NULL,
  results_current INT(11) DEFAULT NULL,
  page_total INT(11) DEFAULT NULL,
  page_current INT(11) DEFAULT NULL,
  type ENUM('recipe', 'recipe_list', 'ingredient', 'ingredient_list') DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE parsed_recipes (
  id INT (11) UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR (2048) NOT NULL,
  source_href VARCHAR (2048),
  source_img VARCHAR (2048),
  source_id INT (11),
  source_description TEXT,
  xml_description TEXT,
  _session_id INT (11),
  _source_id INT (11) NOT NULL,
  locale VARCHAR (10) DEFAULT 'ru',
  PRIMARY KEY (id)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE parsed_ingredients(
  id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  site_id INT(11),
  title VARCHAR(256),
  description TEXT,
  image_href VARCHAR(1024),
  recipes_list_href VARCHAR(2048),
  category VARCHAR(1024),
  source VARCHAR(2048),
  PRIMARY KEY (id)
) ENGINE=INNODB DEFAULT CHARSET=utf8;