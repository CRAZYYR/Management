/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : management

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-20 11:56:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mg_customer
-- ----------------------------
DROP TABLE IF EXISTS `mg_customer`;
CREATE TABLE `mg_customer` (
  `cid` int(11) NOT NULL AUTO_INCREMENT COMMENT '顾客的自增id',
  `cname` varchar(255) NOT NULL DEFAULT '' COMMENT '顾客的姓名',
  `cphone` varchar(255) NOT NULL DEFAULT '' COMMENT '顾客的联系方式',
  `caddress` varchar(255) NOT NULL DEFAULT '' COMMENT '顾客的地址',
  `ccard` varchar(255) NOT NULL DEFAULT '' COMMENT '客户的身份证号码',
  `cvip` char(1) NOT NULL DEFAULT '0' COMMENT '客户是否为会员',
  `cpoint` int(11) NOT NULL DEFAULT '0' COMMENT '客户的积分',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='这个是顾客表';

-- ----------------------------
-- Records of mg_customer
-- ----------------------------

-- ----------------------------
-- Table structure for mg_goods
-- ----------------------------
DROP TABLE IF EXISTS `mg_goods`;
CREATE TABLE `mg_goods` (
  `gid` int(11) NOT NULL,
  `gname` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的名称',
  `gdescribe` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的描述',
  `gnumber` int(11) NOT NULL DEFAULT '0' COMMENT '商品的总数',
  `gpri` varchar(255) NOT NULL DEFAULT '0' COMMENT '商品的价格',
  `lid` int(11) NOT NULL DEFAULT '0' COMMENT '这个和gid对等',
  `gweight` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的重量',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品的列表';

-- ----------------------------
-- Records of mg_goods
-- ----------------------------

-- ----------------------------
-- Table structure for mg_sales
-- ----------------------------
DROP TABLE IF EXISTS `mg_sales`;
CREATE TABLE `mg_sales` (
  `sid` int(11) NOT NULL AUTO_INCREMENT COMMENT '货物id',
  `sname` varchar(255) NOT NULL DEFAULT '' COMMENT '货物的名称',
  `spric` varchar(255) NOT NULL DEFAULT '0' COMMENT '商品的价格',
  `stime` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的创单时间',
  `snumber` int(11) NOT NULL DEFAULT '0' COMMENT '商品的个数',
  `sdescribe` varchar(255) NOT NULL DEFAULT '' COMMENT '销售商品的附加信息',
  `uname` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的销售人',
  `cname` varchar(255) NOT NULL DEFAULT '' COMMENT '顾客的姓名',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品的信息表';

-- ----------------------------
-- Records of mg_sales
-- ----------------------------

-- ----------------------------
-- Table structure for mg_server
-- ----------------------------
DROP TABLE IF EXISTS `mg_server`;
CREATE TABLE `mg_server` (
  `sid` int(11) NOT NULL AUTO_INCREMENT COMMENT '其他服务id',
  `sname` varchar(255) NOT NULL DEFAULT '' COMMENT '服务名称',
  `sdescribe` varchar(255) NOT NULL DEFAULT '' COMMENT '服务的说明',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='这个是其他服务的表';

-- ----------------------------
-- Records of mg_server
-- ----------------------------
INSERT INTO `mg_server` VALUES ('1', 'title', '六喜珠宝');

-- ----------------------------
-- Table structure for mg_user
-- ----------------------------
DROP TABLE IF EXISTS `mg_user`;
CREATE TABLE `mg_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT '普通用户uid',
  `uaccount` varchar(255) NOT NULL DEFAULT '' COMMENT '普通用户的帐号',
  `uname` varchar(255) NOT NULL DEFAULT '' COMMENT '用户的姓名',
  `upw` varchar(255) NOT NULL DEFAULT '' COMMENT '用户密码',
  `uip` varchar(255) NOT NULL DEFAULT '' COMMENT '用户登陆的IP地址',
  `uspu` char(1) NOT NULL DEFAULT '0' COMMENT '是否为超级管理员',
  `ulock` char(1) NOT NULL DEFAULT '0' COMMENT '0代表正常,1代表锁',
  `utime` int(11) NOT NULL DEFAULT '0' COMMENT '最后一次登陆时间',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='这个是用户登录帐号表';

-- ----------------------------
-- Records of mg_user
-- ----------------------------
INSERT INTO `mg_user` VALUES ('1', 'admin', '张帅', 'c3284d0f94606de1fd2af172aba15bf3', '127.0.0.1', '1', '0', '1500520852');
