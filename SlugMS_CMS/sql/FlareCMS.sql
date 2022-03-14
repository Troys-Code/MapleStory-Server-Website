CREATE TABLE `comments` (
  `id` int(4) NOT NULL auto_increment,
  `entryid` int(4) NOT NULL,
  `name` varchar(45) NOT NULL,
  `text` varchar(500) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE `entries` (
  `id` int(4) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `text` varchar(9999) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `accounts` ADD COLUMN `email` TEXT default null;

