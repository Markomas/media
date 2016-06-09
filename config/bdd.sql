CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;



CREATE TABLE IF NOT EXISTS `films` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `titre_film` varchar(255) DEFAULT NULL,
  `annee_film` varchar(255) DEFAULT NULL,
  `real_film` text,
  `genre_film` text,
  `time_film` varchar(255) DEFAULT NULL,
  `resume_film` text,
  `trailer_film` varchar(255) DEFAULT NULL,
  `acteur_film` text,
  `note_film` decimal(4,2) DEFAULT NULL,
  `tagline_film` text,
  `file_film` text,
  `date_ajout` datetime DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `alert` tinyint(1) DEFAULT "0",
  `def_film` varchar(10) DEFAULT NULL,
  `audio` varchar(10) DEFAULT NULL,
  `sub` varchar(10) DEFAULT NULL,
  `tmdb` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id_film`),
  UNIQUE KEY `id_film` (`id_film`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `filetype` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

CREATE TABLE IF NOT EXISTS `music` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `song` varchar(255) DEFAULT NULL,
  `album` varchar(255) DEFAULT NULL,
  `artist` varchar(255) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `file` text,
  `genre` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `rmwords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `words` varchar(255) NOT NULL,
  `end` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;



INSERT INTO `rmwords` (`id`, `words`, `end`) VALUES
(1, "dvdrip,truefrench,french,xvid,divx,vostfr,hdtv,hdts,x265,hevc,x264,bluray,dts,multi,fastsub,hdrip,hc,telesync,zfg,bdrip,qc,us,subfrench,sub,limited", 1),
(2, "\\[ www.cpasbien.cm \\]", 0);



CREATE TABLE IF NOT EXISTS `series` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tmdb` int(11) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `resume` text,
  `note` decimal(4,2) DEFAULT NULL,
  `annee` varchar(255) DEFAULT NULL,
  `encours` varchar(255) DEFAULT NULL,
  `realisateur` text,
  `genre` text,
  `acteur` text,
  `file` text,
  `season` int(11) DEFAULT NULL,
  `episode` int(11) DEFAULT NULL,
  `titre_episode` varchar(255) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `alert` tinyint(1) DEFAULT NULL,
  `def` varchar(10) DEFAULT NULL,
  `audio` varchar(10) DEFAULT NULL,
  `sub` varchar(10) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `urls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;





CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

ALTER TABLE  `films` ADD  `original_file` TEXT NULL AFTER  `file_film` ;
ALTER TABLE  `series` ADD  `original_file` TEXT NULL AFTER  `file` ;
ALTER TABLE  `music` ADD  `original_file` TEXT NULL AFTER  `file` ;
