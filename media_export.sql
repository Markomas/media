-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 11 Mars 2016 à 12:00
-- Version du serveur: 5.5.47-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `media_export`
--

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`id`, `nom`, `valeur`) VALUES
(1, 'url_film', 'http://127.0.0.1/access/films'),
(2, 'url_serie', 'http://127.0.0.1/access/series'),
(3, 'url_jeux', 'http://127.0.0.1/access/jeux'),
(4, 'url_logiciels', 'http://127.0.0.1/access/logiciels'),
(5, 'base', 'http://127.0.0.1'),
(6, 'url_music', 'http://127.0.0.1/access/music'),
(7, 'url_film_mod', 'http://127.0.0.1/access/film_mod'),
(8, 'url_serie_mod', 'http://127.0.0.1/access/serie_mod'),
(9, 'tmdb_api_key', 'e1dd98b27d38c29ee47fea2699bxxxxx');

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

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
  `alert` tinyint(1) DEFAULT '0',
  `def_film` varchar(10) DEFAULT NULL,
  `audio` varchar(10) DEFAULT NULL,
  `sub` varchar(10) DEFAULT NULL,
  `tmdb` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id_film`),
  UNIQUE KEY `id_film` (`id_film`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `folders`
--

CREATE TABLE IF NOT EXISTS `folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `filetype` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `folders`
--

INSERT INTO `folders` (`id`, `path`, `filetype`, `type`) VALUES
(1, '/var/www/films', 'avi,mkv,mpg,mov', 'Films'),
(2, '/var/www/musique', 'mp3,flac,acc', 'Musique'),
(3, '/var/www/series', 'avi,mkv,mpg,mov,mp4', 'Series'),
(4, '/var/www/film_upload', 'avi,mkv,mpg,mov,mp4', 'Film_upload'),
(5, '/var/www/serie_upload', 'avi,mkv,mpg,mov,mp4', 'Serie_upload'),
(6, '/var/www/music_upload', 'mp3,flac,acc', 'Musique_upload'),
(7, '/var/www/film_user', 'avi,mkv,mpg,mov,mp4', 'Film_user'),
(8, '/var/www/serie_user', 'avi,mkv,mpg,mov,mp4', 'Serie_user'),
(9, '/var/www/soft', '*', 'Logiciels'),
(10, '/var/www/jeux', '*', 'Jeux');

-- --------------------------------------------------------

--
-- Structure de la table `music`
--

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

-- --------------------------------------------------------

--
-- Structure de la table `rmwords`
--

CREATE TABLE IF NOT EXISTS `rmwords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `words` varchar(255) NOT NULL,
  `end` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `rmwords`
--

INSERT INTO `rmwords` (`id`, `words`, `end`) VALUES
(1, 'avi,mkv,mpg,mov,dvdrip,truefrench,french,xvid,divx,vostfr,hdtv,hdts,x265,hevc,x264,bluray,dts,multi,fastsub,hdrip,hc,telesync,zfg,mp4,mpeg,bdrip,qc,us,subfrench,sub,limited', 1),
(2, '\\[ www.cpasbien.io \\]', 0);

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(25, 'admin', '$2y$10$v3LhlQDNYHz2cdf1zD3l/eWUsH3qm2QZohAzUghtQ9xuK/3as5MLa', 'admin', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
