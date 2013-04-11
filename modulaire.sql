-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 11 Avril 2013 à 15:52
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `modulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `folders`
--

CREATE TABLE IF NOT EXISTS `folders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(110) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `folders`
--

INSERT INTO `folders` (`id`, `name`) VALUES
(1, 'Pharmacovigilance'),
(2, 'Environnement Hospitalier');

-- --------------------------------------------------------

--
-- Structure de la table `interactions`
--

CREATE TABLE IF NOT EXISTS `interactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sessions_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `correct_reponses_pattern` text CHARACTER SET utf8 NOT NULL,
  `result` text CHARACTER SET utf8 NOT NULL,
  `weighting` text CHARACTER SET utf8 NOT NULL,
  `time` text CHARACTER SET utf8 NOT NULL,
  `student_response` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) DEFAULT NULL,
  `description` text,
  `img` varchar(150) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `folders_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`folders_id`),
  KEY `fk_modules_folders1_idx` (`folders_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `modules`
--

INSERT INTO `modules` (`id`, `title`, `description`, `img`, `url`, `folders_id`) VALUES
(4, 'Présentation de la Pharmacovigilance', 'Dans ce premier module...', 'assets/img/modules/work1.jpg', 'modules/test1/index_lms_html5.html', 1),
(5, 'Pharmacovigilance : pourquoi faire ?', 'Dans ce deuxième module...', 'assets/img/modules/work2.jpg', 'modules/test2/index_lms_html5.html', 1),
(6, 'Pharmacovigilance : mise en oeuvre', 'Comment mettre en oeuvre la pharmacovigilance ?', 'assets/img/modules/work3.jpg', 'modules/test3/index_lms_html5.html', 1),
(7, 'Pharmacovigilance : conclusion', 'Notre conclusion sur la pharmacovigilance', 'assets/img/modules/work4.jpg', 'modules/test4/index_lms_html5.html', 1),
(8, 'Environnement hospitalier : module 1', 'Introduction à l''environnement hospitalier', 'assets/img/modules/work5.jpg', 'modules/test5/index_lms_html5.html', 2),
(9, 'Environnement hospitalier : module 2', 'Au coeur de l''hôpital', 'assets/img/modules/work6.jpg', 'modules/test6/index_lms_html5.html', 2);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmi_core_student_id` int(11) NOT NULL,
  `cmi_core_student_name` text CHARACTER SET utf8 NOT NULL,
  `sco_id` int(11) NOT NULL,
  `cmi_core_session_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cmi_core_total_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cmi_core_score_children` text CHARACTER SET utf8 NOT NULL,
  `cmi_core_score_raw` decimal(10,0) NOT NULL,
  `cmi_core_score_min` decimal(10,0) NOT NULL,
  `cmi_core_score_max` decimal(10,0) NOT NULL,
  `cmi_interactions_undefined_type` text CHARACTER SET utf8 NOT NULL,
  `cmi_interactions_count` int(11) NOT NULL,
  `cmi_core_lesson_location` text CHARACTER SET utf8 NOT NULL,
  `cmi_core_credit` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cmi_core_lesson_status` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cmi_core_lesson_mode` varchar(30) CHARACTER SET utf8 NOT NULL,
  `cmi_core_entry` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cmi_core_exit` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cmi_suspend_data` varchar(4096) CHARACTER SET utf8 NOT NULL,
  `cmi_launch_data` varchar(4096) CHARACTER SET utf8 NOT NULL,
  `cmi_completion_status` int(11) NOT NULL,
  `cmi_success_status` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cmi_completion_threshold` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `sessions`
--

INSERT INTO `sessions` (`id`, `cmi_core_student_id`, `cmi_core_student_name`, `sco_id`, `cmi_core_session_time`, `cmi_core_total_time`, `cmi_core_score_children`, `cmi_core_score_raw`, `cmi_core_score_min`, `cmi_core_score_max`, `cmi_interactions_undefined_type`, `cmi_interactions_count`, `cmi_core_lesson_location`, `cmi_core_credit`, `cmi_core_lesson_status`, `cmi_core_lesson_mode`, `cmi_core_entry`, `cmi_core_exit`, `cmi_suspend_data`, `cmi_launch_data`, `cmi_completion_status`, `cmi_success_status`, `cmi_completion_threshold`, `created_at`, `updated_at`) VALUES
(11, 1, 'CHAPLIN', 4, '2013-04-11 15:29:30', '0000-00-00 00:00:00', '', '0', '0', '0', '', 0, '', '', '', '', '', '', '', '', 0, '', 0, '2013-04-11 13:29:30', '2013-04-11 13:29:30'),
(12, 1, 'CHAPLIN', 4, '2013-04-11 15:31:00', '0000-00-00 00:00:00', '', '0', '0', '0', '', 0, '', '', '', '', '', '', '', '', 0, '', 0, '2013-04-11 13:31:00', '2013-04-11 13:31:00'),
(13, 1, 'CHAPLIN', 4, '2013-04-11 15:38:53', '0000-00-00 00:00:00', '', '0', '0', '0', '', 0, '', '', '', '', '', '', '', '', 0, '', 0, '2013-04-11 13:38:53', '2013-04-11 13:38:53'),
(14, 1, 'CHAPLIN', 4, '2013-04-11 15:41:45', '0000-00-00 00:00:00', '', '0', '0', '0', '', 0, '', '', '', '', '', '', '', '', 0, '', 0, '2013-04-11 13:41:45', '2013-04-11 13:41:45'),
(15, 1, 'CHAPLIN', 4, '2013-04-11 15:46:25', '0000-00-00 00:00:00', '', '0', '0', '0', '', 0, '', '', '', '', '', '', '', '', 0, '', 0, '2013-04-11 13:46:25', '2013-04-11 13:46:25'),
(16, 1, 'CHAPLIN', 4, '2013-04-11 15:46:54', '0000-00-00 00:00:00', '', '0', '0', '0', '', 0, '', '', '', '', '', '', '', '', 0, '', 0, '2013-04-11 13:46:54', '2013-04-11 13:46:54');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `job` varchar(45) DEFAULT NULL,
  `about` text,
  `city` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `portrait` text,
  `birthdate` date DEFAULT NULL,
  `interests` text,
  `twitter_id` varchar(45) NOT NULL,
  `blog_url` varchar(120) NOT NULL,
  `website_url` varchar(120) NOT NULL,
  `credits` int(11) DEFAULT NULL,
  `verification` tinyint(1) DEFAULT NULL,
  `verification_code` text,
  `certification` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `phone`, `job`, `about`, `city`, `country`, `portrait`, `birthdate`, `interests`, `twitter_id`, `blog_url`, `website_url`, `credits`, `verification`, `verification_code`, `certification`, `created_at`, `updated_at`) VALUES
(1, 'Frederic', 'CHAPLIN', 'Twinspirit', '$2a$08$mtTGx7RszXaEocdi0U2XfewwTYPJPVPAR2HMkByT17uGGP7HSQjGG', 'fredericchaplin@hotmail.com', NULL, 'cowboy', 'Hey ! It''s me !', 'Montpellier', 'France', 'img/users/5227a000-f4a4-4b2b-8610-e188279012a0.jpg', '1976-05-26', 'computer, web, design, business, diving, cooking', '@fredchaplin', 'http://small-codes.com', 'http://small-codes.com', 100, 1, '55715bbef895c15a4e0b6aa6a7e971e26dc850c8', 0, '0000-00-00 00:00:00', '2013-01-04 05:59:56'),
(2, 'John', 'DOE', 'johndoe', '$2a$08$mtTGx7RszXaEocdi0U2XfewwTYPJPVPAR2HMkByT17uGGP7HSQjGG', 'otisspirit@hotmail.fr', NULL, 'Bank Rober', 'Hey ! It''s... I don''t know who''s this !', 'Montpellier', 'France', 'img/users/158654896346.jpg', '1976-06-12', ' business, diving, cooking', '@fredchaplin', 'http://small-codes.com', 'http://small-codes.com', 100, 1, '55715bbef895c15a4e0b6aa6a7e971e26dc850c8', 0, '0000-00-00 00:00:00', NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `fk_modules_folders1` FOREIGN KEY (`folders_id`) REFERENCES `folders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
