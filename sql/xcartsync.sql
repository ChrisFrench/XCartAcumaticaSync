/*
 Navicat Premium Data Transfer

 Source Server         : Locahost
 Source Server Type    : MySQL
 Source Server Version : 50525
 Source Host           : localhost
 Source Database       : xcartsync

 Target Server Type    : MySQL
 Target Server Version : 50525
 File Encoding         : utf-8

 Date: 02/05/2013 11:19:54 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `acumaticaitems`
-- ----------------------------
DROP TABLE IF EXISTS `acumaticaitems`;
CREATE TABLE `acumaticaitems` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `sync_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `inventory` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `logs` text NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `syncs`
-- ----------------------------
DROP TABLE IF EXISTS `syncs`;
CREATE TABLE `syncs` (
  `sync_id` int(11) NOT NULL AUTO_INCREMENT,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `date` datetime NOT NULL,
  `haserror` tinyint(4) NOT NULL,
  `completed` int(11) NOT NULL,
  PRIMARY KEY (`sync_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `syncs`
-- ----------------------------
BEGIN;
INSERT INTO `syncs` VALUES ('1', '2013-02-05 09:49:29', '2013-02-05 10:49:45', '2013-02-05 10:49:47', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xcartitems`
-- ----------------------------
DROP TABLE IF EXISTS `xcartitems`;
CREATE TABLE `xcartitems` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `sync_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `inventory` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `logs` text NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECKS = 1;
