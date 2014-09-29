/*
Navicat MySQL Data Transfer

Source Server         : above-instance
Source Server Version : 50169
Source Host           : 23.23.196.156:3306
Source Database       : soccer

Target Server Type    : MYSQL
Target Server Version : 50169
File Encoding         : 65001

Date: 2014-09-19 02:40:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `soccer_team`
-- ----------------------------
DROP TABLE IF EXISTS `soccer_team`;
CREATE TABLE `soccer_team` (
  `identifier` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `logouri` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY (`identifier`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of soccer_team
-- ----------------------------
INSERT INTO `soccer_team` VALUES ('2', 'Honduras', 'http://www.mlssoccer.com/sites/league/files/hondur', 'Honduras', 'Honduras');
INSERT INTO `soccer_team` VALUES ('3', 'Maxico', 'http://www.mlssoccer.com/sites/league/files/Mexico', 'Maxico', 'Maxico');
INSERT INTO `soccer_team` VALUES ('4', 'USA', 'http://www.mlssoccer.com/sites/league/files/usafla', 'Newyork', 'USA');
INSERT INTO `soccer_team` VALUES ('5', 'Belgium', 'http://www.mlssoccer.com/sites/league/files/belgiu', 'Belguim', 'Belguim');
