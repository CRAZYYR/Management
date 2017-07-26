/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : management

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-26 15:24:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mg_agoods
-- ----------------------------
DROP TABLE IF EXISTS `mg_agoods`;
CREATE TABLE `mg_agoods` (
  `agid` int(11) NOT NULL AUTO_INCREMENT,
  `agnumber` int(11) NOT NULL DEFAULT '0' COMMENT '进货的数量',
  `agpric` varchar(255) NOT NULL DEFAULT '' COMMENT '进货的单价',
  `agname` varchar(255) NOT NULL DEFAULT '' COMMENT '进货名',
  `agdesc` varchar(255) NOT NULL DEFAULT '' COMMENT '进货描述',
  `agtime` int(11) NOT NULL DEFAULT '0' COMMENT '进货时间',
  `agdata` varchar(255) NOT NULL COMMENT '进货日期',
  `aglid` int(11) NOT NULL DEFAULT '0' COMMENT '品牌ID',
  `gid` int(11) NOT NULL,
  `agweight` varchar(255) NOT NULL DEFAULT '' COMMENT '单重',
  PRIMARY KEY (`agid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='进货清单';

-- ----------------------------
-- Records of mg_agoods
-- ----------------------------
INSERT INTO `mg_agoods` VALUES ('1', '43', '23', 'nihao', 'dsaa', '1500786034', '201707', '4', '15', '');
INSERT INTO `mg_agoods` VALUES ('2', '2', '120', '戒指', '这个是戒指', '1500881274', '201707', '1', '16', '6');
INSERT INTO `mg_agoods` VALUES ('3', '20', '1200', '项链', '这个是项链', '1500882041', '201707', '1', '17', '10');
INSERT INTO `mg_agoods` VALUES ('4', '23', '250', '手镯', '这个是手镯', '1500882280', '201706', '1', '18', '24');
INSERT INTO `mg_agoods` VALUES ('5', '11', '323', '撒旦撒', '', '1501045492', '201707', '19', '21', '233');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='这个是顾客表';

-- ----------------------------
-- Records of mg_customer
-- ----------------------------
INSERT INTO `mg_customer` VALUES ('5', '李四', '34567890-', '4567890-', '4567890-', '1', '0');
INSERT INTO `mg_customer` VALUES ('1', '张三', '783339922929', '河北', '6297349368', '0', '0');
INSERT INTO `mg_customer` VALUES ('6', '王五', '34567890-', '是大法官和加快了', '09876543', '1', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='商品的列表';

-- ----------------------------
-- Records of mg_goods
-- ----------------------------
INSERT INTO `mg_goods` VALUES ('1', '铂金', '这个是铂金', '5', '5', '0', '5', '4', '2', '1500533201');
INSERT INTO `mg_goods` VALUES ('2', '银子', '这个是银子', '6', '4', '0', '5', '3', '3', '1500533201');
INSERT INTO `mg_goods` VALUES ('3', '例子', '这个是例子', '80', '6', '0', '6', '40', '44', '1500533201');
INSERT INTO `mg_goods` VALUES ('4', '哈哈', '哈哈', '8', '6', '0', '7', '6', '31', '1500533201');
INSERT INTO `mg_goods` VALUES ('5', 'xixi', 'hah', '0', '0', '1', '', '0', '0', '1500533201');
INSERT INTO `mg_goods` VALUES ('6', 'wuwu', 'enen', '0', '34', '2', '', '0', '2', '1500533201');
INSERT INTO `mg_goods` VALUES ('7', 'zs', 'sa', '0', '0', '4', '', '0', '0', '1500533201');
INSERT INTO `mg_goods` VALUES ('8', 'saas', 'wqs', '0', '0', '4', '', '0', '4', '1500533201');
INSERT INTO `mg_goods` VALUES ('9', 'dada', 'hjhj', '2', '5', '3', '', '1', '45', '1500533201');
INSERT INTO `mg_goods` VALUES ('10', 'rtyu', 'rtyfgh', '0', '0', '2', '', '0', '0', '1500533201');
INSERT INTO `mg_goods` VALUES ('11', '黄铜', '这个一个美丽的黄铜', '0', '0', '0', '', '0', '0', '0');
INSERT INTO `mg_goods` VALUES ('14', '青铜手镯', '青铜手镯无敌', '11', '120', '11', '1234', '0', '0', '1500784381');
INSERT INTO `mg_goods` VALUES ('20', '没蓝', '没蓝', '0', '0', '0', '', '0', '0', '0');
INSERT INTO `mg_goods` VALUES ('19', '手机', '手机', '0', '0', '0', '', '0', '0', '0');
INSERT INTO `mg_goods` VALUES ('17', '项链', '这个是项链', '20', '1200', '1', '10', '0', '0', '1500882041');
INSERT INTO `mg_goods` VALUES ('18', '手镯', '这个是手镯', '23', '250', '1', '24', '33', '0', '1500882280');
INSERT INTO `mg_goods` VALUES ('21', '撒旦撒', '', '11', '323', '19', '233', '0', '0', '1501045492');

-- ----------------------------
-- Table structure for mg_goods_cache
-- ----------------------------
DROP TABLE IF EXISTS `mg_goods_cache`;
CREATE TABLE `mg_goods_cache` (
  `gid` int(11) NOT NULL,
  `gcid` int(11) NOT NULL AUTO_INCREMENT,
  `gname` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的名称',
  `gdescribe` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的描述',
  `gnumber` int(11) NOT NULL DEFAULT '0' COMMENT '商品的总数',
  `gpri` varchar(255) NOT NULL DEFAULT '0' COMMENT '商品的价格',
  `lid` int(11) NOT NULL DEFAULT '0' COMMENT '这个和gid对等',
  `gweight` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的重量',
  `gsale` int(11) NOT NULL DEFAULT '0' COMMENT '剩余的商品',
  `gmoney` int(255) NOT NULL DEFAULT '0' COMMENT '商品收入',
  `gtime` int(11) NOT NULL DEFAULT '0' COMMENT '进货时间',
  PRIMARY KEY (`gcid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='商品的列表';

-- ----------------------------
-- Records of mg_goods_cache
-- ----------------------------
INSERT INTO `mg_goods_cache` VALUES ('1', '1', '铂金', '这个是铂金', '5', '5', '0', '5', '4', '2', '1500533201');
INSERT INTO `mg_goods_cache` VALUES ('2', '2', '银子', '这个是银子', '6', '4', '0', '5', '3', '3', '1500533201');
INSERT INTO `mg_goods_cache` VALUES ('3', '3', '例子', '这个是例子', '80', '6', '0', '6', '40', '44', '1500533201');
INSERT INTO `mg_goods_cache` VALUES ('4', '4', '哈哈', '哈哈', '8', '6', '0', '7', '6', '31', '1500533201');
INSERT INTO `mg_goods_cache` VALUES ('5', '5', 'xixi', 'hah', '0', '0', '1', '', '0', '0', '1500533201');
INSERT INTO `mg_goods_cache` VALUES ('6', '6', 'wuwu', 'enen', '0', '34', '2', '', '0', '2', '1500533201');
INSERT INTO `mg_goods_cache` VALUES ('7', '7', 'zs', 'sa', '0', '0', '4', '', '0', '0', '1500533201');
INSERT INTO `mg_goods_cache` VALUES ('8', '8', 'saas', 'wqs', '0', '0', '4', '', '0', '4', '1500533201');
INSERT INTO `mg_goods_cache` VALUES ('9', '9', 'dada', 'hjhj', '2', '5', '3', '', '1', '45', '1500533201');
INSERT INTO `mg_goods_cache` VALUES ('10', '10', 'rtyu', 'rtyfgh', '0', '0', '2', '', '0', '0', '1500533201');
INSERT INTO `mg_goods_cache` VALUES ('11', '11', '黄铜', '这个一个美丽的黄铜', '0', '0', '0', '', '0', '0', '0');
INSERT INTO `mg_goods_cache` VALUES ('14', '12', '青铜手镯', '青铜手镯无敌', '11', '120', '11', '1234', '0', '0', '1500784381');
INSERT INTO `mg_goods_cache` VALUES ('17', '13', '项链', '这个是项链', '20', '1200', '1', '10', '0', '0', '1500882041');
INSERT INTO `mg_goods_cache` VALUES ('18', '14', '手镯', '这个是手镯', '23', '250', '1', '24', '33', '0', '1500882280');
INSERT INTO `mg_goods_cache` VALUES ('20', '19', '没蓝', '没蓝', '0', '0', '0', '', '0', '0', '0');
INSERT INTO `mg_goods_cache` VALUES ('21', '20', '撒旦撒', '', '11', '323', '19', '233', '0', '0', '1501045492');

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
  `glid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_month
-- ----------------------------
INSERT INTO `mg_month` VALUES ('1', '201707', '32', '6', '21', '2');
INSERT INTO `mg_month` VALUES ('2', '201706', '44', '8', '11', '4');
INSERT INTO `mg_month` VALUES ('3', '201706', '78', '7', '32', '4');

-- ----------------------------
-- Table structure for mg_pz
-- ----------------------------
DROP TABLE IF EXISTS `mg_pz`;
CREATE TABLE `mg_pz` (
  `pzid` int(11) NOT NULL AUTO_INCREMENT COMMENT '销售品牌表',
  `pname` varchar(255) NOT NULL DEFAULT '' COMMENT '品牌名字',
  `pmonth` varchar(255) NOT NULL DEFAULT '' COMMENT '牌子月份',
  `ptotle` int(11) NOT NULL DEFAULT '0' COMMENT '牌子的销售数量',
  `pgid` int(11) NOT NULL,
  PRIMARY KEY (`pzid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_pz
-- ----------------------------
INSERT INTO `mg_pz` VALUES ('1', '银子', '201706', '23', '2');
INSERT INTO `mg_pz` VALUES ('2', '手机', '201707', '0', '19');
INSERT INTO `mg_pz` VALUES ('3', '没蓝', '201707', '0', '20');

-- ----------------------------
-- Table structure for mg_sales
-- ----------------------------
DROP TABLE IF EXISTS `mg_sales`;
CREATE TABLE `mg_sales` (
  `sid` int(11) NOT NULL AUTO_INCREMENT COMMENT '货物id',
  `sname` varchar(255) NOT NULL DEFAULT '' COMMENT '货物的名称',
  `spric` varchar(255) NOT NULL DEFAULT '0' COMMENT '商品的价格',
  `stime` int(255) NOT NULL DEFAULT '0' COMMENT '商品的创单时间',
  `snumber` int(11) NOT NULL DEFAULT '0' COMMENT '商品的个数',
  `sdescribe` varchar(255) NOT NULL DEFAULT '' COMMENT '销售商品的附加信息',
  `sweight` varchar(255) NOT NULL DEFAULT '' COMMENT '卖出去商品的重量',
  `smonth` varchar(255) NOT NULL DEFAULT '' COMMENT '在某年某月销售',
  `uname` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的销售人',
  `cname` varchar(255) NOT NULL DEFAULT '' COMMENT '顾客的姓名',
  `gid` int(255) NOT NULL DEFAULT '0' COMMENT '销售的商品号',
  `glid` int(11) NOT NULL DEFAULT '0' COMMENT '一级目录',
  `uaccount` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='商品的信息表';

-- ----------------------------
-- Records of mg_sales
-- ----------------------------
INSERT INTO `mg_sales` VALUES ('1', 'xixi', '23', '1501033386', '1', '', '23', '201707', '张帅', '帅字', '5', '1', 'admin');
INSERT INTO `mg_sales` VALUES ('2', 'zs', '026', '0', '2', '', '21', '201706', 'zslmy', '张帅', '6', '2', 'zslmy');
INSERT INTO `mg_sales` VALUES ('3', 'rtyu', '22', '0', '2', '', '33', '201706', 'zslmy', 'sasasa', '10', '2', 'zslmy');

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
-- Table structure for mg_stock
-- ----------------------------
DROP TABLE IF EXISTS `mg_stock`;
CREATE TABLE `mg_stock` (
  `sid` int(11) NOT NULL AUTO_INCREMENT COMMENT '货物id',
  `sname` varchar(255) NOT NULL DEFAULT '' COMMENT '货物的名称',
  `spric` varchar(255) NOT NULL DEFAULT '0' COMMENT '商品的价格',
  `stime` varchar(255) NOT NULL DEFAULT '' COMMENT '商品的进货时间',
  `snumber` int(11) NOT NULL DEFAULT '0' COMMENT '商品的个数',
  `sdescribe` varchar(255) NOT NULL DEFAULT '' COMMENT '销售商品的附加信息',
  `sweight` varchar(255) NOT NULL DEFAULT '' COMMENT '进货商品的单重量',
  `smonth` varchar(255) NOT NULL DEFAULT '' COMMENT '在某年某月销售',
  `gid` int(255) NOT NULL DEFAULT '0' COMMENT '销售的商品号',
  `glid` int(11) NOT NULL DEFAULT '0' COMMENT '一级目录',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='商品的信息表';

-- ----------------------------
-- Records of mg_stock
-- ----------------------------
INSERT INTO `mg_stock` VALUES ('1', 'xixi', '23', '', '1', '', '23', '201706', '5', '1');
INSERT INTO `mg_stock` VALUES ('2', 'zs', '026', '', '2', '', '21', '201706', '6', '2');
INSERT INTO `mg_stock` VALUES ('3', 'rtyu', '22', '', '2', '', '33', '201706', '10', '2');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='这个是用户登录帐号表';

-- ----------------------------
-- Records of mg_user
-- ----------------------------
INSERT INTO `mg_user` VALUES ('1', 'admin', '张帅', 'c3284d0f94606de1fd2af172aba15bf3', '127.0.0.1', '1', '0', '1501053257', '3');
INSERT INTO `mg_user` VALUES ('2', 'zslmy', 'zslmy', '14e1b600b1fd579f47433b88e8d85291', '127.0.0.1', '0', '0', '1500741287', '0');
INSERT INTO `mg_user` VALUES ('6', 'zs', 'zs', 'c8d6d45aab11818c0627b5b7ccd73992', '127.0.0.1', '1', '0', '1501044358', '0');

-- ----------------------------
-- Table structure for mg_usermonth
-- ----------------------------
DROP TABLE IF EXISTS `mg_usermonth`;
CREATE TABLE `mg_usermonth` (
  `umid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL DEFAULT '' COMMENT '服务员姓名',
  `umtime` int(11) NOT NULL DEFAULT '0',
  `umtotle` int(11) NOT NULL DEFAULT '0' COMMENT '服务员的销售',
  `uid` int(11) NOT NULL COMMENT '店员ID',
  `umweight` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`umid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mg_usermonth
-- ----------------------------
INSERT INTO `mg_usermonth` VALUES ('1', '张帅', '201706', '3', '1', '0');
INSERT INTO `mg_usermonth` VALUES ('2', 'zslmy', '201707', '0', '2', '0');

-- ----------------------------
-- Table structure for mg_user_cache
-- ----------------------------
DROP TABLE IF EXISTS `mg_user_cache`;
CREATE TABLE `mg_user_cache` (
  `ucid` int(11) NOT NULL AUTO_INCREMENT COMMENT '普通用户uid',
  `uaccount` varchar(255) NOT NULL DEFAULT '' COMMENT '普通用户的帐号',
  `uname` varchar(255) NOT NULL DEFAULT '' COMMENT '用户的姓名',
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`ucid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='这个是用户登录帐号表';

-- ----------------------------
-- Records of mg_user_cache
-- ----------------------------
INSERT INTO `mg_user_cache` VALUES ('1', 'admin', '张帅', '1');
INSERT INTO `mg_user_cache` VALUES ('2', 'zslmy', 'zslmy', '2');
INSERT INTO `mg_user_cache` VALUES ('6', 'zs', 'zs', '6');
