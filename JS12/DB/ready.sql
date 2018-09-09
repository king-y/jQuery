/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50711
Source Host           : 127.0.0.1:3306
Source Database       : ready

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2016-11-01 23:44:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lover
-- ----------------------------
DROP TABLE IF EXISTS `lover`;
CREATE TABLE `lover` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sex` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lover
-- ----------------------------
INSERT INTO `lover` VALUES ('1', '静静', '0', '2');
INSERT INTO `lover` VALUES ('2', '小草', '1', '4');
INSERT INTO `lover` VALUES ('3', '如花', '2', '7');
INSERT INTO `lover` VALUES ('4', '阿凤', '0', '2');
INSERT INTO `lover` VALUES ('5', '曾哥', '1', '5');
INSERT INTO `lover` VALUES ('6', '芝芝', '0', '7');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sex` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `age` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `province` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '黄超', '1', '18', '江苏');
INSERT INTO `user` VALUES ('2', '麦克雷', '1', '40', '纽约');
INSERT INTO `user` VALUES ('3', '卢西奥', '0', '26', '纽约');
INSERT INTO `user` VALUES ('4', '半藏', '1', '38', '东京');
INSERT INTO `user` VALUES ('5', '法老之鹰', '0', '30', '江苏');
INSERT INTO `user` VALUES ('6', '安娜', '0', '80', '江苏');
INSERT INTO `user` VALUES ('7', '天使', '0', '30', '江苏');
INSERT INTO `user` VALUES ('8', '查莉娅', '0', '36', '浙江');
INSERT INTO `user` VALUES ('9', '黑百合', '0', '32', '上海');
INSERT INTO `user` VALUES ('10', '猎空', '0', '23', '北京');
INSERT INTO `user` VALUES ('11', '狂鼠', '1', '40', '新疆');
INSERT INTO `user` VALUES ('12', '托比昂', '1', '50', '新疆');
INSERT INTO `user` VALUES ('13', 'D.Va', '0', '20', '上海');
INSERT INTO `user` VALUES ('14', '源氏', '1', '35', '东京');
INSERT INTO `user` VALUES ('15', '死神', '1', '40', '纽约');
INSERT INTO `user` VALUES ('16', '士兵76', '1', '40', '纽约');
INSERT INTO `user` VALUES ('17', '堡垒', '1', '99', '纽约');
INSERT INTO `user` VALUES ('18', '老王', '2', '40', '隔壁的');
INSERT INTO `user` VALUES ('19', '小美', '0', '23', '北京');
INSERT INTO `user` VALUES ('20', '莱因哈特', '1', '80', '纽约');
INSERT INTO `user` VALUES ('21', '路霸', '1', '43', '上海');
INSERT INTO `user` VALUES ('22', '温斯顿', '2', '20', '上海');
INSERT INTO `user` VALUES ('23', '秩序之光', '0', '19', '上海');
INSERT INTO `user` VALUES ('24', '小王', '1', '40', '北京');
INSERT INTO `user` VALUES ('25', '小王八', '1', '4', '纽约');
INSERT INTO `user` VALUES ('26', '小霸王', '1', '4', '上海');
INSERT INTO `user` VALUES ('27', '王尼玛', '1', '40', '深圳');
INSERT INTO `user` VALUES ('28', '王老五', '0', '0', '江苏');
INSERT INTO `user` VALUES ('29', '王麻子', '0', '0', '四川');
INSERT INTO `user` VALUES ('30', '王中王', '1', '0', '贵州');
INSERT INTO `user` VALUES ('31', '王守义', '1', '0', '四川');
INSERT INTO `user` VALUES ('32', '王老吉', '2', '88', '江苏');

-- ----------------------------
-- Table structure for user2
-- ----------------------------
DROP TABLE IF EXISTS `user2`;
CREATE TABLE `user2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user2
-- ----------------------------
INSERT INTO `user2` VALUES ('1', 'admin', '123');

-- ----------------------------
-- Table structure for score
-- ----------------------------
DROP TABLE IF EXISTS `score`;
CREATE TABLE `score` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of score
-- ----------------------------
INSERT INTO `score` VALUES ('1', '小A', '114');
INSERT INTO `score` VALUES ('2', '小B', '22');
INSERT INTO `score` VALUES ('3', '小CC', '56');

-- ----------------------------
-- Table structure for hc_user
-- ----------------------------
DROP TABLE IF EXISTS `hc_user`;
CREATE TABLE `hc_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pass` char(32) DEFAULT NULL,
  `sex` tinyint(4) unsigned NOT NULL DEFAULT '2',
  `age` tinyint(4) unsigned DEFAULT NULL,
  `tel` char(11) NOT NULL DEFAULT '',
  `province` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hc_user
-- ----------------------------
INSERT INTO `hc_user` VALUES ('1', '黄超', 'e10adc3949ba59abbe56e057f20f883e', '0', '23', '18516604560', '江苏', '1');
INSERT INTO `hc_user` VALUES ('2', '麦克雷', 'e10adc3949ba59abbe56e057f20f883e', '2', '38', '13888888888', '纽约', '1');
INSERT INTO `hc_user` VALUES ('3', '卢西奥', 'e10adc3949ba59abbe56e057f20f883e', '1', '34', '13888888888', '纽约', '1');
INSERT INTO `hc_user` VALUES ('4', '半藏', 'e10adc3949ba59abbe56e057f20f883e', '1', '33', '13888888888', '东京', '1');
INSERT INTO `hc_user` VALUES ('5', '法老之鹰', 'e10adc3949ba59abbe56e057f20f883e', '2', '21', '13888888888', '江苏', '1');
INSERT INTO `hc_user` VALUES ('6', '安娜', 'e10adc3949ba59abbe56e057f20f883e', '1', '20', '13888888888', '江苏', '1');
INSERT INTO `hc_user` VALUES ('7', '天使', 'e10adc3949ba59abbe56e057f20f883e', '2', '42', '13888888888', '上海', '1');
INSERT INTO `hc_user` VALUES ('8', '查莉娅', 'e10adc3949ba59abbe56e057f20f883e', '1', '45', '13888888888', '北京', '1');
INSERT INTO `hc_user` VALUES ('9', '黑百合', 'e10adc3949ba59abbe56e057f20f883e', '1', '33', '13888888888', '广州', '1');
INSERT INTO `hc_user` VALUES ('10', '猎空', 'e10adc3949ba59abbe56e057f20f883e', '2', '38', '13888888888', '深圳', '1');
INSERT INTO `hc_user` VALUES ('11', '狂鼠', 'e10adc3949ba59abbe56e057f20f883e', '1', '15', '13888888888', '新疆', '1');
INSERT INTO `hc_user` VALUES ('12', '托比昂', 'e10adc3949ba59abbe56e057f20f883e', '2', '16', '13888888888', '新疆', '1');
INSERT INTO `hc_user` VALUES ('13', 'D.Va', 'e10adc3949ba59abbe56e057f20f883e', '0', '35', '13888888888', '上海', '1');
INSERT INTO `hc_user` VALUES ('14', '源氏', 'e10adc3949ba59abbe56e057f20f883e', '0', '4', '13888888888', '东京', '1');
INSERT INTO `hc_user` VALUES ('15', '死神', 'e10adc3949ba59abbe56e057f20f883e', '2', '12', '13888888888', '纽约', '1');
INSERT INTO `hc_user` VALUES ('16', '士兵76', 'e10adc3949ba59abbe56e057f20f883e', '2', '2', '13888888888', '纽约', '1');
INSERT INTO `hc_user` VALUES ('17', '堡垒', 'e10adc3949ba59abbe56e057f20f883e', '2', '41', '13888888888', '东京', '1');
INSERT INTO `hc_user` VALUES ('18', '老王', 'e10adc3949ba59abbe56e057f20f883e', '2', '7', '13888888888', '隔壁的', '1');
INSERT INTO `hc_user` VALUES ('19', '小美', 'e10adc3949ba59abbe56e057f20f883e', '1', '35', '13888888888', '北京', '1');
INSERT INTO `hc_user` VALUES ('20', '莱因哈特', 'e10adc3949ba59abbe56e057f20f883e', '0', '37', '13888888888', '纽约', '1');
INSERT INTO `hc_user` VALUES ('21', '路霸', 'e10adc3949ba59abbe56e057f20f883e', '1', '32', '13888888888', '广州', '1');
INSERT INTO `hc_user` VALUES ('22', '温斯顿', 'e10adc3949ba59abbe56e057f20f883e', '2', '7', '13888888888', '深圳', '1');
INSERT INTO `hc_user` VALUES ('23', '秩序之光', 'e10adc3949ba59abbe56e057f20f883e', '1', '35', '13888888888', '新疆', '1');
INSERT INTO `hc_user` VALUES ('24', '黑影', 'e10adc3949ba59abbe56e057f20f883e', '1', '13', '13888888888', '上海', '1');
INSERT INTO `hc_user` VALUES ('25', '禅雅塔', 'e10adc3949ba59abbe56e057f20f883e', '1', '14', '13888888888', '江苏', '1');
INSERT INTO `hc_user` VALUES ('26', '奥丽莎', 'e10adc3949ba59abbe56e057f20f883e', '2', '47', '13888888888', '江苏', '1');
INSERT INTO `hc_user` VALUES ('27', '小王', 'e10adc3949ba59abbe56e057f20f883e', '2', '41', '13888888888', '北京', '1');
INSERT INTO `hc_user` VALUES ('28', '小王八', 'e10adc3949ba59abbe56e057f20f883e', '2', '8', '13888888888', '广州', '1');
INSERT INTO `hc_user` VALUES ('29', '小霸王', 'e10adc3949ba59abbe56e057f20f883e', '2', '11', '13888888888', '广州', '1');
INSERT INTO `hc_user` VALUES ('30', '王尼玛', 'e10adc3949ba59abbe56e057f20f883e', '1', '22', '13888888888', '深圳', '1');
INSERT INTO `hc_user` VALUES ('31', '王老五', 'e10adc3949ba59abbe56e057f20f883e', '0', '10', '13888888888', '纽约', '1');
INSERT INTO `hc_user` VALUES ('32', '王麻子', 'e10adc3949ba59abbe56e057f20f883e', '0', '27', '13888888888', '四川', '1');
INSERT INTO `hc_user` VALUES ('33', '王中王', 'e10adc3949ba59abbe56e057f20f883e', '2', '39', '13888888888', '江苏', '1');
INSERT INTO `hc_user` VALUES ('34', '王守义', 'e10adc3949ba59abbe56e057f20f883e', '0', '20', '13888888888', '江苏', '1');
INSERT INTO `hc_user` VALUES ('35', '王老吉', 'e10adc3949ba59abbe56e057f20f883e', '1', '15', '13888888888', '深圳', '1');


-- ----------------------------
-- Table structure for hc_lover
-- ----------------------------
DROP TABLE IF EXISTS `hc_lover`;
CREATE TABLE `hc_lover` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sex` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hc_lover
-- ----------------------------
INSERT INTO `hc_lover` VALUES ('1', '静静', '0', '2');
INSERT INTO `hc_lover` VALUES ('2', '艳艳', '0', '4');
INSERT INTO `hc_lover` VALUES ('3', '春哥', '1', '2');
INSERT INTO `hc_lover` VALUES ('4', '红红', '0', '16');
INSERT INTO `hc_lover` VALUES ('5', '阿轩', '0', '3');
INSERT INTO `hc_lover` VALUES ('6', '华哥', '1', '6');
INSERT INTO `hc_lover` VALUES ('7', '貂蝉', '0', '5');
INSERT INTO `hc_lover` VALUES ('8', '昭君', '0', '4');
INSERT INTO `hc_lover` VALUES ('9', '冰雪女王', '0', '1');
INSERT INTO `hc_lover` VALUES ('10', '大乔', '0', '9');
INSERT INTO `hc_lover` VALUES ('11', '孙尚香', '0', '10');
INSERT INTO `hc_lover` VALUES ('12', '麦迪文', '1', '6');
INSERT INTO `hc_lover` VALUES ('13', '萨尔', '1', '8');
INSERT INTO `hc_lover` VALUES ('14', '泰兰德', '0', '1');
INSERT INTO `hc_lover` VALUES ('15', '陈一发', '0', '18');

