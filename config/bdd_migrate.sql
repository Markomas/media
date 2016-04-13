CREATE TABLE IF NOT EXISTS `urls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

ALTER TABLE  `films` ADD  `original_file` TEXT NULL AFTER  `file_film` ;
ALTER TABLE  `series` ADD  `original_file` TEXT NULL AFTER  `file` ;
ALTER TABLE  `music` ADD  `original_file` TEXT NULL AFTER  `file` ;

INSERT INTO urls(id, nom, valeur) SELECT id, nom, valeur FROM config WHERE id BETWEEN '1' AND '8';
DELETE FROM config WHERE id BETWEEN '1' AND '8';
