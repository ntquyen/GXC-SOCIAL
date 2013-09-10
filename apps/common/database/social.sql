-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2013 at 06:41 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_assignment`
--


-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item`
--


-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item_child`
--


-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `where` varchar(100) NOT NULL,
  `data` longtext NOT NULL,
  `actor_id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `user_agent` text NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `where` (`where`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `log`
--


-- --------------------------------------------------------

--
-- Table structure for table `object`
--

CREATE TABLE `object` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` char(23) NOT NULL,
  `lang` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `name` text,
  `description` text,
  `content` text,
  `slug` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `date_published` int(10) NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_modified` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `object`
--


-- --------------------------------------------------------

--
-- Table structure for table `object_meta`
--

CREATE TABLE `object_meta` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `oid` int(11) unsigned NOT NULL DEFAULT '0',
  `key` varchar(255) DEFAULT NULL,
  `value` longtext,
  PRIMARY KEY (`id`),
  KEY `object_id` (`oid`),
  KEY `meta_key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `object_meta`
--


-- --------------------------------------------------------

--
-- Table structure for table `object_resource`
--

CREATE TABLE `object_resource` (
  `object_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `data` text,
  PRIMARY KEY (`object_id`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `object_resource`
--


-- --------------------------------------------------------

--
-- Table structure for table `object_term`
--

CREATE TABLE `object_term` (
  `object_id` int(11) unsigned NOT NULL DEFAULT '0',
  `term_id` int(11) unsigned NOT NULL DEFAULT '0',
  `data` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `object_term`
--


-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE `resource` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `body` text,
  `path` varchar(255) DEFAULT '',
  `type` varchar(50) DEFAULT NULL,
  `date_created` int(11) DEFAULT '0',
  `date_modified` int(11) DEFAULT '0',
  `uid` int(11) NOT NULL,
  `storage` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `resource`
--


-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(64) NOT NULL,
  `value` longtext NOT NULL,
  `group` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `key` (`key`),
  KEY `group` (`group`),
  KEY `key_2` (`key`,`group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `setting`
--


-- --------------------------------------------------------

--
-- Table structure for table `taxonomy`
--

CREATE TABLE `taxonomy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` char(23) NOT NULL,
  `lang` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `taxonomy`
--


-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `taxonomy_id` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT '',
  `parent` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `term`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `name` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES(1, 'admin', '', 'admin@localhost.com', '');
INSERT INTO `user` VALUES(9, 'member', '', 'member@localhost.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin_tokens`
--

CREATE TABLE `user_autologin_tokens` (
  `user_id` int(11) NOT NULL,
  `token` char(40) NOT NULL,
  PRIMARY KEY (`user_id`,`token`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_autologin_tokens`
--

INSERT INTO `user_autologin_tokens` VALUES(1, '97d4d665e8c82e36ee49534df5257e14226ec3fb');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `pass_hash` char(64) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `activation_key` char(64) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `login_attempts` tinyint(2) NOT NULL DEFAULT '0',
  `recent_login` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` VALUES(1, '$2a$13$Jm1.axKw5dHiI/vGfq2w1enLCrMT7g0EL9in91boIjsknchhJthem', 'bc66006dc98951164cec5d93670c729a', 1, 0, 1378799355);
INSERT INTO `user_login` VALUES(9, '$2a$13$WrS11KCqOYRAUuOkdek4e.cNHuZ5R7a712fOTn5Sne42PIZTAoibC', 'bc66006dc98951164cec5d93670c729a', 0, 0, 1376916771);

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE `user_meta` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `key` varchar(255) DEFAULT NULL,
  `value` longtext,
  PRIMARY KEY (`id`),
  KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_meta`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_id` int(11) NOT NULL,
  `about` text,
  `location` varchar(255) DEFAULT NULL,
  `social_links` text,
  `followers` text,
  `following` text,
  `date_modified` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` VALUES(1, 'I am Administrator', 'Vietnam', NULL, NULL, NULL, 1376618338);
INSERT INTO `user_profile` VALUES(9, NULL, NULL, NULL, NULL, NULL, 1376916772);

-- --------------------------------------------------------

--
-- Table structure for table `user_resource`
--

CREATE TABLE `user_resource` (
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `data` text,
  PRIMARY KEY (`user_id`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_resource`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
