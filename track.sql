/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : pushpress

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-06-24 13:54:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for track
-- ----------------------------
DROP TABLE IF EXISTS `track`;
CREATE TABLE `track` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` int(11) DEFAULT NULL,
  `info` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of track
-- ----------------------------
INSERT INTO `track` VALUES ('1', '62015', '{\"1\":{\"column-header\":\"Monday\",\"column-data\":{\"1\":\"Inheritance is a way to create a class as a specialized version of one or more classes (JavaScript only supports single inheritance).\",\"2\":\"The specialized class is commonly called the child, and the other class is commonly called the parent.\",\"3\":\"In JavaScript you do this by assigning an instance of the parent class to the child class, and then specializing it. \"}},\"2\":{\"column-header\":\"Tuesday\",\"column-data\":{\"1\":\"In JavaScript methods are regular function objects bound to an object as a property, which means you can invoke methods \\\"out of the context\\\". \",\"2\":\"Properties are variables contained in the class; every instance of the object has those properties. \",\"3\":\"Properties are set in the constructor (function) of the class so that they are created on each instance.\"}},\"3\":{\"column-header\":\"Wednesday\",\"column-data\":[]},\"4\":{\"column-header\":\"Thursday\",\"column-data\":[]},\"5\":{\"column-header\":\"Friday\",\"column-data\":[]},\"6\":{\"column-header\":\"Saturday\",\"column-data\":[]},\"7\":{\"column-header\":\"Sunday\",\"column-data\":[]},\"8\":{\"column-header\":\"Monday\",\"column-data\":[]},\"9\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"10\":{\"column-header\":\"Wednesday\",\"column-data\":[]},\"11\":{\"column-header\":\"Thursday\",\"column-data\":[]},\"12\":{\"column-header\":\"Friday\",\"column-data\":[]},\"13\":{\"column-header\":\"Saturday\",\"column-data\":[]},\"14\":{\"column-header\":\"Sunday\",\"column-data\":[]},\"15\":{\"column-header\":\"Monday\",\"column-data\":[]},\"16\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"17\":{\"column-header\":\"Wednesday\",\"column-data\":[]},\"18\":{\"column-header\":\"Thursday\",\"column-data\":[]},\"19\":{\"column-header\":\"Friday\",\"column-data\":[]},\"20\":{\"column-header\":\"Saturday\",\"column-data\":[]},\"21\":{\"column-header\":\"Sunday\",\"column-data\":[]},\"22\":{\"column-header\":\"Monday\",\"column-data\":[]},\"23\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"24\":{\"column-header\":\"Wednesday\",\"column-data\":[]},\"25\":{\"column-header\":\"Thursday\",\"column-data\":[]},\"26\":{\"column-header\":\"Friday\",\"column-data\":[]},\"27\":{\"column-header\":\"Saturday\",\"column-data\":[]},\"28\":{\"column-header\":\"Sunday\",\"column-data\":[]},\"29\":{\"column-header\":\"Monday\",\"column-data\":[]},\"30\":{\"column-header\":\"Tuesday\",\"column-data\":[]}}');
INSERT INTO `track` VALUES ('2', '72015', '{\"1\":{\"column-header\":\"Monday\",\"column-data\":{\"1\":\"Inheritance is a way to create a class as a specialized version of one or more classes (JavaScript only supports single inheritance).\",\"2\":\"The specialized class is commonly called the child, and the other class is commonly called the parent.\",\"3\":\"In JavaScript you do this by assigning an instance of the parent class to the child class, and then specializing it. \"}},\"2\":{\"column-header\":\"Tuesday\",\"column-data\":{\"1\":\"In JavaScript methods are regular function objects bound to an object as a property, which means you can invoke methods \\\"out of the context\\\". \",\"2\":\"Properties are variables contained in the class; every instance of the object has those properties. \",\"3\":\"Properties are set in the constructor (function) of the class so that they are created on each instance.\"}},\"3\":{\"column-header\":\"Tuesday\",\"column-data\":{\"1\":\"In JavaScript methods are regular function objects bound to an object as a property, which means you can invoke methods \\\"out of the context\\\". \",\"2\":\"Properties are variables contained in the class; every instance of the object has those properties. \",\"3\":\"Properties are set in the constructor (function) of the class so that they are created on each instance.\"}},\"4\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"5\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"6\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"7\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"8\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"9\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"10\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"11\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"12\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"13\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"14\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"15\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"16\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"17\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"18\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"19\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"20\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"21\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"22\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"23\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"24\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"25\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"26\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"27\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"28\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"29\":{\"column-header\":\"Tuesday\",\"column-data\":[]},\"30\":{\"column-header\":\"Tuesday\",\"column-data\":[]}}');
