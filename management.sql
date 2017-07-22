/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : management

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-22 14:18:30
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='这个是顾客表';

-- ----------------------------
-- Records of mg_customer
-- ----------------------------
INSERT INTO `mg_customer` VALUES ('1', 'zs', '234554', '43543545', '54545345', '1', '450');

-- ----------------------------
-- Table structure for mg_goods
-- ----------------------------
DROP TABLE IF EXISTS `mg_goods`;
CREATE TABLE `mg_goods` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `gname` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的名称',
  `gdescribe` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的描述',
  `gnumber` int(11) NOT NULL DEFAULT '0' COMMENT '商品的总数',
  `gpri` varchar(255) NOT NULL DEFAULT '0' COMMENT '商品的价格',
  `lid` int(11) NOT NULL DEFAULT '0' COMMENT '这个和gid对等',
  `gweight` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的重量',
  `gsale` int(11) NOT NULL DEFAULT '0' COMMENT '剩余的商品',
  `gmoney` int(255) NOT NULL DEFAULT '0' COMMENT '商品收入',
  `gtime` int(11) NOT NULL DEFAULT '0' COMMENT '进货时间',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='商品的列表';

-- ----------------------------
-- Records of mg_goods
-- ----------------------------
INSERT INTO `mg_goods` VALUES ('1', '铂金', '这个是铂金', '5', '5', '0', '5', '4', '2', '1500533201');
INSERT INTO `mg_goods` VALUES ('2', '银子', '这个是银子', '6', '4', '0', '5', '3', '3', '1500533201');
INSERT INTO `mg_goods` VALUES ('3', '例子', '这个是例子', '80', '6', '0', '6', '40', '44', '1500533201');
INSERT INTO `mg_goods` VALUES ('4', '哈哈', '哈哈', '8', '6', '0', '7', '6', '31', '1500533201');
INSERT INTO `mg_goods` VALUES ('5', 'xixi', 'hah', '0', '0', '1', '', '0', '0', '1500533201');
INSERT INTO `mg_goods` VALUES ('6', 'wuwu', 'enen', '0', '0', '2', '', '0', '2', '1500533201');
INSERT INTO `mg_goods` VALUES ('7', 'zs', 'sa', '0', '0', '3', '', '0', '0', '1500533201');
INSERT INTO `mg_goods` VALUES ('8', 'saas', 'wqs', '0', '0', '4', '', '0', '4', '1500533201');
INSERT INTO `mg_goods` VALUES ('9', 'dada', 'hjhj', '2', '5', '3', '', '1', '45', '1500533201');
INSERT INTO `mg_goods` VALUES ('10', 'rtyu', 'rtyfgh', '0', '0', '2', '', '0', '0', '1500533201');

-- ----------------------------
-- Table structure for mg_month
-- ----------------------------
DROP TABLE IF EXISTS `mg_month`;
CREATE TABLE `mg_month` (
  `mid` int(11) NOT NULL AUTO_INCREMENT COMMENT '月份',
  `mtime` varchar(255) NOT NULL DEFAULT '' COMMENT '时间',
  `mtotle` int(11) NOT NULL DEFAULT '0' COMMENT '总和',
  `gid` int(11) NOT NULL COMMENT '商品的标识',
  `mmoney` int(11) NOT NULL DEFAULT '0' COMMENT '月输入',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_month
-- ----------------------------
INSERT INTO `mg_month` VALUES ('1', '201706', '32', '1', '21');
INSERT INTO `mg_month` VALUES ('2', '201706', '44', '2', '11');

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
  `sweight` varchar(255) NOT NULL DEFAULT '' COMMENT '卖出去商品的重量',
  `smonth` varchar(255) NOT NULL DEFAULT '' COMMENT '在某年某月销售',
  `uname` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的销售人',
  `cname` varchar(255) NOT NULL DEFAULT '' COMMENT '顾客的姓名',
  `gid` int(255) NOT NULL DEFAULT '0' COMMENT '销售的商品号',
  `glid` int(11) NOT NULL DEFAULT '0' COMMENT '一级目录',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='商品的信息表';

-- ----------------------------
-- Records of mg_sales
-- ----------------------------
INSERT INTO `mg_sales` VALUES ('1', 'xixi', '23', '', '1', '', '23', '201706', '张帅', '帅字', '5', '1');
INSERT INTO `mg_sales` VALUES ('2', 'zs', '026', '', '2', '', '21', '201706', '帅字', '张帅', '6', '2');
INSERT INTO `mg_sales` VALUES ('3', 'rtyu', '22', '', '2', '', '33', '201706', 'shuai', 'sasasa', '10', '2');

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
  `utotle` int(11) NOT NULL DEFAULT '0' COMMENT '销售总量',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='这个是用户登录帐号表';

-- ----------------------------
-- Records of mg_user
-- ----------------------------
INSERT INTO `mg_user` VALUES ('1', 'admin', '张帅', 'c3284d0f94606de1fd2af172aba15bf3', '127.0.0.1', '0', '0', '1500693306', '3');
INSERT INTO `mg_user` VALUES ('2', 'zscool', 'shuaizi', 'c3284d0f94606de1fd2af172aba15bf3', '', '0', '1', '0', '4');
