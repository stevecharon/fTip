


ALTER TABLE `config` ADD `language` TINYINT( 3 ) DEFAULT '1' NOT NULL ;



ALTER TABLE `user` ADD `language` TINYINT( 3 ) DEFAULT '1' NOT NULL ;



# --------------------------------------------------------
# Table structure for table `language`
#

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(11) NOT NULL auto_increment,
  `language` varchar(25) NOT NULL default '',
  `suffix` varchar(4) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

#
# Dumping data for table `language`
#

INSERT INTO `language` VALUES (1, 'English', 'en');
INSERT INTO `language` VALUES (2, 'Deutsch', 'de');

