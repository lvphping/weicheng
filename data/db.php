<?php
$datas = array();
//公众号相关
$datas[] = "
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ims_account`
-- ----------------------------
DROP TABLE IF EXISTS `ims_account`;
CREATE TABLE `ims_account` (
  `acid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `hash` varchar(8) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `isconnect` tinyint(4) NOT NULL,
  `isdeleted` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`acid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_account
-- ----------------------------
INSERT INTO `ims_account` VALUES ('1', '1', 'uRr8qvQV', '1', '0', '0');

-- ----------------------------
-- Table structure for `ims_account_wechats`
-- ----------------------------
DROP TABLE IF EXISTS `ims_account_wechats`;
CREATE TABLE `ims_account_wechats` (
  `acid` int(10) unsigned NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `token` varchar(32) NOT NULL,
  `access_token` varchar(1000) NOT NULL,
  `encodingaeskey` varchar(255) NOT NULL,
  `level` tinyint(4) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `account` varchar(30) NOT NULL,
  `original` varchar(50) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `country` varchar(10) NOT NULL,
  `province` varchar(3) NOT NULL,
  `city` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  `key` varchar(50) NOT NULL,
  `secret` varchar(50) NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `subscribeurl` varchar(120) NOT NULL,
  `auth_refresh_token` varchar(255) NOT NULL,
  PRIMARY KEY (`acid`),
  KEY `idx_key` (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_account_wechats
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_activity_clerks`
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_clerks`;
CREATE TABLE `ims_activity_clerks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `storeid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_activity_clerks
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_activity_clerk_menu`
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_clerk_menu`;
CREATE TABLE `ims_activity_clerk_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `displayorder` int(4) NOT NULL,
  `pid` int(6) NOT NULL,
  `group_name` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `url` varchar(60) NOT NULL,
  `type` varchar(20) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `system` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_activity_clerk_menu
-- ----------------------------
INSERT INTO `ims_activity_clerk_menu` VALUES ('1', '0', '0', '0', 'mc', '快捷交易', '', '', '', 'mc_manage', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('2', '0', '0', '1', '', '积分充值', 'fa fa-money', 'credit1', 'modal', 'mc_credit1', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('3', '0', '0', '1', '', '余额充值', 'fa fa-cny', 'credit2', 'modal', 'mc_credit2', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('4', '0', '0', '1', '', '消费', 'fa fa-usd', 'consume', 'modal', 'mc_consume', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('5', '0', '0', '1', '', '发放会员卡', 'fa fa-credit-card', 'card', 'modal', 'mc_card', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('6', '0', '0', '0', 'stat', '数据统计', '', '', '', 'stat_manage', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('7', '0', '0', '6', '', '积分统计', 'fa fa-bar-chart', './index.php?c=stat&a=credit1', 'url', 'stat_credit1', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('8', '0', '0', '6', '', '余额统计', 'fa fa-bar-chart', './index.php?c=stat&a=credit2', 'url', 'stat_credit2', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('9', '0', '0', '6', '', '现金消费统计', 'fa fa-bar-chart', './index.php?c=stat&a=cash', 'url', 'stat_cash', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('10', '0', '0', '6', '', '会员卡统计', 'fa fa-bar-chart', './index.php?c=stat&a=card', 'url', 'stat_card', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('11', '0', '0', '0', 'activity', '系统优惠券核销', '', '', '', 'activity_card_manage', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('12', '0', '0', '11', '', '折扣券核销', 'fa fa-money', './index.php?c=activity&a=consume&do=display&type=1', 'url', 'activity_consume_coupon', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('13', '0', '0', '11', '', '代金券核销', 'fa fa-money', './index.php?c=activity&a=consume&do=display&type=2', 'url', 'activity_consume_token', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('14', '0', '0', '0', 'wechat', '微信卡券核销', '', '', '', 'wechat_card_manage', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('15', '0', '0', '14', '', '卡券核销', 'fa fa-money', './index.php?c=wechat&a=consume', 'url', 'wechat_consume', '1');
INSERT INTO `ims_activity_clerk_menu` VALUES ('16', '0', '0', '6', '', '收银台收款统计', 'fa fa-bar-chart', './index.php?c=stat&a=paycenter', 'url', 'stat_paycenter', '1');

-- ----------------------------
-- Table structure for `ims_activity_coupon`
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_coupon`;
CREATE TABLE `ims_activity_coupon` (
  `couponid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `type` tinyint(4) NOT NULL,
  `title` varchar(30) NOT NULL,
  `couponsn` varchar(50) NOT NULL,
  `description` text,
  `discount` decimal(10,2) NOT NULL,
  `condition` decimal(10,2) NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  `limit` int(11) NOT NULL,
  `dosage` int(11) unsigned NOT NULL,
  `amount` int(11) unsigned NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `credit` int(10) unsigned NOT NULL,
  `use_module` tinyint(3) unsigned NOT NULL,
  `credittype` varchar(20) NOT NULL,
  PRIMARY KEY (`couponid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_activity_coupon
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_activity_coupon_allocation`
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_coupon_allocation`;
CREATE TABLE `ims_activity_coupon_allocation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `groupid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`couponid`,`groupid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_activity_coupon_allocation
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_activity_coupon_modules`
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_coupon_modules`;
CREATE TABLE `ims_activity_coupon_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `module` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `couponid` (`couponid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_activity_coupon_modules
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_activity_coupon_record`
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_coupon_record`;
CREATE TABLE `ims_activity_coupon_record` (
  `recid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `code` varchar(50) NOT NULL,
  `grantmodule` varchar(50) NOT NULL,
  `granttime` int(10) unsigned NOT NULL,
  `usemodule` varchar(50) NOT NULL,
  `usetime` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `operator` varchar(30) NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `remark` varchar(300) NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`recid`),
  KEY `couponid` (`uid`,`grantmodule`,`usemodule`,`status`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_activity_coupon_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_activity_exchange`
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_exchange`;
CREATE TABLE `ims_activity_exchange` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `thumb` varchar(500) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `extra` varchar(3000) NOT NULL,
  `credit` int(10) unsigned NOT NULL,
  `credittype` varchar(10) NOT NULL,
  `pretotal` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `total` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_activity_exchange
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_activity_exchange_trades`
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_exchange_trades`;
CREATE TABLE `ims_activity_exchange_trades` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `exid` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `uniacid` (`uniacid`,`uid`,`exid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_activity_exchange_trades
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_activity_exchange_trades_shipping`
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_exchange_trades_shipping`;
CREATE TABLE `ims_activity_exchange_trades_shipping` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `exid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `province` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_activity_exchange_trades_shipping
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_activity_modules`
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_modules`;
CREATE TABLE `ims_activity_modules` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `exid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `available` int(10) unsigned NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `uniacid` (`uniacid`),
  KEY `module` (`module`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_activity_modules
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_activity_modules_record`
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_modules_record`;
CREATE TABLE `ims_activity_modules_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL,
  `num` tinyint(3) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mid` (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_activity_modules_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_activity_stores`
-- ----------------------------
DROP TABLE IF EXISTS `ims_activity_stores`;
CREATE TABLE `ims_activity_stores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `province` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `photo_list` varchar(10000) NOT NULL,
  `avg_price` int(10) unsigned NOT NULL,
  `open_time` varchar(50) NOT NULL,
  `recommend` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `offset_type` tinyint(3) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_activity_stores
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_article_case`
-- ----------------------------
DROP TABLE IF EXISTS `ims_article_case`;
CREATE TABLE `ims_article_case` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cateid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_show_home` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  `weixinh` varchar(50) NOT NULL,
  `weixintag` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `cateid` (`cateid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_article_case
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_article_category`
-- ----------------------------
DROP TABLE IF EXISTS `ims_article_category`;
CREATE TABLE `ims_article_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_article_category
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_article_link`
-- ----------------------------
DROP TABLE IF EXISTS `ims_article_link`;
CREATE TABLE `ims_article_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cateid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `siteurl` varchar(100) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_show_home` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `cateid` (`cateid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_article_link
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_article_news`
-- ----------------------------
DROP TABLE IF EXISTS `ims_article_news`;
CREATE TABLE `ims_article_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cateid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_show_home` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `cateid` (`cateid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_article_news
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_article_notice`
-- ----------------------------
DROP TABLE IF EXISTS `ims_article_notice`;
CREATE TABLE `ims_article_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cateid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_show_home` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `cateid` (`cateid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_article_notice
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_article_product`
-- ----------------------------
DROP TABLE IF EXISTS `ims_article_product`;
CREATE TABLE `ims_article_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cateid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_show_home` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `cateid` (`cateid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_article_product
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_article_unread_notice`
-- ----------------------------
DROP TABLE IF EXISTS `ims_article_unread_notice`;
CREATE TABLE `ims_article_unread_notice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `notice_id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `is_new` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `notice_id` (`notice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_article_unread_notice
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_basic_reply`
-- ----------------------------
DROP TABLE IF EXISTS `ims_basic_reply`;
CREATE TABLE `ims_basic_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `content` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_basic_reply
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_business`
-- ----------------------------
DROP TABLE IF EXISTS `ims_business`;
CREATE TABLE `ims_business` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `dist` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `lng` varchar(10) NOT NULL,
  `lat` varchar(10) NOT NULL,
  `industry1` varchar(10) NOT NULL,
  `industry2` varchar(10) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_lat_lng` (`lng`,`lat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_business
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_core_attachment`
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_attachment`;
CREATE TABLE `ims_core_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_attachment
-- ----------------------------
INSERT INTO `ims_core_attachment` VALUES ('1', '1', '1', 'u6Q77onoaH2Zb2wfQaNddON5P5Mq7y.png', 'images/1/2016/08/ONIrnnPzRVKEGEvvNVE113ahGBhHrc.png', '1', '1471315556');

-- ----------------------------
-- Table structure for `ims_core_cache`
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_cache`;
CREATE TABLE `ims_core_cache` (
  `key` varchar(50) NOT NULL,
  `value` mediumtext NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_cache
-- ----------------------------
INSERT INTO `ims_core_cache` VALUES ('setting', 'a:8:{s:9:\"copyright\";a:26:{s:6:\"status\";s:1:\"0\";s:10:\"verifycode\";N;s:6:\"reason\";s:0:\"\";s:6:\"smname\";s:21:\"人人店分销\";s:8:\"sitename\";s:39:\"微信微信营销系统\";s:3:\"url\";s:24:\"http://bbs.ideaxr.com\";s:8:\"sitehost\";s:20:\"http://bbs.ideaxr.com\";s:8:\"statcode\";s:0:\"\";s:10:\"footerleft\";s:63:\"Powered by 微信微信营销系统\";s:11:\"footerright\";s:0:\"\";s:4:\"icon\";N;s:3:\"ewm\";N;s:5:\"flogo\";s:0:\"\";s:6:\"slides\";s:2:\"N;\";s:6:\"notice\";N;s:5:\"blogo\";N;s:8:\"baidumap\";a:2:{s:3:\"lng\";s:10:\"00.00\";s:3:\"lat\";s:9:\"00.00\";}s:7:\"company\";s:36:\"中国集团\";s:7:\"address\";s:51:\"中国江苏无锡\";s:6:\"person\";s:21:\"微信分销商城\";s:5:\"phone\";s:13:\"10086\";s:2:\"qq\";s:9:\"10001\";s:5:\"email\";s:16:\"10001@qq.com\";s:8:\"keywords\";s:109:\"微信微信三级分销商城,微信,微信公众平台,公众平台二次开发,公众平台开源软件\";s:11:\"description\";s:109:\"微信微信三级分销商城,微信,微信公众平台,公众平台二次开发,公众平台开源软件\";s:12:\"showhomepage\";i:1;}s:8:\"authmode\";i:1;s:5:\"close\";a:2:{s:6:\"status\";s:1:\"0\";s:6:\"reason\";s:0:\"\";}s:8:\"register\";a:4:{s:4:\"open\";i:1;s:6:\"verify\";i:0;s:4:\"code\";i:1;s:7:\"groupid\";i:1;}s:4:\"site\";a:2:{s:3:\"key\";s:5:\"45242\";s:5:\"token\";s:32:\"4ba355db6e59d2dc96f8cf244a869def\";}s:7:\"cloudip\";a:2:{s:2:\"ip\";s:15:\"116.255.215.69\";s:6:\"expire\";i:1468071742;}s:5:\"basic\";a:1:{s:8:\"template\";s:7:\"mobapps\";}s:18:\"module_receive_ban\";a:0:{}}');
INSERT INTO `ims_core_cache` VALUES ('system_frame', 'a:5:{s:8:\"platform\";a:3:{i:0;a:2:{s:5:\"title\";s:12:\"基本功能\";s:5:\"items\";a:9:{i:0;a:5:{s:2:\"id\";s:1:\"3\";s:5:\"title\";s:12:\"文字回复\";s:3:\"url\";s:38:\"./index.php?c=platform&a=reply&m=basic\";s:15:\"permission_name\";s:20:\"platform_reply_basic\";s:6:\"append\";a:2:{s:5:\"title\";s:26:\"<i class=\"fa fa-plus\"></i>\";s:3:\"url\";s:46:\"./index.php?c=platform&a=reply&do=post&m=basic\";}}i:1;a:5:{s:2:\"id\";s:1:\"4\";s:5:\"title\";s:12:\"图文回复\";s:3:\"url\";s:37:\"./index.php?c=platform&a=reply&m=news\";s:15:\"permission_name\";s:19:\"platform_reply_news\";s:6:\"append\";a:2:{s:5:\"title\";s:26:\"<i class=\"fa fa-plus\"></i>\";s:3:\"url\";s:45:\"./index.php?c=platform&a=reply&do=post&m=news\";}}i:2;a:5:{s:2:\"id\";s:1:\"5\";s:5:\"title\";s:12:\"音乐回复\";s:3:\"url\";s:38:\"./index.php?c=platform&a=reply&m=music\";s:15:\"permission_name\";s:20:\"platform_reply_music\";s:6:\"append\";a:2:{s:5:\"title\";s:26:\"<i class=\"fa fa-plus\"></i>\";s:3:\"url\";s:46:\"./index.php?c=platform&a=reply&do=post&m=music\";}}i:3;a:5:{s:2:\"id\";s:1:\"6\";s:5:\"title\";s:12:\"图片回复\";s:3:\"url\";s:39:\"./index.php?c=platform&a=reply&m=images\";s:15:\"permission_name\";s:21:\"platform_reply_images\";s:6:\"append\";a:2:{s:5:\"title\";s:26:\"<i class=\"fa fa-plus\"></i>\";s:3:\"url\";s:47:\"./index.php?c=platform&a=reply&do=post&m=images\";}}i:4;a:5:{s:2:\"id\";s:1:\"7\";s:5:\"title\";s:12:\"语音回复\";s:3:\"url\";s:38:\"./index.php?c=platform&a=reply&m=voice\";s:15:\"permission_name\";s:20:\"platform_reply_voice\";s:6:\"append\";a:2:{s:5:\"title\";s:26:\"<i class=\"fa fa-plus\"></i>\";s:3:\"url\";s:46:\"./index.php?c=platform&a=reply&do=post&m=voice\";}}i:5;a:5:{s:2:\"id\";s:1:\"8\";s:5:\"title\";s:12:\"视频回复\";s:3:\"url\";s:38:\"./index.php?c=platform&a=reply&m=video\";s:15:\"permission_name\";s:20:\"platform_reply_video\";s:6:\"append\";a:2:{s:5:\"title\";s:26:\"<i class=\"fa fa-plus\"></i>\";s:3:\"url\";s:46:\"./index.php?c=platform&a=reply&do=post&m=video\";}}i:6;a:5:{s:2:\"id\";s:1:\"9\";s:5:\"title\";s:18:\"微信卡券回复\";s:3:\"url\";s:39:\"./index.php?c=platform&a=reply&m=wxcard\";s:15:\"permission_name\";s:21:\"platform_reply_wxcard\";s:6:\"append\";a:2:{s:5:\"title\";s:26:\"<i class=\"fa fa-plus\"></i>\";s:3:\"url\";s:47:\"./index.php?c=platform&a=reply&do=post&m=wxcard\";}}i:7;a:5:{s:2:\"id\";s:2:\"10\";s:5:\"title\";s:21:\"自定义接口回复\";s:3:\"url\";s:40:\"./index.php?c=platform&a=reply&m=userapi\";s:15:\"permission_name\";s:22:\"platform_reply_userapi\";s:6:\"append\";a:2:{s:5:\"title\";s:26:\"<i class=\"fa fa-plus\"></i>\";s:3:\"url\";s:48:\"./index.php?c=platform&a=reply&do=post&m=userapi\";}}i:8;a:4:{s:2:\"id\";s:2:\"11\";s:5:\"title\";s:12:\"系统回复\";s:3:\"url\";s:44:\"./index.php?c=platform&a=special&do=display&\";s:15:\"permission_name\";s:21:\"platform_reply_system\";}}}i:1;a:2:{s:5:\"title\";s:12:\"高级功能\";s:5:\"items\";a:6:{i:0;a:4:{s:2:\"id\";s:2:\"13\";s:5:\"title\";s:18:\"常用服务接入\";s:3:\"url\";s:43:\"./index.php?c=platform&a=service&do=switch&\";s:15:\"permission_name\";s:16:\"platform_service\";}i:1;a:4:{s:2:\"id\";s:2:\"14\";s:5:\"title\";s:15:\"自定义菜单\";s:3:\"url\";s:30:\"./index.php?c=platform&a=menu&\";s:15:\"permission_name\";s:13:\"platform_menu\";}i:2;a:4:{s:2:\"id\";s:2:\"15\";s:5:\"title\";s:18:\"特殊消息回复\";s:3:\"url\";s:44:\"./index.php?c=platform&a=special&do=message&\";s:15:\"permission_name\";s:16:\"platform_special\";}i:3;a:4:{s:2:\"id\";s:2:\"16\";s:5:\"title\";s:15:\"二维码管理\";s:3:\"url\";s:28:\"./index.php?c=platform&a=qr&\";s:15:\"permission_name\";s:11:\"platform_qr\";}i:4;a:4:{s:2:\"id\";s:2:\"17\";s:5:\"title\";s:15:\"多客服接入\";s:3:\"url\";s:39:\"./index.php?c=platform&a=reply&m=custom\";s:15:\"permission_name\";s:21:\"platform_reply_custom\";}i:5;a:4:{s:2:\"id\";s:2:\"18\";s:5:\"title\";s:18:\"长链接二维码\";s:3:\"url\";s:32:\"./index.php?c=platform&a=url2qr&\";s:15:\"permission_name\";s:15:\"platform_url2qr\";}}}i:2;a:2:{s:5:\"title\";s:12:\"数据统计\";s:5:\"items\";a:4:{i:0;a:4:{s:2:\"id\";s:2:\"20\";s:5:\"title\";s:12:\"聊天记录\";s:3:\"url\";s:41:\"./index.php?c=platform&a=stat&do=history&\";s:15:\"permission_name\";s:21:\"platform_stat_history\";}i:1;a:4:{s:2:\"id\";s:2:\"21\";s:5:\"title\";s:24:\"回复规则使用情况\";s:3:\"url\";s:38:\"./index.php?c=platform&a=stat&do=rule&\";s:15:\"permission_name\";s:18:\"platform_stat_rule\";}i:2;a:4:{s:2:\"id\";s:2:\"22\";s:5:\"title\";s:21:\"关键字命中情况\";s:3:\"url\";s:41:\"./index.php?c=platform&a=stat&do=keyword&\";s:15:\"permission_name\";s:21:\"platform_stat_keyword\";}i:3;a:4:{s:2:\"id\";s:2:\"23\";s:5:\"title\";s:6:\"参数\";s:3:\"url\";s:41:\"./index.php?c=platform&a=stat&do=setting&\";s:15:\"permission_name\";s:21:\"platform_stat_setting\";}}}}s:4:\"site\";a:3:{i:0;a:2:{s:5:\"title\";s:12:\"微站管理\";s:5:\"items\";a:3:{i:0;a:5:{s:2:\"id\";s:2:\"26\";s:5:\"title\";s:12:\"站点管理\";s:3:\"url\";s:38:\"./index.php?c=site&a=multi&do=display&\";s:15:\"permission_name\";s:18:\"site_multi_display\";s:6:\"append\";a:2:{s:5:\"title\";s:26:\"<i class=\"fa fa-plus\"></i>\";s:3:\"url\";s:35:\"./index.php?c=site&a=multi&do=post&\";}}i:1;a:4:{s:2:\"id\";s:2:\"29\";s:5:\"title\";s:12:\"模板管理\";s:3:\"url\";s:39:\"./index.php?c=site&a=style&do=template&\";s:15:\"permission_name\";s:19:\"site_style_template\";}i:2;a:4:{s:2:\"id\";s:2:\"30\";s:5:\"title\";s:18:\"模块模板扩展\";s:3:\"url\";s:37:\"./index.php?c=site&a=style&do=module&\";s:15:\"permission_name\";s:17:\"site_style_module\";}}}i:1;a:2:{s:5:\"title\";s:18:\"特殊页面管理\";s:5:\"items\";a:2:{i:0;a:4:{s:2:\"id\";s:2:\"32\";s:5:\"title\";s:12:\"会员中心\";s:3:\"url\";s:34:\"./index.php?c=site&a=editor&do=uc&\";s:15:\"permission_name\";s:14:\"site_editor_uc\";}i:1;a:5:{s:2:\"id\";s:2:\"33\";s:5:\"title\";s:12:\"专题页面\";s:3:\"url\";s:36:\"./index.php?c=site&a=editor&do=page&\";s:15:\"permission_name\";s:16:\"site_editor_page\";s:6:\"append\";a:2:{s:5:\"title\";s:26:\"<i class=\"fa fa-plus\"></i>\";s:3:\"url\";s:38:\"./index.php?c=site&a=editor&do=design&\";}}}}i:2;a:2:{s:5:\"title\";s:12:\"功能组件\";s:5:\"items\";a:2:{i:0;a:4:{s:2:\"id\";s:2:\"35\";s:5:\"title\";s:12:\"分类设置\";s:3:\"url\";s:30:\"./index.php?c=site&a=category&\";s:15:\"permission_name\";s:13:\"site_category\";}i:1;a:4:{s:2:\"id\";s:2:\"36\";s:5:\"title\";s:12:\"文章管理\";s:3:\"url\";s:29:\"./index.php?c=site&a=article&\";s:15:\"permission_name\";s:12:\"site_article\";}}}}s:2:\"mc\";a:9:{i:0;a:2:{s:5:\"title\";s:12:\"粉丝管理\";s:5:\"items\";a:2:{i:0;a:4:{s:2:\"id\";s:2:\"39\";s:5:\"title\";s:12:\"粉丝分组\";s:3:\"url\";s:28:\"./index.php?c=mc&a=fangroup&\";s:15:\"permission_name\";s:11:\"mc_fangroup\";}i:1;a:4:{s:2:\"id\";s:2:\"40\";s:5:\"title\";s:6:\"粉丝\";s:3:\"url\";s:24:\"./index.php?c=mc&a=fans&\";s:15:\"permission_name\";s:7:\"mc_fans\";}}}i:1;a:2:{s:5:\"title\";s:12:\"会员中心\";s:5:\"items\";a:3:{i:0;a:4:{s:2:\"id\";s:2:\"42\";s:5:\"title\";s:21:\"会员中心关键字\";s:3:\"url\";s:37:\"./index.php?c=platform&a=cover&do=mc&\";s:15:\"permission_name\";s:17:\"platform_cover_mc\";}i:1;a:5:{s:2:\"id\";s:2:\"43\";s:5:\"title\";s:6:\"会员\";s:3:\"url\";s:25:\"./index.php?c=mc&a=member\";s:15:\"permission_name\";s:9:\"mc_member\";s:6:\"append\";a:2:{s:5:\"title\";s:26:\"<i class=\"fa fa-plus\"></i>\";s:3:\"url\";s:32:\"./index.php?c=mc&a=member&do=add\";}}i:2;a:4:{s:2:\"id\";s:2:\"44\";s:5:\"title\";s:9:\"会员组\";s:3:\"url\";s:25:\"./index.php?c=mc&a=group&\";s:15:\"permission_name\";s:8:\"mc_group\";}}}i:2;a:2:{s:5:\"title\";s:15:\"会员卡管理\";s:5:\"items\";a:4:{i:0;a:4:{s:2:\"id\";s:2:\"46\";s:5:\"title\";s:18:\"会员卡关键字\";s:3:\"url\";s:39:\"./index.php?c=platform&a=cover&do=card&\";s:15:\"permission_name\";s:19:\"platform_cover_card\";}i:1;a:4:{s:2:\"id\";s:2:\"47\";s:5:\"title\";s:15:\"会员卡管理\";s:3:\"url\";s:33:\"./index.php?c=mc&a=card&do=manage\";s:15:\"permission_name\";s:14:\"mc_card_manage\";}i:2;a:4:{s:2:\"id\";s:2:\"48\";s:5:\"title\";s:15:\"会员卡设置\";s:3:\"url\";s:33:\"./index.php?c=mc&a=card&do=editor\";s:15:\"permission_name\";s:14:\"mc_card_editor\";}i:3;a:4:{s:2:\"id\";s:2:\"49\";s:5:\"title\";s:21:\"会员卡其他功能\";s:3:\"url\";s:32:\"./index.php?c=mc&a=card&do=other\";s:15:\"permission_name\";s:13:\"mc_card_other\";}}}i:3;a:2:{s:5:\"title\";s:12:\"积分兑换\";s:5:\"items\";a:5:{i:0;a:4:{s:2:\"id\";s:2:\"51\";s:5:\"title\";s:9:\"折扣券\";s:3:\"url\";s:32:\"./index.php?c=activity&a=coupon&\";s:15:\"permission_name\";s:23:\"activity_coupon_display\";}i:1;a:4:{s:2:\"id\";s:2:\"52\";s:5:\"title\";s:15:\"折扣券核销\";s:3:\"url\";s:59:\"./index.php?c=activity&a=consume&do=display&type=1&status=2\";s:15:\"permission_name\";s:23:\"activity_consume_coupon\";}i:2;a:4:{s:2:\"id\";s:2:\"53\";s:5:\"title\";s:9:\"代金券\";s:3:\"url\";s:30:\"./index.php?c=activity&a=token\";s:15:\"permission_name\";s:22:\"activity_token_display\";}i:3;a:4:{s:2:\"id\";s:2:\"54\";s:5:\"title\";s:15:\"代金券核销\";s:3:\"url\";s:59:\"./index.php?c=activity&a=consume&do=display&type=2&status=2\";s:15:\"permission_name\";s:22:\"activity_consume_token\";}i:4;a:4:{s:2:\"id\";s:2:\"55\";s:5:\"title\";s:12:\"真实物品\";s:3:\"url\";s:30:\"./index.php?c=activity&a=goods\";s:15:\"permission_name\";s:22:\"activity_goods_display\";}}}i:4;a:2:{s:5:\"title\";s:19:\"微信素材&群发\";s:5:\"items\";a:2:{i:0;a:4:{s:2:\"id\";s:2:\"57\";s:5:\"title\";s:13:\"素材&群发\";s:3:\"url\";s:32:\"./index.php?c=material&a=display\";s:15:\"permission_name\";s:16:\"material_display\";}i:1;a:4:{s:2:\"id\";s:2:\"58\";s:5:\"title\";s:12:\"定时群发\";s:3:\"url\";s:29:\"./index.php?c=material&a=mass\";s:15:\"permission_name\";s:13:\"material_mass\";}}}i:5;a:2:{s:5:\"title\";s:18:\"微信卡券管理\";s:5:\"items\";a:3:{i:0;a:4:{s:2:\"id\";s:2:\"60\";s:5:\"title\";s:12:\"卡券列表\";s:3:\"url\";s:35:\"./index.php?c=wechat&a=card&do=list\";s:15:\"permission_name\";s:16:\"wechat_card_list\";}i:1;a:4:{s:2:\"id\";s:2:\"61\";s:5:\"title\";s:12:\"卡券核销\";s:3:\"url\";s:30:\"./index.php?c=wechat&a=consume\";s:15:\"permission_name\";s:14:\"wechat_consume\";}i:2;a:4:{s:2:\"id\";s:2:\"62\";s:5:\"title\";s:15:\"测试白名单\";s:3:\"url\";s:36:\"./index.php?c=wechat&a=white&do=list\";s:15:\"permission_name\";s:17:\"wechat_white_list\";}}}i:6;a:2:{s:5:\"title\";s:12:\"门店管理\";s:5:\"items\";a:2:{i:0;a:4:{s:2:\"id\";s:2:\"64\";s:5:\"title\";s:12:\"门店列表\";s:3:\"url\";s:30:\"./index.php?c=activity&a=store\";s:15:\"permission_name\";s:19:\"activity_store_list\";}i:1;a:4:{s:2:\"id\";s:2:\"65\";s:5:\"title\";s:12:\"店员列表\";s:3:\"url\";s:30:\"./index.php?c=activity&a=clerk\";s:15:\"permission_name\";s:19:\"activity_clerk_list\";}}}i:7;a:2:{s:5:\"title\";s:9:\"收银台\";s:5:\"items\";a:2:{i:0;a:4:{s:2:\"id\";s:2:\"67\";s:5:\"title\";s:18:\"微信刷卡收款\";s:3:\"url\";s:40:\"./index.php?c=paycenter&a=wxmicro&do=pay\";s:15:\"permission_name\";s:21:\"paycenter_wxmicro_pay\";}i:1;a:4:{s:2:\"id\";s:2:\"68\";s:5:\"title\";s:18:\"收银台关键字\";s:3:\"url\";s:39:\"./index.php?c=platform&a=cover&do=clerk\";s:15:\"permission_name\";s:15:\"paycenter_clerk\";}}}i:8;a:2:{s:5:\"title\";s:12:\"统计中心\";s:5:\"items\";a:5:{i:0;a:4:{s:2:\"id\";s:2:\"70\";s:5:\"title\";s:18:\"会员积分统计\";s:3:\"url\";s:28:\"./index.php?c=stat&a=credit1\";s:15:\"permission_name\";s:12:\"stat_credit1\";}i:1;a:4:{s:2:\"id\";s:2:\"71\";s:5:\"title\";s:18:\"会员余额统计\";s:3:\"url\";s:28:\"./index.php?c=stat&a=credit2\";s:15:\"permission_name\";s:12:\"stat_credit2\";}i:2;a:4:{s:2:\"id\";s:2:\"72\";s:5:\"title\";s:24:\"会员现金消费统计\";s:3:\"url\";s:25:\"./index.php?c=stat&a=cash\";s:15:\"permission_name\";s:9:\"stat_cash\";}i:3;a:4:{s:2:\"id\";s:2:\"73\";s:5:\"title\";s:15:\"会员卡统计\";s:3:\"url\";s:25:\"./index.php?c=stat&a=card\";s:15:\"permission_name\";s:9:\"stat_card\";}i:4;a:4:{s:2:\"id\";s:2:\"74\";s:5:\"title\";s:21:\"收银台收款统计\";s:3:\"url\";s:30:\"./index.php?c=stat&a=paycenter\";s:15:\"permission_name\";s:14:\"stat_paycenter\";}}}}s:7:\"setting\";a:3:{i:0;a:2:{s:5:\"title\";s:15:\"公众号选项\";s:5:\"items\";a:7:{i:0;a:4:{s:2:\"id\";s:2:\"77\";s:5:\"title\";s:12:\"支付参数\";s:3:\"url\";s:32:\"./index.php?c=profile&a=payment&\";s:15:\"permission_name\";s:15:\"profile_payment\";}i:1;a:4:{s:2:\"id\";s:2:\"78\";s:5:\"title\";s:19:\"借用 oAuth 权限\";s:3:\"url\";s:37:\"./index.php?c=mc&a=passport&do=oauth&\";s:15:\"permission_name\";s:17:\"mc_passport_oauth\";}i:2;a:4:{s:2:\"id\";s:2:\"79\";s:5:\"title\";s:22:\"借用 JS 分享权限\";s:3:\"url\";s:31:\"./index.php?c=profile&a=jsauth&\";s:15:\"permission_name\";s:14:\"profile_jsauth\";}i:3;a:4:{s:2:\"id\";s:2:\"80\";s:5:\"title\";s:18:\"会员字段管理\";s:3:\"url\";s:25:\"./index.php?c=mc&a=fields\";s:15:\"permission_name\";s:9:\"mc_fields\";}i:4;a:4:{s:2:\"id\";s:2:\"81\";s:5:\"title\";s:18:\"微信通知设置\";s:3:\"url\";s:28:\"./index.php?c=mc&a=tplnotice\";s:15:\"permission_name\";s:12:\"mc_tplnotice\";}i:5;a:4:{s:2:\"id\";s:2:\"82\";s:5:\"title\";s:21:\"工作台菜单设置\";s:3:\"url\";s:32:\"./index.php?c=profile&a=deskmenu\";s:15:\"permission_name\";s:16:\"profile_deskmenu\";}i:6;a:4:{s:2:\"id\";s:2:\"83\";s:5:\"title\";s:18:\"会员扩展功能\";s:3:\"url\";s:25:\"./index.php?c=mc&a=plugin\";s:15:\"permission_name\";s:9:\"mc_plugin\";}}}i:1;a:2:{s:5:\"title\";s:21:\"会员及粉丝选项\";s:5:\"items\";a:5:{i:0;a:4:{s:2:\"id\";s:2:\"85\";s:5:\"title\";s:12:\"积分设置\";s:3:\"url\";s:26:\"./index.php?c=mc&a=credit&\";s:15:\"permission_name\";s:9:\"mc_credit\";}i:1;a:4:{s:2:\"id\";s:2:\"86\";s:5:\"title\";s:12:\"注册设置\";s:3:\"url\";s:40:\"./index.php?c=mc&a=passport&do=passport&\";s:15:\"permission_name\";s:20:\"mc_passport_passport\";}i:2;a:4:{s:2:\"id\";s:2:\"87\";s:5:\"title\";s:18:\"粉丝同步设置\";s:3:\"url\";s:36:\"./index.php?c=mc&a=passport&do=sync&\";s:15:\"permission_name\";s:16:\"mc_passport_sync\";}i:3;a:4:{s:2:\"id\";s:2:\"88\";s:5:\"title\";s:14:\"UC站点整合\";s:3:\"url\";s:22:\"./index.php?c=mc&a=uc&\";s:15:\"permission_name\";s:5:\"mc_uc\";}i:4;a:4:{s:2:\"id\";s:2:\"89\";s:5:\"title\";s:18:\"邮件通知参数\";s:3:\"url\";s:30:\"./index.php?c=profile&a=notify\";s:15:\"permission_name\";s:14:\"profile_notify\";}}}i:2;a:1:{s:5:\"title\";s:18:\"其他功能选项\";}}s:3:\"ext\";a:1:{i:0;a:2:{s:5:\"title\";s:6:\"管理\";s:5:\"items\";a:1:{i:0;a:4:{s:2:\"id\";s:2:\"93\";s:5:\"title\";s:18:\"扩展功能管理\";s:3:\"url\";s:31:\"./index.php?c=profile&a=module&\";s:15:\"permission_name\";s:14:\"profile_module\";}}}}}');
INSERT INTO `ims_core_cache` VALUES ('usersfields', 'a:52:{i:0;s:3:\"uid\";i:1;s:7:\"uniacid\";i:2;s:6:\"mobile\";i:3;s:5:\"email\";i:4;s:8:\"password\";i:5;s:4:\"salt\";i:6;s:7:\"groupid\";i:7;s:7:\"credit1\";i:8;s:7:\"credit2\";i:9;s:7:\"credit3\";i:10;s:7:\"credit4\";i:11;s:7:\"credit5\";i:12;s:7:\"credit6\";i:13;s:10:\"createtime\";i:14;s:8:\"realname\";i:15;s:8:\"nickname\";i:16;s:6:\"avatar\";i:17;s:2:\"qq\";i:18;s:3:\"vip\";i:19;s:6:\"gender\";i:20;s:9:\"birthyear\";i:21;s:10:\"birthmonth\";i:22;s:8:\"birthday\";i:23;s:13:\"constellation\";i:24;s:6:\"zodiac\";i:25;s:9:\"telephone\";i:26;s:6:\"idcard\";i:27;s:9:\"studentid\";i:28;s:5:\"grade\";i:29;s:7:\"address\";i:30;s:7:\"zipcode\";i:31;s:11:\"nationality\";i:32;s:14:\"resideprovince\";i:33;s:10:\"residecity\";i:34;s:10:\"residedist\";i:35;s:14:\"graduateschool\";i:36;s:7:\"company\";i:37;s:9:\"education\";i:38;s:10:\"occupation\";i:39;s:8:\"position\";i:40;s:7:\"revenue\";i:41;s:15:\"affectivestatus\";i:42;s:10:\"lookingfor\";i:43;s:9:\"bloodtype\";i:44;s:6:\"height\";i:45;s:6:\"weight\";i:46;s:6:\"alipay\";i:47;s:3:\"msn\";i:48;s:6:\"taobao\";i:49;s:4:\"site\";i:50;s:3:\"bio\";i:51;s:8:\"interest\";}');
INSERT INTO `ims_core_cache` VALUES ('module_receive_enable', 'a:0:{}');
INSERT INTO `ims_core_cache` VALUES ('upgrade', 'a:2:{s:7:\"upgrade\";b:0;s:10:\"lastupdate\";i:1467872061;}');
INSERT INTO `ims_core_cache` VALUES ('checkupgrade:system', 'a:1:{s:10:\"lastupdate\";i:1471586642;}');
INSERT INTO `ims_core_cache` VALUES ('modules', 'a:17:{s:5:\"basic\";a:17:{s:3:\"mid\";s:1:\"1\";s:4:\"name\";s:5:\"basic\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本文字回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:24:\"和您进行简单对话\";s:11:\"description\";s:201:\"一问一答得简单对话. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的回复内容.\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";b:0;s:7:\"handles\";b:0;s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";}s:4:\"news\";a:17:{s:3:\"mid\";s:1:\"2\";s:4:\"name\";s:4:\"news\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:24:\"基本混合图文回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:33:\"为你提供生动的图文资讯\";s:11:\"description\";s:272:\"一问一答得简单对话, 但是回复内容包括图片文字等更生动的媒体内容. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的图文回复内容.\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";b:0;s:7:\"handles\";b:0;s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";}s:5:\"music\";a:17:{s:3:\"mid\";s:1:\"3\";s:4:\"name\";s:5:\"music\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本音乐回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:39:\"提供语音、音乐等音频类回复\";s:11:\"description\";s:183:\"在回复规则中可选择具有语音、音乐等音频类的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝，实现一问一答得简单对话。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";b:0;s:7:\"handles\";b:0;s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";}s:7:\"userapi\";a:17:{s:3:\"mid\";s:1:\"4\";s:4:\"name\";s:7:\"userapi\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:21:\"自定义接口回复\";s:7:\"version\";s:3:\"1.1\";s:7:\"ability\";s:33:\"更方便的第三方接口设置\";s:11:\"description\";s:141:\"自定义接口又称第三方接口，可以让开发者更方便的接入微擎系统，高效的与微信公众平台进行对接整合。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";b:0;s:7:\"handles\";b:0;s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";}s:8:\"recharge\";a:17:{s:3:\"mid\";s:1:\"5\";s:4:\"name\";s:8:\"recharge\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:24:\"会员中心充值模块\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:24:\"提供会员充值功能\";s:11:\"description\";s:0:\"\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";b:0;s:7:\"handles\";b:0;s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";}s:6:\"custom\";a:17:{s:3:\"mid\";s:1:\"6\";s:4:\"name\";s:6:\"custom\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:15:\"多客服转接\";s:7:\"version\";s:5:\"1.0.0\";s:7:\"ability\";s:36:\"用来接入腾讯的多客服系统\";s:11:\"description\";s:0:\"\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:17:\"http://bbs.we7.cc\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:6:{i:0;s:5:\"image\";i:1;s:5:\"voice\";i:2;s:5:\"video\";i:3;s:8:\"location\";i:4;s:4:\"link\";i:5;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";}s:6:\"images\";a:17:{s:3:\"mid\";s:1:\"7\";s:4:\"name\";s:6:\"images\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本图片回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供图片回复\";s:11:\"description\";s:132:\"在回复规则中可选择具有图片的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝图片。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";b:0;s:7:\"handles\";b:0;s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";}s:5:\"video\";a:17:{s:3:\"mid\";s:1:\"8\";s:4:\"name\";s:5:\"video\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本视频回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供图片回复\";s:11:\"description\";s:132:\"在回复规则中可选择具有视频的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝视频。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";b:0;s:7:\"handles\";b:0;s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";}s:5:\"voice\";a:17:{s:3:\"mid\";s:1:\"9\";s:4:\"name\";s:5:\"voice\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本语音回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供语音回复\";s:11:\"description\";s:132:\"在回复规则中可选择具有语音的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝语音。\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";b:0;s:7:\"handles\";b:0;s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";}s:5:\"chats\";a:17:{s:3:\"mid\";s:2:\"10\";s:4:\"name\";s:5:\"chats\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"发送客服消息\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:77:\"公众号可以在粉丝最后发送消息的48小时内无限制发送消息\";s:11:\"description\";s:0:\"\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";b:0;s:7:\"handles\";b:0;s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";}s:6:\"wxcard\";a:17:{s:3:\"mid\";s:2:\"11\";s:4:\"name\";s:6:\"wxcard\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"微信卡券回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"微信卡券回复\";s:11:\"description\";s:18:\"微信卡券回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";b:0;s:7:\"handles\";b:0;s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";}s:9:\"paycenter\";a:17:{s:3:\"mid\";s:2:\"12\";s:4:\"name\";s:9:\"paycenter\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:9:\"收银台\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:9:\"收银台\";s:11:\"description\";s:9:\"收银台\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";b:0;s:7:\"handles\";b:0;s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";}s:9:\"ewei_shop\";a:17:{s:3:\"mid\";s:2:\"14\";s:4:\"name\";s:9:\"ewei_shop\";s:4:\"type\";s:8:\"business\";s:5:\"title\";s:18:\"微信分销商城\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"微信分销商城\";s:11:\"description\";s:18:\"微信分销商城\";s:6:\"author\";s:9:\"WeichengTech\";s:3:\"url\";s:21:\"http://www.v-888.com/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:1:{i:0;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:6:\"a:0:{}\";}s:16:\"feng_fightgroups\";a:17:{s:3:\"mid\";s:2:\"15\";s:4:\"name\";s:16:\"feng_fightgroups\";s:4:\"type\";s:5:\"other\";s:5:\"title\";s:15:\"微拼团商城\";s:7:\"version\";s:5:\"5.5.9\";s:7:\"ability\";s:114:\"新增优惠券，积分等功能，整个拼团功能，功能十分强大！是您不可或缺的营销利器！\";s:11:\"description\";s:231:\"设计风格一如既往的简约而不简单，拼团即是拼凑起来团购。玩法新颖独特，由队长发起团购，分享给自己的小伙伴，拉来一定数目的小伙伴一起以优惠价格来购买所需产品。\";s:6:\"author\";s:14:\"weichengtech\";s:3:\"url\";s:23:\"http://9999.v-888.com\";s:8:\"settings\";s:1:\"1\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:1:{i:0;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:2:\"N;\";}s:11:\"meepo_nsign\";a:17:{s:3:\"mid\";s:2:\"16\";s:4:\"name\";s:11:\"meepo_nsign\";s:4:\"type\";s:8:\"activity\";s:5:\"title\";s:18:\"每日积分签到\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"每日积分签到\";s:11:\"description\";s:15:\"签到得积分\";s:6:\"author\";s:14:\"weichengtech\";s:3:\"url\";s:24:\"http://8888.com/\";s:8:\"settings\";s:1:\"1\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:2:{i:0;s:4:\"text\";i:1;s:5:\"image\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:2:\"N;\";}s:13:\"feng_recharge\";a:17:{s:3:\"mid\";s:2:\"17\";s:4:\"name\";s:13:\"feng_recharge\";s:4:\"type\";s:8:\"customer\";s:5:\"title\";s:21:\"微拼团余额充值\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:21:\"微拼团余额充值\";s:11:\"description\";s:21:\"微拼团余额充值\";s:6:\"author\";s:14:\"weichengtech\";s:3:\"url\";s:24:\"http://999999.com/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:1:{i:0;s:4:\"text\";}s:7:\"handles\";a:1:{i:0;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:2:\"N;\";}s:6:\"bm_top\";a:17:{s:3:\"mid\";s:2:\"18\";s:4:\"name\";s:6:\"bm_top\";s:4:\"type\";s:8:\"business\";s:5:\"title\";s:15:\"粉丝排行榜\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:15:\"粉丝排行榜\";s:11:\"description\";s:15:\"粉丝排行榜\";s:6:\"author\";s:14:\"weicheng\";s:3:\"url\";s:24:\"http://888888.com/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:1:{i:0;s:9:\"subscribe\";}s:7:\"handles\";a:1:{i:0;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:2:\"N;\";}}');
INSERT INTO `ims_core_cache` VALUES ('unicount:1', 's:1:\"1\";');
INSERT INTO `ims_core_cache` VALUES ('tgsetting', 'a:0:{}');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_c63f0b1d52faebdb70e565393f9a13d6', 'a:0:{}');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_74d1cea9b4bb0b717d26c64287fa94e9', 's:0:\"\";');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_9a52bfbf32243c1f30edc58b89a2935a', 'a:0:{}');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_a4676ec36c0e61443f52f5bf9c711135', 'a:7:{i:0;a:13:{s:2:\"id\";s:1:\"1\";s:12:\"displayorder\";s:1:\"1\";s:8:\"identity\";s:5:\"qiniu\";s:4:\"name\";s:12:\"七牛存储\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"tool\";s:5:\"thumb\";s:45:\"../addons/ewei_shopv2/static/images/qiniu.jpg\";s:4:\"desc\";N;s:5:\"iscom\";s:1:\"1\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:1;a:13:{s:2:\"id\";s:1:\"4\";s:12:\"displayorder\";s:1:\"5\";s:8:\"identity\";s:6:\"verify\";s:4:\"name\";s:9:\"O2O核销\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:3:\"biz\";s:5:\"thumb\";s:46:\"../addons/ewei_shopv2/static/images/verify.jpg\";s:4:\"desc\";N;s:5:\"iscom\";s:1:\"1\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:2;a:13:{s:2:\"id\";s:1:\"5\";s:12:\"displayorder\";s:1:\"6\";s:8:\"identity\";s:8:\"tmessage\";s:4:\"name\";s:12:\"会员群发\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"tool\";s:5:\"thumb\";s:48:\"../addons/ewei_shopv2/static/images/tmessage.jpg\";s:4:\"desc\";N;s:5:\"iscom\";s:1:\"1\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:3;a:13:{s:2:\"id\";s:1:\"7\";s:12:\"displayorder\";s:1:\"7\";s:8:\"identity\";s:4:\"perm\";s:4:\"name\";s:12:\"分权系统\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"help\";s:5:\"thumb\";s:44:\"../addons/ewei_shopv2/static/images/perm.jpg\";s:4:\"desc\";N;s:5:\"iscom\";s:1:\"1\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:4;a:13:{s:2:\"id\";s:1:\"8\";s:12:\"displayorder\";s:1:\"8\";s:8:\"identity\";s:4:\"sale\";s:4:\"name\";s:9:\"营销宝\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"sale\";s:5:\"thumb\";s:44:\"../addons/ewei_shopv2/static/images/sale.jpg\";s:4:\"desc\";N;s:5:\"iscom\";s:1:\"1\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:5;a:13:{s:2:\"id\";s:2:\"11\";s:12:\"displayorder\";s:2:\"11\";s:8:\"identity\";s:7:\"virtual\";s:4:\"name\";s:12:\"虚拟物品\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:3:\"biz\";s:5:\"thumb\";s:47:\"../addons/ewei_shopv2/static/images/virtual.jpg\";s:4:\"desc\";N;s:5:\"iscom\";s:1:\"1\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:6;a:13:{s:2:\"id\";s:2:\"13\";s:12:\"displayorder\";s:2:\"13\";s:8:\"identity\";s:6:\"coupon\";s:4:\"name\";s:9:\"超级券\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"sale\";s:5:\"thumb\";s:46:\"../addons/ewei_shopv2/static/images/coupon.jpg\";s:4:\"desc\";N;s:5:\"iscom\";s:1:\"1\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}}');
INSERT INTO `ims_core_cache` VALUES ('unimodules::1', 'a:15:{s:5:\"basic\";a:18:{s:3:\"mid\";s:1:\"1\";s:4:\"name\";s:5:\"basic\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本文字回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:24:\"和您进行简单对话\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:4:\"news\";a:18:{s:3:\"mid\";s:1:\"2\";s:4:\"name\";s:4:\"news\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:24:\"基本混合图文回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:33:\"为你提供生动的图文资讯\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:5:\"music\";a:18:{s:3:\"mid\";s:1:\"3\";s:4:\"name\";s:5:\"music\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本音乐回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:39:\"提供语音、音乐等音频类回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:7:\"userapi\";a:18:{s:3:\"mid\";s:1:\"4\";s:4:\"name\";s:7:\"userapi\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:21:\"自定义接口回复\";s:7:\"version\";s:3:\"1.1\";s:7:\"ability\";s:33:\"更方便的第三方接口设置\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:8:\"recharge\";a:18:{s:3:\"mid\";s:1:\"5\";s:4:\"name\";s:8:\"recharge\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:24:\"会员中心充值模块\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:24:\"提供会员充值功能\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:6:\"custom\";a:18:{s:3:\"mid\";s:1:\"6\";s:4:\"name\";s:6:\"custom\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:15:\"多客服转接\";s:7:\"version\";s:5:\"1.0.0\";s:7:\"ability\";s:36:\"用来接入腾讯的多客服系统\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:17:\"http://bbs.we7.cc\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:6:{i:0;s:5:\"image\";i:1;s:5:\"voice\";i:2;s:5:\"video\";i:3;s:8:\"location\";i:4;s:4:\"link\";i:5;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:6:\"images\";a:18:{s:3:\"mid\";s:1:\"7\";s:4:\"name\";s:6:\"images\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本图片回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供图片回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:5:\"video\";a:18:{s:3:\"mid\";s:1:\"8\";s:4:\"name\";s:5:\"video\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本视频回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供图片回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:5:\"voice\";a:18:{s:3:\"mid\";s:1:\"9\";s:4:\"name\";s:5:\"voice\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本语音回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供语音回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:5:\"chats\";a:18:{s:3:\"mid\";s:2:\"10\";s:4:\"name\";s:5:\"chats\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"发送客服消息\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:77:\"公众号可以在粉丝最后发送消息的48小时内无限制发送消息\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:6:\"wxcard\";a:18:{s:3:\"mid\";s:2:\"11\";s:4:\"name\";s:6:\"wxcard\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"微信卡券回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"微信卡券回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:9:\"paycenter\";a:18:{s:3:\"mid\";s:2:\"12\";s:4:\"name\";s:9:\"paycenter\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:9:\"收银台\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:9:\"收银台\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:6:\"bm_top\";a:18:{s:3:\"mid\";s:2:\"18\";s:4:\"name\";s:6:\"bm_top\";s:4:\"type\";s:8:\"business\";s:5:\"title\";s:15:\"粉丝排行榜\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:15:\"粉丝排行榜\";s:6:\"author\";s:14:\"weichengtech\";s:3:\"url\";s:24:\"http://989899.com/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:1:{i:0;s:9:\"subscribe\";}s:7:\"handles\";a:1:{i:0;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:2:\"N;\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:8:\"mon_sign\";a:18:{s:3:\"mid\";s:2:\"19\";s:4:\"name\";s:8:\"mon_sign\";s:4:\"type\";s:5:\"other\";s:5:\"title\";s:18:\"每日积分签到\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:21:\"每日积分签到！\";s:6:\"author\";s:14:\"weichengtech\";s:3:\"url\";s:24:\"http://7878888.com/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:2:{i:0;s:9:\"subscribe\";i:1;s:11:\"unsubscribe\";}s:7:\"handles\";a:1:{i:0;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:2:\"N;\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:4:\"core\";a:4:{s:5:\"title\";s:24:\"系统事件处理模块\";s:4:\"name\";s:4:\"core\";s:8:\"issystem\";i:1;s:7:\"enabled\";i:1;}}');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_v1__new_global_plugins', 'a:24:{i:0;a:8:{s:2:\"id\";s:1:\"1\";s:12:\"displayorder\";s:1:\"1\";s:8:\"identity\";s:5:\"qiniu\";s:4:\"name\";s:12:\"七牛存储\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"tool\";}i:1;a:8:{s:2:\"id\";s:1:\"2\";s:12:\"displayorder\";s:1:\"2\";s:8:\"identity\";s:6:\"taobao\";s:4:\"name\";s:12:\"淘宝助手\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"tool\";}i:2;a:8:{s:2:\"id\";s:1:\"3\";s:12:\"displayorder\";s:1:\"3\";s:8:\"identity\";s:10:\"commission\";s:4:\"name\";s:12:\"分销系统\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:3:\"biz\";}i:3;a:8:{s:2:\"id\";s:1:\"4\";s:12:\"displayorder\";s:1:\"4\";s:8:\"identity\";s:6:\"poster\";s:4:\"name\";s:12:\"超级海报\";s:7:\"version\";s:3:\"1.2\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"sale\";}i:4;a:8:{s:2:\"id\";s:1:\"5\";s:12:\"displayorder\";s:1:\"5\";s:8:\"identity\";s:6:\"verify\";s:4:\"name\";s:9:\"O2O核销\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:3:\"biz\";}i:5;a:8:{s:2:\"id\";s:1:\"6\";s:12:\"displayorder\";s:1:\"6\";s:8:\"identity\";s:4:\"perm\";s:4:\"name\";s:12:\"分权系统\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"help\";}i:6;a:8:{s:2:\"id\";s:1:\"7\";s:12:\"displayorder\";s:1:\"7\";s:8:\"identity\";s:4:\"sale\";s:4:\"name\";s:9:\"营销宝\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"sale\";}i:7;a:8:{s:2:\"id\";s:1:\"8\";s:12:\"displayorder\";s:1:\"8\";s:8:\"identity\";s:8:\"tmessage\";s:4:\"name\";s:12:\"会员群发\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"tool\";}i:8;a:8:{s:2:\"id\";s:1:\"9\";s:12:\"displayorder\";s:1:\"9\";s:8:\"identity\";s:8:\"designer\";s:4:\"name\";s:12:\"店铺装修\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"tool\";}i:9;a:8:{s:2:\"id\";s:2:\"10\";s:12:\"displayorder\";s:2:\"10\";s:8:\"identity\";s:10:\"creditshop\";s:4:\"name\";s:12:\"积分商城\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:3:\"biz\";}i:10;a:8:{s:2:\"id\";s:2:\"11\";s:12:\"displayorder\";s:2:\"11\";s:8:\"identity\";s:7:\"virtual\";s:4:\"name\";s:12:\"虚拟物品\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:3:\"biz\";}i:11;a:8:{s:2:\"id\";s:2:\"12\";s:12:\"displayorder\";s:2:\"12\";s:8:\"identity\";s:7:\"article\";s:4:\"name\";s:12:\"文章营销\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"sale\";}i:12;a:8:{s:2:\"id\";s:2:\"13\";s:12:\"displayorder\";s:2:\"13\";s:8:\"identity\";s:6:\"coupon\";s:4:\"name\";s:9:\"超级券\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"sale\";}i:13;a:8:{s:2:\"id\";s:2:\"14\";s:12:\"displayorder\";s:2:\"14\";s:8:\"identity\";s:7:\"postera\";s:4:\"name\";s:12:\"活动海报\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"sale\";}i:14;a:8:{s:2:\"id\";s:2:\"15\";s:12:\"displayorder\";s:2:\"15\";s:8:\"identity\";s:8:\"supplier\";s:4:\"name\";s:9:\"多商家\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:3:\"biz\";}i:15;a:8:{s:2:\"id\";s:2:\"16\";s:12:\"displayorder\";s:2:\"16\";s:8:\"identity\";s:8:\"exhelper\";s:4:\"name\";s:12:\"快递助手\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"tool\";}i:16;a:8:{s:2:\"id\";s:2:\"17\";s:12:\"displayorder\";s:2:\"17\";s:8:\"identity\";s:6:\"yunpay\";s:4:\"name\";s:9:\"云支付\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:9:\"云支付\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"tool\";}i:17;a:8:{s:2:\"id\";s:2:\"18\";s:12:\"displayorder\";s:2:\"18\";s:8:\"identity\";s:7:\"diyform\";s:4:\"name\";s:15:\"自定义表单\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"help\";}i:18;a:8:{s:2:\"id\";s:2:\"19\";s:12:\"displayorder\";s:2:\"19\";s:8:\"identity\";s:6:\"system\";s:4:\"name\";s:12:\"系统工具\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"help\";}i:19;a:8:{s:2:\"id\";s:2:\"20\";s:12:\"displayorder\";s:2:\"20\";s:8:\"identity\";s:7:\"ranking\";s:4:\"name\";s:9:\"排行榜\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"help\";}i:20;a:8:{s:2:\"id\";s:2:\"21\";s:12:\"displayorder\";s:2:\"21\";s:8:\"identity\";s:6:\"choose\";s:4:\"name\";s:12:\"快速选购\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"tool\";}i:21;a:8:{s:2:\"id\";s:2:\"22\";s:12:\"displayorder\";s:2:\"22\";s:8:\"identity\";s:5:\"bonus\";s:4:\"name\";s:12:\"全球分红\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:3:\"biz\";}i:22;a:8:{s:2:\"id\";s:2:\"23\";s:12:\"displayorder\";s:2:\"23\";s:8:\"identity\";s:7:\"cashier\";s:4:\"name\";s:9:\"收银台\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:3:\"biz\";}i:23;a:8:{s:2:\"id\";s:2:\"24\";s:12:\"displayorder\";s:2:\"24\";s:8:\"identity\";s:6:\"return\";s:4:\"name\";s:12:\"消费全返\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"sale\";}}');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_09110ee6c3659ae7c87f306b6c6a8616', 'a:13:{i:0;a:13:{s:2:\"id\";s:1:\"2\";s:12:\"displayorder\";s:1:\"2\";s:8:\"identity\";s:6:\"taobao\";s:4:\"name\";s:12:\"淘宝助手\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"tool\";s:5:\"thumb\";s:46:\"../addons/ewei_shopv2/static/images/taobao.jpg\";s:4:\"desc\";s:0:\"\";s:5:\"iscom\";s:1:\"0\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:1;a:13:{s:2:\"id\";s:1:\"3\";s:12:\"displayorder\";s:1:\"3\";s:8:\"identity\";s:10:\"commission\";s:4:\"name\";s:12:\"人人分销\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:3:\"biz\";s:5:\"thumb\";s:50:\"../addons/ewei_shopv2/static/images/commission.jpg\";s:4:\"desc\";s:0:\"\";s:5:\"iscom\";s:1:\"0\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:2;a:13:{s:2:\"id\";s:1:\"6\";s:12:\"displayorder\";s:1:\"4\";s:8:\"identity\";s:6:\"poster\";s:4:\"name\";s:12:\"超级海报\";s:7:\"version\";s:3:\"1.2\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"sale\";s:5:\"thumb\";s:46:\"../addons/ewei_shopv2/static/images/poster.jpg\";s:4:\"desc\";s:0:\"\";s:5:\"iscom\";s:1:\"0\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:3;a:13:{s:2:\"id\";s:2:\"10\";s:12:\"displayorder\";s:2:\"10\";s:8:\"identity\";s:10:\"creditshop\";s:4:\"name\";s:12:\"积分商城\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:3:\"biz\";s:5:\"thumb\";s:50:\"../addons/ewei_shopv2/static/images/creditshop.jpg\";s:4:\"desc\";s:0:\"\";s:5:\"iscom\";s:1:\"0\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:4;a:13:{s:2:\"id\";s:2:\"12\";s:12:\"displayorder\";s:2:\"11\";s:8:\"identity\";s:7:\"article\";s:4:\"name\";s:12:\"文章营销\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"help\";s:5:\"thumb\";s:47:\"../addons/ewei_shopv2/static/images/article.jpg\";s:4:\"desc\";s:0:\"\";s:5:\"iscom\";s:1:\"0\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:5;a:13:{s:2:\"id\";s:2:\"14\";s:12:\"displayorder\";s:2:\"14\";s:8:\"identity\";s:7:\"postera\";s:4:\"name\";s:12:\"活动海报\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"sale\";s:5:\"thumb\";s:47:\"../addons/ewei_shopv2/static/images/postera.jpg\";s:4:\"desc\";s:0:\"\";s:5:\"iscom\";s:1:\"0\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:6;a:13:{s:2:\"id\";s:2:\"15\";s:12:\"displayorder\";s:2:\"15\";s:8:\"identity\";s:7:\"diyform\";s:4:\"name\";s:15:\"自定义表单\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"help\";s:5:\"thumb\";s:47:\"../addons/ewei_shopv2/static/images/diyform.jpg\";s:4:\"desc\";s:0:\"\";s:5:\"iscom\";s:1:\"0\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:7;a:13:{s:2:\"id\";s:2:\"17\";s:12:\"displayorder\";s:2:\"16\";s:8:\"identity\";s:8:\"exhelper\";s:4:\"name\";s:12:\"快递助手\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"help\";s:5:\"thumb\";s:48:\"../addons/ewei_shopv2/static/images/exhelper.jpg\";s:4:\"desc\";s:0:\"\";s:5:\"iscom\";s:1:\"0\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:8;a:13:{s:2:\"id\";s:2:\"18\";s:12:\"displayorder\";s:2:\"19\";s:8:\"identity\";s:6:\"groups\";s:4:\"name\";s:12:\"人人拼团\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:3:\"biz\";s:5:\"thumb\";s:46:\"../addons/ewei_shopv2/static/images/groups.jpg\";s:4:\"desc\";s:0:\"\";s:5:\"iscom\";s:1:\"0\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:9;a:13:{s:2:\"id\";s:2:\"19\";s:12:\"displayorder\";s:2:\"20\";s:8:\"identity\";s:7:\"diypage\";s:4:\"name\";s:12:\"店铺装修\";s:7:\"version\";s:3:\"2.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"help\";s:5:\"thumb\";s:48:\"../addons/ewei_shopv2/static/images/designer.jpg\";s:4:\"desc\";s:0:\"\";s:5:\"iscom\";s:1:\"0\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"0\";}i:10;a:13:{s:2:\"id\";s:2:\"20\";s:12:\"displayorder\";s:2:\"23\";s:8:\"identity\";s:5:\"merch\";s:4:\"name\";s:9:\"多商户\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:3:\"biz\";s:5:\"thumb\";s:45:\"../addons/ewei_shopv2/static/images/merch.jpg\";s:4:\"desc\";s:0:\"\";s:5:\"iscom\";s:1:\"0\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"1\";}i:11;a:13:{s:2:\"id\";s:2:\"21\";s:12:\"displayorder\";s:2:\"25\";s:8:\"identity\";s:8:\"globonus\";s:4:\"name\";s:12:\"全民股东\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:3:\"biz\";s:5:\"thumb\";s:48:\"../addons/ewei_shopv2/static/images/globonus.jpg\";s:4:\"desc\";s:0:\"\";s:5:\"iscom\";s:1:\"0\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"1\";}i:12;a:13:{s:2:\"id\";s:2:\"22\";s:12:\"displayorder\";s:2:\"26\";s:8:\"identity\";s:2:\"qa\";s:4:\"name\";s:12:\"帮助中心\";s:7:\"version\";s:3:\"1.0\";s:6:\"author\";s:6:\"官方\";s:6:\"status\";s:1:\"1\";s:8:\"category\";s:4:\"help\";s:5:\"thumb\";s:42:\"../addons/ewei_shopv2/static/images/qa.jpg\";s:4:\"desc\";s:0:\"\";s:5:\"iscom\";s:1:\"0\";s:10:\"deprecated\";s:1:\"0\";s:4:\"isv2\";s:1:\"1\";}}');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_02b72fcc49fb8916836f109352f05d59', 's:19:\"2016-08-15 11:42:26\";');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_52285de7717f2d78ca6623c56da33f82', 's:19:\"2016-08-15 11:42:27\";');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_d45488b13ce1f38aa2bba754b153037f', 's:19:\"2016-08-15 11:42:28\";');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_0911efc078ad5f1d1b9287ef20d15ac2', 's:19:\"2016-08-15 11:42:29\";');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_38220aea94c7235faf501f4f7b391b16', 's:19:\"2016-08-15 11:42:30\";');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_ea6faf4b5220ae84fad4509b6e8af8ed', 's:19:\"2016-08-15 11:42:31\";');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_7ee76e95befb5ab0960c0979fc988246', 's:5:\"false\";');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_bf1951eda8ca28abc3054f913e35e382', 'a:0:{}');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_1bdacf4a4db0600dad8a893dddfdfcad', 's:0:\"\";');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_v1__new_1_sysset', 'a:0:{}');
INSERT INTO `ims_core_cache` VALUES ('ewei_shop_v1__new_global_areas', 'a:1:{s:7:\"address\";a:1:{s:8:\"province\";a:35:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"请选择省份\";}s:4:\"city\";a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"请选择城市\";}s:6:\"county\";a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"请选择区域\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北京市\";}s:4:\"city\";a:2:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"北京辖区\";}s:6:\"county\";a:16:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东城区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"崇文区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宣武区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"朝阳区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丰台区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"石景山区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海淀区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"门头沟区\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"房山区\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"通州区\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"顺义区\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昌平区\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大兴区\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"怀柔区\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平谷区\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"北京辖县\";}s:6:\"county\";a:2:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"密云县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"延庆县\";}}}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天津市\";}s:4:\"city\";a:2:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"天津辖区\";}s:6:\"county\";a:15:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"和平区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"河东区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"河西区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南开区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"河北区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"红桥区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"塘沽区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汉沽区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大港区\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东丽区\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西青区\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"津南区\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北辰区\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武清区\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宝坻区\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"天津辖县\";}s:6:\"county\";a:3:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁河县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"静海县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"蓟县\";}}}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"河北省\";}s:4:\"city\";a:11:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"石家庄市\";}s:6:\"county\";a:24:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长安区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桥东区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桥西区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新华区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"井陉矿区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"裕华区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"井陉县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"正定县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"栾城县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"行唐县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"灵寿县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高邑县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"深泽县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"赞皇县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"无极县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平山县\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"元氏县\";}}i:18;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"赵县\";}}i:19;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"辛集市\";}}i:20;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"藁城市\";}}i:21;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"晋州市\";}}i:22;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新乐市\";}}i:23;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鹿泉市\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"唐山市\";}s:6:\"county\";a:15:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"路南区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"路北区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"古冶区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"开平区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丰南区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丰润区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"滦县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"滦南县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乐亭县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"迁西县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"玉田县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"唐海县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"遵化市\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"迁安市\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"秦皇岛市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海港区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"山海关区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"北戴河区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"青龙满族自治县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昌黎县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"抚宁县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"卢龙县\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邯郸市\";}s:6:\"county\";a:20:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邯山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丛台区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"复兴区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"峰峰矿区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邯郸县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临漳县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"成安县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大名县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"涉县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"磁县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"肥乡县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永年县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"邱县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鸡泽县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广平县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"馆陶县\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"魏县\";}}i:18;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"曲周县\";}}i:19;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武安市\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邢台市\";}s:6:\"county\";a:20:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桥东区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桥西区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邢台县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临城县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"内丘县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"柏乡县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"隆尧县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"任县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南和县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁晋县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巨鹿县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新河县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广宗县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平乡县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"威县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"清河县\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临西县\";}}i:18;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南宫市\";}}i:19;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沙河市\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"保定市\";}s:6:\"county\";a:26:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新市区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北市区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南市区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"满城县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"清苑县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"涞水县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阜平县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"徐水县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"定兴县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"唐县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高阳县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"容城县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"涞源县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"望都县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安新县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"易县\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"曲阳县\";}}i:18;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"蠡县\";}}i:19;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"顺平县\";}}i:20;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"博野县\";}}i:21;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"雄县\";}}i:22;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"涿州市\";}}i:23;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"定州市\";}}i:24;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安国市\";}}i:25;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"高碑店市\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"张家口市\";}s:6:\"county\";a:18:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桥东区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桥西区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宣化区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"下花园区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宣化县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"张北县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"康保县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沽源县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"尚义县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"蔚县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阳原县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"怀安县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"万全县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"怀来县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"涿鹿县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"赤城县\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"崇礼县\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"承德市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"双桥区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"双滦区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"鹰手营子矿区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"承德县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴隆县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平泉县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"滦平县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"隆化县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"丰宁满族自治县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"宽城满族自治县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"围场满族蒙古族自治县\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沧州市\";}s:6:\"county\";a:17:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新华区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"运河区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"沧县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"青县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东光县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海兴县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盐山县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"肃宁县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南皮县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吴桥县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"献县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"孟村回族自治县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泊头市\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"任丘市\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黄骅市\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"河间市\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"廊坊市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安次区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广阳区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"固安县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永清县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"香河县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大城县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"文安县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"大厂回族自治县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"霸州市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"三河市\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"衡水市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桃城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"枣强县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武邑县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武强县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"饶阳县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安平县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"故城县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"景县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阜城县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"冀州市\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"深州市\";}}}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"山西省\";}s:4:\"city\";a:11:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"太原市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"小店区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"迎泽区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"杏花岭区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"尖草坪区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"万柏林区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"晋源区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"清徐县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阳曲县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"娄烦县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"古交市\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大同市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"矿区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南郊区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新荣区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阳高县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天镇县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广灵县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"灵丘县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"浑源县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"左云县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大同县\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阳泉市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"矿区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"郊区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平定县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"盂县\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长治市\";}s:6:\"county\";a:14:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"郊区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长治县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"襄垣县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"屯留县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平顺县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黎城县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"壶关县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长子县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武乡县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"沁县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沁源县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"潞城市\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"晋城市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沁水县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阳城县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"陵川县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泽州县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高平市\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"朔州市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"朔城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平鲁区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"山阴县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"应县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"右玉县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"怀仁县\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"晋中市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"榆次区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"榆社县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"左权县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"和顺县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昔阳县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"寿阳县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"太谷县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"祁县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平遥县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"灵石县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"介休市\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"运城市\";}s:6:\"county\";a:14:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盐湖区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临猗县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"万荣县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"闻喜县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"稷山县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新绛县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"绛县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"垣曲县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"夏县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平陆县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"芮城县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永济市\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"河津市\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"忻州市\";}s:6:\"county\";a:15:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"忻府区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"定襄县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"五台县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"代县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"繁峙县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁武县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"静乐县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"神池县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"五寨县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岢岚县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"河曲县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"保德县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"偏关县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"原平市\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临汾市\";}s:6:\"county\";a:18:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"尧都区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"曲沃县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"翼城县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"襄汾县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洪洞县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"古县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安泽县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"浮山县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"吉县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乡宁县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大宁县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"隰县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永和县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"蒲县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汾西县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"侯马市\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"霍州市\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吕梁市\";}s:6:\"county\";a:14:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"离石区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"文水县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"交城县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"兴县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"临县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"柳林县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"石楼县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"岚县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"方山县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"中阳县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"交口县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"孝义市\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汾阳市\";}}}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"内蒙古区\";}s:4:\"city\";a:12:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"呼和浩特市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"回民区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"玉泉区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"赛罕区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"土默特左旗\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"托克托县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"和林格尔县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"清水河县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武川县\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"包头市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东河区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"昆都仑区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"青山区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"石拐区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"白云矿区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"九原区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"土默特右旗\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"固阳县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:27:\"达尔罕茂明安联合旗\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乌海市\";}s:6:\"county\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"海勃湾区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海南区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乌达区\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"赤峰市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"红山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"元宝山区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"松山区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"阿鲁科尔沁旗\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"巴林左旗\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"巴林右旗\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"林西县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"克什克腾旗\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"翁牛特旗\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"喀喇沁旗\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁城县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"敖汉旗\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"通辽市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"科尔沁区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"科尔沁左翼中旗\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"科尔沁左翼后旗\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"开鲁县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"库伦旗\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"奈曼旗\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"扎鲁特旗\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"霍林郭勒市\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"鄂尔多斯市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东胜区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"达拉特旗\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"准格尔旗\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"鄂托克前旗\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"鄂托克旗\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"杭锦旗\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乌审旗\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"伊金霍洛旗\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"呼伦贝尔市\";}s:6:\"county\";a:14:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"海拉尔区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阿荣旗\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:33:\"莫力达瓦达斡尔族自治旗\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"鄂伦春自治旗\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"鄂温克族自治旗\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"陈巴尔虎旗\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"新巴尔虎左旗\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"新巴尔虎右旗\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"满洲里市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"牙克石市\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"扎兰屯市\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"额尔古纳市\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"根河市\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"巴彦淖尔市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临河区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"五原县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"磴口县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"乌拉特前旗\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"乌拉特中旗\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"乌拉特后旗\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"杭锦后旗\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"乌兰察布市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"集宁区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"卓资县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"化德县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"商都县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴和县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凉城县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"察哈尔右翼前旗\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"察哈尔右翼中旗\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"察哈尔右翼后旗\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"四子王旗\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丰镇市\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴安盟\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"乌兰浩特市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"阿尔山市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"科尔沁右翼前旗\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"科尔沁右翼中旗\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"扎赉特旗\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"突泉县\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"锡林郭勒盟\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"二连浩特市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"锡林浩特市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"阿巴嘎旗\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"苏尼特左旗\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"苏尼特右旗\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"东乌珠穆沁旗\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"西乌珠穆沁旗\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"太仆寺旗\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"镶黄旗\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"正镶白旗\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"正蓝旗\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"多伦县\";}}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"阿拉善盟\";}s:6:\"county\";a:3:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"阿拉善左旗\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"阿拉善右旗\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"额济纳旗\";}}}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"辽宁省\";}s:4:\"city\";a:14:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沈阳市\";}s:6:\"county\";a:14:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"和平区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沈河区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大东区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"皇姑区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铁西区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"苏家屯区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东陵区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"新城子区\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"于洪区\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"辽中县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"康平县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"法库县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新民市\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大连市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"中山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西岗区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"沙河口区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"甘井子区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"旅顺口区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金州区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长海县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"瓦房店市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"普兰店市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"庄河市\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鞍山市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铁东区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铁西区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"立山区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"千山区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"台安县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"岫岩满族自治县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海城市\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"抚顺市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新抚区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东洲区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"望花区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"顺城区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"抚顺县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"新宾满族自治县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"清原满族自治县\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"本溪市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"溪湖区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"明山区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南芬区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"本溪满族自治县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"桓仁满族自治县\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丹东市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"元宝区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"振兴区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"振安区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"宽甸满族自治县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东港市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凤城市\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"锦州市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"古塔区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凌河区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"太和区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黑山县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"义县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凌海市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北宁市\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"营口市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"站前区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西市区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"鲅鱼圈区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"老边区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盖州市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"大石桥市\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阜新市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新邱区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"太平区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"清河门区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"细河区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"阜新蒙古族自治县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"彰武县\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"辽阳市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"白塔区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"文圣区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宏伟区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"弓长岭区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"太子河区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"辽阳县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"灯塔市\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盘锦市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"双台子区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"兴隆台区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大洼县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盘山县\";}}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铁岭市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"银州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"清河区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铁岭县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西丰县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昌图县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"调兵山市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"开原市\";}}}}i:12;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"朝阳市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"双塔区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙城区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"朝阳县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"建平县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:33:\"喀喇沁左翼蒙古族自治县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北票市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凌源市\";}}}}i:13;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"葫芦岛市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"连山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙港区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南票区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"绥中县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"建昌县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴城市\";}}}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吉林省\";}s:4:\"city\";a:9:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长春市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南关区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宽城区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"朝阳区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"二道区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"绿园区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"双阳区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"农安县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"九台市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"榆树市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"德惠市\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吉林市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昌邑区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙潭区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"船营区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丰满区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永吉县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蛟河市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桦甸市\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"舒兰市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"磐石市\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"四平市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铁西区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铁东区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"梨树县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"伊通满族自治县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"公主岭市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"双辽市\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"辽源市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西安区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东丰县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东辽县\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"通化市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东昌区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"二道江区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"通化县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"辉南县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"柳河县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"梅河口市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"集安市\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"白山市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"八道江区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"抚松县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"靖宇县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"长白朝鲜族自治县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江源县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临江市\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"松原市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁江区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:33:\"前郭尔罗斯蒙古族自治县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长岭县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乾安县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"扶余县\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"白城市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洮北区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"镇赉县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"通榆县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洮南市\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大安市\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"延边自治州\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"延吉市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"图们市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"敦化市\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"珲春市\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙井市\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"和龙市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汪清县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安图县\";}}}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"黑龙江省\";}s:4:\"city\";a:13:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"哈尔滨市\";}s:6:\"county\";a:20:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"道里区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南岗区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"道外区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"香坊区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"动力区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平房区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"松北区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"呼兰区\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"依兰县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"方正县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"宾县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巴彦县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"木兰县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"通河县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"延寿县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阿城市\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"双城市\";}}i:18;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"尚志市\";}}i:19;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"五常市\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"齐齐哈尔市\";}s:6:\"county\";a:17:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙沙区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"建华区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铁锋区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"昂昂溪区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"富拉尔基区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"碾子山区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"梅里斯达斡尔族区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙江县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"依安县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泰来县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"甘南县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"富裕县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"克山县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"克东县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"拜泉县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"讷河市\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鸡西市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鸡冠区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"恒山区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"滴道区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"梨树区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"城子河区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"麻山区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鸡东县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"虎林市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"密山市\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鹤岗市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"向阳区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"工农区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南山区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴安区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东山区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴山区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"萝北县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"绥滨县\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"双鸭山市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"尖山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岭东区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"四方台区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宝山区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"集贤县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"友谊县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宝清县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"饶河县\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大庆市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"萨尔图区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙凤区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"让胡路区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"红岗区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大同区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"肇州县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"肇源县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"林甸县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"杜尔伯特蒙古族自治县\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"伊春市\";}s:6:\"county\";a:18:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"伊春区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南岔区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"友好区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西林区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"翠峦区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新青区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"美溪区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"金山屯区\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"五营区\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"乌马河区\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"汤旺河区\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"带岭区\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"乌伊岭区\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"红星区\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"上甘岭区\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"嘉荫县\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铁力市\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"佳木斯市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永红区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"向阳区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"前进区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东风区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"郊区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桦南县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桦川县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汤原县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"抚远县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"同江市\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"富锦市\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"七台河市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新兴区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桃山区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"茄子河区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"勃利县\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"牡丹江市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东安区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阳明区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"爱民区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西安区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东宁县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"林口县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"绥芬河市\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海林市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁安市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"穆棱市\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黑河市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"爱辉区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"嫩江县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"逊克县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"孙吴县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北安市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"五大连池市\";}}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"绥化市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北林区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"望奎县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兰西县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"青冈县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"庆安县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"明水县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"绥棱县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安达市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"肇东市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海伦市\";}}}}i:12;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"大兴安岭地区\";}s:6:\"county\";a:3:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"呼玛县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"塔河县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"漠河县\";}}}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"上海市\";}s:4:\"city\";a:2:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"上海辖区\";}s:6:\"county\";a:18:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黄浦区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"卢湾区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"徐汇区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长宁区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"静安区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"普陀区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"闸北区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"虹口区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"杨浦区\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"闵行区\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宝山区\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"嘉定区\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"浦东新区\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金山区\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"松江区\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"青浦区\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南汇区\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"奉贤区\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"上海辖县\";}s:6:\"county\";a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"崇明县\";}}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江苏省\";}s:4:\"city\";a:13:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南京市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"玄武区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"秦淮区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"建邺区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鼓楼区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"浦口区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"六合区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"栖霞区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"雨花台区\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江宁区\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"溧水县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高淳县\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"无锡市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"崇安区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南长区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北塘区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"锡山区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"惠山区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"滨湖区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江阴市\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宜兴市\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"徐州市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鼓楼区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"云龙区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"九里区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"贾汪区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泉山区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"丰县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"沛县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铜山县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"睢宁县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新沂市\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邳州市\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"常州市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天宁区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"钟楼区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"戚墅堰区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新北区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武进区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"溧阳市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金坛市\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"苏州市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"姑苏区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"虎丘区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吴中区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"相城区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吴江区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"常熟市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昆山市\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"太仓市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"张家港市\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南通市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"崇川区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"港闸区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海安县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"如东县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"启东市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"如皋市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"通州市\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海门市\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"连云港市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"连云区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新浦区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海州区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"赣榆县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东海县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"灌云县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"灌南县\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"淮安市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"清河区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"楚州区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"淮阴区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"清浦区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"涟水县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洪泽县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盱眙县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金湖县\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盐城市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"亭湖区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盐都区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"响水县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"滨海县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阜宁县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"射阳县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"建湖县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东台市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大丰市\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"扬州市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广陵区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邗江区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"郊区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宝应县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"仪征市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高邮市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江都市\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"镇江市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"京口区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"润州区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丹徒区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丹阳市\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"扬中市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"句容市\";}}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泰州市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海陵区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高港区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴化市\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"靖江市\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泰兴市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"姜堰市\";}}}}i:12;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宿迁市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宿城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宿豫区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沭阳县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泗阳县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泗洪县\";}}}}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"浙江省\";}s:4:\"city\";a:11:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"杭州市\";}s:6:\"county\";a:14:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"上城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"下城区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江干区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"拱墅区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西湖区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"滨江区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"萧山区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"余杭区\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桐庐县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"淳安县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"建德市\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"富阳市\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临安市\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁波市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海曙区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江东区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江北区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北仑区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"镇海区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鄞州区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"象山县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁海县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"余姚市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"慈溪市\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"奉化市\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"温州市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鹿城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙湾区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"瓯海区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洞头县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永嘉县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平阳县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"苍南县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"文成县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泰顺县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"瑞安市\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乐清市\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"嘉兴市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南湖区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"秀洲区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"嘉善县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海盐县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海宁市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平湖市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桐乡市\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湖州市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吴兴区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南浔区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"德清县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长兴县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安吉县\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"绍兴市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"越城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"绍兴县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新昌县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"诸暨市\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"上虞市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"嵊州市\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金华市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"婺城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金东区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武义县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"浦江县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"磐安县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兰溪市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"义乌市\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东阳市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永康市\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"衢州市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"柯城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"衢江区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"常山县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"开化县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙游县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江山市\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"舟山市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"定海区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"普陀区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岱山县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"嵊泗县\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"台州市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"椒江区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黄岩区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"路桥区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"玉环县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"三门县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天台县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"仙居县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"温岭市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临海市\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丽水市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"莲都区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"青田县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"缙云县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"遂昌县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"松阳县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"云和县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"庆元县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"景宁畲族自治县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙泉市\";}}}}}}i:12;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安徽省\";}s:4:\"city\";a:17:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"合肥市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"瑶海区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"庐阳区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蜀山区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"包河区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长丰县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"肥东县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"肥西县\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"芜湖市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"镜湖区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"马塘区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新芜区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鸠江区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"芜湖县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"繁昌县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南陵县\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蚌埠市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"龙子湖区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蚌山区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"禹会区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"淮上区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"怀远县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"五河县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"固镇县\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"淮南市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大通区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"田家庵区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"谢家集区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"八公山区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"潘集区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凤台县\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"马鞍山市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"金家庄区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"花山区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"雨山区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"当涂县\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"淮北市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"杜集区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"相山区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"烈山区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"濉溪县\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铜陵市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"铜官山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"狮子山区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"郊区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铜陵县\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安庆市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"迎江区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大观区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"郊区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"怀宁县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"枞阳县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"潜山县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"太湖县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宿松县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"望江县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岳西县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桐城市\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黄山市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"屯溪区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黄山区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"徽州区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"歙县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"休宁县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"黟县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"祁门县\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"滁州市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"琅琊区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南谯区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"来安县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"全椒县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"定远县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凤阳县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天长市\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"明光市\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阜阳市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"颍州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"颍东区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"颍泉区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临泉县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"太和县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阜南县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"颍上县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"界首市\";}}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宿州市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"墉桥区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"砀山县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"萧县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"灵璧县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"泗县\";}}}}i:12;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巢湖市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"居巢区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"庐江县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"无为县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"含山县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"和县\";}}}}i:13;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"六安市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金安区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"裕安区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"寿县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"霍邱县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"舒城县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金寨县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"霍山县\";}}}}i:14;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"亳州市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"谯城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"涡阳县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蒙城县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"利辛县\";}}}}i:15;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"池州市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"贵池区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东至县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"石台县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"青阳县\";}}}}i:16;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宣城市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宣州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"郎溪县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广德县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"泾县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"绩溪县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"旌德县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁国市\";}}}}}}i:13;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"福建省\";}s:4:\"city\";a:9:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"福州市\";}s:6:\"county\";a:14:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鼓楼区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"台江区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"仓山区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"马尾区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"晋安区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"闽侯县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"连江县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"罗源县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"闽清县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永泰县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平潭县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"福清市\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长乐市\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"厦门市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"思明区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海沧区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湖里区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"集美区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"同安区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"翔安区\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"莆田市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"城厢区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"涵江区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"荔城区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"秀屿区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"仙游县\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"三明市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"梅列区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"三元区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"明溪县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"清流县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁化县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大田县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"尤溪县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"沙县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"将乐县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泰宁县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"建宁县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永安市\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泉州市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鲤城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丰泽区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洛江区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泉港区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"惠安县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安溪县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永春县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"德化县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金门县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"石狮市\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"晋江市\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南安市\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"漳州市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"芗城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙文区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"云霄县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"漳浦县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"诏安县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长泰县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东山县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南靖县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平和县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"华安县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙海市\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南平市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"延平区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"顺昌县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"浦城县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"光泽县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"松溪县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"政和县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邵武市\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"武夷山市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"建瓯市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"建阳市\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙岩市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新罗区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长汀县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永定县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"上杭县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武平县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"连城县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"漳平市\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁德市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蕉城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"霞浦县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"古田县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"屏南县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"寿宁县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"周宁县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"柘荣县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"福安市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"福鼎市\";}}}}}}i:14;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江西省\";}s:4:\"city\";a:11:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南昌市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东湖区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西湖区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"青云谱区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湾里区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"青山湖区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南昌县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新建县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安义县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"进贤县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"红谷滩新区\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"景德镇市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昌江区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"珠山区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"浮梁县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乐平市\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"萍乡市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安源区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湘东区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"莲花县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"上栗县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"芦溪县\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"九江市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"庐山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"浔阳区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"九江县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武宁县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"修水县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永修县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"德安县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"星子县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"都昌县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湖口县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"彭泽县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"瑞昌市\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新余市\";}s:6:\"county\";a:3:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"渝水区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"分宜县\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鹰潭市\";}s:6:\"county\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"月湖区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"余江县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"贵溪市\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"赣州市\";}s:6:\"county\";a:19:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"章贡区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"赣县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"信丰县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大余县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"上犹县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"崇义县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安远县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙南县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"定南县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"全南县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁都县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"于都县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴国县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"会昌县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"寻乌县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"石城县\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"瑞金市\";}}i:18;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南康市\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吉安市\";}s:6:\"county\";a:14:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吉州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"青原区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吉安县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吉水县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"峡江县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新干县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永丰县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泰和县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"遂川县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"万安县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安福县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永新县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"井冈山市\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宜春市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"袁州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"奉新县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"万载县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"上高县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宜丰县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"靖安县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铜鼓县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丰城市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"樟树市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高安市\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"抚州市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临川区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南城县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黎川县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南丰县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"崇仁县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乐安县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宜黄县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金溪县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"资溪县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东乡县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广昌县\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"上饶市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"信州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"上饶县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广丰县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"玉山县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铅山县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"横峰县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"弋阳县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"余干县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鄱阳县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"万年县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"婺源县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"德兴市\";}}}}}}i:15;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"山东省\";}s:4:\"city\";a:17:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"济南市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"历下区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市中区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"槐荫区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天桥区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"历城区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长清区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平阴县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"济阳县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"商河县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"章丘市\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"青岛市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市南区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市北区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"四方区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黄岛区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"崂山区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"李沧区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"城阳区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"胶州市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"即墨市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平度市\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"胶南市\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"莱西市\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"淄博市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"淄川区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"张店区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"博山区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临淄区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"周村区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桓台县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高青县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沂源县\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"枣庄市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市中区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"薛城区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"峄城区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"台儿庄区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"山亭区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"滕州市\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东营市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东营区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"河口区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"垦利县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"利津县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广饶县\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"烟台市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"芝罘区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"福山区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"牟平区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"莱山区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长岛县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙口市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"莱阳市\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"莱州市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蓬莱市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"招远市\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"栖霞市\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海阳市\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"潍坊市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"潍城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"寒亭区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"坊子区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"奎文区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临朐县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昌乐县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"青州市\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"诸城市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"寿光市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安丘市\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高密市\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昌邑市\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"济宁市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市中区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"任城区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"微山县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鱼台县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金乡县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"嘉祥县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汶上县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泗水县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"梁山县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"曲阜市\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兖州市\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邹城市\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泰安市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泰山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岱岳区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁阳县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东平县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新泰市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"肥城市\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"威海市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"环翠区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"文登市\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"荣成市\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乳山市\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"日照市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东港区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岚山区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"五莲县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"莒县\";}}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"莱芜市\";}s:6:\"county\";a:3:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"莱城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"钢城区\";}}}}i:12;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临沂市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兰山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"罗庄区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"河东区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沂南县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"郯城县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沂水县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"苍山县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"费县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平邑县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"莒南县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蒙阴县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临沭县\";}}}}i:13;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"德州市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"德城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"陵县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁津县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"庆云县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临邑县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"齐河县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平原县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"夏津县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武城县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乐陵市\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"禹城市\";}}}}i:14;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"聊城市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"东昌府区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阳谷县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"莘县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"茌平县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东阿县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"冠县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高唐县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临清市\";}}}}i:15;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"滨州市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"滨城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"惠民县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阳信县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"无棣县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沾化县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"博兴县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邹平县\";}}}}i:16;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"菏泽市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"牡丹区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"曹县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"单县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"成武县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巨野县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"郓城县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鄄城县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"定陶县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东明县\";}}}}}}i:16;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"河南省\";}s:4:\"city\";a:20:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"郑州市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"中原区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"二七区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"管城回族区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金水区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"上街区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"惠济区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"中牟县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巩义市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"荥阳市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新密市\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新郑市\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"登封市\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"开封市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙亭区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"顺河回族区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鼓楼区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南关区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"郊区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"杞县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"通许县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"尉氏县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"开封县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兰考县\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洛阳市\";}s:6:\"county\";a:16:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"老城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西工区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"廛河回族区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"涧西区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吉利区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洛龙区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"孟津县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新安县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"栾川县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"嵩县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汝阳县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宜阳县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洛宁县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"伊川县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"偃师市\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"平顶山市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新华区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"卫东区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"石龙区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湛河区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宝丰县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"叶县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鲁山县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"郏县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"舞钢市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汝州市\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安阳市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"文峰区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北关区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"殷都区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙安区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安阳县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汤阴县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"滑县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"内黄县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"林州市\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鹤壁市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鹤山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"山城区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"淇滨区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"浚县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"淇县\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新乡市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"红旗区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"卫滨区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凤泉区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"牧野区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新乡县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"获嘉县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"原阳县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"延津县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"封丘县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长垣县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"卫辉市\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"辉县市\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"焦作市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"解放区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"中站区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"马村区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"山阳区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"修武县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"博爱县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武陟县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"温县\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"济源市\";}s:6:\"county\";a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沁阳市\";}s:6:\"county\";a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"孟州市\";}s:6:\"county\";a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"濮阳市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"华龙区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"清丰县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南乐县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"范县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"台前县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"濮阳县\";}}}}i:12;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"许昌市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"魏都区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"许昌县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鄢陵县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"襄城县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"禹州市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长葛市\";}}}}i:13;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"漯河市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"源汇区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"郾城区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"召陵区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"舞阳县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临颍县\";}}}}i:14;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"三门峡市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湖滨区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"渑池县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"陕县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"卢氏县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"义马市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"灵宝市\";}}}}i:15;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南阳市\";}s:6:\"county\";a:14:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宛城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"卧龙区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南召县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"方城县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西峡县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"镇平县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"内乡县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"淅川县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"社旗县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"唐河县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新野县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桐柏县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邓州市\";}}}}i:16;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"商丘市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"梁园区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"睢阳区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"民权县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"睢县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁陵县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"柘城县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"虞城县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"夏邑县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永城市\";}}}}i:17;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"信阳市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"师河区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平桥区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"罗山县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"光山县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"新县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"商城县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"固始县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"潢川县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"淮滨县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"息县\";}}}}i:18;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"周口市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"川汇区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"扶沟县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西华县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"商水县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沈丘县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"郸城县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"淮阳县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"太康县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鹿邑县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"项城市\";}}}}i:19;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"驻马店市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"驿城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西平县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"上蔡县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平舆县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"正阳县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"确山县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泌阳县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汝南县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"遂平县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新蔡县\";}}}}}}i:17;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湖北省\";}s:4:\"city\";a:14:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武汉市\";}s:6:\"county\";a:14:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江岸区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江汉区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乔口区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汉阳区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武昌区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"青山区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洪山区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"东西湖区\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汉南区\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蔡甸区\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江夏区\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黄陂区\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新洲区\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黄石市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"黄石港区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"西塞山区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"下陆区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铁山区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阳新县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大冶市\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"十堰市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"茅箭区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"张湾区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"郧县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"郧西县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"竹山县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"竹溪县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"房县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"丹江口市\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宜昌市\";}s:6:\"county\";a:14:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西陵区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"伍家岗区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"点军区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"猇亭区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"夷陵区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"远安县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴山县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"秭归县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"长阳土家族自治县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"五峰土家族自治县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宜都市\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"当阳市\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"枝江市\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"襄阳市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"襄城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"樊城区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"襄阳区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南漳县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"谷城县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"保康县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"老河口市\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"枣阳市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宜城市\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鄂州市\";}s:6:\"county\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"梁子湖区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"华容区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鄂城区\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"荆门市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东宝区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"掇刀区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"京山县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沙洋县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"钟祥市\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"孝感市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"孝南区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"孝昌县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大悟县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"云梦县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"应城市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安陆市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汉川市\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"荆州市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沙市区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"荆州区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"公安县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"监利县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江陵县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"石首市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洪湖市\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"松滋市\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黄冈市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黄州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"团风县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"红安县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"罗田县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"英山县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"浠水县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蕲春县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黄梅县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"麻城市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武穴市\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"咸宁市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"咸安区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"嘉鱼县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"通城县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"崇阳县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"通山县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"赤壁市\";}}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"随州市\";}s:6:\"county\";a:3:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"曾都区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广水市\";}}}}i:12;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"恩施自治州\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"恩施市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"利川市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"建始县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巴东县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宣恩县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"咸丰县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"来凤县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鹤峰县\";}}}}i:13;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"湖北省辖单位\";}s:6:\"county\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"仙桃市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"潜江市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天门市\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"神农架林区\";}}}}}}i:18;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湖南省\";}s:4:\"city\";a:14:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长沙市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"芙蓉区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天心区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岳麓区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"开福区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"雨花区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长沙县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"望城县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁乡县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"浏阳市\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"株洲市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"荷塘区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"芦淞区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"石峰区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天元区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"株洲县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"攸县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"茶陵县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"炎陵县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"醴陵市\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湘潭市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"雨湖区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岳塘区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湘潭县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湘乡市\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"韶山市\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"衡阳市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"珠晖区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"雁峰区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"石鼓区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蒸湘区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南岳区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"衡阳县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"衡南县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"衡山县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"衡东县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"祁东县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"耒阳市\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"常宁市\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邵阳市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"双清区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大祥区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北塔区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邵东县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新邵县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邵阳县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"隆回县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洞口县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"绥宁县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新宁县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"城步苗族自治县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武冈市\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岳阳市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"岳阳楼区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"云溪区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"君山区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岳阳县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"华容县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湘阴县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平江县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汨罗市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临湘市\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"常德市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武陵区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鼎城区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安乡县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汉寿县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"澧县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临澧县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桃源县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"石门县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"津市市\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"张家界市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永定区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"武陵源区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"慈利县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桑植县\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"益阳市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"资阳区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"赫山区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"南县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桃江县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安化县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沅江市\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"郴州市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北湖区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"苏仙区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桂阳县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宜章县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永兴县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"嘉禾县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临武县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汝城县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桂东县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安仁县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"资兴市\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永州市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"芝山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"冷水滩区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"祁阳县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东安县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"双牌县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"道县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江永县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁远县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蓝山县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"狗扑资源社区县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"江华瑶族自治县\";}}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"怀化市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鹤城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"中方县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沅陵县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"辰溪县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"溆浦县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"会同县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"麻阳苗族自治县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"新晃侗族自治县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"芷江侗族自治县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:27:\"靖州苗族侗族自治县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"通道侗族自治县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洪江市\";}}}}i:12;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"娄底市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"娄星区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"双峰县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新化县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"冷水江市\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"涟源市\";}}}}i:13;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"湘西自治州\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吉首市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泸溪县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凤凰县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"花垣县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"保靖县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"古丈县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永顺县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙山县\";}}}}}}i:19;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广东省\";}s:4:\"city\";a:21:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广州市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"荔湾区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"越秀区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海珠区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天河区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"芳村区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"白云区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黄埔区\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"番禺区\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"花都区\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"增城市\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"从化市\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"韶关市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武江区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"浈江区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"曲江区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"始兴县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"仁化县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"翁源县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"乳源瑶族自治县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新丰县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乐昌市\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南雄市\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"深圳市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"罗湖区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"福田区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南山区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宝安区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙岗区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盐田区\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"珠海市\";}s:6:\"county\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"香洲区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"斗门区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金湾区\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汕头市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙湖区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金平区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"濠江区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"潮阳区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"潮南区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"澄海区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南澳县\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"佛山市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"禅城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南海区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"顺德区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"三水区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高明区\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江门市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蓬江区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江海区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新会区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"台山市\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"开平市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鹤山市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"恩平市\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湛江市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"赤坎区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"霞山区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"坡头区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"麻章区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"遂溪县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"徐闻县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"廉江市\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"雷州市\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吴川市\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"茂名市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"茂南区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"茂港区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"电白县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高州市\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"化州市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"信宜市\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"肇庆市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"端州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鼎湖区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广宁县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"怀集县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"封开县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"德庆县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高要市\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"四会市\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"惠州市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"惠城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"惠阳区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"博罗县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"惠东县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙门县\";}}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"梅州市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"梅江区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"梅县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大埔县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丰顺县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"五华县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平远县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蕉岭县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴宁市\";}}}}i:12;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汕尾市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海丰县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"陆河县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"陆丰市\";}}}}i:13;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"河源市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"源城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"紫金县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙川县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"连平县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"和平县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东源县\";}}}}i:14;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阳江市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阳西县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阳东县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阳春市\";}}}}i:15;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"清远市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"清城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"佛冈县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阳山县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:27:\"连山壮族瑶族自治县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"连南瑶族自治县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"清新县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"英德市\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"连州市\";}}}}i:16;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东莞市\";}s:6:\"county\";a:32:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"莞城\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"南城\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"东城\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"塘厦\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"虎门\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"长安\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"常平\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"万江\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"茶山\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"大朗\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大岭山\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"道滘\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"东坑\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"凤岗\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"高埗\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"横沥\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"洪梅\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"厚街\";}}i:18;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"黄江\";}}i:19;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"寮步\";}}i:20;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"麻涌\";}}i:21;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"企石\";}}i:22;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"桥头\";}}i:23;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"清溪\";}}i:24;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"沙田镇虎门港\";}}i:25;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"石碣\";}}i:26;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"石龙\";}}i:27;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"石排\";}}i:28;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"望牛墩\";}}i:29;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"谢岗\";}}i:30;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"樟木头\";}}i:31;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"中堂\";}}}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"中山市\";}}i:18;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"潮州市\";}s:6:\"county\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湘桥区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"潮安县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"饶平县\";}}}}i:19;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"揭阳市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"榕城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"揭东县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"揭西县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"惠来县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"普宁市\";}}}}i:20;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"云浮市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"云城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新兴县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"郁南县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"云安县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"罗定市\";}}}}}}i:20;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广西区\";}s:4:\"city\";a:14:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南宁市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴宁区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"青秀区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江南区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"西乡塘区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"良庆区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邕宁区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武鸣县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"隆安县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"马山县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"上林县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宾阳县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"横县\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"柳州市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"城中区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鱼峰区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"柳南区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"柳北区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"柳江县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"柳城县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鹿寨县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"融安县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"融水苗族自治县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"三江侗族自治县\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桂林市\";}s:6:\"county\";a:18:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"秀峰区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"叠彩区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"象山区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"七星区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"雁山区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阳朔县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临桂县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"灵川县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"全州县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴安县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永福县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"灌阳县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"龙胜各族自治县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"资源县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平乐县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"荔蒲县\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"恭城瑶族自治县\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"梧州市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"万秀区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蝶山区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长洲区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"苍梧县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"藤县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蒙山县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岑溪市\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北海市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"银海区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"铁山港区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"合浦县\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"防城港市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"港口区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"防城区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"上思县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东兴市\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"钦州市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"钦南区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"钦北区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"灵山县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"浦北县\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"贵港市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"港北区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"港南区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"覃塘区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平南县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桂平市\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"玉林市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"玉州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"容县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"陆川县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"博白县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴业县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北流市\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"百色市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"右江区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"田阳县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"田东县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平果县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"德保县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"靖西县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"那坡县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凌云县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乐业县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"田林县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西林县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"隆林各族自治县\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"贺州市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"八步区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昭平县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"钟山县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"富川瑶族自治县\";}}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"河池市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"金城江区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南丹县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天峨县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凤山县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东兰县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"罗城仫佬族自治县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"环江毛南族自治县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"巴马瑶族自治县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"都安瑶族自治县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"大化瑶族自治县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宜州市\";}}}}i:12;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"来宾市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴宾区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"忻城县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"象州县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武宣县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"金秀瑶族自治县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"合山市\";}}}}i:13;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"崇左市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江洲区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"扶绥县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁明县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙州县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大新县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天等县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凭祥市\";}}}}}}i:21;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海南省\";}s:4:\"city\";a:3:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海口市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"秀英区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙华区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"琼山区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"美兰区\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"三亚市\";}s:6:\"county\";a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"海南直辖县\";}s:6:\"county\";a:19:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"五指山市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"琼海市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"儋州市\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"文昌市\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"万宁市\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东方市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"定安县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"屯昌县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"澄迈县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临高县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"白沙黎族自治县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"昌江黎族自治县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"乐东黎族自治县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"陵水黎族自治县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:27:\"保亭黎族苗族自治县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:27:\"琼中黎族苗族自治县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"西沙群岛\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"南沙群岛\";}}i:18;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:33:\"中沙群岛的岛礁及其海域\";}}}}}}i:22;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"重庆市\";}s:4:\"city\";a:3:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"重庆辖区\";}s:6:\"county\";a:16:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"万州区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"涪陵区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"渝中区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"大渡口区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江北区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"沙坪坝区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"九龙坡区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南岸区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北碚区\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"万盛区\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"双桥区\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"渝北区\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巴南区\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黔江区\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长寿区\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"璧山区\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"重庆辖县\";}s:6:\"county\";a:20:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"綦江县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"潼南县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铜梁县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大足县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"荣昌县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"梁平县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"城口县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丰都县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"垫江县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武隆县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"忠县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"开县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"云阳县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"奉节县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巫山县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巫溪县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"石柱土家族自治县\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"秀山土家族苗族自治县\";}}i:18;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"酉阳土家族苗族自治县\";}}i:19;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"彭水苗族土家族自治县\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"重庆辖市\";}s:6:\"county\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江津市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"合川市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永川市\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南川市\";}}}}}}i:23;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"四川省\";}s:4:\"city\";a:21:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"成都市\";}s:6:\"county\";a:20:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"锦江区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"青羊区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金牛区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武侯区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"成华区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"龙泉驿区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"青白江区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新都区\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"温江区\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金堂县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"双流县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"郫县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大邑县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蒲江县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新津县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"都江堰市\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"彭州市\";}}i:18;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邛崃市\";}}i:19;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"崇州市\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"自贡市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"自流井区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"贡井区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大安区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沿滩区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"荣县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"富顺县\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"攀枝花市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"东区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"西区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"仁和区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"米易县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盐边县\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泸州市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江阳区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"纳溪区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"龙马潭区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"泸县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"合江县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"叙永县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"古蔺县\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"德阳市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"旌阳区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"中江县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"罗江县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广汉市\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"什邡市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"绵竹市\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"绵阳市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"涪城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"游仙区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"三台县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盐亭县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"安县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"梓潼县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"北川羌族自治县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平武县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江油市\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广元市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市中区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"元坝区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"朝天区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"旺苍县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"青川县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"剑阁县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"苍溪县\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"遂宁市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"船山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安居区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蓬溪县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"射洪县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大英县\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"内江市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市中区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东兴区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"威远县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"资中县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"隆昌县\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乐山市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市中区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沙湾区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"五通桥区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"金口河区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"犍为县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"井研县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"夹江县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沐川县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"峨边彝族自治县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"马边彝族自治县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"峨眉山市\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南充市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"顺庆区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高坪区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"嘉陵区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南部县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"营山县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蓬安县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"仪陇县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西充县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阆中市\";}}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"眉山市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东坡区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"仁寿县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"彭山县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洪雅县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丹棱县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"青神县\";}}}}i:12;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宜宾市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"翠屏区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宜宾县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南溪县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江安县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长宁县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"高县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"珙县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"筠连县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴文县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"屏山县\";}}}}i:13;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广安市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广安区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岳池县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武胜县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"邻水县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"华莹市\";}}}}i:14;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"达州市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"通川区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"达县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宣汉县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"开江县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大竹县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"渠县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"万源市\";}}}}i:15;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"雅安市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"雨城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"名山县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"荥经县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汉源县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"石棉县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天全县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"芦山县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宝兴县\";}}}}i:16;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巴中市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巴州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"通江县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南江县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平昌县\";}}}}i:17;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"资阳市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"雁江区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安岳县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乐至县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"简阳市\";}}}}i:18;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"阿坝自治州\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汶川县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"理县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"茂县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"松潘县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"九寨沟县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金川县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"小金县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黑水县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"马尔康县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"壤塘县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阿坝县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"若尔盖县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"红原县\";}}}}i:19;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"甘孜自治州\";}s:6:\"county\";a:18:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"康定县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泸定县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丹巴县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"九龙县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"雅江县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"道孚县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"炉霍县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"甘孜县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新龙县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"德格县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"白玉县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"石渠县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"色达县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"理塘县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巴塘县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乡城县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"稻城县\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"得荣县\";}}}}i:20;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"凉山自治州\";}s:6:\"county\";a:17:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西昌市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"木里藏族自治县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盐源县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"德昌县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"会理县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"会东县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁南县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"普格县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"布拖县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金阳县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昭觉县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"喜德县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"冕宁县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"越西县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"甘洛县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"美姑县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"雷波县\";}}}}}}i:24;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"贵州省\";}s:4:\"city\";a:9:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"贵阳市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南明区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"云岩区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"花溪区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乌当区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"白云区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"小河区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"开阳县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"息烽县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"修文县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"清镇市\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"六盘水市\";}s:6:\"county\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"钟山区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"六枝特区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"水城县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"盘县\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"遵义市\";}s:6:\"county\";a:15:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"红花岗区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汇川区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"遵义县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桐梓县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"绥阳县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"正安县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"道真仡佬族苗族自治县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"务川仡佬族苗族自治县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凤冈县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湄潭县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"余庆县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"习水县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"赤水市\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"仁怀市\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安顺市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西秀区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平坝县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"普定县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"镇宁布依族苗族自治县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"关岭布依族苗族自治县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"紫云苗族布依族自治县\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"铜仁地区\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铜仁市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江口县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"玉屏侗族自治县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"石阡县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"思南县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"印江土家族苗族自治县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"德江县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"沿河土家族自治县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"松桃苗族自治县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"万山特区\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"黔西南自治州\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴义市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴仁县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"普安县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"晴隆县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"贞丰县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"望谟县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"册亨县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安龙县\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"毕节地区\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"毕节市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大方县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黔西县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金沙县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"织金县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"纳雍县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:33:\"威宁彝族回族苗族自治县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"赫章县\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"黔东南自治州\";}s:6:\"county\";a:16:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凯里市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黄平县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"施秉县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"三穗县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"镇远县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岑巩县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天柱县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"锦屏县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"剑河县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"台江县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黎平县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"榕江县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"从江县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"雷山县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"麻江县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丹寨县\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"黔南自治州\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"都匀市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"福泉市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"荔波县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"贵定县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"瓮安县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"独山县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平塘县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"罗甸县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长顺县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙里县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"惠水县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"三都水族自治县\";}}}}}}i:25;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"云南省\";}s:4:\"city\";a:16:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昆明市\";}s:6:\"county\";a:15:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"五华区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盘龙区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"官渡区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西山区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东川区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"呈贡县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"晋宁县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"富民县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宜良县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"石林彝族自治县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"嵩明县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:27:\"禄劝彝族苗族自治县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:27:\"寻甸回族彝族自治县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安宁市\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"曲靖市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"麒麟区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"马龙县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"陆良县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"师宗县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"罗平县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"富源县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"会泽县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沾益县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宣威市\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"玉溪市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"红塔区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江川县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"澄江县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"通海县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"华宁县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"易门县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"峨山彝族自治县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:27:\"新平彝族傣族自治县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:36:\"元江哈尼族彝族傣族自治县\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"保山市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"隆阳区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"施甸县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"腾冲县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"龙陵县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昌宁县\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昭通市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昭阳区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鲁甸县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巧家县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盐津县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大关县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永善县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"绥江县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"镇雄县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"彝良县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"威信县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"水富县\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丽江市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"古城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"玉龙纳西族自治县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永胜县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"华坪县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"宁蒗彝族自治县\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"思茅市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"翠云区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"普洱哈尼族彝族自治县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"墨江哈尼族自治县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"景东彝族自治县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:27:\"景谷傣族彝族自治县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:39:\"镇沅彝族哈尼族拉祜族自治县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"江城哈尼族彝族自治县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:36:\"孟连傣族拉祜族佤族自治县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"澜沧拉祜族自治县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"西盟佤族自治县\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临沧市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临翔区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凤庆县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"云县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永德县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"镇康县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:45:\"双江拉祜族佤族布朗族傣族自治县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:27:\"耿马傣族佤族自治县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"沧源佤族自治县\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"楚雄自治州\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"楚雄市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"双柏县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"牟定县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南华县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"姚安县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大姚县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永仁县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"元谋县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武定县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"禄丰县\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"红河自治州\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"个旧市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"开远市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蒙自县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"屏边苗族自治县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"建水县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"石屏县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"弥勒县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泸西县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"元阳县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"红河县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:33:\"金平苗族瑶族傣族自治县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"绿春县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"河口瑶族自治县\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"文山自治州\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"文山县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"砚山县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西畴县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"麻栗坡县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"马关县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丘北县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广南县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"富宁县\";}}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"西双版纳州\";}s:6:\"county\";a:3:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"景洪市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"勐海县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"勐腊县\";}}}}i:12;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"大理自治州\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大理市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"漾濞彝族自治县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"祥云县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宾川县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"弥渡县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"南涧彝族自治县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:27:\"巍山彝族回族自治县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永平县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"云龙县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洱源县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"剑川县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鹤庆县\";}}}}i:13;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"德宏自治州\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"瑞丽市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"潞西市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"梁河县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盈江县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"陇川县\";}}}}i:14;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"怒江傈自治州\";}s:6:\"county\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泸水县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"福贡县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"贡山独龙族怒族自治县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"兰坪白族普米族自治县\";}}}}i:15;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"迪庆自治州\";}s:6:\"county\";a:3:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"香格里拉县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"德钦县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"维西傈僳族自治县\";}}}}}}i:26;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西藏区\";}s:4:\"city\";a:7:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"拉萨市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"城关区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"林周县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"当雄县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"尼木县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"曲水县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"堆龙德庆县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"达孜县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"墨竹工卡县\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"昌都地区\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昌都县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江达县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"贡觉县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"类乌齐县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丁青县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"察雅县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"八宿县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"左贡县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"芒康县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洛隆县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"边坝县\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"山南地区\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乃东县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"扎囊县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"贡嘎县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"桑日县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"琼结县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"曲松县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"措美县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洛扎县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"加查县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"隆子县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"错那县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"浪卡子县\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"日喀则地区\";}s:6:\"county\";a:18:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"日喀则市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"南木林县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"江孜县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"定日县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"萨迦县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"拉孜县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昂仁县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"谢通门县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"白朗县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"仁布县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"康马县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"定结县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"仲巴县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"亚东县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吉隆县\";}}i:15;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"聂拉木县\";}}i:16;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"萨嘎县\";}}i:17;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岗巴县\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"那曲地区\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"那曲县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"嘉黎县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"比如县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"聂荣县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安多县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"申扎县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"索县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"班戈县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巴青县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"尼玛县\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"阿里地区\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"普兰县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"札达县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"噶尔县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"日土县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"革吉县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"改则县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"措勤县\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"林芝地区\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"林芝县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"工布江达县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"米林县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"墨脱县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"波密县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"察隅县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"朗县\";}}}}}}i:27;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"陕西省\";}s:4:\"city\";a:10:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西安市\";}s:6:\"county\";a:14:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"碑林区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"莲湖区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"灞桥区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"未央区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"雁塔区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阎良区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临潼区\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长安区\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蓝田县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"周至县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"户县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高陵县\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"铜川市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"王益区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"印台区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"耀州区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宜君县\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宝鸡市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"渭滨区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金台区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"陈仓区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凤翔县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岐山县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"扶风县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"眉县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"陇县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"千阳县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"麟游县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"凤县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"太白县\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"咸阳市\";}s:6:\"county\";a:15:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"秦都区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"杨凌区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"渭城区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"三原县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泾阳县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"乾县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"礼泉县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永寿县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"彬县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"长武县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"旬邑县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"淳化县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武功县\";}}i:14;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴平市\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"渭南市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临渭区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"华县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"潼关县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大荔县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"合阳县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"澄城县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"蒲城县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"白水县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"富平县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"韩城市\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"华阴市\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"延安市\";}s:6:\"county\";a:14:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宝塔区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"延长县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"延川县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"子长县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安塞县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"志丹县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吴旗县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"甘泉县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"富县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洛川县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宜川县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黄龙县\";}}i:13;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"黄陵县\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汉中市\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汉台区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"南郑县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"城固县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"洋县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西乡县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"勉县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁强县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"略阳县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"镇巴县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"留坝县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"佛坪县\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"榆林市\";}s:6:\"county\";a:13:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"榆阳区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"神木县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"府谷县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"横山县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"靖边县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"定边县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"绥德县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"米脂县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"佳县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吴堡县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"清涧县\";}}i:12;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"子洲县\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安康市\";}s:6:\"county\";a:11:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汉滨区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"汉阴县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"石泉县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁陕县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"紫阳县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"岚皋县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平利县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"镇坪县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"旬阳县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"白河县\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"商洛市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"商州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洛南县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"丹凤县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"商南县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"山阳县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"镇安县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"柞水县\";}}}}}}i:28;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"甘肃省\";}s:4:\"city\";a:14:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兰州市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"城关区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"七里河区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西固区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安宁区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"红古区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永登县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"皋兰县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"榆中县\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"嘉峪关市\";}s:6:\"county\";a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金昌市\";}s:6:\"county\";a:3:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金川区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永昌县\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"白银市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"白银区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平川区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"靖远县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"会宁县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"景泰县\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天水市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"秦城区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"北道区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"清水县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"秦安县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"甘谷县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武山县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"张家川回族自治县\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武威市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"凉州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"民勤县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"古浪县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"天祝藏族自治县\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"张掖市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"甘州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"肃南裕固族自治县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"民乐县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临泽县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高台县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"山丹县\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平凉市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"崆峒区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泾川县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"灵台县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"崇信县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"华亭县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"庄浪县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"静宁县\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"酒泉市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"肃州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金塔县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安西县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"肃北蒙古族自治县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"阿克塞哈萨克族自治县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"玉门市\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"敦煌市\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"庆阳市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西峰区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"庆城县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"环县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"华池县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"合水县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"正宁县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"宁县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"镇原县\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"定西市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"安定区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"通渭县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"陇西县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"渭源县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临洮县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"漳县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"岷县\";}}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"陇南市\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"武都区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"成县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"文县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宕昌县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"康县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西和县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"礼县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"徽县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"两当县\";}}}}i:12;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"临夏自治州\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临夏市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临夏县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"康乐县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永靖县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"广河县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"和政县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"东乡族自治县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:45:\"积石山保安族东乡族撒拉族自治县\";}}}}i:13;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"甘南自治州\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"合作市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"临潭县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"卓尼县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"舟曲县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"迭部县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"玛曲县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"碌曲县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"夏河县\";}}}}}}i:29;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"青海省\";}s:4:\"city\";a:8:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西宁市\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"城东区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"城中区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"城西区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"城北区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:27:\"大通回族土族自治县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湟中县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"湟源县\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"海东地区\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平安县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:27:\"民和回族土族自治县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乐都县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"互助土族自治县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"化隆回族自治县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"循化撒拉族自治县\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"海北自治州\";}s:6:\"county\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"门源回族自治县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"祁连县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海晏县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"刚察县\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"黄南自治州\";}s:6:\"county\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"同仁县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"尖扎县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泽库县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"河南蒙古族自治县\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"海南自治州\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"共和县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"同德县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"贵德县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴海县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"贵南县\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"果洛自治州\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"玛沁县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"班玛县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"甘德县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"达日县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"久治县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"玛多县\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"玉树自治州\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"玉树县\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"杂多县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"称多县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"治多县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"囊谦县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"曲麻莱县\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"海西自治州\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"格尔木市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"德令哈市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乌兰县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"都兰县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天峻县\";}}}}}}i:30;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"宁夏区\";}s:4:\"city\";a:5:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"银川市\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"兴庆区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西夏区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"金凤区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"永宁县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"贺兰县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"灵武市\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"石嘴山市\";}s:6:\"county\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"大武口区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"惠农区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"平罗县\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"吴忠市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"利通区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"盐池县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"同心县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"青铜峡市\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"固原市\";}s:6:\"county\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"原州区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"西吉县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"隆德县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泾源县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"彭阳县\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"中卫市\";}s:6:\"county\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"沙坡头区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"中宁县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"海原县\";}}}}}}i:31;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新疆区\";}s:4:\"city\";a:15:{i:0;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"乌鲁木齐市\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"天山区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"沙依巴克区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新市区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"水磨沟区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"头屯河区\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"达坂城区\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"东山区\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"乌鲁木齐县\";}}}}i:1;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"克拉玛依市\";}s:6:\"county\";a:5:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"市辖区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"独山子区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"克拉玛依区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"白碱滩区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"乌尔禾区\";}}}}i:2;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"吐鲁番地区\";}s:6:\"county\";a:3:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"吐鲁番市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"鄯善县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"托克逊县\";}}}}i:3;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"哈密地区\";}s:6:\"county\";a:3:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"哈密市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:27:\"巴里坤哈萨克自治县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"伊吾县\";}}}}i:4;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"昌吉自治州\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昌吉市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"阜康市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"米泉市\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"呼图壁县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"玛纳斯县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"奇台县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"吉木萨尔县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:24:\"木垒哈萨克自治县\";}}}}i:5;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"博尔塔拉州\";}s:6:\"county\";a:3:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"博乐市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"精河县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"温泉县\";}}}}i:6;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"巴音郭楞州\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"库尔勒市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"轮台县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"尉犁县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"若羌县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"且末县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:21:\"焉耆回族自治县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"和静县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"和硕县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"博湖县\";}}}}i:7;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"阿克苏地区\";}s:6:\"county\";a:9:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"阿克苏市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"温宿县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"库车县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沙雅县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新和县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"拜城县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乌什县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"阿瓦提县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"柯坪县\";}}}}i:8;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"克孜勒苏州\";}s:6:\"county\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"阿图什市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"阿克陶县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"阿合奇县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乌恰县\";}}}}i:9;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"喀什地区\";}s:6:\"county\";a:12:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"喀什市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"疏附县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"疏勒县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"英吉沙县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"泽普县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"莎车县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"叶城县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"麦盖提县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"岳普湖县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"伽师县\";}}i:10;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巴楚县\";}}i:11;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:33:\"塔什库尔干塔吉克自治县\";}}}}i:10;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"和田地区\";}s:6:\"county\";a:8:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"和田市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"和田县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"墨玉县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"皮山县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"洛浦县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"策勒县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"于田县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"民丰县\";}}}}i:11;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"伊犁自治州\";}s:6:\"county\";a:10:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"伊宁市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"奎屯市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"伊宁县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:27:\"察布查尔锡伯自治县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"霍城县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"巩留县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新源县\";}}i:7;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"昭苏县\";}}i:8;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"特克斯县\";}}i:9;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"尼勒克县\";}}}}i:12;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"塔城地区\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"塔城市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"乌苏市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"额敏县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"沙湾县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"托里县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"裕民县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:30:\"和布克赛尔蒙古自治县\";}}}}i:13;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"阿勒泰地区\";}s:6:\"county\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"阿勒泰市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"布尔津县\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"富蕴县\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"福海县\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"哈巴河县\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"青河县\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"吉木乃县\";}}}}i:14;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"新疆省辖单位\";}s:6:\"county\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"石河子市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"阿拉尔市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"图木舒克市\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"五家渠市\";}}}}}}i:32;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"台湾省\";}s:4:\"city\";a:7:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"台北市\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"高雄市\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"基隆市\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"台中市\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"台南市\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新竹市\";}}i:6;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"嘉义市\";}}}}i:33;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"香港特区\";}s:4:\"city\";a:4:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"香港岛\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:6:\"九龙\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新界东\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"新界西\";}}}}i:34;a:2:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"澳门特区\";}s:4:\"city\";a:6:{i:0;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:15:\"花地玛堂区\";}}i:1;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:18:\"圣安多尼堂区\";}}i:2;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"花王堂区\";}}i:3;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:9:\"大堂区\";}}i:4;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"望德堂区\";}}i:5;a:1:{s:11:\"@attributes\";a:1:{s:4:\"name\";s:12:\"风顺堂区\";}}}}}}}');
INSERT INTO `ims_core_cache` VALUES ('uniaccount:1', 'a:28:{s:4:\"acid\";s:1:\"1\";s:7:\"uniacid\";s:1:\"1\";s:5:\"token\";s:32:\"omJNpZEhZeHj1ZxFECKkP48B5VFbk1HP\";s:12:\"access_token\";s:0:\"\";s:14:\"encodingaeskey\";s:0:\"\";s:5:\"level\";s:1:\"1\";s:4:\"name\";s:27:\"演示账号（可删除）\";s:7:\"account\";s:0:\"\";s:8:\"original\";s:0:\"\";s:9:\"signature\";s:0:\"\";s:7:\"country\";s:0:\"\";s:8:\"province\";s:0:\"\";s:4:\"city\";s:0:\"\";s:8:\"username\";s:0:\"\";s:8:\"password\";s:0:\"\";s:10:\"lastupdate\";s:1:\"0\";s:3:\"key\";s:0:\"\";s:6:\"secret\";s:0:\"\";s:7:\"styleid\";s:1:\"1\";s:12:\"subscribeurl\";s:0:\"\";s:18:\"auth_refresh_token\";s:0:\"\";s:12:\"default_acid\";s:1:\"1\";s:4:\"type\";s:1:\"1\";s:3:\"uid\";N;s:9:\"starttime\";N;s:7:\"endtime\";N;s:6:\"groups\";a:1:{i:1;a:6:{s:7:\"groupid\";s:1:\"1\";s:7:\"uniacid\";s:1:\"1\";s:5:\"title\";s:15:\"默认会员组\";s:6:\"credit\";s:1:\"0\";s:9:\"orderlist\";s:1:\"0\";s:9:\"isdefault\";s:1:\"1\";}}s:10:\"grouplevel\";s:1:\"0\";}');
INSERT INTO `ims_core_cache` VALUES ('unimodules:1:', 'a:14:{s:5:\"basic\";a:18:{s:3:\"mid\";s:1:\"1\";s:4:\"name\";s:5:\"basic\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本文字回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:24:\"和您进行简单对话\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:4:\"news\";a:18:{s:3:\"mid\";s:1:\"2\";s:4:\"name\";s:4:\"news\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:24:\"基本混合图文回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:33:\"为你提供生动的图文资讯\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:5:\"music\";a:18:{s:3:\"mid\";s:1:\"3\";s:4:\"name\";s:5:\"music\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本音乐回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:39:\"提供语音、音乐等音频类回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:7:\"userapi\";a:18:{s:3:\"mid\";s:1:\"4\";s:4:\"name\";s:7:\"userapi\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:21:\"自定义接口回复\";s:7:\"version\";s:3:\"1.1\";s:7:\"ability\";s:33:\"更方便的第三方接口设置\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:8:\"recharge\";a:18:{s:3:\"mid\";s:1:\"5\";s:4:\"name\";s:8:\"recharge\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:24:\"会员中心充值模块\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:24:\"提供会员充值功能\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:6:\"custom\";a:18:{s:3:\"mid\";s:1:\"6\";s:4:\"name\";s:6:\"custom\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:15:\"多客服转接\";s:7:\"version\";s:5:\"1.0.0\";s:7:\"ability\";s:36:\"用来接入腾讯的多客服系统\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:17:\"http://bbs.we7.cc\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:6:{i:0;s:5:\"image\";i:1;s:5:\"voice\";i:2;s:5:\"video\";i:3;s:8:\"location\";i:4;s:4:\"link\";i:5;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:6:\"images\";a:18:{s:3:\"mid\";s:1:\"7\";s:4:\"name\";s:6:\"images\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本图片回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供图片回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:5:\"video\";a:18:{s:3:\"mid\";s:1:\"8\";s:4:\"name\";s:5:\"video\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本视频回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供图片回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:5:\"voice\";a:18:{s:3:\"mid\";s:1:\"9\";s:4:\"name\";s:5:\"voice\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本语音回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供语音回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:5:\"chats\";a:18:{s:3:\"mid\";s:2:\"10\";s:4:\"name\";s:5:\"chats\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"发送客服消息\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:77:\"公众号可以在粉丝最后发送消息的48小时内无限制发送消息\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:6:\"wxcard\";a:18:{s:3:\"mid\";s:2:\"11\";s:4:\"name\";s:6:\"wxcard\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"微信卡券回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"微信卡券回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:9:\"paycenter\";a:18:{s:3:\"mid\";s:2:\"12\";s:4:\"name\";s:9:\"paycenter\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:9:\"收银台\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:9:\"收银台\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:12:\"ewei_shop_v1\";a:18:{s:3:\"mid\";s:2:\"54\";s:4:\"name\";s:12:\"ewei_shop_v1\";s:4:\"type\";s:8:\"business\";s:5:\"title\";s:17:\"微信商城V1\";s:7:\"version\";s:5:\"1.1.2\";s:7:\"ability\";s:17:\"微信商城V1\";s:6:\"author\";s:9:\"WeichengTech\";s:3:\"url\";s:21:\"http://www.v-888.com/\";s:8:\"settings\";s:1:\"1\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:1:{i:0;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:6:\"a:0:{}\";s:7:\"enabled\";s:1:\"1\";s:6:\"config\";a:0:{}}s:4:\"core\";a:4:{s:5:\"title\";s:24:\"系统事件处理模块\";s:4:\"name\";s:4:\"core\";s:8:\"issystem\";i:1;s:7:\"enabled\";i:1;}}');
INSERT INTO `ims_core_cache` VALUES ('unimodules:1:1', 'a:14:{s:5:\"basic\";a:18:{s:3:\"mid\";s:1:\"1\";s:4:\"name\";s:5:\"basic\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本文字回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:24:\"和您进行简单对话\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:4:\"news\";a:18:{s:3:\"mid\";s:1:\"2\";s:4:\"name\";s:4:\"news\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:24:\"基本混合图文回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:33:\"为你提供生动的图文资讯\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:5:\"music\";a:18:{s:3:\"mid\";s:1:\"3\";s:4:\"name\";s:5:\"music\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本音乐回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:39:\"提供语音、音乐等音频类回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:7:\"userapi\";a:18:{s:3:\"mid\";s:1:\"4\";s:4:\"name\";s:7:\"userapi\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:21:\"自定义接口回复\";s:7:\"version\";s:3:\"1.1\";s:7:\"ability\";s:33:\"更方便的第三方接口设置\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:8:\"recharge\";a:18:{s:3:\"mid\";s:1:\"5\";s:4:\"name\";s:8:\"recharge\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:24:\"会员中心充值模块\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:24:\"提供会员充值功能\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:6:\"custom\";a:18:{s:3:\"mid\";s:1:\"6\";s:4:\"name\";s:6:\"custom\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:15:\"多客服转接\";s:7:\"version\";s:5:\"1.0.0\";s:7:\"ability\";s:36:\"用来接入腾讯的多客服系统\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:17:\"http://bbs.we7.cc\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:6:{i:0;s:5:\"image\";i:1;s:5:\"voice\";i:2;s:5:\"video\";i:3;s:8:\"location\";i:4;s:4:\"link\";i:5;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:6:\"images\";a:18:{s:3:\"mid\";s:1:\"7\";s:4:\"name\";s:6:\"images\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本图片回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供图片回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:5:\"video\";a:18:{s:3:\"mid\";s:1:\"8\";s:4:\"name\";s:5:\"video\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本视频回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供图片回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:5:\"voice\";a:18:{s:3:\"mid\";s:1:\"9\";s:4:\"name\";s:5:\"voice\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"基本语音回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"提供语音回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:5:\"chats\";a:18:{s:3:\"mid\";s:2:\"10\";s:4:\"name\";s:5:\"chats\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"发送客服消息\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:77:\"公众号可以在粉丝最后发送消息的48小时内无限制发送消息\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:6:\"wxcard\";a:18:{s:3:\"mid\";s:2:\"11\";s:4:\"name\";s:6:\"wxcard\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:18:\"微信卡券回复\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:18:\"微信卡券回复\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:9:\"paycenter\";a:18:{s:3:\"mid\";s:2:\"12\";s:4:\"name\";s:9:\"paycenter\";s:4:\"type\";s:6:\"system\";s:5:\"title\";s:9:\"收银台\";s:7:\"version\";s:3:\"1.0\";s:7:\"ability\";s:9:\"收银台\";s:6:\"author\";s:13:\"WeEngine Team\";s:3:\"url\";s:18:\"http://www.goupu.org/\";s:8:\"settings\";s:1:\"0\";s:10:\"subscribes\";s:0:\"\";s:7:\"handles\";s:0:\"\";s:12:\"isrulefields\";s:1:\"1\";s:8:\"issystem\";s:1:\"1\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:0:\"\";s:7:\"enabled\";i:1;s:6:\"config\";a:0:{}}s:12:\"ewei_shop_v1\";a:18:{s:3:\"mid\";s:2:\"54\";s:4:\"name\";s:12:\"ewei_shop_v1\";s:4:\"type\";s:8:\"business\";s:5:\"title\";s:17:\"微信商城V1\";s:7:\"version\";s:5:\"1.1.2\";s:7:\"ability\";s:17:\"微信商城V1\";s:6:\"author\";s:9:\"WeichengTech\";s:3:\"url\";s:21:\"http://www.v-888.com/\";s:8:\"settings\";s:1:\"1\";s:10:\"subscribes\";a:0:{}s:7:\"handles\";a:1:{i:0;s:4:\"text\";}s:12:\"isrulefields\";s:1:\"0\";s:8:\"issystem\";s:1:\"0\";s:6:\"target\";s:1:\"0\";s:6:\"iscard\";s:1:\"0\";s:11:\"permissions\";s:6:\"a:0:{}\";s:7:\"enabled\";s:1:\"1\";s:6:\"config\";a:0:{}}s:4:\"core\";a:4:{s:5:\"title\";s:24:\"系统事件处理模块\";s:4:\"name\";s:4:\"core\";s:8:\"issystem\";i:1;s:7:\"enabled\";i:1;}}');
INSERT INTO `ims_core_cache` VALUES ('unisetting:1', 'a:21:{s:7:\"uniacid\";s:1:\"1\";s:8:\"passport\";a:3:{s:8:\"focusreg\";i:0;s:4:\"item\";s:5:\"email\";s:4:\"type\";s:8:\"password\";}s:5:\"oauth\";a:2:{s:6:\"status\";s:1:\"0\";s:7:\"account\";s:1:\"0\";}s:11:\"jsauth_acid\";s:1:\"0\";s:2:\"uc\";a:1:{s:6:\"status\";i:0;}s:6:\"notify\";a:1:{s:3:\"sms\";a:2:{s:7:\"balance\";i:0;s:9:\"signature\";s:0:\"\";}}s:11:\"creditnames\";a:5:{s:7:\"credit1\";a:2:{s:5:\"title\";s:6:\"积分\";s:7:\"enabled\";i:1;}s:7:\"credit2\";a:2:{s:5:\"title\";s:6:\"余额\";s:7:\"enabled\";i:1;}s:7:\"credit3\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}s:7:\"credit4\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}s:7:\"credit5\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}}s:15:\"creditbehaviors\";a:2:{s:8:\"activity\";s:7:\"credit1\";s:8:\"currency\";s:7:\"credit2\";}s:7:\"welcome\";s:0:\"\";s:7:\"default\";s:0:\"\";s:15:\"default_message\";s:0:\"\";s:9:\"shortcuts\";s:0:\"\";s:7:\"payment\";a:4:{s:6:\"credit\";a:1:{s:6:\"switch\";b:0;}s:6:\"alipay\";a:4:{s:6:\"switch\";b:0;s:7:\"account\";s:0:\"\";s:7:\"partner\";s:0:\"\";s:6:\"secret\";s:0:\"\";}s:6:\"wechat\";a:5:{s:6:\"switch\";b:0;s:7:\"account\";b:0;s:7:\"signkey\";s:0:\"\";s:7:\"partner\";s:0:\"\";s:3:\"key\";s:0:\"\";}s:8:\"delivery\";a:1:{s:6:\"switch\";b:0;}}s:4:\"stat\";s:0:\"\";s:7:\"menuset\";s:0:\"\";s:12:\"default_site\";s:1:\"1\";s:4:\"sync\";s:0:\"\";s:8:\"recharge\";s:0:\"\";s:9:\"tplnotice\";s:0:\"\";s:10:\"grouplevel\";s:1:\"0\";s:8:\"mcplugin\";s:0:\"\";}');

-- ----------------------------
-- Table structure for `ims_core_cron`
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_cron`;
CREATE TABLE `ims_core_cron` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cloudid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `lastruntime` int(10) unsigned NOT NULL,
  `nextruntime` int(10) unsigned NOT NULL,
  `weekday` tinyint(3) NOT NULL,
  `day` tinyint(3) NOT NULL,
  `hour` tinyint(3) NOT NULL,
  `minute` varchar(255) NOT NULL,
  `extra` varchar(5000) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `createtime` (`createtime`),
  KEY `nextruntime` (`nextruntime`),
  KEY `uniacid` (`uniacid`),
  KEY `cloudid` (`cloudid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_cron
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_core_cron_record`
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_cron_record`;
CREATE TABLE `ims_core_cron_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `tid` int(10) unsigned NOT NULL,
  `note` varchar(500) NOT NULL,
  `tag` varchar(5000) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `tid` (`tid`),
  KEY `module` (`module`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_cron_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_core_menu`
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_menu`;
CREATE TABLE `ims_core_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `title` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `url` varchar(60) NOT NULL,
  `append_title` varchar(30) NOT NULL,
  `append_url` varchar(60) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_system` tinyint(3) unsigned NOT NULL,
  `permission_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_menu
-- ----------------------------
INSERT INTO `ims_core_menu` VALUES ('1', '0', '基础设置', 'platform', '', 'fa fa-cog', '', '0', 'url', '1', '1', '');
INSERT INTO `ims_core_menu` VALUES ('2', '1', '基本功能', 'platform', '', '', '', '0', 'url', '1', '1', 'platform_basic_function');
INSERT INTO `ims_core_menu` VALUES ('3', '2', '文字回复', 'platform', './index.php?c=platform&a=reply&m=basic', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=basic', '0', 'url', '1', '1', 'platform_reply_basic');
INSERT INTO `ims_core_menu` VALUES ('4', '2', '图文回复', 'platform', './index.php?c=platform&a=reply&m=news', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=news', '0', 'url', '1', '1', 'platform_reply_news');
INSERT INTO `ims_core_menu` VALUES ('5', '2', '音乐回复', 'platform', './index.php?c=platform&a=reply&m=music', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=music', '0', 'url', '1', '1', 'platform_reply_music');
INSERT INTO `ims_core_menu` VALUES ('6', '2', '图片回复', 'platform', './index.php?c=platform&a=reply&m=images', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=images', '0', 'url', '1', '1', 'platform_reply_images');
INSERT INTO `ims_core_menu` VALUES ('7', '2', '语音回复', 'platform', './index.php?c=platform&a=reply&m=voice', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=voice', '0', 'url', '1', '1', 'platform_reply_voice');
INSERT INTO `ims_core_menu` VALUES ('8', '2', '视频回复', 'platform', './index.php?c=platform&a=reply&m=video', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=video', '0', 'url', '1', '1', 'platform_reply_video');
INSERT INTO `ims_core_menu` VALUES ('9', '2', '微信卡券回复', 'platform', './index.php?c=platform&a=reply&m=wxcard', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=wxcard', '0', 'url', '1', '1', 'platform_reply_wxcard');
INSERT INTO `ims_core_menu` VALUES ('10', '2', '自定义接口回复', 'platform', './index.php?c=platform&a=reply&m=userapi', 'fa fa-plus', './index.php?c=platform&a=reply&do=post&m=userapi', '0', 'url', '1', '1', 'platform_reply_userapi');
INSERT INTO `ims_core_menu` VALUES ('11', '2', '系统回复', 'platform', './index.php?c=platform&a=special&do=display&', '', '', '0', 'url', '1', '1', 'platform_reply_system');
INSERT INTO `ims_core_menu` VALUES ('12', '1', '高级功能', 'platform', '', '', '', '0', 'url', '1', '1', 'platform_high_function');
INSERT INTO `ims_core_menu` VALUES ('13', '12', '常用服务接入', 'platform', './index.php?c=platform&a=service&do=switch&', '', '', '0', 'url', '1', '1', 'platform_service');
INSERT INTO `ims_core_menu` VALUES ('14', '12', '自定义菜单', 'platform', './index.php?c=platform&a=menu&', '', '', '0', 'url', '1', '1', 'platform_menu');
INSERT INTO `ims_core_menu` VALUES ('15', '12', '特殊消息回复', 'platform', './index.php?c=platform&a=special&do=message&', '', '', '0', 'url', '1', '1', 'platform_special');
INSERT INTO `ims_core_menu` VALUES ('16', '12', '二维码管理', 'platform', './index.php?c=platform&a=qr&', '', '', '0', 'url', '1', '1', 'platform_qr');
INSERT INTO `ims_core_menu` VALUES ('17', '12', '多客服接入', 'platform', './index.php?c=platform&a=reply&m=custom', '', '', '0', 'url', '1', '1', 'platform_reply_custom');
INSERT INTO `ims_core_menu` VALUES ('18', '12', '长链接二维码', 'platform', './index.php?c=platform&a=url2qr&', '', '', '0', 'url', '1', '1', 'platform_url2qr');
INSERT INTO `ims_core_menu` VALUES ('19', '1', '数据统计', 'platform', '', '', '', '0', 'url', '1', '1', 'platform_stat');
INSERT INTO `ims_core_menu` VALUES ('20', '19', '聊天记录', 'platform', './index.php?c=platform&a=stat&do=history&', '', '', '0', 'url', '1', '1', 'platform_stat_history');
INSERT INTO `ims_core_menu` VALUES ('21', '19', '回复规则使用情况', 'platform', './index.php?c=platform&a=stat&do=rule&', '', '', '0', 'url', '1', '1', 'platform_stat_rule');
INSERT INTO `ims_core_menu` VALUES ('22', '19', '关键字命中情况', 'platform', './index.php?c=platform&a=stat&do=keyword&', '', '', '0', 'url', '1', '1', 'platform_stat_keyword');
INSERT INTO `ims_core_menu` VALUES ('23', '19', '参数', 'platform', './index.php?c=platform&a=stat&do=setting&', '', '', '0', 'url', '1', '1', 'platform_stat_setting');
INSERT INTO `ims_core_menu` VALUES ('24', '0', '微站功能', 'site', '', 'fa fa-life-bouy', '', '0', 'url', '1', '1', '');
INSERT INTO `ims_core_menu` VALUES ('25', '24', '微站管理', 'site', '', '', '', '0', 'url', '1', '1', 'site_manage');
INSERT INTO `ims_core_menu` VALUES ('26', '25', '站点管理', 'site', './index.php?c=site&a=multi&do=display&', 'fa fa-plus', './index.php?c=site&a=multi&do=post&', '0', 'url', '1', '1', 'site_multi_display');
INSERT INTO `ims_core_menu` VALUES ('27', '25', '站点添加/编辑', 'site', '', '', '', '0', 'permission', '0', '1', 'site_multi_post');
INSERT INTO `ims_core_menu` VALUES ('28', '25', '站点删除', 'site', '', '', '', '0', 'permission', '0', '1', 'site_multi_del');
INSERT INTO `ims_core_menu` VALUES ('29', '25', '模板管理', 'site', './index.php?c=site&a=style&do=template&', '', '', '0', 'url', '1', '1', 'site_style_template');
INSERT INTO `ims_core_menu` VALUES ('30', '25', '模块模板扩展', 'site', './index.php?c=site&a=style&do=module&', '', '', '0', 'url', '1', '1', 'site_style_module');
INSERT INTO `ims_core_menu` VALUES ('31', '24', '特殊页面管理', 'site', '', '', '', '0', 'url', '1', '1', 'site_special_page');
INSERT INTO `ims_core_menu` VALUES ('32', '31', '会员中心', 'site', './index.php?c=site&a=editor&do=uc&', '', '', '0', 'url', '1', '1', 'site_editor_uc');
INSERT INTO `ims_core_menu` VALUES ('33', '31', '专题页面', 'site', './index.php?c=site&a=editor&do=page&', 'fa fa-plus', './index.php?c=site&a=editor&do=design&', '0', 'url', '1', '1', 'site_editor_page');
INSERT INTO `ims_core_menu` VALUES ('34', '24', '功能组件', 'site', '', '', '', '0', 'url', '1', '1', 'site_article');
INSERT INTO `ims_core_menu` VALUES ('35', '34', '分类设置', 'site', './index.php?c=site&a=category&', '', '', '0', 'url', '1', '1', 'site_category');
INSERT INTO `ims_core_menu` VALUES ('36', '34', '文章管理', 'site', './index.php?c=site&a=article&', '', '', '0', 'url', '1', '1', 'site_article');
INSERT INTO `ims_core_menu` VALUES ('37', '0', '粉丝营销', 'mc', '', 'fa fa-gift', '', '0', 'url', '1', '1', '');
INSERT INTO `ims_core_menu` VALUES ('38', '37', '粉丝管理', 'mc', '', '', '', '0', 'url', '1', '1', 'mc_fans_manage');
INSERT INTO `ims_core_menu` VALUES ('39', '38', '粉丝分组', 'mc', './index.php?c=mc&a=fangroup&', '', '', '0', 'url', '1', '1', 'mc_fangroup');
INSERT INTO `ims_core_menu` VALUES ('40', '38', '粉丝', 'mc', './index.php?c=mc&a=fans&', '', '', '0', 'url', '1', '1', 'mc_fans');
INSERT INTO `ims_core_menu` VALUES ('41', '37', '会员中心', 'mc', '', '', '', '0', 'url', '1', '1', 'mc_members_manage');
INSERT INTO `ims_core_menu` VALUES ('42', '41', '会员中心关键字', 'mc', './index.php?c=platform&a=cover&do=mc&', '', '', '0', 'url', '1', '1', 'platform_cover_mc');
INSERT INTO `ims_core_menu` VALUES ('43', '41', '会员', 'mc', './index.php?c=mc&a=member', 'fa fa-plus', './index.php?c=mc&a=member&do=add', '0', 'url', '1', '1', 'mc_member');
INSERT INTO `ims_core_menu` VALUES ('44', '41', '会员组', 'mc', './index.php?c=mc&a=group&', '', '', '0', 'url', '1', '1', 'mc_group');
INSERT INTO `ims_core_menu` VALUES ('45', '37', '会员卡管理', 'mc', '', '', '', '0', 'url', '1', '1', 'mc_card_manage');
INSERT INTO `ims_core_menu` VALUES ('46', '45', '会员卡关键字', 'mc', './index.php?c=platform&a=cover&do=card&', '', '', '0', 'url', '1', '1', 'platform_cover_card');
INSERT INTO `ims_core_menu` VALUES ('47', '45', '会员卡管理', 'mc', './index.php?c=mc&a=card&do=manage', '', '', '0', 'url', '1', '1', 'mc_card_manage');
INSERT INTO `ims_core_menu` VALUES ('48', '45', '会员卡设置', 'mc', './index.php?c=mc&a=card&do=editor', '', '', '0', 'url', '1', '1', 'mc_card_editor');
INSERT INTO `ims_core_menu` VALUES ('49', '45', '会员卡其他功能', 'mc', './index.php?c=mc&a=card&do=other', '', '', '0', 'url', '1', '1', 'mc_card_other');
INSERT INTO `ims_core_menu` VALUES ('50', '37', '积分兑换', 'mc', '', '', '', '0', 'url', '1', '1', 'activity_discount_manage');
INSERT INTO `ims_core_menu` VALUES ('51', '50', '折扣券', 'mc', './index.php?c=activity&a=coupon&', '', '', '0', 'url', '1', '1', 'activity_coupon_display');
INSERT INTO `ims_core_menu` VALUES ('52', '50', '折扣券核销', 'mc', './index.php?c=activity&a=consume&do=display&type=1&status=2', '', '', '0', 'url', '1', '1', 'activity_consume_coupon');
INSERT INTO `ims_core_menu` VALUES ('53', '50', '代金券', 'mc', './index.php?c=activity&a=token', '', '', '0', 'url', '1', '1', 'activity_token_display');
INSERT INTO `ims_core_menu` VALUES ('54', '50', '代金券核销', 'mc', './index.php?c=activity&a=consume&do=display&type=2&status=2', '', '', '0', 'url', '1', '1', 'activity_consume_token');
INSERT INTO `ims_core_menu` VALUES ('55', '50', '真实物品', 'mc', './index.php?c=activity&a=goods', '', '', '0', 'url', '1', '1', 'activity_goods_display');
INSERT INTO `ims_core_menu` VALUES ('56', '37', '微信素材&群发', 'mc', '', '', '', '0', 'url', '1', '1', 'material_manage');
INSERT INTO `ims_core_menu` VALUES ('57', '56', '素材&群发', 'mc', './index.php?c=material&a=display', '', '', '0', 'url', '1', '1', 'material_display');
INSERT INTO `ims_core_menu` VALUES ('58', '56', '定时群发', 'mc', './index.php?c=material&a=mass', '', '', '0', 'url', '1', '1', 'material_mass');
INSERT INTO `ims_core_menu` VALUES ('59', '37', '微信卡券管理', 'mc', '', '', '', '0', 'url', '1', '1', 'wechat_card_manage');
INSERT INTO `ims_core_menu` VALUES ('60', '59', '卡券列表', 'mc', './index.php?c=wechat&a=card&do=list', '', '', '0', 'url', '1', '1', 'wechat_card_list');
INSERT INTO `ims_core_menu` VALUES ('61', '59', '卡券核销', 'mc', './index.php?c=wechat&a=consume', '', '', '0', 'url', '1', '1', 'wechat_consume');
INSERT INTO `ims_core_menu` VALUES ('62', '59', '测试白名单', 'mc', './index.php?c=wechat&a=white&do=list', '', '', '0', 'url', '1', '1', 'wechat_white_list');
INSERT INTO `ims_core_menu` VALUES ('63', '37', '门店管理', 'mc', '', '', '', '0', 'url', '1', '1', 'activity_store_manage');
INSERT INTO `ims_core_menu` VALUES ('64', '63', '门店列表', 'mc', './index.php?c=activity&a=store', '', '', '0', 'url', '1', '1', 'activity_store_list');
INSERT INTO `ims_core_menu` VALUES ('65', '63', '店员列表', 'mc', './index.php?c=activity&a=clerk', '', '', '0', 'url', '1', '1', 'activity_clerk_list');
INSERT INTO `ims_core_menu` VALUES ('66', '37', '收银台', 'mc', '', '', '', '0', 'url', '1', '1', 'paycenter_manage');
INSERT INTO `ims_core_menu` VALUES ('67', '66', '微信刷卡收款', 'mc', './index.php?c=paycenter&a=wxmicro&do=pay', '', '', '0', 'url', '1', '1', 'paycenter_wxmicro_pay');
INSERT INTO `ims_core_menu` VALUES ('68', '66', '收银台关键字', 'mc', './index.php?c=platform&a=cover&do=clerk', '', '', '0', 'url', '1', '1', 'paycenter_clerk');
INSERT INTO `ims_core_menu` VALUES ('69', '37', '统计中心', 'mc', '', '', '', '0', 'url', '1', '1', 'stat_center');
INSERT INTO `ims_core_menu` VALUES ('70', '69', '会员积分统计', 'mc', './index.php?c=stat&a=credit1', '', '', '0', 'url', '1', '1', 'stat_credit1');
INSERT INTO `ims_core_menu` VALUES ('71', '69', '会员余额统计', 'mc', './index.php?c=stat&a=credit2', '', '', '0', 'url', '1', '1', 'stat_credit2');
INSERT INTO `ims_core_menu` VALUES ('72', '69', '会员现金消费统计', 'mc', './index.php?c=stat&a=cash', '', '', '0', 'url', '1', '1', 'stat_cash');
INSERT INTO `ims_core_menu` VALUES ('73', '69', '会员卡统计', 'mc', './index.php?c=stat&a=card', '', '', '0', 'url', '1', '1', 'stat_card');
INSERT INTO `ims_core_menu` VALUES ('74', '69', '收银台收款统计', 'mc', './index.php?c=stat&a=paycenter', '', '', '0', 'url', '1', '1', 'stat_paycenter');
INSERT INTO `ims_core_menu` VALUES ('75', '0', '功能选项', 'setting', '', 'fa fa-umbrella', '', '0', 'url', '1', '1', '');
INSERT INTO `ims_core_menu` VALUES ('76', '75', '公众号选项', 'setting', '', '', '', '0', 'url', '1', '1', 'account_setting');
INSERT INTO `ims_core_menu` VALUES ('77', '76', '支付参数', 'setting', './index.php?c=profile&a=payment&', '', '', '0', 'url', '1', '1', 'profile_payment');
INSERT INTO `ims_core_menu` VALUES ('78', '76', '借用 oAuth 权限', 'setting', './index.php?c=mc&a=passport&do=oauth&', '', '', '0', 'url', '1', '1', 'mc_passport_oauth');
INSERT INTO `ims_core_menu` VALUES ('79', '76', '借用 JS 分享权限', 'setting', './index.php?c=profile&a=jsauth&', '', '', '0', 'url', '1', '1', 'profile_jsauth');
INSERT INTO `ims_core_menu` VALUES ('80', '76', '会员字段管理', 'setting', './index.php?c=mc&a=fields', '', '', '0', 'url', '1', '1', 'mc_fields');
INSERT INTO `ims_core_menu` VALUES ('81', '76', '微信通知设置', 'setting', './index.php?c=mc&a=tplnotice', '', '', '0', 'url', '1', '1', 'mc_tplnotice');
INSERT INTO `ims_core_menu` VALUES ('82', '76', '工作台菜单设置', 'setting', './index.php?c=profile&a=deskmenu', '', '', '0', 'url', '1', '1', 'profile_deskmenu');
INSERT INTO `ims_core_menu` VALUES ('83', '76', '会员扩展功能', 'setting', './index.php?c=mc&a=plugin', '', '', '0', 'url', '1', '1', 'mc_plugin');
INSERT INTO `ims_core_menu` VALUES ('84', '75', '会员及粉丝选项', 'setting', '', '', '', '0', 'url', '1', '1', 'mc_setting');
INSERT INTO `ims_core_menu` VALUES ('85', '84', '积分设置', 'setting', './index.php?c=mc&a=credit&', '', '', '0', 'url', '1', '1', 'mc_credit');
INSERT INTO `ims_core_menu` VALUES ('86', '84', '注册设置', 'setting', './index.php?c=mc&a=passport&do=passport&', '', '', '0', 'url', '1', '1', 'mc_passport_passport');
INSERT INTO `ims_core_menu` VALUES ('87', '84', '粉丝同步设置', 'setting', './index.php?c=mc&a=passport&do=sync&', '', '', '0', 'url', '1', '1', 'mc_passport_sync');
INSERT INTO `ims_core_menu` VALUES ('88', '84', 'UC站点整合', 'setting', './index.php?c=mc&a=uc&', '', '', '0', 'url', '1', '1', 'mc_uc');
INSERT INTO `ims_core_menu` VALUES ('89', '84', '邮件通知参数', 'setting', './index.php?c=profile&a=notify', '', '', '0', 'url', '1', '1', 'profile_notify');
INSERT INTO `ims_core_menu` VALUES ('90', '75', '其他功能选项', 'setting', '', '', '', '0', 'url', '1', '1', 'others_setting');
INSERT INTO `ims_core_menu` VALUES ('91', '0', '扩展功能', 'ext', '', 'fa fa-cubes', '', '0', 'url', '1', '1', '');
INSERT INTO `ims_core_menu` VALUES ('92', '91', '管理', 'ext', '', '', '', '0', 'url', '1', '1', '');
INSERT INTO `ims_core_menu` VALUES ('93', '92', '扩展功能管理', 'ext', './index.php?c=profile&a=module&', '', '', '0', 'url', '1', '1', 'profile_module');

-- ----------------------------
-- Table structure for `ims_core_paylog`
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_paylog`;
CREATE TABLE `ims_core_paylog` (
  `plid` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `openid` varchar(40) NOT NULL,
  `uniontid` varchar(50) NOT NULL,
  `tid` varchar(128) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `module` varchar(50) NOT NULL,
  `tag` varchar(2000) NOT NULL,
  `is_usecard` tinyint(3) unsigned NOT NULL,
  `card_type` tinyint(3) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `card_fee` decimal(10,2) unsigned NOT NULL,
  `encrypt_code` varchar(100) NOT NULL,
  PRIMARY KEY (`plid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_tid` (`tid`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `uniontid` (`uniontid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_paylog
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_core_performance`
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_performance`;
CREATE TABLE `ims_core_performance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `runtime` varchar(10) NOT NULL,
  `runurl` varchar(512) NOT NULL,
  `runsql` varchar(512) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_performance
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_core_queue`
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_queue`;
CREATE TABLE `ims_core_queue` (
  `qid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `message` varchar(2000) NOT NULL,
  `params` varchar(1000) NOT NULL,
  `keyword` varchar(1000) NOT NULL,
  `response` varchar(2000) NOT NULL,
  `module` varchar(50) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`qid`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `module` (`module`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_queue
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_core_resource`
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_resource`;
CREATE TABLE `ims_core_resource` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `media_id` varchar(100) NOT NULL,
  `trunk` int(10) unsigned NOT NULL,
  `type` varchar(10) NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `acid` (`uniacid`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_resource
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_core_sendsms_log`
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_sendsms_log`;
CREATE TABLE `ims_core_sendsms_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  `createtime` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_sendsms_log
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_core_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_sessions`;
CREATE TABLE `ims_core_sessions` (
  `sid` char(32) NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `data` varchar(5000) NOT NULL,
  `expiretime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_sessions
-- ----------------------------
INSERT INTO `ims_core_sessions` VALUES ('d24801a2d5a92d633779ab083da5cb03', '1', 'o-3-vjuH88wHMnshKBr2NlHtHBKs', 'openid|s:28:\"o-3-vjuH88wHMnshKBr2NlHtHBKs\";', '1467878677');
INSERT INTO `ims_core_sessions` VALUES ('96e79b46b6a782c948e62ebd46f6994f', '1', '127.0.0.1', 'acid|s:1:\"1\";uniacid|i:1;token|a:6:{s:4:\"MRQH\";i:1468667244;s:4:\"kNoZ\";i:1468667245;s:4:\"k5hr\";i:1468667245;s:4:\"cDaR\";i:1468667246;s:4:\"XcDc\";i:1468667246;s:4:\"VvN2\";i:1468667246;}', '1468670846');
INSERT INTO `ims_core_sessions` VALUES ('ed3d6e31fc02ff3af2e21fd6de42aac3', '1', '127.0.0.1', 'acid|s:1:\"1\";uniacid|i:1;token|a:6:{s:4:\"LrvO\";i:1471263645;s:4:\"T8qV\";i:1471263645;s:4:\"sdeS\";i:1471263645;s:4:\"uWPs\";i:1471263645;s:4:\"JcBg\";i:1471263645;s:4:\"msrE\";i:1471263646;}', '1471267246');
INSERT INTO `ims_core_sessions` VALUES ('1e30f0ee00efc90480e272111929a23c', '1', '127.0.0.1', 'acid|s:1:\"1\";uniacid|i:1;token|a:6:{s:4:\"Ip2w\";i:1471263840;s:4:\"n7Hw\";i:1471263840;s:4:\"U8H8\";i:1471263841;s:4:\"UOcB\";i:1471263841;s:4:\"ZU6o\";i:1471263842;s:4:\"Nkv3\";i:1471263843;}', '1471267443');
INSERT INTO `ims_core_sessions` VALUES ('1424150ccf407229311aadee6f9c7da8', '1', '127.0.0.1', 'acid|s:1:\"1\";uniacid|i:1;token|a:6:{s:4:\"PnQe\";i:1471316000;s:4:\"GVnZ\";i:1471316000;s:4:\"Ou71\";i:1471316000;s:4:\"VZUZ\";i:1471316001;s:4:\"gE36\";i:1471316001;s:4:\"sJ33\";i:1471316001;}', '1471319601');
INSERT INTO `ims_core_sessions` VALUES ('fac2105c26e1effd5dc3acf06e48820f', '1', '127.0.0.1', 'acid|s:1:\"1\";uniacid|i:1;token|a:6:{s:4:\"d8a4\";i:1471587151;s:4:\"w8lc\";i:1471587151;s:4:\"d3o5\";i:1471587153;s:4:\"s5V1\";i:1471587153;s:4:\"cu9u\";i:1471587153;s:4:\"V988\";i:1471587153;}', '1471590753');

-- ----------------------------
-- Table structure for `ims_core_settings`
-- ----------------------------
DROP TABLE IF EXISTS `ims_core_settings`;
CREATE TABLE `ims_core_settings` (
  `key` varchar(200) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_core_settings
-- ----------------------------
INSERT INTO `ims_core_settings` VALUES ('copyright', 'a:26:{s:6:\"status\";s:1:\"0\";s:10:\"verifycode\";N;s:6:\"reason\";s:0:\"\";s:6:\"smname\";s:21:\"微信分销商城\";s:8:\"sitename\";s:39:\"微信微信营销系统CMS企业版\";s:3:\"url\";s:24:\"http://www.v-888.com\";s:8:\"sitehost\";s:20:\"http://www.v-888.com\";s:8:\"statcode\";s:0:\"\";s:10:\"footerleft\";s:63:\"Powered by 微信微信营销系统CMS企业版 (c) 2016-2017\";s:11:\"footerright\";s:0:\"\";s:4:\"icon\";N;s:3:\"ewm\";N;s:5:\"flogo\";s:0:\"\";s:6:\"slides\";s:2:\"N;\";s:6:\"notice\";N;s:5:\"blogo\";N;s:8:\"baidumap\";a:2:{s:3:\"lng\";s:10:\"666\";s:3:\"lat\";s:9:\"888\";}s:7:\"company\";s:36:\"无锡科技集团\";s:7:\"address\";s:51:\"无锡科技集团\";s:6:\"person\";s:21:\"微信分销商城\";s:5:\"phone\";s:13:\"051066883358\";s:2:\"qq\";s:9:\"88888888\";s:5:\"email\";s:16:\"88888888@qq.com\";s:8:\"keywords\";s:109:\"微信微信三级分销商城,微信,微信公众平台,公众平台二次开发,公众平台开源软件\";s:11:\"description\";s:109:\"微信微信三级分销商城,微信,微信公众平台,公众平台二次开发,公众平台开源软件\";s:12:\"showhomepage\";i:1;}');
INSERT INTO `ims_core_settings` VALUES ('authmode', 'i:1;');
INSERT INTO `ims_core_settings` VALUES ('close', 'a:2:{s:6:\"status\";s:1:\"0\";s:6:\"reason\";s:0:\"\";}');
INSERT INTO `ims_core_settings` VALUES ('register', 'a:4:{s:4:\"open\";i:1;s:6:\"verify\";i:0;s:4:\"code\";i:1;s:7:\"groupid\";i:1;}');
INSERT INTO `ims_core_settings` VALUES ('site', 'a:2:{s:3:\"key\";s:5:\"45242\";s:5:\"token\";s:32:\"4ba355db6e59d2dc96f8cf244a869def\";}');
INSERT INTO `ims_core_settings` VALUES ('cloudip', 'a:2:{s:2:\"ip\";s:15:\"116.255.215.69\";s:6:\"expire\";i:1468071742;}');
INSERT INTO `ims_core_settings` VALUES ('basic', 'a:1:{s:8:\"template\";s:7:\"mobapps\";}');
INSERT INTO `ims_core_settings` VALUES ('module_receive_ban', 'a:0:{}');

-- ----------------------------
-- Table structure for `ims_coupon`
-- ----------------------------
DROP TABLE IF EXISTS `ims_coupon`;
CREATE TABLE `ims_coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `type` varchar(15) NOT NULL,
  `logo_url` varchar(150) NOT NULL,
  `code_type` tinyint(3) unsigned NOT NULL,
  `brand_name` varchar(15) NOT NULL,
  `title` varchar(15) NOT NULL,
  `sub_title` varchar(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `notice` varchar(15) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date_info` varchar(200) NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `location_id_list` varchar(1000) NOT NULL,
  `use_custom_code` tinyint(3) NOT NULL,
  `bind_openid` tinyint(3) unsigned NOT NULL,
  `can_share` tinyint(3) unsigned NOT NULL,
  `can_give_friend` tinyint(3) unsigned NOT NULL,
  `get_limit` tinyint(3) unsigned NOT NULL,
  `service_phone` varchar(20) NOT NULL,
  `extra` varchar(1000) NOT NULL,
  `source` varchar(20) NOT NULL,
  `url_name_type` varchar(20) NOT NULL,
  `custom_url` varchar(100) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `is_display` tinyint(3) unsigned NOT NULL,
  `is_selfconsume` tinyint(3) unsigned NOT NULL,
  `promotion_url_name` varchar(10) NOT NULL,
  `promotion_url` varchar(100) NOT NULL,
  `promotion_url_sub_title` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_coupon
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_coupon_location`
-- ----------------------------
DROP TABLE IF EXISTS `ims_coupon_location`;
CREATE TABLE `ims_coupon_location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `sid` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `category` varchar(255) NOT NULL,
  `province` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `photo_list` varchar(10000) NOT NULL,
  `avg_price` int(10) unsigned NOT NULL,
  `open_time` varchar(50) NOT NULL,
  `recommend` varchar(255) NOT NULL,
  `special` varchar(255) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `offset_type` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_coupon_location
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_coupon_modules`
-- ----------------------------
DROP TABLE IF EXISTS `ims_coupon_modules`;
CREATE TABLE `ims_coupon_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `module` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`),
  KEY `card_id` (`card_id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_coupon_modules
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_coupon_record`
-- ----------------------------
DROP TABLE IF EXISTS `ims_coupon_record`;
CREATE TABLE `ims_coupon_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `outer_id` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `friend_openid` varchar(50) NOT NULL,
  `givebyfriend` tinyint(3) unsigned NOT NULL,
  `code` varchar(50) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `usetime` int(10) unsigned NOT NULL,
  `status` tinyint(3) NOT NULL,
  `clerk_name` varchar(15) NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `outer_id` (`outer_id`),
  KEY `card_id` (`card_id`),
  KEY `hash` (`hash`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_coupon_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_coupon_setting`
-- ----------------------------
DROP TABLE IF EXISTS `ims_coupon_setting`;
CREATE TABLE `ims_coupon_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) NOT NULL,
  `logourl` varchar(150) NOT NULL,
  `whitelist` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_coupon_setting
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_cover_reply`
-- ----------------------------
DROP TABLE IF EXISTS `ims_cover_reply`;
CREATE TABLE `ims_cover_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `module` varchar(30) NOT NULL,
  `do` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_cover_reply
-- ----------------------------
INSERT INTO `ims_cover_reply` VALUES ('1', '1', '0', '7', 'mc', '', '进入个人中心', '', '', './index.php?c=mc&a=home&i=1');
INSERT INTO `ims_cover_reply` VALUES ('2', '1', '1', '8', 'site', '', '进入首页', '', '', './index.php?c=home&i=1&t=1');

-- ----------------------------
-- Table structure for `ims_custom_reply`
-- ----------------------------
DROP TABLE IF EXISTS `ims_custom_reply`;
CREATE TABLE `ims_custom_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `start1` int(10) NOT NULL,
  `end1` int(10) NOT NULL,
  `start2` int(10) NOT NULL,
  `end2` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_custom_reply
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_adpc`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_adpc`;
CREATE TABLE `ims_ewei_shop_v1_adpc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  `thumb_pc` varchar(255) DEFAULT '',
  `location` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_adpc
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_adv`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_adv`;
CREATE TABLE `ims_ewei_shop_v1_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  `thumb_pc` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_adv
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_af_supplier`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_af_supplier`;
CREATE TABLE `ims_ewei_shop_v1_af_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) CHARACTER SET utf8 NOT NULL,
  `uniacid` int(11) NOT NULL,
  `realname` varchar(55) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 NOT NULL,
  `weixin` varchar(255) CHARACTER SET utf8 NOT NULL,
  `productname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(3) NOT NULL COMMENT '1审核成功2驳回',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ims_ewei_shop_v1_af_supplier
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_article`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_article`;
CREATE TABLE `ims_ewei_shop_v1_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) NOT NULL DEFAULT '' COMMENT '文章标题',
  `resp_desc` text NOT NULL COMMENT '回复介绍',
  `resp_img` text NOT NULL COMMENT '回复图片',
  `article_content` longtext,
  `article_category` int(11) NOT NULL DEFAULT '0' COMMENT '文章分类',
  `article_date_v` varchar(20) NOT NULL DEFAULT '' COMMENT '虚拟发布时间',
  `article_date` varchar(20) NOT NULL DEFAULT '' COMMENT '文章发布时间',
  `article_mp` varchar(50) NOT NULL DEFAULT '' COMMENT '公众号',
  `article_author` varchar(20) NOT NULL DEFAULT '' COMMENT '发布作者',
  `article_readnum_v` int(11) NOT NULL DEFAULT '0' COMMENT '虚拟阅读量',
  `article_readnum` int(11) NOT NULL DEFAULT '0' COMMENT '真实阅读量',
  `article_likenum_v` int(11) NOT NULL DEFAULT '0' COMMENT '虚拟点赞数',
  `article_likenum` int(11) NOT NULL DEFAULT '0' COMMENT '真实点赞数',
  `article_linkurl` varchar(300) NOT NULL DEFAULT '' COMMENT '阅读原文链接',
  `article_rule_daynum` int(11) NOT NULL DEFAULT '0' COMMENT '每人每天参与次数',
  `article_rule_allnum` int(11) NOT NULL DEFAULT '0' COMMENT '所有参与次数',
  `article_rule_credit` int(11) NOT NULL DEFAULT '0' COMMENT '增加y积分',
  `article_rule_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '增加z余额',
  `article_rule_money_total` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '最高累计奖金',
  `article_rule_userd_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '截止目前累计奖励金额',
  `page_set_option_nocopy` int(1) NOT NULL DEFAULT '0' COMMENT '页面禁止复制url',
  `page_set_option_noshare_tl` int(1) NOT NULL DEFAULT '0' COMMENT '页面禁止分享至朋友圈',
  `page_set_option_noshare_msg` int(1) NOT NULL DEFAULT '0' COMMENT '页面禁止发送给好友',
  `article_keyword` varchar(255) NOT NULL DEFAULT '' COMMENT '页面关键字',
  `article_report` int(1) NOT NULL DEFAULT '0' COMMENT '举报按钮',
  `product_advs_type` int(1) NOT NULL DEFAULT '0' COMMENT '营销显示产品',
  `product_advs_title` varchar(255) NOT NULL DEFAULT '' COMMENT '营销产品标题',
  `product_advs_more` varchar(255) NOT NULL DEFAULT '' COMMENT '推广产品底部标题',
  `product_advs_link` varchar(255) NOT NULL DEFAULT '' COMMENT '推广产品底部链接',
  `product_advs` text NOT NULL COMMENT '营销商品',
  `article_state` int(1) NOT NULL DEFAULT '0',
  `network_attachment` varchar(255) DEFAULT '',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_article_title` (`article_title`),
  KEY `idx_article_content` (`article_content`(10)),
  KEY `idx_article_keyword` (`article_keyword`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='营销文章';

-- ----------------------------
-- Records of ims_ewei_shop_v1_article
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_article_category`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_article_category`;
CREATE TABLE `ims_ewei_shop_v1_article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL DEFAULT '' COMMENT '分类名称',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `m_level` int(11) NOT NULL DEFAULT '0',
  `d_level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_category_name` (`category_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='营销表单分类';

-- ----------------------------
-- Records of ims_ewei_shop_v1_article_category
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_article_log`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_article_log`;
CREATE TABLE `ims_ewei_shop_v1_article_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '文章id',
  `read` int(11) NOT NULL DEFAULT '0',
  `like` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(255) NOT NULL DEFAULT '' COMMENT '用户openid',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_aid` (`aid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='点赞/阅读记录';

-- ----------------------------
-- Records of ims_ewei_shop_v1_article_log
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_article_report`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_article_report`;
CREATE TABLE `ims_ewei_shop_v1_article_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(255) NOT NULL DEFAULT '',
  `aid` int(11) DEFAULT '0',
  `cate` varchar(255) NOT NULL DEFAULT '',
  `cons` varchar(255) NOT NULL DEFAULT '',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户举报记录';

-- ----------------------------
-- Records of ims_ewei_shop_v1_article_report
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_article_share`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_article_share`;
CREATE TABLE `ims_ewei_shop_v1_article_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL DEFAULT '0',
  `share_user` int(11) NOT NULL DEFAULT '0' COMMENT '分享人',
  `click_user` int(11) NOT NULL DEFAULT '0' COMMENT '点击人',
  `click_date` varchar(20) NOT NULL DEFAULT '' COMMENT '执行时间',
  `add_credit` int(11) NOT NULL DEFAULT '0' COMMENT '添加的积分',
  `add_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '添加的余额',
  `uniacid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_aid` (`aid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户分享数据';

-- ----------------------------
-- Records of ims_ewei_shop_v1_article_share
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_article_sys`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_article_sys`;
CREATE TABLE `ims_ewei_shop_v1_article_sys` (
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `article_message` varchar(255) NOT NULL DEFAULT '',
  `article_title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `article_image` varchar(300) NOT NULL DEFAULT '' COMMENT '图片',
  `article_shownum` int(11) NOT NULL DEFAULT '0' COMMENT '每页数量',
  `article_keyword` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `article_text` varchar(255) NOT NULL,
  `article_temp` int(11) NOT NULL DEFAULT '0',
  `article_area` text COMMENT '文章阅读地区',
  `isarticle` tinyint(1) NOT NULL,
  PRIMARY KEY (`uniacid`),
  KEY `idx_article_message` (`article_message`),
  KEY `idx_article_keyword` (`article_keyword`),
  KEY `idx_article_title` (`article_title`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章设置';

-- ----------------------------
-- Records of ims_ewei_shop_v1_article_sys
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_banner`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_banner`;
CREATE TABLE `ims_ewei_shop_v1_banner` (
  `id` int(11) NOT NULL,
  `uniacid` int(11) DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  `thumb_pc` varchar(500) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_banner
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_bonus`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_bonus`;
CREATE TABLE `ims_ewei_shop_v1_bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `send_bonus_sn` int(11) DEFAULT '0',
  `sendmonth` int(11) DEFAULT '0',
  `money` decimal(10,2) DEFAULT '0.00',
  `total` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `type` tinyint(1) DEFAULT '0' COMMENT '0 手动 1 自动',
  `paymethod` tinyint(1) DEFAULT '0',
  `isglobal` tinyint(1) DEFAULT '0',
  `sendpay_error` tinyint(1) DEFAULT '0',
  `utime` int(11) DEFAULT '0',
  `ctime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分红明细';

-- ----------------------------
-- Records of ims_ewei_shop_v1_bonus
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_bonus_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_bonus_goods`;
CREATE TABLE `ims_ewei_shop_v1_bonus_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `ordergoodid` int(11) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `total` int(11) DEFAULT '0',
  `optionname` varchar(100) DEFAULT '',
  `mid` int(11) DEFAULT '0' COMMENT '所有人，分佣者',
  `levelid` int(11) DEFAULT '0' COMMENT '级别id',
  `level` int(11) DEFAULT '0' COMMENT '1/2/3哪一级',
  `money` decimal(10,2) DEFAULT '0.00' COMMENT '应得佣金',
  `status` tinyint(3) DEFAULT '0' COMMENT '申请状态，-2删除，-1无效，0未申请，1申请，2审核通过 3已打款',
  `content` text,
  `applytime` int(11) DEFAULT '0',
  `checktime` int(11) DEFAULT '0',
  `paytime` int(11) DEFAULT '0',
  `invalidtime` int(11) DEFAULT '0',
  `deletetime` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `bonus_area` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分红单商品表';

-- ----------------------------
-- Records of ims_ewei_shop_v1_bonus_goods
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_bonus_level`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_bonus_level`;
CREATE TABLE `ims_ewei_shop_v1_bonus_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `levelname` varchar(50) DEFAULT '',
  `agent_money` decimal(10,2) DEFAULT '0.00',
  `pcommission` decimal(10,2) DEFAULT '0.00',
  `commissionmoney` decimal(10,2) DEFAULT '0.00',
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  `downcount` int(10) DEFAULT '0',
  `ordercount` int(10) DEFAULT '0',
  `downcountlevel1` int(10) DEFAULT '0',
  `type` int(11) DEFAULT '0' COMMENT '1为区域代理',
  `level` int(10) DEFAULT '0' COMMENT '等级权重',
  `premier` tinyint(1) DEFAULT '0' COMMENT '0 普通级别 1 最高级别',
  `content` text COMMENT '微信消息提醒追加内容',
  `msgtitle` varchar(100) DEFAULT '',
  `msgcontent` varchar(255) DEFAULT '',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分红代理等级表';

-- ----------------------------
-- Records of ims_ewei_shop_v1_bonus_level
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_bonus_log`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_bonus_log`;
CREATE TABLE `ims_ewei_shop_v1_bonus_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `uid` int(11) DEFAULT '0',
  `money` decimal(10,2) DEFAULT '0.00',
  `logno` varchar(255) DEFAULT '',
  `send_bonus_sn` int(11) DEFAULT '0',
  `paymethod` tinyint(1) DEFAULT '0',
  `isglobal` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `sendpay` tinyint(1) DEFAULT '0',
  `ctime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分红日志';

-- ----------------------------
-- Records of ims_ewei_shop_v1_bonus_log
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_carrier`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_carrier`;
CREATE TABLE `ims_ewei_shop_v1_carrier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `realname` varchar(50) DEFAULT '',
  `mobile` varchar(50) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `deleted` tinyint(1) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_deleted` (`deleted`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_carrier
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_cashier_order`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_cashier_order`;
CREATE TABLE `ims_ewei_shop_v1_cashier_order` (
  `order_id` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `cashier_store_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='收银台商户订单';

-- ----------------------------
-- Records of ims_ewei_shop_v1_cashier_order
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_cashier_store`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_cashier_store`;
CREATE TABLE `ims_ewei_shop_v1_cashier_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) DEFAULT NULL COMMENT '店名',
  `thumb` varchar(255) NOT NULL,
  `contact` varchar(100) DEFAULT NULL COMMENT '联系人',
  `mobile` varchar(30) DEFAULT NULL COMMENT '电话',
  `address` varchar(500) DEFAULT NULL COMMENT '地址',
  `member_id` int(11) DEFAULT '0' COMMENT '绑定的会员微信号',
  `deduct_credit1` decimal(10,2) DEFAULT '0.00' COMMENT '抵扣设置,允许使用的积分百分比',
  `deduct_credit2` decimal(10,2) DEFAULT '0.00' COMMENT '抵扣设置,允许使用的余额百分比',
  `settle_platform` decimal(10,2) DEFAULT '0.00' COMMENT '结算比例,平台比例',
  `settle_store` decimal(10,2) DEFAULT '0.00' COMMENT '结算比例,商家比例',
  `commission1_rate` decimal(10,2) DEFAULT '0.00' COMMENT '佣金比例,一级分销,消费者在商家用收银台支付后，分销商获得的佣金比例',
  `commission2_rate` decimal(10,2) DEFAULT '0.00' COMMENT '佣金比例,二级分销',
  `commission3_rate` decimal(10,2) DEFAULT '0.00' COMMENT '佣金比例,三级分销',
  `credit1` decimal(10,2) DEFAULT '0.00' COMMENT '消费者在商家支付完成后，获得的积分奖励百分比',
  `redpack_min` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '最小消费金额，才会发红包',
  `redpack` decimal(10,2) DEFAULT '0.00' COMMENT '消费者在商家支付完成后，获得的红包奖励百分比',
  `coupon_id` int(11) NOT NULL DEFAULT '0' COMMENT '优惠卷',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deredpack` tinyint(1) NOT NULL DEFAULT '0' COMMENT '扣除红包金额',
  `decommission` tinyint(1) NOT NULL DEFAULT '0' COMMENT '扣除佣金金额',
  `decredits` tinyint(1) NOT NULL DEFAULT '0' COMMENT '扣除奖励余额金额',
  `creditpack` decimal(10,2) DEFAULT '0.00' COMMENT '消费者在商家支付完成后，获得的余额奖励百分比',
  `iscontact` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否填写联系人信息',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_cashier_store
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_cashier_store_waiter`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_cashier_store_waiter`;
CREATE TABLE `ims_ewei_shop_v1_cashier_store_waiter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) DEFAULT NULL,
  `realname` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `uniacid` int(11) DEFAULT NULL,
  `createtime` varchar(255) DEFAULT NULL,
  `savetime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_cashier_store_waiter
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_cashier_withdraw`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_cashier_withdraw`;
CREATE TABLE `ims_ewei_shop_v1_cashier_withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `withdraw_no` varchar(255) NOT NULL,
  `openid` varchar(50) DEFAULT NULL,
  `cashier_store_id` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `status` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '提现状态 0 生成 1 成功 2 失败',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='收银台商户提现表';

-- ----------------------------
-- Records of ims_ewei_shop_v1_cashier_withdraw
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_category`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_category`;
CREATE TABLE `ims_ewei_shop_v1_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0' COMMENT '所属帐号',
  `name` varchar(50) DEFAULT NULL COMMENT '分类名称',
  `thumb` varchar(255) DEFAULT NULL COMMENT '分类图片',
  `parentid` int(11) DEFAULT '0' COMMENT '上级分类ID,0为第一级',
  `isrecommand` int(10) DEFAULT '0',
  `description` varchar(500) DEFAULT NULL COMMENT '分类介绍',
  `displayorder` tinyint(3) unsigned DEFAULT '0' COMMENT '排序',
  `enabled` tinyint(1) DEFAULT '1' COMMENT '是否开启',
  `ishome` tinyint(3) DEFAULT '0',
  `advimg` varchar(255) DEFAULT '',
  `advurl` varchar(500) DEFAULT '',
  `level` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_parentid` (`parentid`),
  KEY `idx_isrecommand` (`isrecommand`),
  KEY `idx_ishome` (`ishome`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_category
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_category2`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_category2`;
CREATE TABLE `ims_ewei_shop_v1_category2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0' COMMENT '所属帐号',
  `name` varchar(50) DEFAULT NULL COMMENT '分类名称',
  `thumb` varchar(255) DEFAULT NULL COMMENT '分类图片',
  `parentid` int(11) DEFAULT '0' COMMENT '上级分类ID,0为第一级',
  `isrecommand` int(10) DEFAULT '0',
  `description` varchar(500) DEFAULT NULL COMMENT '分类介绍',
  `displayorder` tinyint(3) unsigned DEFAULT '0' COMMENT '排序',
  `enabled` tinyint(1) DEFAULT '1' COMMENT '是否开启',
  `ishome` tinyint(3) DEFAULT '0',
  `advimg` varchar(255) DEFAULT '',
  `advurl` varchar(500) DEFAULT '',
  `level` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_parentid` (`parentid`),
  KEY `idx_isrecommand` (`isrecommand`),
  KEY `idx_ishome` (`ishome`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_category2
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_chooseagent`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_chooseagent`;
CREATE TABLE `ims_ewei_shop_v1_chooseagent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `agentname` varchar(255) DEFAULT NULL,
  `isopen` int(11) DEFAULT NULL COMMENT '0为关闭,1为开启',
  `createtime` varchar(255) DEFAULT NULL,
  `savetime` varchar(255) DEFAULT NULL,
  `uniacid` int(11) DEFAULT NULL,
  `pcate` int(11) DEFAULT NULL,
  `ccate` int(11) DEFAULT NULL,
  `tcate` int(11) DEFAULT NULL,
  `pagename` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_chooseagent
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_commission_apply`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_commission_apply`;
CREATE TABLE `ims_ewei_shop_v1_commission_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `applyno` varchar(255) DEFAULT '',
  `mid` int(11) DEFAULT '0' COMMENT '会员ID',
  `type` tinyint(3) DEFAULT '0' COMMENT '0 余额 1 微信',
  `orderids` text,
  `commission` decimal(10,2) DEFAULT '0.00',
  `commission_pay` decimal(10,2) DEFAULT '0.00',
  `content` text,
  `status` tinyint(3) DEFAULT '0' COMMENT '-1 无效 0 未知 1 正在申请 2 审核通过 3 已经打款',
  `applytime` int(11) DEFAULT '0',
  `checktime` int(11) DEFAULT '0',
  `paytime` int(11) DEFAULT '0',
  `invalidtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_mid` (`mid`),
  KEY `idx_checktime` (`checktime`),
  KEY `idx_paytime` (`paytime`),
  KEY `idx_applytime` (`applytime`),
  KEY `idx_status` (`status`),
  KEY `idx_invalidtime` (`invalidtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_commission_apply
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_commission_clickcount`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_commission_clickcount`;
CREATE TABLE `ims_ewei_shop_v1_commission_clickcount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `from_openid` varchar(255) DEFAULT '',
  `clicktime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_from_openid` (`from_openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_commission_clickcount
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_commission_level`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_commission_level`;
CREATE TABLE `ims_ewei_shop_v1_commission_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `levelname` varchar(50) DEFAULT '',
  `commission1` decimal(10,2) DEFAULT '0.00',
  `commission2` decimal(10,2) DEFAULT '0.00',
  `commission3` decimal(10,2) DEFAULT '0.00',
  `commissionmoney` decimal(10,2) DEFAULT '0.00',
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  `downcount` int(11) DEFAULT '0',
  `ordercount` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_commission_level
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_commission_log`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_commission_log`;
CREATE TABLE `ims_ewei_shop_v1_commission_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `applyid` int(11) DEFAULT '0',
  `mid` int(11) DEFAULT '0',
  `commission` decimal(10,2) DEFAULT '0.00',
  `createtime` int(11) DEFAULT '0',
  `commission_pay` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_applyid` (`applyid`),
  KEY `idx_mid` (`mid`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_commission_log
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_commission_shop`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_commission_shop`;
CREATE TABLE `ims_ewei_shop_v1_commission_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `mid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '',
  `logo` varchar(255) DEFAULT '',
  `img` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT '',
  `selectgoods` tinyint(3) DEFAULT '0',
  `selectcategory` tinyint(3) DEFAULT '0',
  `goodsids` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_mid` (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_commission_shop
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_coupon`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_coupon`;
CREATE TABLE `ims_ewei_shop_v1_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `catid` int(11) DEFAULT '0',
  `couponname` varchar(255) DEFAULT '',
  `gettype` tinyint(3) DEFAULT '0',
  `getmax` int(11) DEFAULT '0',
  `usetype` tinyint(3) DEFAULT '0' COMMENT '消费方式 0 付款使用 1 下单使用',
  `returntype` tinyint(3) DEFAULT '0' COMMENT '退回方式 0 不可退回 1 取消订单(未付款) 2.退款可以退回',
  `bgcolor` varchar(255) DEFAULT '',
  `enough` decimal(10,2) DEFAULT '0.00',
  `timelimit` tinyint(3) DEFAULT '0' COMMENT '0 领取后几天有效 1 时间范围',
  `coupontype` tinyint(3) DEFAULT '0' COMMENT '0 优惠券 1 充值券',
  `timedays` int(11) DEFAULT '0',
  `timestart` int(11) DEFAULT '0',
  `timeend` int(11) DEFAULT '0',
  `discount` decimal(10,2) DEFAULT '0.00' COMMENT '折扣',
  `deduct` decimal(10,2) DEFAULT '0.00' COMMENT '抵扣',
  `backtype` tinyint(3) DEFAULT '0',
  `backmoney` varchar(50) DEFAULT '' COMMENT '返现',
  `backcredit` varchar(50) DEFAULT '' COMMENT '返积分',
  `backredpack` varchar(50) DEFAULT '',
  `backwhen` tinyint(3) DEFAULT '0',
  `thumb` varchar(255) DEFAULT '',
  `desc` text,
  `createtime` int(11) DEFAULT '0',
  `total` int(11) DEFAULT '0' COMMENT '数量 -1 不限制',
  `status` tinyint(3) DEFAULT '0' COMMENT '可用',
  `money` decimal(10,2) DEFAULT '0.00' COMMENT '购买价格',
  `respdesc` text COMMENT '推送描述',
  `respthumb` varchar(255) DEFAULT '' COMMENT '推送图片',
  `resptitle` varchar(255) DEFAULT '' COMMENT '推送标题',
  `respurl` varchar(255) DEFAULT '',
  `credit` int(11) DEFAULT '0',
  `usecredit2` tinyint(3) DEFAULT '0',
  `remark` varchar(1000) DEFAULT '',
  `descnoset` tinyint(3) DEFAULT '0',
  `pwdkey` varchar(255) DEFAULT '',
  `pwdsuc` text,
  `pwdfail` text,
  `pwdurl` varchar(255) DEFAULT '',
  `pwdask` text,
  `pwdstatus` tinyint(3) DEFAULT '0',
  `pwdtimes` int(11) DEFAULT '0',
  `pwdfull` text,
  `pwdwords` text,
  `pwdopen` tinyint(3) DEFAULT '0',
  `pwdown` text,
  `pwdexit` varchar(255) DEFAULT '',
  `pwdexitstr` text,
  `displayorder` int(11) DEFAULT '0',
  `supplier_uid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_coupontype` (`coupontype`),
  KEY `idx_timestart` (`timestart`),
  KEY `idx_timeend` (`timeend`),
  KEY `idx_timelimit` (`timelimit`),
  KEY `idx_status` (`status`),
  KEY `idx_givetype` (`backtype`),
  KEY `idx_catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_coupon
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_coupon_category`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_coupon_category`;
CREATE TABLE `ims_ewei_shop_v1_coupon_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_coupon_category
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_coupon_data`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_coupon_data`;
CREATE TABLE `ims_ewei_shop_v1_coupon_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `couponid` int(11) DEFAULT '0',
  `gettype` tinyint(3) DEFAULT '0' COMMENT '获取方式 0 发放 1 领取 2 积分商城',
  `used` int(11) DEFAULT '0',
  `usetime` int(11) DEFAULT '0',
  `gettime` int(11) DEFAULT '0' COMMENT '获取时间',
  `senduid` int(11) DEFAULT '0',
  `ordersn` varchar(255) DEFAULT '',
  `back` tinyint(3) DEFAULT '0',
  `backtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_couponid` (`couponid`),
  KEY `idx_gettype` (`gettype`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_coupon_data
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_coupon_guess`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_coupon_guess`;
CREATE TABLE `ims_ewei_shop_v1_coupon_guess` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `couponid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `times` int(11) DEFAULT '0',
  `pwdkey` varchar(255) DEFAULT '',
  `ok` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_couponid` (`couponid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_coupon_guess
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_coupon_log`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_coupon_log`;
CREATE TABLE `ims_ewei_shop_v1_coupon_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `logno` varchar(255) DEFAULT '',
  `openid` varchar(255) DEFAULT '',
  `couponid` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `paystatus` tinyint(3) DEFAULT '0',
  `creditstatus` tinyint(3) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `paytype` tinyint(3) DEFAULT '0',
  `getfrom` tinyint(3) DEFAULT '0' COMMENT '0 发放 1 中心 2 积分兑换',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_couponid` (`couponid`),
  KEY `idx_status` (`status`),
  KEY `idx_paystatus` (`paystatus`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_getfrom` (`getfrom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_coupon_log
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_creditshop_adv`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_creditshop_adv`;
CREATE TABLE `ims_ewei_shop_v1_creditshop_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_enabled` (`enabled`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_creditshop_adv
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_creditshop_category`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_creditshop_category`;
CREATE TABLE `ims_ewei_shop_v1_creditshop_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0' COMMENT '所属帐号',
  `name` varchar(50) DEFAULT NULL COMMENT '分类名称',
  `thumb` varchar(255) DEFAULT NULL COMMENT '分类图片',
  `displayorder` tinyint(3) unsigned DEFAULT '0' COMMENT '排序',
  `enabled` tinyint(1) DEFAULT '1' COMMENT '是否开启',
  `advimg` varchar(255) DEFAULT '',
  `advurl` varchar(500) DEFAULT '',
  `isrecommand` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_enabled` (`enabled`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_creditshop_category
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_creditshop_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_creditshop_goods`;
CREATE TABLE `ims_ewei_shop_v1_creditshop_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `cate` int(11) DEFAULT '0',
  `thumb` varchar(255) DEFAULT '',
  `price` decimal(10,2) DEFAULT '0.00',
  `type` tinyint(3) DEFAULT '0',
  `credit` int(11) DEFAULT '0',
  `money` decimal(10,2) DEFAULT '0.00',
  `total` int(11) DEFAULT '0',
  `totalday` int(11) DEFAULT '0',
  `chance` int(11) DEFAULT '0',
  `chanceday` int(11) DEFAULT '0',
  `detail` text,
  `rate1` int(11) DEFAULT '0',
  `rate2` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  `joins` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  `showlevels` text,
  `buylevels` text,
  `showgroups` text,
  `buygroups` text,
  `vip` tinyint(3) DEFAULT '0',
  `istop` tinyint(3) DEFAULT '0',
  `isrecommand` tinyint(3) DEFAULT '0',
  `istime` tinyint(3) DEFAULT '0',
  `timestart` int(11) DEFAULT '0',
  `timeend` int(11) DEFAULT '0',
  `share_title` varchar(255) DEFAULT '',
  `share_icon` varchar(255) DEFAULT '',
  `share_desc` varchar(500) DEFAULT '',
  `followneed` tinyint(3) DEFAULT '0',
  `followtext` varchar(255) DEFAULT '',
  `subtitle` varchar(255) DEFAULT '',
  `subdetail` text,
  `noticedetail` text,
  `usedetail` varchar(255) DEFAULT '',
  `goodsdetail` text,
  `isendtime` tinyint(3) DEFAULT '0',
  `usecredit2` tinyint(3) DEFAULT '0',
  `area` varchar(255) DEFAULT '',
  `dispatch` decimal(10,2) DEFAULT '0.00',
  `storeids` text,
  `noticeopenid` varchar(255) DEFAULT '',
  `noticetype` tinyint(3) DEFAULT '0',
  `isverify` tinyint(3) DEFAULT '0',
  `goodstype` tinyint(3) DEFAULT '0',
  `couponid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_type` (`type`),
  KEY `idx_endtime` (`endtime`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_status` (`status`),
  KEY `idx_displayorder` (`displayorder`),
  KEY `idx_deleted` (`deleted`),
  KEY `idx_istop` (`istop`),
  KEY `idx_isrecommand` (`isrecommand`),
  KEY `idx_istime` (`istime`),
  KEY `idx_timestart` (`timestart`),
  KEY `idx_timeend` (`timeend`),
  KEY `idx_goodstype` (`goodstype`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_creditshop_goods
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_creditshop_log`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_creditshop_log`;
CREATE TABLE `ims_ewei_shop_v1_creditshop_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `logno` varchar(255) DEFAULT '',
  `eno` varchar(255) DEFAULT '' COMMENT '兑换码',
  `openid` varchar(255) DEFAULT '',
  `goodsid` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0' COMMENT '0 只生成记录未参加 1 未中奖 2 已中奖 3 已发奖',
  `paystatus` tinyint(3) DEFAULT '0' COMMENT '支付状态 -1 不需要支付 0 未支付 1 已支付',
  `paytype` tinyint(3) DEFAULT '-1' COMMENT '支付类型 -1 不需要支付 0 余额 1 微信',
  `dispatchstatus` tinyint(3) DEFAULT '0' COMMENT '运费状态 -1 不需要运费 0 未支付 1 已支付',
  `creditpay` tinyint(3) DEFAULT '0' COMMENT '积分支付 0 未支付 1 已支付',
  `addressid` int(11) DEFAULT '0' COMMENT '收货地址',
  `dispatchno` varchar(255) DEFAULT '' COMMENT '运费支付单号',
  `usetime` int(11) DEFAULT '0',
  `express` varchar(255) DEFAULT '',
  `expresssn` varchar(255) DEFAULT '',
  `expresscom` varchar(255) DEFAULT '',
  `verifyopenid` varchar(255) DEFAULT '',
  `storeid` int(11) DEFAULT '0',
  `realname` varchar(255) DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `couponid` int(11) DEFAULT '0',
  `dupdate1` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_creditshop_log
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_designer`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_designer`;
CREATE TABLE `ims_ewei_shop_v1_designer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0' COMMENT '公众号',
  `pagename` varchar(255) NOT NULL DEFAULT '' COMMENT '页面名称',
  `pagetype` tinyint(3) NOT NULL DEFAULT '0' COMMENT '页面类型',
  `pageinfo` text NOT NULL,
  `createtime` varchar(255) NOT NULL DEFAULT '' COMMENT '页面创建时间',
  `keyword` varchar(255) DEFAULT '',
  `savetime` varchar(255) NOT NULL DEFAULT '' COMMENT '页面最后保存时间',
  `setdefault` tinyint(3) NOT NULL DEFAULT '0' COMMENT '默认页面',
  `datas` text NOT NULL COMMENT '数据',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_pagetype` (`pagetype`),
  FULLTEXT KEY `idx_keyword` (`keyword`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_designer
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_designer_menu`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_designer_menu`;
CREATE TABLE `ims_ewei_shop_v1_designer_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `menuname` varchar(255) DEFAULT '',
  `isdefault` tinyint(3) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `menus` text,
  `params` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_isdefault` (`isdefault`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_designer_menu
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_dispatch`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_dispatch`;
CREATE TABLE `ims_ewei_shop_v1_dispatch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `dispatchname` varchar(50) DEFAULT '',
  `dispatchtype` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `firstprice` decimal(10,2) DEFAULT '0.00',
  `secondprice` decimal(10,2) DEFAULT '0.00',
  `firstweight` int(11) DEFAULT '0',
  `secondweight` int(11) DEFAULT '0',
  `express` varchar(250) DEFAULT '',
  `areas` text,
  `carriers` text,
  `enabled` int(11) DEFAULT '0',
  `isdefault` tinyint(1) DEFAULT '0',
  `calculatetype` tinyint(1) DEFAULT '0',
  `firstnumprice` decimal(10,2) DEFAULT '0.00',
  `secondnumprice` decimal(10,2) DEFAULT '0.00',
  `firstnum` int(11) DEFAULT '0',
  `secondnum` int(11) DEFAULT '0',
  `supplier_uid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_dispatch
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_diyform_category`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_diyform_category`;
CREATE TABLE `ims_ewei_shop_v1_diyform_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0' COMMENT '所属帐号',
  `name` varchar(50) DEFAULT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_diyform_category
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_diyform_data`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_diyform_data`;
CREATE TABLE `ims_ewei_shop_v1_diyform_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `typeid` int(11) NOT NULL DEFAULT '0' COMMENT '类型id',
  `cid` int(11) DEFAULT '0' COMMENT '关联id',
  `diyformfields` text,
  `fields` text NOT NULL COMMENT '字符集',
  `openid` varchar(255) NOT NULL DEFAULT '' COMMENT '使用者openid',
  `type` tinyint(2) DEFAULT '0' COMMENT '该数据所属模块',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_typeid` (`typeid`) USING BTREE,
  KEY `idx_cid` (`cid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_diyform_data
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_diyform_temp`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_diyform_temp`;
CREATE TABLE `ims_ewei_shop_v1_diyform_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `typeid` int(11) DEFAULT '0',
  `cid` int(11) NOT NULL DEFAULT '0' COMMENT '关联id',
  `diyformfields` text,
  `fields` text NOT NULL COMMENT '字符集',
  `openid` varchar(255) NOT NULL DEFAULT '' COMMENT '使用者openid',
  `type` tinyint(1) DEFAULT '0' COMMENT '类型',
  `diyformid` int(11) DEFAULT '0',
  `diyformdata` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_cid` (`cid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_diyform_temp
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_diyform_type`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_diyform_type`;
CREATE TABLE `ims_ewei_shop_v1_diyform_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `cate` int(11) DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '分类名称',
  `fields` text NOT NULL COMMENT '字段集',
  `usedata` int(11) NOT NULL DEFAULT '0' COMMENT '已用数据',
  `alldata` int(11) NOT NULL DEFAULT '0' COMMENT '全部数据',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE,
  KEY `idx_cate` (`cate`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_diyform_type
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_exhelper_express`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_exhelper_express`;
CREATE TABLE `ims_ewei_shop_v1_exhelper_express` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `type` int(1) NOT NULL DEFAULT '1' COMMENT '单据分类 1为快递单 2为发货单',
  `expressname` varchar(255) DEFAULT '',
  `expresscom` varchar(255) NOT NULL DEFAULT '',
  `express` varchar(255) NOT NULL DEFAULT '',
  `width` decimal(10,2) DEFAULT '0.00',
  `datas` text,
  `height` decimal(10,2) DEFAULT '0.00',
  `bg` varchar(255) DEFAULT '',
  `isdefault` tinyint(3) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_isdefault` (`isdefault`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_exhelper_express
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_exhelper_senduser`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_exhelper_senduser`;
CREATE TABLE `ims_ewei_shop_v1_exhelper_senduser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `sendername` varchar(255) DEFAULT '' COMMENT '发件人',
  `sendertel` varchar(255) DEFAULT '' COMMENT '发件人联系电话',
  `sendersign` varchar(255) DEFAULT '' COMMENT '发件人签名',
  `sendercode` int(11) DEFAULT NULL COMMENT '发件地址邮编',
  `senderaddress` varchar(255) DEFAULT '' COMMENT '发件地址',
  `sendercity` varchar(255) DEFAULT NULL COMMENT '发件城市',
  `isdefault` tinyint(3) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_isdefault` (`isdefault`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_exhelper_senduser
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_exhelper_sys`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_exhelper_sys`;
CREATE TABLE `ims_ewei_shop_v1_exhelper_sys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(20) NOT NULL DEFAULT 'localhost',
  `port` int(11) NOT NULL DEFAULT '8000',
  `uid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_exhelper_sys
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_express`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_express`;
CREATE TABLE `ims_ewei_shop_v1_express` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `express_name` varchar(50) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `express_price` varchar(10) DEFAULT '',
  `express_area` varchar(100) DEFAULT '',
  `express_url` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_express
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_feedback`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_feedback`;
CREATE TABLE `ims_ewei_shop_v1_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '0',
  `type` tinyint(1) DEFAULT '1' COMMENT '1为维权，2为投诉',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态 0 未解决，1用户同意，2用户拒绝',
  `feedbackid` varchar(100) DEFAULT '' COMMENT '投诉单号',
  `transid` varchar(100) DEFAULT '' COMMENT '订单号',
  `reason` varchar(1000) DEFAULT '' COMMENT '理由',
  `solution` varchar(1000) DEFAULT '' COMMENT '期待解决方案',
  `remark` varchar(1000) DEFAULT '' COMMENT '备注',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_feedbackid` (`feedbackid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_transid` (`transid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_feedback
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_goods`;
CREATE TABLE `ims_ewei_shop_v1_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `pcate` int(11) DEFAULT '0',
  `ccate` int(11) DEFAULT '0',
  `type` tinyint(1) DEFAULT '1' COMMENT '1为实体，2为虚拟',
  `status` tinyint(1) DEFAULT '1',
  `displayorder` int(11) DEFAULT '0',
  `title` varchar(100) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `unit` varchar(5) DEFAULT '',
  `description` varchar(1000) DEFAULT '',
  `content` text,
  `goodssn` varchar(50) DEFAULT '',
  `productsn` varchar(50) DEFAULT '',
  `productprice` decimal(10,2) DEFAULT '0.00',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  `costprice` decimal(10,2) DEFAULT '0.00',
  `originalprice` decimal(10,2) DEFAULT '0.00' COMMENT '原价',
  `total` int(10) DEFAULT '0',
  `totalcnf` int(11) DEFAULT '0' COMMENT '0 拍下减库存 1 付款减库存 2 永久不减',
  `sales` int(11) DEFAULT '0',
  `salesreal` int(11) DEFAULT '0',
  `spec` varchar(5000) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `weight` decimal(10,2) DEFAULT '0.00',
  `credit` varchar(255) DEFAULT NULL,
  `maxbuy` int(11) DEFAULT '0',
  `usermaxbuy` int(11) DEFAULT '0',
  `hasoption` int(11) DEFAULT '0',
  `dispatch` int(11) DEFAULT '0',
  `thumb_url` text,
  `isnew` tinyint(1) DEFAULT '0',
  `ishot` tinyint(1) DEFAULT '0',
  `isdiscount` tinyint(1) DEFAULT '0',
  `isrecommand` tinyint(1) DEFAULT '0',
  `issendfree` tinyint(1) DEFAULT '0',
  `istime` tinyint(1) DEFAULT '0',
  `iscomment` tinyint(1) DEFAULT '0',
  `timestart` int(11) DEFAULT '0',
  `timeend` int(11) DEFAULT '0',
  `viewcount` int(11) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  `hascommission` tinyint(3) DEFAULT '0',
  `commission1_rate` decimal(10,2) DEFAULT '0.00',
  `commission1_pay` decimal(10,2) DEFAULT '0.00',
  `commission2_rate` decimal(10,2) DEFAULT '0.00',
  `commission2_pay` decimal(10,2) DEFAULT '0.00',
  `commission3_rate` decimal(10,2) DEFAULT '0.00',
  `commission3_pay` decimal(10,2) DEFAULT '0.00',
  `score` decimal(10,2) DEFAULT '0.00',
  `taobaoid` varchar(255) DEFAULT '',
  `taotaoid` varchar(255) DEFAULT '',
  `taobaourl` varchar(255) DEFAULT '',
  `updatetime` int(11) DEFAULT '0',
  `share_title` varchar(255) DEFAULT '',
  `share_icon` varchar(255) DEFAULT '',
  `cash` tinyint(3) DEFAULT '0',
  `commission_thumb` varchar(255) DEFAULT '',
  `isnodiscount` tinyint(3) DEFAULT '0',
  `showlevels` text,
  `buylevels` text,
  `showgroups` text,
  `buygroups` text,
  `isverify` tinyint(3) DEFAULT '0',
  `storeids` text,
  `noticeopenid` text,
  `tcate` int(11) DEFAULT '0',
  `noticetype` text,
  `needfollow` tinyint(3) DEFAULT '0',
  `followtip` varchar(255) DEFAULT '',
  `followurl` varchar(255) DEFAULT '',
  `deduct` decimal(10,2) DEFAULT '0.00',
  `virtual` int(11) DEFAULT '0',
  `ccates` text,
  `discounts` text,
  `nocommission` tinyint(3) DEFAULT '0',
  `hidecommission` tinyint(3) DEFAULT '0',
  `pcates` text,
  `tcates` text,
  `artid` int(11) DEFAULT '0',
  `detail_logo` varchar(255) DEFAULT '',
  `detail_shopname` varchar(255) DEFAULT '',
  `detail_btntext1` varchar(255) DEFAULT '',
  `detail_btnurl1` varchar(255) DEFAULT '',
  `detail_btntext2` varchar(255) DEFAULT '',
  `detail_btnurl2` varchar(255) DEFAULT '',
  `detail_totaltitle` varchar(255) DEFAULT '',
  `deduct2` decimal(10,2) DEFAULT '0.00',
  `ednum` int(11) DEFAULT '0',
  `edmoney` decimal(10,2) DEFAULT '0.00',
  `edareas` text,
  `cates` text,
  `commission_level_id` int(11) DEFAULT '0' COMMENT '购买该商品成为指定分销商等级',
  `supplier_uid` int(11) NOT NULL COMMENT '多商家ID',
  `diyformtype` tinyint(3) DEFAULT '0',
  `manydeduct` tinyint(1) DEFAULT '0',
  `dispatchtype` tinyint(1) DEFAULT '0',
  `dispatchid` int(11) DEFAULT '0',
  `dispatchprice` decimal(10,2) DEFAULT '0.00',
  `diyformid` int(11) DEFAULT '0',
  `diymode` tinyint(3) DEFAULT '0',
  `shorttitle` varchar(500) DEFAULT NULL,
  `redprice` varchar(50) DEFAULT '',
  `pcate1` int(11) DEFAULT '0',
  `ccate1` int(11) DEFAULT '0',
  `tcate1` int(11) DEFAULT '0',
  `nobonus` tinyint(1) DEFAULT '0',
  `returns` text,
  `isverifysend` tinyint(1) NOT NULL DEFAULT '0',
  `isreturn` tinyint(1) DEFAULT '0',
  `isreturnqueue` tinyint(1) DEFAULT '0',
  `bonusmoney` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_pcate` (`pcate`),
  KEY `idx_ccate` (`ccate`),
  KEY `idx_isnew` (`isnew`),
  KEY `idx_ishot` (`ishot`),
  KEY `idx_isdiscount` (`isdiscount`),
  KEY `idx_isrecommand` (`isrecommand`),
  KEY `idx_iscomment` (`iscomment`),
  KEY `idx_issendfree` (`issendfree`),
  KEY `idx_istime` (`istime`),
  KEY `idx_deleted` (`deleted`),
  KEY `idx_tcate` (`tcate`),
  FULLTEXT KEY `idx_buylevels` (`buylevels`),
  FULLTEXT KEY `idx_showgroups` (`showgroups`),
  FULLTEXT KEY `idx_buygroups` (`buygroups`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_goods
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_goods_comment`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_goods_comment`;
CREATE TABLE `ims_ewei_shop_v1_goods_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(10) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `nickname` varchar(50) DEFAULT '',
  `headimgurl` varchar(255) DEFAULT '',
  `content` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_goods_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_goods_option`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_goods_option`;
CREATE TABLE `ims_ewei_shop_v1_goods_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(10) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `thumb` varchar(60) DEFAULT '',
  `productprice` decimal(10,2) DEFAULT '0.00',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  `costprice` decimal(10,2) DEFAULT '0.00',
  `stock` int(11) DEFAULT '0',
  `weight` decimal(10,2) DEFAULT '0.00',
  `displayorder` int(11) DEFAULT '0',
  `specs` text,
  `skuId` varchar(255) DEFAULT '',
  `goodssn` varchar(255) DEFAULT '',
  `productsn` varchar(255) DEFAULT '',
  `virtual` int(11) DEFAULT '0',
  `redprice` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_goods_option
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_goods_param`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_goods_param`;
CREATE TABLE `ims_ewei_shop_v1_goods_param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(10) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `value` text,
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_goods_param
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_goods_spec`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_goods_spec`;
CREATE TABLE `ims_ewei_shop_v1_goods_spec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `description` varchar(1000) DEFAULT '',
  `displaytype` tinyint(3) DEFAULT '0',
  `content` text,
  `displayorder` int(11) DEFAULT '0',
  `propId` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_goods_spec
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_goods_spec_item`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_goods_spec_item`;
CREATE TABLE `ims_ewei_shop_v1_goods_spec_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `specid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `show` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `valueId` varchar(255) DEFAULT '',
  `virtual` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_specid` (`specid`),
  KEY `idx_show` (`show`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_goods_spec_item
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_member`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_member`;
CREATE TABLE `ims_ewei_shop_v1_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `groupid` int(11) DEFAULT '0',
  `level` int(11) DEFAULT '0',
  `agentid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `realname` varchar(20) DEFAULT '',
  `mobile` varchar(11) DEFAULT '',
  `pwd` varchar(100) DEFAULT NULL,
  `weixin` varchar(100) DEFAULT '',
  `content` text,
  `createtime` int(10) DEFAULT '0',
  `agenttime` int(10) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `isagent` tinyint(1) DEFAULT '0',
  `clickcount` int(11) DEFAULT '0',
  `agentlevel` int(11) DEFAULT '0',
  `noticeset` text,
  `nickname` varchar(255) DEFAULT '',
  `credit1` int(11) DEFAULT '0',
  `credit2` decimal(10,2) DEFAULT '0.00',
  `birthyear` varchar(255) DEFAULT '',
  `birthmonth` varchar(255) DEFAULT '',
  `birthday` varchar(255) DEFAULT '',
  `gender` tinyint(3) DEFAULT '0',
  `avatar` varchar(255) DEFAULT '',
  `province` varchar(255) DEFAULT '',
  `city` varchar(255) DEFAULT '',
  `area` varchar(255) DEFAULT '',
  `childtime` int(11) DEFAULT '0',
  `inviter` int(11) DEFAULT '0',
  `agentnotupgrade` tinyint(3) DEFAULT '0',
  `agentselectgoods` tinyint(3) DEFAULT '0',
  `agentblack` tinyint(3) DEFAULT '0',
  `fixagentid` tinyint(3) DEFAULT '0',
  `regtype` tinyint(3) DEFAULT '1',
  `isbindmobile` tinyint(3) DEFAULT '0',
  `isjumpbind` tinyint(3) DEFAULT '0',
  `diymemberid` int(11) DEFAULT '0',
  `isblack` tinyint(3) DEFAULT '0',
  `diymemberdataid` int(11) DEFAULT '0',
  `diycommissionid` int(11) DEFAULT '0',
  `diycommissiondataid` int(11) DEFAULT '0',
  `diymemberfields` text,
  `diymemberdata` text,
  `diycommissionfields` text,
  `diycommissiondata` text,
  `referralsn` varchar(255) NOT NULL,
  `bindapp` tinyint(4) NOT NULL DEFAULT '0',
  `bonuslevel` int(11) DEFAULT '0',
  `bonus_area` tinyint(1) DEFAULT '0',
  `bonus_status` tinyint(1) DEFAULT '0',
  `bonus_province` varchar(50) DEFAULT '',
  `bonus_city` varchar(50) DEFAULT '',
  `bonus_district` varchar(50) DEFAULT '',
  `bonus_area_commission` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_shareid` (`agentid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_status` (`status`),
  KEY `idx_agenttime` (`agenttime`),
  KEY `idx_isagent` (`isagent`),
  KEY `idx_uid` (`uid`),
  KEY `idx_groupid` (`groupid`),
  KEY `idx_level` (`level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_member
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_member_address`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_member_address`;
CREATE TABLE `ims_ewei_shop_v1_member_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '0',
  `realname` varchar(20) DEFAULT '',
  `mobile` varchar(11) DEFAULT '',
  `province` varchar(30) DEFAULT '',
  `city` varchar(30) DEFAULT '',
  `area` varchar(30) DEFAULT '',
  `address` varchar(300) DEFAULT '',
  `isdefault` tinyint(1) DEFAULT '0',
  `zipcode` varchar(255) DEFAULT '',
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_isdefault` (`isdefault`),
  KEY `idx_deleted` (`deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_member_address
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_member_cart`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_member_cart`;
CREATE TABLE `ims_ewei_shop_v1_member_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(100) DEFAULT '',
  `goodsid` int(11) DEFAULT '0',
  `total` int(11) DEFAULT '0',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  `deleted` tinyint(1) DEFAULT '0',
  `optionid` int(11) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `diyformdata` text,
  `diyformfields` text,
  `diyformdataid` int(11) DEFAULT '0',
  `diyformid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_deleted` (`deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_member_cart
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_member_favorite`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_member_favorite`;
CREATE TABLE `ims_ewei_shop_v1_member_favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(10) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `deleted` tinyint(1) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_deleted` (`deleted`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_member_favorite
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_member_group`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_member_group`;
CREATE TABLE `ims_ewei_shop_v1_member_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `groupname` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_member_group
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_member_history`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_member_history`;
CREATE TABLE `ims_ewei_shop_v1_member_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `goodsid` int(10) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `deleted` tinyint(1) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_deleted` (`deleted`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_member_history
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_member_level`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_member_level`;
CREATE TABLE `ims_ewei_shop_v1_member_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `level` int(11) DEFAULT '0',
  `levelname` varchar(50) DEFAULT '',
  `ordermoney` decimal(10,2) DEFAULT '0.00',
  `ordercount` int(10) DEFAULT '0',
  `discount` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_member_level
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_member_log`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_member_log`;
CREATE TABLE `ims_ewei_shop_v1_member_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `type` tinyint(3) DEFAULT NULL COMMENT '0 充值 1 提现',
  `logno` varchar(255) DEFAULT '',
  `title` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0' COMMENT '0 生成 1 成功 2 失败',
  `money` decimal(10,2) DEFAULT '0.00',
  `rechargetype` varchar(255) DEFAULT '' COMMENT '充值类型',
  `gives` decimal(10,2) DEFAULT NULL,
  `couponid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_type` (`type`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_member_log
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_member_message_template`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_member_message_template`;
CREATE TABLE `ims_ewei_shop_v1_member_message_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `template_id` varchar(255) DEFAULT '',
  `first` text NOT NULL COMMENT '键名',
  `firstcolor` varchar(255) DEFAULT '',
  `data` text NOT NULL COMMENT '颜色',
  `remark` text NOT NULL COMMENT '键值',
  `remarkcolor` varchar(255) DEFAULT '',
  `url` varchar(255) NOT NULL,
  `createtime` int(11) DEFAULT '0',
  `sendtimes` int(11) DEFAULT '0',
  `sendcount` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_member_message_template
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_message`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_message`;
CREATE TABLE `ims_ewei_shop_v1_message` (
  `id` int(11) NOT NULL COMMENT '编号',
  `openid` varchar(255) NOT NULL COMMENT '用户openid',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `contents` text NOT NULL COMMENT '内容',
  `status` set('0','1') NOT NULL DEFAULT '0' COMMENT '0-未读；1-已读',
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_message
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_notice`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_notice`;
CREATE TABLE `ims_ewei_shop_v1_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `detail` text,
  `status` tinyint(3) DEFAULT '0',
  `createtime` int(11) DEFAULT NULL,
  `desc` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_notice
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_order`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_order`;
CREATE TABLE `ims_ewei_shop_v1_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `agentid` int(11) DEFAULT '0',
  `ordersn` varchar(20) DEFAULT '',
  `price` decimal(10,2) DEFAULT '0.00',
  `goodsprice` decimal(10,2) DEFAULT '0.00',
  `discountprice` decimal(10,2) DEFAULT '0.00',
  `status` tinyint(4) DEFAULT '0' COMMENT '-1取消状态，0普通状态，1为已付款，2为已发货，3为成功',
  `paytype` tinyint(1) DEFAULT '0' COMMENT '1为余额，2为在线，3为到付',
  `transid` varchar(30) DEFAULT '0' COMMENT '微信支付单号',
  `remark` varchar(1000) DEFAULT '',
  `addressid` int(11) DEFAULT '0',
  `dispatchprice` decimal(10,2) DEFAULT '0.00',
  `dispatchid` int(10) DEFAULT '0',
  `createtime` int(10) DEFAULT NULL,
  `dispatchtype` tinyint(3) DEFAULT '0',
  `carrier` text,
  `refundid` int(11) DEFAULT '0',
  `iscomment` tinyint(3) DEFAULT '0',
  `creditadd` tinyint(3) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  `userdeleted` tinyint(3) DEFAULT '0',
  `finishtime` int(11) DEFAULT '0',
  `paytime` int(11) DEFAULT '0',
  `expresscom` varchar(30) NOT NULL DEFAULT '',
  `expresssn` varchar(50) NOT NULL DEFAULT '',
  `express` varchar(255) DEFAULT '',
  `sendtime` int(11) DEFAULT '0',
  `fetchtime` int(11) DEFAULT '0',
  `cash` tinyint(3) DEFAULT '0',
  `canceltime` int(11) DEFAULT NULL,
  `cancelpaytime` int(11) DEFAULT '0',
  `refundtime` int(11) DEFAULT '0',
  `isverify` tinyint(3) DEFAULT '0',
  `verified` tinyint(3) DEFAULT '0',
  `verifyopenid` varchar(255) DEFAULT '',
  `verifycode` text,
  `verifytime` int(11) DEFAULT '0',
  `verifystoreid` int(11) DEFAULT '0',
  `deductprice` decimal(10,2) DEFAULT '0.00',
  `deductcredit` int(11) DEFAULT '0',
  `deductcredit2` decimal(10,2) DEFAULT '0.00',
  `deductenough` decimal(10,2) DEFAULT '0.00',
  `virtual` int(11) DEFAULT '0',
  `virtual_info` text,
  `virtual_str` text,
  `address` text,
  `sysdeleted` tinyint(3) DEFAULT '0',
  `ordersn2` int(11) DEFAULT '0',
  `changeprice` decimal(10,2) DEFAULT '0.00',
  `changedispatchprice` decimal(10,2) DEFAULT '0.00',
  `oldprice` decimal(10,2) DEFAULT '0.00',
  `olddispatchprice` decimal(10,2) DEFAULT '0.00',
  `isvirtual` tinyint(3) DEFAULT '0',
  `couponid` int(11) DEFAULT '0',
  `couponprice` decimal(10,2) DEFAULT '0.00',
  `supplier_uid` int(11) NOT NULL COMMENT '多商家ID',
  `diyformid` int(11) DEFAULT '0',
  `storeid` int(11) DEFAULT '0',
  `diyformdata` text,
  `diyformfields` text,
  `printstate` tinyint(3) DEFAULT '0',
  `printstate2` tinyint(3) DEFAULT '0',
  `redprice` varchar(50) DEFAULT '',
  `refundstate` tinyint(3) DEFAULT '0',
  `redstatus` varchar(100) DEFAULT '',
  `cashier` tinyint(1) DEFAULT '0',
  `realprice` decimal(10,2) DEFAULT '0.00',
  `deredpack` tinyint(1) DEFAULT '0',
  `decommission` tinyint(1) DEFAULT '0',
  `decredits` tinyint(1) DEFAULT '0',
  `cashierid` int(11) DEFAULT '0',
  `ordersn_general` varchar(255) NOT NULL DEFAULT '',
  `address_send` varchar(2000) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_shareid` (`agentid`),
  KEY `idx_status` (`status`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_refundid` (`refundid`),
  KEY `idx_paytime` (`paytime`),
  KEY `idx_finishtime` (`finishtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_order
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_order_comment`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_order_comment`;
CREATE TABLE `ims_ewei_shop_v1_order_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  `openid` varchar(50) DEFAULT '',
  `nickname` varchar(50) DEFAULT '',
  `headimgurl` varchar(255) DEFAULT '',
  `level` tinyint(3) DEFAULT '0',
  `content` varchar(255) DEFAULT '',
  `images` text,
  `createtime` int(11) DEFAULT '0',
  `deleted` tinyint(3) DEFAULT '0',
  `append_content` varchar(255) DEFAULT '',
  `append_images` text,
  `reply_content` varchar(255) DEFAULT '',
  `reply_images` text,
  `append_reply_content` varchar(255) DEFAULT '',
  `append_reply_images` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_orderid` (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_order_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_order_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_order_goods`;
CREATE TABLE `ims_ewei_shop_v1_order_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `total` int(11) DEFAULT '1',
  `optionid` int(10) DEFAULT '0',
  `createtime` int(11) DEFAULT '0',
  `optionname` text,
  `commission1` text COMMENT '0',
  `applytime1` int(11) DEFAULT '0',
  `checktime1` int(10) DEFAULT '0',
  `paytime1` int(11) DEFAULT '0',
  `invalidtime1` int(11) DEFAULT '0',
  `deletetime1` int(11) DEFAULT '0',
  `status1` tinyint(3) DEFAULT '0' COMMENT '申请状态，-2删除，-1无效，0未申请，1申请，2审核通过 3已打款',
  `content1` text,
  `commission2` text,
  `applytime2` int(11) DEFAULT '0',
  `checktime2` int(10) DEFAULT '0',
  `paytime2` int(11) DEFAULT '0',
  `invalidtime2` int(11) DEFAULT '0',
  `deletetime2` int(11) DEFAULT '0',
  `status2` tinyint(3) DEFAULT '0' COMMENT '申请状态，-2删除，-1无效，0未申请，1申请，2审核通过 3已打款',
  `content2` text,
  `commission3` text,
  `applytime3` int(11) DEFAULT '0',
  `checktime3` int(10) DEFAULT '0',
  `paytime3` int(11) DEFAULT '0',
  `invalidtime3` int(11) DEFAULT '0',
  `deletetime3` int(11) DEFAULT '0',
  `status3` tinyint(3) DEFAULT '0' COMMENT '申请状态，-2删除，-1无效，0未申请，1申请，2审核通过 3已打款',
  `content3` text,
  `realprice` decimal(10,2) DEFAULT '0.00',
  `goodssn` varchar(255) DEFAULT '',
  `productsn` varchar(255) DEFAULT '',
  `nocommission` tinyint(3) DEFAULT '0',
  `changeprice` decimal(10,2) DEFAULT '0.00',
  `oldprice` decimal(10,2) DEFAULT '0.00',
  `commissions` text,
  `supplier_uid` int(11) NOT NULL COMMENT '多商家ID',
  `supplier_apply_status` tinyint(4) NOT NULL COMMENT '1为多商家已提现',
  `openid` varchar(255) DEFAULT '',
  `diyformdataid` int(11) DEFAULT '0',
  `diyformid` int(11) DEFAULT '0',
  `diyformdata` text,
  `diyformfields` text,
  `printstate` tinyint(3) DEFAULT '0',
  `printstate2` tinyint(3) DEFAULT '0',
  `goods_op_cost_price` decimal(10,2) DEFAULT '0.00',
  `rankingstatus` tinyint(1) NOT NULL COMMENT '排行状态',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_orderid` (`orderid`),
  KEY `idx_goodsid` (`goodsid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_applytime1` (`applytime1`),
  KEY `idx_checktime1` (`checktime1`),
  KEY `idx_status1` (`status1`),
  KEY `idx_applytime2` (`applytime2`),
  KEY `idx_checktime2` (`checktime2`),
  KEY `idx_status2` (`status2`),
  KEY `idx_applytime3` (`applytime3`),
  KEY `idx_invalidtime1` (`invalidtime1`),
  KEY `idx_checktime3` (`checktime3`),
  KEY `idx_invalidtime2` (`invalidtime2`),
  KEY `idx_invalidtime3` (`invalidtime3`),
  KEY `idx_status3` (`status3`),
  KEY `idx_paytime1` (`paytime1`),
  KEY `idx_paytime2` (`paytime2`),
  KEY `idx_paytime3` (`paytime3`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_order_goods
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_order_goods_queue`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_order_goods_queue`;
CREATE TABLE `ims_ewei_shop_v1_order_goods_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `openid` varchar(255) NOT NULL,
  `goodsid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `queue` int(11) NOT NULL,
  `returnid` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_order_goods_queue
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_order_refund`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_order_refund`;
CREATE TABLE `ims_ewei_shop_v1_order_refund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `orderid` int(11) DEFAULT '0',
  `refundno` varchar(255) DEFAULT '',
  `price` varchar(255) DEFAULT '',
  `reason` varchar(255) DEFAULT '',
  `images` text,
  `content` text,
  `createtime` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0' COMMENT '0申请 1 通过 2 驳回',
  `reply` text,
  `refundtype` tinyint(3) DEFAULT '0',
  `applyprice` decimal(10,2) DEFAULT '0.00',
  `orderprice` decimal(10,2) DEFAULT '0.00',
  `rtype` tinyint(1) DEFAULT '0',
  `imgs` text,
  `refundtime` int(11) DEFAULT '0',
  `refundaddress` text,
  `message` text,
  `express` varchar(100) DEFAULT '',
  `expresscom` varchar(100) DEFAULT '',
  `expresssn` varchar(100) DEFAULT '',
  `operatetime` int(11) DEFAULT '0',
  `sendtime` int(11) DEFAULT '0',
  `returntime` int(11) DEFAULT '0',
  `rexpress` varchar(100) DEFAULT '',
  `rexpresscom` varchar(100) DEFAULT '',
  `rexpresssn` varchar(100) DEFAULT '',
  `refundaddressid` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_order_refund
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_perm_log`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_perm_log`;
CREATE TABLE `ims_ewei_shop_v1_perm_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0',
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT '',
  `type` varchar(255) DEFAULT '',
  `op` text,
  `createtime` int(11) DEFAULT '0',
  `ip` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uid` (`uid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_uniacid` (`uniacid`),
  FULLTEXT KEY `idx_type` (`type`),
  FULLTEXT KEY `idx_op` (`op`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_perm_log
-- ----------------------------
INSERT INTO `ims_ewei_shop_v1_perm_log` VALUES ('1', '1', '1', '系统设置-修改-模板设置', 'sysset.save.template', '修改系统设置-模板设置', '1471587148', '127.0.0.1');
INSERT INTO `ims_ewei_shop_v1_perm_log` VALUES ('2', '1', '1', '系统设置-修改-模板设置', 'sysset.save.template', '修改系统设置-模板设置', '1471587157', '127.0.0.1');

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_perm_plugin`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_perm_plugin`;
CREATE TABLE `ims_ewei_shop_v1_perm_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acid` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `type` tinyint(3) DEFAULT '0',
  `plugins` text,
  PRIMARY KEY (`id`),
  KEY `idx_uid` (`uid`),
  KEY `idx_acid` (`acid`),
  KEY `idx_type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_perm_plugin
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_perm_role`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_perm_role`;
CREATE TABLE `ims_ewei_shop_v1_perm_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `rolename` varchar(255) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `perms` text,
  `deleted` tinyint(3) DEFAULT '0',
  `status1` tinyint(3) NOT NULL COMMENT '1：多商家开启',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_status` (`status`),
  KEY `idx_deleted` (`deleted`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_perm_role
-- ----------------------------
INSERT INTO `ims_ewei_shop_v1_perm_role` VALUES ('1', '0', '多商家', '1', 'shop,shop.goods,shop.goods.view,shop.goods.add,shop.goods.edit,shop.goods.delete,order,order.view,order.view.status_1,order.view.status0,order.view.status1,order.view.status2,order.view.status3,order.view.status4,order.view.status5,order.view.status9,order.op,order.op.pay,order.op.send,order.op.sendcancel,order.op.finish,order.op.verify,order.op.fetch,order.op.close,order.op.refund,order.op.export,order.op.changeprice,exhelper,exhelper.print,exhelper.print.single,exhelper.print.more,exhelper.exptemp1,exhelper.exptemp1.view,exhelper.exptemp1.add,exhelper.exptemp1.edit,exhelper.exptemp1.delete,exhelper.exptemp1.setdefault,exhelper.exptemp2,exhelper.exptemp2.view,exhelper.exptemp2.add,exhelper.exptemp2.edit,exhelper.exptemp2.delete,exhelper.exptemp2.setdefault,exhelper.senduser,exhelper.senduser.view,exhelper.senduser.add,exhelper.senduser.edit,exhelper.senduser.delete,exhelper.senduser.setdefault,exhelper.short,exhelper.short.view,exhelper.short.save,exhelper.printset,exhelper.printset.view,exhelper.printset.save,exhelper.dosen,taobao,taobao.fetch', '0', '1');

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_perm_user`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_perm_user`;
CREATE TABLE `ims_ewei_shop_v1_perm_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(255) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `roleid` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `perms` text,
  `deleted` tinyint(3) DEFAULT '0',
  `realname` varchar(255) DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `banknumber` varchar(255) NOT NULL COMMENT '银行卡号',
  `accountname` varchar(255) NOT NULL COMMENT '开户名',
  `accountbank` varchar(255) NOT NULL COMMENT '开户行',
  `openid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_uid` (`uid`),
  KEY `idx_roleid` (`roleid`),
  KEY `idx_status` (`status`),
  KEY `idx_deleted` (`deleted`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_perm_user
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_plugin`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_plugin`;
CREATE TABLE `ims_ewei_shop_v1_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `displayorder` int(11) DEFAULT '0',
  `identity` varchar(50) DEFAULT '',
  `name` varchar(50) DEFAULT '',
  `version` varchar(10) DEFAULT '',
  `author` varchar(20) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `category` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_displayorder` (`displayorder`),
  FULLTEXT KEY `idx_identity` (`identity`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_plugin
-- ----------------------------
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('1', '1', 'qiniu', '七牛存储', '1.0', '官方', '1', 'tool');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('2', '2', 'taobao', '淘宝助手', '1.0', '官方', '1', 'tool');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('3', '3', 'commission', '分销系统', '1.0', '官方', '1', 'biz');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('4', '4', 'poster', '超级海报', '1.2', '官方', '1', 'sale');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('5', '5', 'verify', 'O2O核销', '1.0', '官方', '1', 'biz');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('6', '6', 'perm', '分权系统', '1.0', '官方', '1', 'help');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('7', '7', 'sale', '营销宝', '1.0', '官方', '1', 'sale');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('8', '8', 'tmessage', '会员群发', '1.0', '官方', '1', 'tool');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('9', '9', 'designer', '店铺装修', '1.0', '官方', '1', 'tool');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('10', '10', 'creditshop', '积分商城', '1.0', '官方', '1', 'biz');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('11', '11', 'virtual', '虚拟物品', '1.0', '官方', '1', 'biz');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('12', '12', 'article', '文章营销', '1.0', '官方', '1', 'sale');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('13', '13', 'coupon', '超级券', '1.0', '官方', '1', 'sale');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('14', '14', 'postera', '活动海报', '1.0', '官方', '1', 'sale');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('15', '15', 'supplier', '多商家', '1.0', '官方', '1', 'biz');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('16', '16', 'exhelper', '快递助手', '1.0', '官方', '1', 'tool');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('17', '17', 'yunpay', '云支付', '1.0', '云支付', '1', 'tool');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('18', '18', 'diyform', '自定义表单', '1.0', '官方', '1', 'help');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('19', '19', 'system', '系统工具', '1.0', '官方', '1', 'help');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('20', '20', 'ranking', '排行榜', '1.0', '官方', '1', 'help');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('21', '21', 'choose', '快速选购', '1.0', '官方', '1', 'tool');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('22', '22', 'bonus', '全球分红', '1.0', '官方', '1', 'biz');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('23', '23', 'cashier', '收银台', '1.0', '官方', '1', 'biz');
INSERT INTO `ims_ewei_shop_v1_plugin` VALUES ('24', '24', 'return', '消费全返', '1.0', '官方', '1', 'sale');

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_poster`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_poster`;
CREATE TABLE `ims_ewei_shop_v1_poster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `type` tinyint(3) DEFAULT '0' COMMENT '1 首页 2 小店 3 商城 4 自定义',
  `title` varchar(255) DEFAULT '',
  `bg` varchar(255) DEFAULT '',
  `data` text,
  `keyword` varchar(255) DEFAULT '',
  `times` int(11) DEFAULT '0',
  `follows` int(11) DEFAULT '0',
  `isdefault` tinyint(3) DEFAULT '0',
  `resptitle` varchar(255) DEFAULT '',
  `respthumb` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `respdesc` varchar(255) DEFAULT '',
  `respurl` varchar(255) DEFAULT '',
  `waittext` varchar(255) DEFAULT '',
  `oktext` varchar(255) DEFAULT '',
  `subcredit` int(11) DEFAULT '0',
  `submoney` decimal(10,2) DEFAULT '0.00',
  `reccredit` int(11) DEFAULT '0',
  `recmoney` decimal(10,2) DEFAULT '0.00',
  `paytype` tinyint(1) DEFAULT '0',
  `scantext` varchar(255) DEFAULT '',
  `subtext` varchar(255) DEFAULT '',
  `beagent` tinyint(3) DEFAULT '0',
  `bedown` tinyint(3) DEFAULT '0',
  `isopen` tinyint(3) DEFAULT '0',
  `opentext` varchar(255) DEFAULT '',
  `openurl` varchar(255) DEFAULT '',
  `templateid` varchar(255) DEFAULT '',
  `subpaycontent` text,
  `recpaycontent` text,
  `entrytext` varchar(255) DEFAULT '',
  `reccouponid` int(11) DEFAULT '0',
  `reccouponnum` int(11) DEFAULT '0',
  `subcouponid` int(11) DEFAULT '0',
  `subcouponnum` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_type` (`type`),
  KEY `idx_times` (`times`),
  KEY `idx_isdefault` (`isdefault`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_poster
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_postera`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_postera`;
CREATE TABLE `ims_ewei_shop_v1_postera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `type` tinyint(3) DEFAULT '0' COMMENT '1 首页 2 小店 3 商城 4 自定义',
  `days` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `bg` varchar(255) DEFAULT '',
  `data` text,
  `keyword` varchar(255) DEFAULT '',
  `isdefault` tinyint(3) DEFAULT '0',
  `resptitle` varchar(255) DEFAULT '',
  `respthumb` varchar(255) DEFAULT '',
  `createtime` int(11) DEFAULT '0',
  `respdesc` varchar(255) DEFAULT '',
  `respurl` varchar(255) DEFAULT '',
  `waittext` varchar(255) DEFAULT '',
  `oktext` varchar(255) DEFAULT '',
  `subcredit` int(11) DEFAULT '0',
  `submoney` decimal(10,2) DEFAULT '0.00',
  `reccredit` int(11) DEFAULT '0',
  `recmoney` decimal(10,2) DEFAULT '0.00',
  `scantext` varchar(255) DEFAULT '',
  `subtext` varchar(255) DEFAULT '',
  `beagent` tinyint(3) DEFAULT '0',
  `bedown` tinyint(3) DEFAULT '0',
  `isopen` tinyint(3) DEFAULT '0',
  `opentext` varchar(255) DEFAULT '',
  `openurl` varchar(255) DEFAULT '',
  `paytype` tinyint(1) NOT NULL DEFAULT '0',
  `subpaycontent` text,
  `recpaycontent` varchar(255) DEFAULT '',
  `templateid` varchar(255) DEFAULT '',
  `entrytext` varchar(255) DEFAULT '',
  `reccouponid` int(11) DEFAULT '0',
  `reccouponnum` int(11) DEFAULT '0',
  `subcouponid` int(11) DEFAULT '0',
  `subcouponnum` int(11) DEFAULT '0',
  `timestart` int(11) DEFAULT '0',
  `timeend` int(11) DEFAULT '0',
  `status` tinyint(3) DEFAULT '0',
  `goodsid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_type` (`type`),
  KEY `idx_isdefault` (`isdefault`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_postera
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_postera_log`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_postera_log`;
CREATE TABLE `ims_ewei_shop_v1_postera_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `posterid` int(11) DEFAULT '0',
  `from_openid` varchar(255) DEFAULT '',
  `subcredit` int(11) DEFAULT '0',
  `submoney` decimal(10,2) DEFAULT '0.00',
  `reccredit` int(11) DEFAULT '0',
  `recmoney` decimal(10,2) DEFAULT '0.00',
  `createtime` int(11) DEFAULT '0',
  `reccouponid` int(11) DEFAULT '0',
  `reccouponnum` int(11) DEFAULT '0',
  `subcouponid` int(11) DEFAULT '0',
  `subcouponnum` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_posteraid` (`posterid`),
  FULLTEXT KEY `idx_from_openid` (`from_openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_postera_log
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_postera_qr`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_postera_qr`;
CREATE TABLE `ims_ewei_shop_v1_postera_qr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acid` int(10) unsigned NOT NULL,
  `openid` varchar(100) NOT NULL DEFAULT '',
  `posterid` int(11) DEFAULT '0',
  `type` tinyint(3) DEFAULT '0',
  `sceneid` int(11) DEFAULT '0',
  `mediaid` varchar(255) DEFAULT '',
  `ticket` varchar(250) NOT NULL,
  `url` varchar(80) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `goodsid` int(11) DEFAULT '0',
  `qrimg` varchar(1000) DEFAULT '',
  `expire` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_acid` (`acid`),
  KEY `idx_sceneid` (`sceneid`),
  KEY `idx_type` (`type`),
  KEY `idx_posterid` (`posterid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_postera_qr
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_poster_log`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_poster_log`;
CREATE TABLE `ims_ewei_shop_v1_poster_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `posterid` int(11) DEFAULT '0',
  `from_openid` varchar(255) DEFAULT '',
  `subcredit` int(11) DEFAULT '0',
  `submoney` decimal(10,2) DEFAULT '0.00',
  `reccredit` int(11) DEFAULT '0',
  `recmoney` decimal(10,2) DEFAULT '0.00',
  `createtime` int(11) DEFAULT '0',
  `reccouponid` int(11) DEFAULT '0',
  `reccouponnum` int(11) DEFAULT '0',
  `subcouponid` int(11) DEFAULT '0',
  `subcouponnum` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_openid` (`openid`),
  KEY `idx_createtime` (`createtime`),
  KEY `idx_posterid` (`posterid`),
  FULLTEXT KEY `idx_from_openid` (`from_openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_poster_log
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_poster_qr`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_poster_qr`;
CREATE TABLE `ims_ewei_shop_v1_poster_qr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acid` int(10) unsigned NOT NULL,
  `openid` varchar(100) NOT NULL DEFAULT '',
  `type` tinyint(3) DEFAULT '0',
  `sceneid` int(11) DEFAULT '0',
  `mediaid` varchar(255) DEFAULT '',
  `ticket` varchar(250) NOT NULL,
  `url` varchar(80) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `goodsid` int(11) DEFAULT '0',
  `qrimg` varchar(1000) DEFAULT '',
  `scenestr` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_acid` (`acid`),
  KEY `idx_sceneid` (`sceneid`),
  KEY `idx_type` (`type`),
  FULLTEXT KEY `idx_openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_poster_qr
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_poster_scan`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_poster_scan`;
CREATE TABLE `ims_ewei_shop_v1_poster_scan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `posterid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `from_openid` varchar(255) DEFAULT '',
  `scantime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_posterid` (`posterid`),
  KEY `idx_scantime` (`scantime`),
  FULLTEXT KEY `idx_openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_poster_scan
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_push`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_push`;
CREATE TABLE `ims_ewei_shop_v1_push` (
  `id` int(11) NOT NULL,
  `uniacid` int(11) DEFAULT '0',
  `name` varchar(50) DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `content` text,
  `time` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_push
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_ranking`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_ranking`;
CREATE TABLE `ims_ewei_shop_v1_ranking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `credit` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_ranking
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_refund_address`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_refund_address`;
CREATE TABLE `ims_ewei_shop_v1_refund_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `title` varchar(20) DEFAULT '',
  `name` varchar(20) DEFAULT '',
  `tel` varchar(20) DEFAULT '',
  `mobile` varchar(11) DEFAULT '',
  `province` varchar(30) DEFAULT '',
  `city` varchar(30) DEFAULT '',
  `area` varchar(30) DEFAULT '',
  `address` varchar(300) DEFAULT '',
  `isdefault` tinyint(1) DEFAULT '0',
  `zipcode` varchar(255) DEFAULT '',
  `content` text,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_refund_address
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_return`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_return`;
CREATE TABLE `ims_ewei_shop_v1_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `return_money` decimal(10,2) NOT NULL,
  `create_time` varchar(60) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `returnrule` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_return
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_return_log`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_return_log`;
CREATE TABLE `ims_ewei_shop_v1_return_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `openid` varchar(255) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `returntype` tinyint(2) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_return_log
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_return_money`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_return_money`;
CREATE TABLE `ims_ewei_shop_v1_return_money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_return_money
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_saler`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_saler`;
CREATE TABLE `ims_ewei_shop_v1_saler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storeid` int(11) DEFAULT '0',
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `salername` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_storeid` (`storeid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_saler
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_store`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_store`;
CREATE TABLE `ims_ewei_shop_v1_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `storename` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `tel` varchar(255) DEFAULT '',
  `lat` varchar(255) DEFAULT '',
  `lng` varchar(255) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `realname` varchar(255) DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `fetchtime` varchar(255) DEFAULT '',
  `type` tinyint(1) DEFAULT '0',
  `myself_support` tinyint(1) DEFAULT '0',
  `verity_support` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_store
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_supplier_apply`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_supplier_apply`;
CREATE TABLE `ims_ewei_shop_v1_supplier_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '多商家id',
  `uniacid` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1手动2微信',
  `applysn` varchar(255) NOT NULL COMMENT '提现单号',
  `apply_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '申请提现金额',
  `apply_time` int(11) NOT NULL COMMENT '申请时间',
  `status` tinyint(3) NOT NULL COMMENT '0为申请状态1为完成状态',
  `finish_time` int(11) NOT NULL COMMENT '完成时间',
  `apply_ordergoods_ids` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ims_ewei_shop_v1_supplier_apply
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_sysset`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_sysset`;
CREATE TABLE `ims_ewei_shop_v1_sysset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `sets` text,
  `plugins` text,
  `sec` text,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_sysset
-- ----------------------------
INSERT INTO `ims_ewei_shop_v1_sysset` VALUES ('1', '1', 'a:1:{s:4:\"shop\";a:3:{s:5:\"style\";s:7:\"default\";s:8:\"style_pc\";s:7:\"default\";s:5:\"theme\";s:5:\"style\";}}', null, null);

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_system_copyright`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_system_copyright`;
CREATE TABLE `ims_ewei_shop_v1_system_copyright` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `copyright` text,
  `bgcolor` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_system_copyright
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_virtual_category`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_virtual_category`;
CREATE TABLE `ims_ewei_shop_v1_virtual_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0' COMMENT '所属帐号',
  `name` varchar(50) DEFAULT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_virtual_category
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_virtual_data`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_virtual_data`;
CREATE TABLE `ims_ewei_shop_v1_virtual_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `typeid` int(11) NOT NULL DEFAULT '0' COMMENT '类型id',
  `pvalue` varchar(255) DEFAULT '' COMMENT '主键键值',
  `fields` text NOT NULL COMMENT '字符集',
  `openid` varchar(255) NOT NULL DEFAULT '' COMMENT '使用者openid',
  `usetime` int(11) NOT NULL DEFAULT '0' COMMENT '使用时间',
  `orderid` int(11) DEFAULT '0',
  `ordersn` varchar(255) DEFAULT '',
  `price` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_typeid` (`typeid`),
  KEY `idx_usetime` (`usetime`),
  KEY `idx_orderid` (`orderid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_virtual_data
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_ewei_shop_v1_virtual_type`
-- ----------------------------
DROP TABLE IF EXISTS `ims_ewei_shop_v1_virtual_type`;
CREATE TABLE `ims_ewei_shop_v1_virtual_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `cate` int(11) DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '分类名称',
  `fields` text NOT NULL COMMENT '字段集',
  `usedata` int(11) NOT NULL DEFAULT '0' COMMENT '已用数据',
  `alldata` int(11) NOT NULL DEFAULT '0' COMMENT '全部数据',
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_cate` (`cate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_ewei_shop_v1_virtual_type
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_images_reply`
-- ----------------------------
DROP TABLE IF EXISTS `ims_images_reply`;
CREATE TABLE `ims_images_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `mediaid` varchar(255) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_images_reply
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_card`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card`;
CREATE TABLE `ims_mc_card` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `color` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `format_type` tinyint(3) unsigned NOT NULL,
  `format` varchar(50) NOT NULL,
  `fields` varchar(1000) NOT NULL,
  `snpos` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `business` text NOT NULL,
  `discount_type` tinyint(3) unsigned NOT NULL,
  `discount` varchar(3000) NOT NULL,
  `grant` varchar(200) NOT NULL,
  `grant_rate` int(10) unsigned NOT NULL,
  `offset_rate` int(10) unsigned NOT NULL,
  `offset_max` int(10) NOT NULL,
  `nums_status` tinyint(3) unsigned NOT NULL,
  `nums_text` varchar(15) NOT NULL,
  `nums` varchar(1000) NOT NULL,
  `times_status` tinyint(3) unsigned NOT NULL,
  `times_text` varchar(15) NOT NULL,
  `times` varchar(1000) NOT NULL,
  `params` longtext NOT NULL,
  `html` longtext NOT NULL,
  `recharge` varchar(500) NOT NULL,
  `description` varchar(512) NOT NULL,
  `recommend_status` tinyint(3) unsigned NOT NULL,
  `sign_status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_card_care`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card_care`;
CREATE TABLE `ims_mc_card_care` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `groupid` int(10) unsigned NOT NULL,
  `credit1` int(10) unsigned NOT NULL,
  `credit2` int(10) unsigned NOT NULL,
  `couponid` int(10) unsigned NOT NULL,
  `granttime` int(10) unsigned NOT NULL,
  `days` int(10) unsigned NOT NULL,
  `time` tinyint(3) unsigned NOT NULL,
  `show_in_card` tinyint(3) unsigned NOT NULL,
  `content` varchar(1000) NOT NULL,
  `sms_notice` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card_care
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_card_credit_set`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card_credit_set`;
CREATE TABLE `ims_mc_card_credit_set` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `sign` varchar(1000) NOT NULL,
  `share` varchar(500) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card_credit_set
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_card_members`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card_members`;
CREATE TABLE `ims_mc_card_members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) DEFAULT NULL,
  `openid` varchar(50) NOT NULL,
  `cid` int(10) NOT NULL,
  `cardsn` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `nums` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card_members
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_card_notices`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card_notices`;
CREATE TABLE `ims_mc_card_notices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `groupid` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card_notices
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_card_notices_unread`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card_notices_unread`;
CREATE TABLE `ims_mc_card_notices_unread` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `notice_id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `is_new` tinyint(3) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`),
  KEY `notice_id` (`notice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card_notices_unread
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_card_recommend`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card_recommend`;
CREATE TABLE `ims_mc_card_recommend` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card_recommend
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_card_record`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card_record`;
CREATE TABLE `ims_mc_card_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  `model` tinyint(3) unsigned NOT NULL,
  `fee` decimal(10,2) unsigned NOT NULL,
  `tag` varchar(10) NOT NULL,
  `note` varchar(255) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_card_sign_record`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_card_sign_record`;
CREATE TABLE `ims_mc_card_sign_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `credit` int(10) unsigned NOT NULL,
  `is_grant` tinyint(3) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_card_sign_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_cash_record`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_cash_record`;
CREATE TABLE `ims_mc_cash_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `fee` decimal(10,2) unsigned NOT NULL,
  `final_fee` decimal(10,2) unsigned NOT NULL,
  `credit1` int(10) unsigned NOT NULL,
  `credit1_fee` decimal(10,2) unsigned NOT NULL,
  `credit2` decimal(10,2) unsigned NOT NULL,
  `cash` decimal(10,2) unsigned NOT NULL,
  `return_cash` decimal(10,2) unsigned NOT NULL,
  `final_cash` decimal(10,2) unsigned NOT NULL,
  `remark` varchar(255) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_cash_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_chats_record`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_chats_record`;
CREATE TABLE `ims_mc_chats_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `flag` tinyint(3) unsigned NOT NULL,
  `openid` varchar(32) NOT NULL,
  `msgtype` varchar(15) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`),
  KEY `openid` (`openid`),
  KEY `createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_chats_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_credits_recharge`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_credits_recharge`;
CREATE TABLE `ims_mc_credits_recharge` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `tid` varchar(64) NOT NULL,
  `transid` varchar(30) NOT NULL,
  `fee` varchar(10) NOT NULL,
  `type` varchar(15) NOT NULL,
  `tag` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `backtype` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid_uid` (`uniacid`,`uid`),
  KEY `idx_tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_credits_recharge
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_credits_record`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_credits_record`;
CREATE TABLE `ims_mc_credits_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `uniacid` int(11) NOT NULL,
  `credittype` varchar(10) NOT NULL,
  `num` decimal(10,2) NOT NULL,
  `operator` int(10) unsigned NOT NULL,
  `module` varchar(30) NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `remark` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_credits_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_fans_groups`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_fans_groups`;
CREATE TABLE `ims_mc_fans_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `groups` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_fans_groups
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_groups`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_groups`;
CREATE TABLE `ims_mc_groups` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `credit` int(10) unsigned NOT NULL,
  `orderlist` tinyint(4) unsigned NOT NULL,
  `isdefault` tinyint(4) NOT NULL,
  PRIMARY KEY (`groupid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_groups
-- ----------------------------
INSERT INTO `ims_mc_groups` VALUES ('1', '1', '默认会员组', '0', '0', '1');

-- ----------------------------
-- Table structure for `ims_mc_handsel`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_handsel`;
CREATE TABLE `ims_mc_handsel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `touid` int(10) unsigned NOT NULL,
  `fromuid` varchar(32) NOT NULL,
  `module` varchar(30) NOT NULL,
  `sign` varchar(100) NOT NULL,
  `action` varchar(20) NOT NULL,
  `credit_value` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`touid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_handsel
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_mapping_fans`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_mapping_fans`;
CREATE TABLE `ims_mc_mapping_fans` (
  `fanid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acid` int(10) unsigned NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `unionid` varchar(64) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `groupid` int(10) unsigned NOT NULL,
  `salt` char(8) NOT NULL,
  `follow` tinyint(1) unsigned NOT NULL,
  `followtime` int(10) unsigned NOT NULL,
  `unfollowtime` int(10) unsigned NOT NULL,
  `tag` varchar(1000) NOT NULL,
  `updatetime` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`fanid`),
  UNIQUE KEY `openid` (`openid`),
  KEY `acid` (`acid`),
  KEY `uniacid` (`uniacid`),
  KEY `updatetime` (`updatetime`),
  KEY `nickname` (`nickname`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_mapping_fans
-- ----------------------------
INSERT INTO `ims_mc_mapping_fans` VALUES ('1', '1', '1', '1', 'o-3-vjuH88wHMnshKBr2NlHtHBKs', '', '', '0', 'H32Dd25k', '1', '1467875044', '0', '', null);

-- ----------------------------
-- Table structure for `ims_mc_mapping_ucenter`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_mapping_ucenter`;
CREATE TABLE `ims_mc_mapping_ucenter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `centeruid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_mapping_ucenter
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_mass_record`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_mass_record`;
CREATE TABLE `ims_mc_mass_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `groupname` varchar(50) NOT NULL,
  `fansnum` int(10) unsigned NOT NULL,
  `msgtype` varchar(10) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `group` int(10) NOT NULL,
  `attach_id` int(10) unsigned NOT NULL,
  `media_id` varchar(100) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `cron_id` int(10) unsigned NOT NULL,
  `sendtime` int(10) unsigned NOT NULL,
  `finalsendtime` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_mass_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_members`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_members`;
CREATE TABLE `ims_mc_members` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` varchar(8) NOT NULL,
  `groupid` int(11) NOT NULL,
  `credit1` decimal(10,2) unsigned NOT NULL,
  `credit2` decimal(10,2) unsigned NOT NULL,
  `credit3` decimal(10,2) unsigned NOT NULL,
  `credit4` decimal(10,2) unsigned NOT NULL,
  `credit5` decimal(10,2) unsigned NOT NULL,
  `credit6` decimal(10,2) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `realname` varchar(10) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `vip` tinyint(3) unsigned NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthyear` smallint(6) unsigned NOT NULL,
  `birthmonth` tinyint(3) unsigned NOT NULL,
  `birthday` tinyint(3) unsigned NOT NULL,
  `constellation` varchar(10) NOT NULL,
  `zodiac` varchar(5) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `idcard` varchar(30) NOT NULL,
  `studentid` varchar(50) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `resideprovince` varchar(30) NOT NULL,
  `residecity` varchar(30) NOT NULL,
  `residedist` varchar(30) NOT NULL,
  `graduateschool` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `education` varchar(10) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `revenue` varchar(10) NOT NULL,
  `affectivestatus` varchar(30) NOT NULL,
  `lookingfor` varchar(255) NOT NULL,
  `bloodtype` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `weight` varchar(5) NOT NULL,
  `alipay` varchar(30) NOT NULL,
  `msn` varchar(30) NOT NULL,
  `taobao` varchar(30) NOT NULL,
  `site` varchar(30) NOT NULL,
  `bio` text NOT NULL,
  `interest` text NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `groupid` (`groupid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_members
-- ----------------------------
INSERT INTO `ims_mc_members` VALUES ('1', '1', '', 'c4bda492e6df8156ddbd6f9c206fba8b@we7.cc', '9281433cf2b7b97b7b459554bf4fb28e', 'Ej59JD55', '1', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '1467875047', '', '', '', '', '0', '0', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `ims_mc_member_address`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_member_address`;
CREATE TABLE `ims_mc_member_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(50) unsigned NOT NULL,
  `username` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `zipcode` varchar(6) NOT NULL,
  `province` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `district` varchar(32) NOT NULL,
  `address` varchar(512) NOT NULL,
  `isdefault` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uinacid` (`uniacid`),
  KEY `idx_uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_member_address
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_member_fields`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_member_fields`;
CREATE TABLE `ims_mc_member_fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `fieldid` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `displayorder` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_fieldid` (`fieldid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_member_fields
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mc_oauth_fans`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mc_oauth_fans`;
CREATE TABLE `ims_mc_oauth_fans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oauth_openid` varchar(50) NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_oauthopenid_acid` (`oauth_openid`,`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mc_oauth_fans
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_menu_event`
-- ----------------------------
DROP TABLE IF EXISTS `ims_menu_event`;
CREATE TABLE `ims_menu_event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `keyword` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `picmd5` varchar(32) NOT NULL,
  `openid` varchar(128) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `picmd5` (`picmd5`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_menu_event
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mobilenumber`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mobilenumber`;
CREATE TABLE `ims_mobilenumber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(10) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL,
  `dateline` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mobilenumber
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_modules`
-- ----------------------------
DROP TABLE IF EXISTS `ims_modules`;
CREATE TABLE `ims_modules` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `version` varchar(10) NOT NULL,
  `ability` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `author` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `settings` tinyint(1) NOT NULL,
  `subscribes` varchar(500) NOT NULL,
  `handles` varchar(500) NOT NULL,
  `isrulefields` tinyint(1) NOT NULL,
  `issystem` tinyint(1) unsigned NOT NULL,
  `target` int(10) unsigned NOT NULL,
  `iscard` tinyint(3) unsigned NOT NULL,
  `permissions` varchar(5000) NOT NULL,
  PRIMARY KEY (`mid`),
  KEY `idx_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_modules
-- ----------------------------
INSERT INTO `ims_modules` VALUES ('1', 'basic', 'system', '基本文字回复', '1.0', '和您进行简单对话', '一问一答得简单对话. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的回复内容.', 'WeEngine Team', 'http://www.goupu.org/', '0', '', '', '1', '1', '0', '0', '');
INSERT INTO `ims_modules` VALUES ('2', 'news', 'system', '基本混合图文回复', '1.0', '为你提供生动的图文资讯', '一问一答得简单对话, 但是回复内容包括图片文字等更生动的媒体内容. 当访客的对话语句中包含指定关键字, 或对话语句完全等于特定关键字, 或符合某些特定的格式时. 系统自动应答设定好的图文回复内容.', 'WeEngine Team', 'http://www.goupu.org/', '0', '', '', '1', '1', '0', '0', '');
INSERT INTO `ims_modules` VALUES ('3', 'music', 'system', '基本音乐回复', '1.0', '提供语音、音乐等音频类回复', '在回复规则中可选择具有语音、音乐等音频类的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝，实现一问一答得简单对话。', 'WeEngine Team', 'http://www.goupu.org/', '0', '', '', '1', '1', '0', '0', '');
INSERT INTO `ims_modules` VALUES ('4', 'userapi', 'system', '自定义接口回复', '1.1', '更方便的第三方接口设置', '自定义接口又称第三方接口，可以让开发者更方便的接入微擎系统，高效的与微信公众平台进行对接整合。', 'WeEngine Team', 'http://www.goupu.org/', '0', '', '', '1', '1', '0', '0', '');
INSERT INTO `ims_modules` VALUES ('5', 'recharge', 'system', '会员中心充值模块', '1.0', '提供会员充值功能', '', 'WeEngine Team', 'http://www.goupu.org/', '0', '', '', '0', '1', '0', '0', '');
INSERT INTO `ims_modules` VALUES ('6', 'custom', 'system', '多客服转接', '1.0.0', '用来接入腾讯的多客服系统', '', 'WeEngine Team', 'http://bbs.we7.cc', '0', 'a:0:{}', 'a:6:{i:0;s:5:\"image\";i:1;s:5:\"voice\";i:2;s:5:\"video\";i:3;s:8:\"location\";i:4;s:4:\"link\";i:5;s:4:\"text\";}', '1', '1', '0', '0', '');
INSERT INTO `ims_modules` VALUES ('7', 'images', 'system', '基本图片回复', '1.0', '提供图片回复', '在回复规则中可选择具有图片的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝图片。', 'WeEngine Team', 'http://www.goupu.org/', '0', '', '', '1', '1', '0', '0', '');
INSERT INTO `ims_modules` VALUES ('8', 'video', 'system', '基本视频回复', '1.0', '提供图片回复', '在回复规则中可选择具有视频的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝视频。', 'WeEngine Team', 'http://www.goupu.org/', '0', '', '', '1', '1', '0', '0', '');
INSERT INTO `ims_modules` VALUES ('9', 'voice', 'system', '基本语音回复', '1.0', '提供语音回复', '在回复规则中可选择具有语音的回复内容，并根据用户所设置的特定关键字精准的返回给粉丝语音。', 'WeEngine Team', 'http://www.goupu.org/', '0', '', '', '1', '1', '0', '0', '');
INSERT INTO `ims_modules` VALUES ('10', 'chats', 'system', '发送客服消息', '1.0', '公众号可以在粉丝最后发送消息的48小时内无限制发送消息', '', 'WeEngine Team', 'http://www.goupu.org/', '0', '', '', '0', '1', '0', '0', '');
INSERT INTO `ims_modules` VALUES ('11', 'wxcard', 'system', '微信卡券回复', '1.0', '微信卡券回复', '微信卡券回复', 'WeEngine Team', 'http://www.goupu.org/', '0', '', '', '1', '1', '0', '0', '');
INSERT INTO `ims_modules` VALUES ('12', 'paycenter', 'system', '收银台', '1.0', '收银台', '收银台', 'WeEngine Team', 'http://www.goupu.org/', '0', '', '', '1', '1', '0', '0', '');

-- ----------------------------
-- Table structure for `ims_modules_bindings`
-- ----------------------------
DROP TABLE IF EXISTS `ims_modules_bindings`;
CREATE TABLE `ims_modules_bindings` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(30) NOT NULL,
  `entry` varchar(10) NOT NULL,
  `call` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `do` varchar(30) NOT NULL,
  `state` varchar(200) NOT NULL,
  `direct` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `displayorder` tinyint(255) unsigned NOT NULL,
  PRIMARY KEY (`eid`),
  KEY `idx_module` (`module`)
) ENGINE=MyISAM AUTO_INCREMENT=370 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_modules_bindings
-- ----------------------------
INSERT INTO `ims_modules_bindings` VALUES ('369', 'ewei_shop_v1', 'menu', '', '系统设置', 'sysset', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('368', 'ewei_shop_v1', 'menu', '', '插件中心', 'plugins', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('367', 'ewei_shop_v1', 'menu', '', '数据统计', 'statistics', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('366', 'ewei_shop_v1', 'menu', '', '订单管理', 'order', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('365', 'ewei_shop_v1', 'menu', '', '会员管理', 'member', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('364', 'ewei_shop_v1', 'menu', '', '商城管理', 'shop', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('363', 'ewei_shop_v1', 'cover', '', '会员中心入口', 'member', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('362', 'ewei_shop_v1', 'cover', '', '我的收藏入口', 'favorite', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('361', 'ewei_shop_v1', 'cover', '', '购物车入口', 'cart', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('360', 'ewei_shop_v1', 'cover', '', '订单入口', 'order', '', '0', '', '', '0');
INSERT INTO `ims_modules_bindings` VALUES ('359', 'ewei_shop_v1', 'cover', '', '商城入口', 'shop', '', '0', '', '', '0');

-- ----------------------------
-- Table structure for `ims_modules_recycle`
-- ----------------------------
DROP TABLE IF EXISTS `ims_modules_recycle`;
CREATE TABLE `ims_modules_recycle` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `modulename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `modulename` (`modulename`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;



-- ----------------------------
-- Table structure for `ims_mon_sign_link`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mon_sign_link`;
CREATE TABLE `ims_mon_sign_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sid` int(11) unsigned DEFAULT NULL,
  `sort` int(2) DEFAULT '0',
  `link_name` varchar(50) NOT NULL,
  `link_url` varchar(50) NOT NULL,
  `createtime` int(10) unsigned NOT NULL COMMENT '日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mon_sign_link
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_mon_sign_token`
-- ----------------------------
DROP TABLE IF EXISTS `ims_mon_sign_token`;
CREATE TABLE `ims_mon_sign_token` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(11) unsigned DEFAULT NULL,
  `access_token` varchar(1000) NOT NULL,
  `expires_in` int(11) DEFAULT NULL,
  `createtime` int(10) unsigned NOT NULL COMMENT '日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_mon_sign_token
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_music_reply`
-- ----------------------------
DROP TABLE IF EXISTS `ims_music_reply`;
CREATE TABLE `ims_music_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(300) NOT NULL,
  `hqurl` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_music_reply
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_news_reply`
-- ----------------------------
DROP TABLE IF EXISTS `ims_news_reply`;
CREATE TABLE `ims_news_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `parent_id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `url` varchar(255) NOT NULL,
  `displayorder` int(10) NOT NULL,
  `incontent` tinyint(1) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_news_reply
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_paycenter_order`
-- ----------------------------
DROP TABLE IF EXISTS `ims_paycenter_order`;
CREATE TABLE `ims_paycenter_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `clerk_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `clerk_type` tinyint(3) unsigned NOT NULL,
  `uniontid` varchar(40) NOT NULL,
  `transaction_id` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL,
  `trade_type` varchar(10) NOT NULL,
  `body` varchar(255) NOT NULL,
  `fee` varchar(15) NOT NULL,
  `final_fee` decimal(10,2) unsigned NOT NULL,
  `credit1` int(10) unsigned NOT NULL,
  `credit1_fee` decimal(10,2) unsigned NOT NULL,
  `credit2` decimal(10,2) unsigned NOT NULL,
  `cash` decimal(10,2) unsigned NOT NULL,
  `remark` varchar(255) NOT NULL,
  `auth_code` varchar(30) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `follow` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `credit_status` tinyint(3) unsigned NOT NULL,
  `paytime` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_paycenter_order
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_profile_fields`
-- ----------------------------
DROP TABLE IF EXISTS `ims_profile_fields`;
CREATE TABLE `ims_profile_fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `field` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `displayorder` smallint(6) NOT NULL,
  `required` tinyint(1) NOT NULL,
  `unchangeable` tinyint(1) NOT NULL,
  `showinregister` tinyint(1) NOT NULL,
  `field_length` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_profile_fields
-- ----------------------------
INSERT INTO `ims_profile_fields` VALUES ('1', 'realname', '1', '真实姓名', '', '0', '1', '1', '1', '0');
INSERT INTO `ims_profile_fields` VALUES ('2', 'nickname', '1', '昵称', '', '1', '1', '0', '1', '0');
INSERT INTO `ims_profile_fields` VALUES ('3', 'avatar', '1', '头像', '', '1', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('4', 'qq', '1', 'QQ号', '', '0', '0', '0', '1', '0');
INSERT INTO `ims_profile_fields` VALUES ('5', 'mobile', '1', '手机号码', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('6', 'vip', '1', 'VIP级别', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('7', 'gender', '1', '性别', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('8', 'birthyear', '1', '出生生日', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('9', 'constellation', '1', '星座', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('10', 'zodiac', '1', '生肖', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('11', 'telephone', '1', '固定电话', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('12', 'idcard', '1', '证件号码', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('13', 'studentid', '1', '学号', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('14', 'grade', '1', '班级', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('15', 'address', '1', '邮寄地址', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('16', 'zipcode', '1', '邮编', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('17', 'nationality', '1', '国籍', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('18', 'resideprovince', '1', '居住地址', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('19', 'graduateschool', '1', '毕业学校', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('20', 'company', '1', '公司', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('21', 'education', '1', '学历', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('22', 'occupation', '1', '职业', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('23', 'position', '1', '职位', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('24', 'revenue', '1', '年收入', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('25', 'affectivestatus', '1', '情感状态', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('26', 'lookingfor', '1', ' 交友目的', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('27', 'bloodtype', '1', '血型', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('28', 'height', '1', '身高', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('29', 'weight', '1', '体重', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('30', 'alipay', '1', '支付宝帐号', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('31', 'msn', '1', 'MSN', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('32', 'email', '1', '电子邮箱', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('33', 'taobao', '1', '阿里旺旺', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('34', 'site', '1', '主页', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('35', 'bio', '1', '自我介绍', '', '0', '0', '0', '0', '0');
INSERT INTO `ims_profile_fields` VALUES ('36', 'interest', '1', '兴趣爱好', '', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `ims_qrcode`
-- ----------------------------
DROP TABLE IF EXISTS `ims_qrcode`;
CREATE TABLE `ims_qrcode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `type` varchar(10) NOT NULL,
  `extra` int(10) unsigned NOT NULL,
  `qrcid` int(10) unsigned NOT NULL,
  `scene_str` varchar(64) NOT NULL,
  `name` varchar(50) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `model` tinyint(1) unsigned NOT NULL,
  `ticket` varchar(250) NOT NULL,
  `url` varchar(80) NOT NULL,
  `expire` int(10) unsigned NOT NULL,
  `subnum` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_qrcid` (`qrcid`),
  KEY `uniacid` (`uniacid`),
  KEY `ticket` (`ticket`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_qrcode
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_qrcode_stat`
-- ----------------------------
DROP TABLE IF EXISTS `ims_qrcode_stat`;
CREATE TABLE `ims_qrcode_stat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `qid` int(10) unsigned NOT NULL,
  `openid` varchar(50) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `qrcid` int(10) unsigned NOT NULL,
  `scene_str` varchar(64) NOT NULL,
  `name` varchar(50) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_qrcode_stat
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_recharge_adv`
-- ----------------------------
DROP TABLE IF EXISTS `ims_recharge_adv`;
CREATE TABLE `ims_recharge_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weid` int(11) DEFAULT '0',
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_weid` (`weid`),
  KEY `indx_enabled` (`enabled`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_recharge_adv
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_recharge_order`
-- ----------------------------
DROP TABLE IF EXISTS `ims_recharge_order`;
CREATE TABLE `ims_recharge_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `weid` int(10) unsigned NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `ordersn` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '-1取消状态，0普通状态，1为已付款，2为已发货，3为成功',
  `paytype` tinyint(1) unsigned NOT NULL COMMENT '1为余额，2为在线',
  `transid` varchar(30) NOT NULL DEFAULT '0' COMMENT '微信支付单号',
  `remark` varchar(1000) NOT NULL DEFAULT '',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_recharge_order
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_rule`
-- ----------------------------
DROP TABLE IF EXISTS `ims_rule`;
CREATE TABLE `ims_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `displayorder` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_rule
-- ----------------------------
INSERT INTO `ims_rule` VALUES ('1', '0', '城市天气', 'userapi', '255', '1');
INSERT INTO `ims_rule` VALUES ('2', '0', '百度百科', 'userapi', '255', '1');
INSERT INTO `ims_rule` VALUES ('3', '0', '即时翻译', 'userapi', '255', '1');
INSERT INTO `ims_rule` VALUES ('4', '0', '今日老黄历', 'userapi', '255', '1');
INSERT INTO `ims_rule` VALUES ('5', '0', '看新闻', 'userapi', '255', '1');
INSERT INTO `ims_rule` VALUES ('6', '0', '快递查询', 'userapi', '255', '1');
INSERT INTO `ims_rule` VALUES ('7', '1', '个人中心入口设置', 'cover', '0', '1');
INSERT INTO `ims_rule` VALUES ('8', '1', '微擎团队入口设置', 'cover', '0', '1');

-- ----------------------------
-- Table structure for `ims_rule_keyword`
-- ----------------------------
DROP TABLE IF EXISTS `ims_rule_keyword`;
CREATE TABLE `ims_rule_keyword` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_content` (`content`),
  KEY `idx_rid` (`rid`),
  KEY `idx_uniacid_type_content` (`uniacid`,`type`,`content`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_rule_keyword
-- ----------------------------
INSERT INTO `ims_rule_keyword` VALUES ('1', '1', '0', 'userapi', '^.+天气$', '3', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('2', '2', '0', 'userapi', '^百科.+$', '3', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('3', '2', '0', 'userapi', '^定义.+$', '3', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('4', '3', '0', 'userapi', '^@.+$', '3', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('5', '4', '0', 'userapi', '日历', '1', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('6', '4', '0', 'userapi', '万年历', '1', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('7', '4', '0', 'userapi', '黄历', '1', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('8', '4', '0', 'userapi', '几号', '1', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('9', '5', '0', 'userapi', '新闻', '1', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('10', '6', '0', 'userapi', '^(申通|圆通|中通|汇通|韵达|顺丰|EMS) *[a-z0-9]{1,}$', '3', '255', '1');
INSERT INTO `ims_rule_keyword` VALUES ('11', '7', '1', 'cover', '个人中心', '1', '0', '1');
INSERT INTO `ims_rule_keyword` VALUES ('12', '8', '1', 'cover', '首页', '1', '0', '1');

-- ----------------------------
-- Table structure for `ims_site_article`
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_article`;
CREATE TABLE `ims_site_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `kid` int(10) unsigned NOT NULL,
  `iscommend` tinyint(1) NOT NULL,
  `ishot` tinyint(1) unsigned NOT NULL,
  `pcate` int(10) unsigned NOT NULL,
  `ccate` int(10) unsigned NOT NULL,
  `template` varchar(300) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `incontent` tinyint(1) NOT NULL,
  `source` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `displayorder` int(10) unsigned NOT NULL,
  `linkurl` varchar(500) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `click` int(10) unsigned NOT NULL,
  `type` varchar(10) NOT NULL,
  `credit` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_iscommend` (`iscommend`),
  KEY `idx_ishot` (`ishot`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_article
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_site_category`
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_category`;
CREATE TABLE `ims_site_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `nid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `parentid` int(10) unsigned NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL,
  `icon` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `linkurl` varchar(500) NOT NULL,
  `ishomepage` tinyint(1) NOT NULL,
  `icontype` tinyint(1) unsigned NOT NULL,
  `css` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_category
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_site_multi`
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_multi`;
CREATE TABLE `ims_site_multi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `site_info` text NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `bindhost` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `bindhost` (`bindhost`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_multi
-- ----------------------------
INSERT INTO `ims_site_multi` VALUES ('1', '1', '微信科技', '1', 'a:4:{s:5:\"thumb\";s:0:\"\";s:7:\"keyword\";s:0:\"\";s:11:\"description\";s:0:\"\";s:6:\"footer\";s:0:\"\";}', '1', '');

-- ----------------------------
-- Table structure for `ims_site_nav`
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_nav`;
CREATE TABLE `ims_site_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `section` tinyint(4) NOT NULL,
  `module` varchar(50) NOT NULL,
  `displayorder` smallint(5) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `position` tinyint(4) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(500) NOT NULL,
  `css` varchar(1000) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `categoryid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `multiid` (`multiid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_nav
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_site_page`
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_page`;
CREATE TABLE `ims_site_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `params` longtext NOT NULL,
  `html` longtext NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `goodnum` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `multiid` (`multiid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_page
-- ----------------------------
INSERT INTO `ims_site_page` VALUES ('1', '1', '0', '快捷菜单', '', '{\"navStyle\":\"2\",\"bgColor\":\"#f4f4f4\",\"menus\":[{\"title\":\"u4f1au5458u5361\",\"url\":\"./index.php?c=mc&a=bond&do=card&i=1\",\"submenus\":[],\"icon\":{\"name\":\"fa fa-credit-card\",\"color\":\"#969696\"},\"image\":\"\",\"hoverimage\":\"\",\"hovericon\":[]},{\"title\":\"u5151u6362\",\"url\":\"./index.php?c=activity&a=coupon&do=display&&i=1\",\"submenus\":[],\"icon\":{\"name\":\"fa fa-money\",\"color\":\"#969696\"},\"image\":\"\",\"hoverimage\":\"\",\"hovericon\":[]},{\"title\":\"u4ed8u6b3e\",\"url\":\"\" data-target=\"#scan\" data-toggle=\"modal\" href=\"javascript:void();\",\"submenus\":[],\"icon\":{\"name\":\"fa fa-qrcode\",\"color\":\"#969696\"},\"image\":\"\",\"hoverimage\":\"\",\"hovericon\":\"\"},{\"title\":\"u4e2au4ebau4e2du5fc3\",\"url\":\"./index.php?i=1&c=mc&\",\"submenus\":[],\"icon\":{\"name\":\"fa fa-user\",\"color\":\"#969696\"},\"image\":\"\",\"hoverimage\":\"\",\"hovericon\":[]}],\"extend\":[],\"position\":{\"homepage\":true,\"usercenter\":true,\"page\":true,\"article\":true},\"ignoreModules\":[]}', '<div style=\"background-color: rgb(244, 244, 244);\" class=\"js-quickmenu nav-menu-app has-nav-0  has-nav-4\"   ><ul class=\"nav-group clearfix\"><li class=\"nav-group-item \" ><a href=\"./index.php?c=mc&a=bond&do=card&i=1\" style=\"background-position: center 2px;\" ><i style=\"color: rgb(150, 150, 150);\"  class=\"fa fa-credit-card\"  js-onclass-name=\"\" js-onclass-color=\"\" ></i><span style=\"color: rgb(150, 150, 150);\" class=\"\"  js-onclass-color=\"\">会员卡</span></a></li><li class=\"nav-group-item \" ><a href=\"./index.php?c=activity&a=coupon&do=display&&i=1\" style=\"background-position: center 2px;\" ><i style=\"color: rgb(150, 150, 150);\"  class=\"fa fa-money\"  js-onclass-name=\"\" js-onclass-color=\"\" ></i><span style=\"color: rgb(150, 150, 150);\" class=\"\"  js-onclass-color=\"\">兑换</span></a></li><li class=\"nav-group-item \" ><a href=\"\" data-target=\"#scan\" data-toggle=\"modal\" href=\"javascript:void();\" style=\"background-position: center 2px;\" ><i style=\"color: rgb(150, 150, 150);\"  class=\"fa fa-qrcode\"  js-onclass-name=\"\" js-onclass-color=\"\" ></i><span style=\"color: rgb(150, 150, 150);\" class=\"\"  js-onclass-color=\"\">付款</span></a></li><li class=\"nav-group-item \" ><a href=\"./index.php?i=1&c=mc&\" style=\"background-position: center 2px;\" ><i style=\"color: rgb(150, 150, 150);\"  class=\"fa fa-user\"  js-onclass-name=\"\" js-onclass-color=\"\" ></i><span style=\"color: rgb(150, 150, 150);\" class=\"\"  js-onclass-color=\"\">个人中心</span></a></li></ul></div>', '4', '1', '1440242655', '0');

-- ----------------------------
-- Table structure for `ims_site_slide`
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_slide`;
CREATE TABLE `ims_site_slide` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `multiid` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `displayorder` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `multiid` (`multiid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_slide
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_site_styles`
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_styles`;
CREATE TABLE `ims_site_styles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `templateid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_styles
-- ----------------------------
INSERT INTO `ims_site_styles` VALUES ('1', '1', '1', '微站默认模板_gC5C');

-- ----------------------------
-- Table structure for `ims_site_styles_vars`
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_styles_vars`;
CREATE TABLE `ims_site_styles_vars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `templateid` int(10) unsigned NOT NULL,
  `styleid` int(10) unsigned NOT NULL,
  `variable` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_styles_vars
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_site_templates`
-- ----------------------------
DROP TABLE IF EXISTS `ims_site_templates`;
CREATE TABLE `ims_site_templates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `version` varchar(64) NOT NULL,
  `description` varchar(500) NOT NULL,
  `author` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL,
  `sections` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_site_templates
-- ----------------------------
INSERT INTO `ims_site_templates` VALUES ('1', 'default', '微站默认模板', '', '由微擎提供默认微站模板套系', '微擎团队', 'http://we7.cc', '1', '0');
INSERT INTO `ims_site_templates` VALUES ('2', 'style_car', '微站微汽车', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('3', 'style99', '微站模板99', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('4', 'style98', '微站模板98', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('5', 'style96', '微站模板96', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('6', 'style95', '微站模板95', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('7', 'style94', '微站模板94', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('8', 'style93', '微站模板93', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('9', 'style92', '微站模板92', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('10', 'style91', '微站模板91', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('11', 'style90', '微站模板90', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('12', 'style9', '微站模板9', '', '微站模板', '微信', 'http://9999.v-888.com', 'car', '0');
INSERT INTO `ims_site_templates` VALUES ('13', 'style89', '微站模板89', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('14', 'style88', '微站模板88', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('15', 'style87', '微站模板87', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('16', 'style86', '微站模板86', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('17', 'style85', '微站模板85', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('18', 'style84', '微站模板84', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('19', 'style83', '微站模板83', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('20', 'style82', '微站模板82', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('21', 'style81', '微站模板81', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('22', 'style80', '微站模板80', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('23', 'style8', '微站模板8', '', '微站模板', '微信', 'http://9999.v-888.com', 'shoot', '0');
INSERT INTO `ims_site_templates` VALUES ('24', 'style79', '微站模板79', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('25', 'style78', '微站模板78', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('26', 'style77', '微站模板77', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('27', 'style76', '微站模板76', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('28', 'style75', '微站模板75', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('29', 'style74', '微站模板74', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('30', 'style73', '微站模板73', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('31', 'style72', '微站模板72', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('32', 'style71', '微站模板71', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('33', 'style70', '微站模板70', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('34', 'style7', '微站模板7', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('35', 'style69', '微站模板69', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('36', 'style68', '微站模板68', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('37', 'style67', '微站模板67', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('38', 'style66', '微站模板66', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('39', 'style65', '微站模板65', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('40', 'style64', '微站模板64', '', '', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('41', 'style63', '微站模板63', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('42', 'style62', '微站模板62', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('43', 'style61', '微站模板61', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('44', 'style60', '微站模板60', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('45', 'style6', '微站模板6', '', '', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('46', 'style59', '微站模板59', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('47', 'style58', '微站模板58', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('48', 'style57', '微站模板57', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('49', 'style56', '微站模板56', '', '', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('50', 'style55', '微站模板55', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('51', 'style54', '微站模板54', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('52', 'style53', '微站模板53', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('53', 'style52', '微站模板52', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('54', 'style51', '微站模板51', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('55', 'style50', '微站模板50', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('56', 'style5', '微站模板5', '', '微站模板', '微信', 'http://9999.v-888.com', 'car', '0');
INSERT INTO `ims_site_templates` VALUES ('57', 'style49', '微站模板49', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('58', 'style48', '微站模板48', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('59', 'style47', '微站模板47', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('60', 'style46', '微站模板46', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('61', 'style45', '微站模板45', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('62', 'style44', '微站模板44', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('63', 'style43', '微站模板43', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('64', 'style42', '微站模板42', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('65', 'style41', '微站模板41', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('66', 'style40', '微站模板40', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('67', 'style4', '微站模板4', '', '微站模板', '微信', 'http://9999.v-888.com', 'car', '0');
INSERT INTO `ims_site_templates` VALUES ('68', 'style39', '微站模板39', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('69', 'style38', '微站模板38', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('70', 'style37', '微站模板37', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('71', 'style36', '微站模板36', '', '微站模板', '微信', 'http://9999.v-888.com', 'medical', '0');
INSERT INTO `ims_site_templates` VALUES ('72', 'style35', '微站模板35', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('73', 'style34', '微站模板34', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('74', 'style33', '微站模板33', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('75', 'style32', '微站模板32', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('76', 'style31', '微站模板31', '', '微站模板', '微信', 'http://9999.v-888.com', 'drink', '0');
INSERT INTO `ims_site_templates` VALUES ('77', 'style30', '微站模板30', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('78', 'style3', '微站模板3', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('79', 'style29', '微站模板29', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('80', 'style28', '微站模板28', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('81', 'style27', '微站模板27', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('82', 'style26', '微站模板26', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('83', 'style25', '微站模板25', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('84', 'style24', '微站模板24', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('85', 'style23', '微站模板23', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('86', 'style22', '微站模板22', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('87', 'style21', '微站模板21', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('88', 'style20', '微站模板20', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('89', 'style2', '微站模板2', '', '微站模板', '微信', 'http://9999.v-888.com', 'cosmetology', '0');
INSERT INTO `ims_site_templates` VALUES ('90', 'style19', '微站模板19', '', '微站模板', '微信', 'http://9999.v-888.com', 'drink', '0');
INSERT INTO `ims_site_templates` VALUES ('91', 'style18', '微站模板18', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('92', 'style17', '微站模板17', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('93', 'style16', '微站模板16', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('94', 'style15', '微站模板15', '', '微站模板', '微信', 'http://9999.v-888.com', 'tourism', '0');
INSERT INTO `ims_site_templates` VALUES ('95', 'style14', '微站模板14', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('96', 'style13', '微站模板13', '', '微站模板', '微信', 'http://9999.v-888.com', 'realty', '0');
INSERT INTO `ims_site_templates` VALUES ('97', 'style12', '微站模板12', '', '微站模板', '微信', 'http://9999.v-888.com', 'often', '0');
INSERT INTO `ims_site_templates` VALUES ('98', 'style118', '微站模板118', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('99', 'style117', '微站模板117', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('100', 'style116', '微站模板116', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('101', 'style113', '微站模板113', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('102', 'style112', '微站模板112', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('103', 'style111', '微站模板111', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('104', 'style110', '微站模板110', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('105', 'style11', '微站模板11', '', '微站模板', '微信', 'http://9999.v-888.com', 'shoot', '0');
INSERT INTO `ims_site_templates` VALUES ('106', 'style108', '微站模板108', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('107', 'style107', '微站模板107', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('108', 'style106', '微站模板106', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('109', 'style105', '微站模板105', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('110', 'style104', '微站模板104', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('111', 'style103', '微站模板103', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('112', 'style102', '微站模板102', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('113', 'style101', '微站模板101', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('114', 'style100', '微站模板100', '', '微站模板', '微信', 'http://9999.v-888.com', 'other', '0');
INSERT INTO `ims_site_templates` VALUES ('115', 'style10', '微站模板10', '', '微站模板', '微信', 'http://9999.v-888.com', 'shoot', '0');
INSERT INTO `ims_site_templates` VALUES ('116', 'style1', '微站模板1', '', '微站模板', '微信', 'http://9999.v-888.com', 'drink', '0');

-- ----------------------------
-- Table structure for `ims_stat_fans`
-- ----------------------------
DROP TABLE IF EXISTS `ims_stat_fans`;
CREATE TABLE `ims_stat_fans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `new` int(10) unsigned NOT NULL,
  `cancel` int(10) unsigned NOT NULL,
  `cumulate` int(10) NOT NULL,
  `date` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`,`date`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_stat_fans
-- ----------------------------
INSERT INTO `ims_stat_fans` VALUES ('1', '1', '0', '0', '0', '20160706');
INSERT INTO `ims_stat_fans` VALUES ('2', '1', '0', '0', '0', '20160705');
INSERT INTO `ims_stat_fans` VALUES ('3', '1', '0', '0', '0', '20160704');
INSERT INTO `ims_stat_fans` VALUES ('4', '1', '0', '0', '0', '20160703');
INSERT INTO `ims_stat_fans` VALUES ('5', '1', '0', '0', '0', '20160702');
INSERT INTO `ims_stat_fans` VALUES ('6', '1', '0', '0', '0', '20160701');
INSERT INTO `ims_stat_fans` VALUES ('7', '1', '0', '0', '0', '20160630');
INSERT INTO `ims_stat_fans` VALUES ('8', '1', '1', '1', '1', '20160707');
INSERT INTO `ims_stat_fans` VALUES ('9', '1', '0', '0', '1', '20160710');
INSERT INTO `ims_stat_fans` VALUES ('10', '1', '0', '0', '1', '20160709');
INSERT INTO `ims_stat_fans` VALUES ('11', '1', '0', '0', '1', '20160708');
INSERT INTO `ims_stat_fans` VALUES ('12', '1', '0', '0', '1', '20160715');
INSERT INTO `ims_stat_fans` VALUES ('13', '1', '0', '0', '1', '20160714');
INSERT INTO `ims_stat_fans` VALUES ('14', '1', '0', '0', '1', '20160713');
INSERT INTO `ims_stat_fans` VALUES ('15', '1', '0', '0', '1', '20160712');
INSERT INTO `ims_stat_fans` VALUES ('16', '1', '0', '0', '1', '20160711');
INSERT INTO `ims_stat_fans` VALUES ('17', '1', '0', '0', '1', '20160716');
INSERT INTO `ims_stat_fans` VALUES ('18', '1', '0', '0', '1', '20160718');
INSERT INTO `ims_stat_fans` VALUES ('19', '1', '0', '0', '1', '20160717');
INSERT INTO `ims_stat_fans` VALUES ('20', '1', '0', '0', '1', '20160721');
INSERT INTO `ims_stat_fans` VALUES ('21', '1', '0', '0', '1', '20160720');
INSERT INTO `ims_stat_fans` VALUES ('22', '1', '0', '0', '1', '20160719');
INSERT INTO `ims_stat_fans` VALUES ('23', '1', '0', '0', '1', '20160731');
INSERT INTO `ims_stat_fans` VALUES ('24', '1', '0', '0', '1', '20160730');
INSERT INTO `ims_stat_fans` VALUES ('25', '1', '0', '0', '1', '20160729');
INSERT INTO `ims_stat_fans` VALUES ('26', '1', '0', '0', '1', '20160728');
INSERT INTO `ims_stat_fans` VALUES ('27', '1', '0', '0', '1', '20160727');
INSERT INTO `ims_stat_fans` VALUES ('28', '1', '0', '0', '1', '20160726');
INSERT INTO `ims_stat_fans` VALUES ('29', '1', '0', '0', '1', '20160725');
INSERT INTO `ims_stat_fans` VALUES ('30', '1', '0', '0', '1', '20160804');
INSERT INTO `ims_stat_fans` VALUES ('31', '1', '0', '0', '1', '20160803');
INSERT INTO `ims_stat_fans` VALUES ('32', '1', '0', '0', '1', '20160802');
INSERT INTO `ims_stat_fans` VALUES ('33', '1', '0', '0', '1', '20160801');
INSERT INTO `ims_stat_fans` VALUES ('34', '1', '0', '0', '1', '20160812');
INSERT INTO `ims_stat_fans` VALUES ('35', '1', '0', '0', '1', '20160811');
INSERT INTO `ims_stat_fans` VALUES ('36', '1', '0', '0', '1', '20160810');
INSERT INTO `ims_stat_fans` VALUES ('37', '1', '0', '0', '1', '20160809');
INSERT INTO `ims_stat_fans` VALUES ('38', '1', '0', '0', '1', '20160808');
INSERT INTO `ims_stat_fans` VALUES ('39', '1', '0', '0', '1', '20160807');
INSERT INTO `ims_stat_fans` VALUES ('40', '1', '0', '0', '1', '20160806');
INSERT INTO `ims_stat_fans` VALUES ('41', '1', '0', '0', '1', '20160814');
INSERT INTO `ims_stat_fans` VALUES ('42', '1', '0', '0', '1', '20160813');
INSERT INTO `ims_stat_fans` VALUES ('43', '1', '0', '0', '1', '20160815');
INSERT INTO `ims_stat_fans` VALUES ('44', '1', '0', '0', '1', '20160818');
INSERT INTO `ims_stat_fans` VALUES ('45', '1', '0', '0', '1', '20160817');
INSERT INTO `ims_stat_fans` VALUES ('46', '1', '0', '0', '1', '20160816');

-- ----------------------------
-- Table structure for `ims_stat_keyword`
-- ----------------------------
DROP TABLE IF EXISTS `ims_stat_keyword`;
CREATE TABLE `ims_stat_keyword` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` varchar(10) NOT NULL,
  `kid` int(10) unsigned NOT NULL,
  `hit` int(10) unsigned NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_stat_keyword
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_stat_msg_history`
-- ----------------------------
DROP TABLE IF EXISTS `ims_stat_msg_history`;
CREATE TABLE `ims_stat_msg_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `kid` int(10) unsigned NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `type` varchar(10) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_stat_msg_history
-- ----------------------------
INSERT INTO `ims_stat_msg_history` VALUES ('1', '1', '0', '0', 'o-3-vjuH88wHMnshKBr2NlHtHBKs', '', 'a:2:{s:5:\"scene\";N;s:6:\"ticket\";N;}', 'subscribe', '1467875044');
INSERT INTO `ims_stat_msg_history` VALUES ('2', '1', '0', '0', 'o-3-vjuH88wHMnshKBr2NlHtHBKs', 'default', 'a:3:{s:10:\"location_x\";s:9:\"30.941502\";s:10:\"location_y\";s:10:\"112.212555\";s:9:\"precision\";s:9:\"65.000000\";}', 'trace', '1467875061');
INSERT INTO `ims_stat_msg_history` VALUES ('3', '1', '0', '0', 'o-3-vjuH88wHMnshKBr2NlHtHBKs', 'default', 'a:3:{s:10:\"location_x\";s:9:\"30.941820\";s:10:\"location_y\";s:10:\"112.212593\";s:9:\"precision\";s:9:\"10.000000\";}', 'trace', '1467875075');
INSERT INTO `ims_stat_msg_history` VALUES ('4', '1', '0', '0', 'o-3-vjvTdWU9lnGBQT6Cd99OqU9Y', '', '', 'unsubscrib', '1467883094');

-- ----------------------------
-- Table structure for `ims_stat_rule`
-- ----------------------------
DROP TABLE IF EXISTS `ims_stat_rule`;
CREATE TABLE `ims_stat_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `rid` int(10) unsigned NOT NULL,
  `hit` int(10) unsigned NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_createtime` (`createtime`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_stat_rule
-- ----------------------------
INSERT INTO `ims_stat_rule` VALUES ('1', '1', '0', '1', '1467875044', '1467820800');
INSERT INTO `ims_stat_rule` VALUES ('2', '1', '0', '1', '1467875061', '1467820800');
INSERT INTO `ims_stat_rule` VALUES ('3', '1', '0', '1', '1467875075', '1467820800');

-- ----------------------------
-- Table structure for `ims_tg_address`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_address`;
CREATE TABLE `ims_tg_address` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `openid` varchar(300) NOT NULL,
  `cname` varchar(30) NOT NULL COMMENT '收货人名称',
  `tel` varchar(20) NOT NULL COMMENT '手机号',
  `province` varchar(20) NOT NULL COMMENT '省',
  `city` varchar(20) NOT NULL COMMENT '市',
  `county` varchar(20) NOT NULL COMMENT '县(区)',
  `detailed_address` varchar(225) NOT NULL COMMENT '详细地址',
  `uniacid` int(10) NOT NULL COMMENT '公众号id',
  `addtime` varchar(45) NOT NULL,
  `status` int(2) NOT NULL COMMENT '1为默认',
  `type` int(11) NOT NULL,
  `mid` int(11) DEFAULT NULL COMMENT '粉丝ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_address
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_admin`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_admin`;
CREATE TABLE `ims_tg_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` varchar(30) NOT NULL COMMENT '管理员名称',
  `password` varchar(20) NOT NULL COMMENT '管理员密码',
  `email` varchar(60) NOT NULL COMMENT '邮箱',
  `tel` varchar(20) NOT NULL COMMENT '手机号',
  `uniacid` int(10) DEFAULT NULL COMMENT '公众号id',
  `openid` varchar(100) DEFAULT NULL COMMENT '用户openid',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `openid` (`openid`),
  UNIQUE KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_admin
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_adv`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_adv`;
CREATE TABLE `ims_tg_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `advname` varchar(50) DEFAULT '',
  `link` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_enabled` (`enabled`),
  KEY `indx_displayorder` (`displayorder`),
  KEY `indx_weid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_adv
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_arealimit`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_arealimit`;
CREATE TABLE `ims_tg_arealimit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `enabled` int(11) NOT NULL,
  `arealimitname` varchar(56) NOT NULL,
  `areas` text NOT NULL,
  `merchantid` int(11) NOT NULL COMMENT '所属商家',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_arealimit
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_banner`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_banner`;
CREATE TABLE `ims_tg_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一标识',
  `uniacid` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `displayorder` int(11) NOT NULL,
  `enabled` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_banner
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_category`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_category`;
CREATE TABLE `ims_tg_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `thumb` varchar(255) NOT NULL COMMENT '分类图片',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID,0为第一级',
  `isrecommand` int(10) DEFAULT '0',
  `description` varchar(500) NOT NULL COMMENT '分类介绍',
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否开启',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_category
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_collect`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_collect`;
CREATE TABLE `ims_tg_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `openid` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_collect
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_coupon`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_coupon`;
CREATE TABLE `ims_tg_coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `coupon_template_id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `cash` varchar(20) NOT NULL,
  `is_at_least` tinyint(3) unsigned NOT NULL,
  `at_least` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_time` int(10) unsigned NOT NULL,
  `end_time` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `use_time` int(10) unsigned NOT NULL,
  `openid` varchar(100) NOT NULL,
  `uniacid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_coupon
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_coupon_template`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_coupon_template`;
CREATE TABLE `ims_tg_coupon_template` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '优惠券名称',
  `value` varchar(50) NOT NULL COMMENT '最小面值',
  `value_to` varchar(50) NOT NULL COMMENT '最大面值',
  `is_random` tinyint(3) unsigned NOT NULL COMMENT '是否随机',
  `is_at_least` tinyint(3) unsigned NOT NULL COMMENT '是否存在最低消费',
  `at_least` varchar(20) NOT NULL COMMENT '最低消费',
  `is_sync_weixin` tinyint(11) unsigned NOT NULL,
  `user_level` tinyint(11) unsigned DEFAULT NULL,
  `quota` tinyint(10) unsigned NOT NULL COMMENT '领取限制',
  `start_time` int(10) unsigned NOT NULL COMMENT '开始时间',
  `end_time` int(10) unsigned NOT NULL COMMENT '结束时间',
  `fans_tag` int(10) unsigned NOT NULL,
  `expire_notice` tinyint(4) unsigned NOT NULL,
  `is_share` tinyint(3) unsigned NOT NULL,
  `range_type` tinyint(3) unsigned NOT NULL,
  `is_forbid_preference` tinyint(3) unsigned NOT NULL,
  `description` varchar(255) NOT NULL COMMENT '描述',
  `createtime` int(10) unsigned NOT NULL COMMENT '创建时间',
  `enable` tinyint(3) unsigned NOT NULL COMMENT '优惠券状态，1正常',
  `total` int(10) unsigned NOT NULL COMMENT '优惠券总量',
  `quantity_issue` int(10) unsigned NOT NULL,
  `quantity_used` int(10) unsigned NOT NULL COMMENT '已使用数量',
  `uid` int(10) unsigned NOT NULL,
  `uniacid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_coupon_template
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_credit_record`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_credit_record`;
CREATE TABLE `ims_tg_credit_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `openid` varchar(245) NOT NULL,
  `num` varchar(30) NOT NULL,
  `createtime` varchar(145) NOT NULL,
  `transid` varchar(145) NOT NULL,
  `status` int(11) NOT NULL,
  `paytype` int(2) NOT NULL COMMENT '1微信2后台',
  `ordersn` varchar(145) NOT NULL,
  `type` int(2) NOT NULL COMMENT '1积分2余额',
  `remark` varchar(145) NOT NULL,
  `table` tinyint(4) DEFAULT NULL COMMENT '1微赞2tg',
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_credit_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_delivery_price`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_delivery_price`;
CREATE TABLE `ims_tg_delivery_price` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `template_id` int(10) unsigned NOT NULL,
  `province` varchar(12) NOT NULL,
  `city` varchar(12) NOT NULL,
  `district` varchar(12) NOT NULL,
  `first_weight` varchar(20) NOT NULL,
  `first_fee` varchar(20) NOT NULL,
  `additional_weight` varchar(20) NOT NULL,
  `additional_fee` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tid` (`template_id`),
  KEY `district` (`province`,`city`,`district`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_delivery_price
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_delivery_template`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_delivery_template`;
CREATE TABLE `ims_tg_delivery_template` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `region` longtext NOT NULL,
  `data` longtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `uniacid` int(11) NOT NULL,
  `merchantid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_delivery_template
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_dispatch`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_dispatch`;
CREATE TABLE `ims_tg_dispatch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `dispatchname` varchar(50) DEFAULT '',
  `dispatchtype` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `firstprice` decimal(10,2) DEFAULT '0.00',
  `secondprice` decimal(10,2) DEFAULT '0.00',
  `firstweight` int(11) DEFAULT '0',
  `secondweight` int(11) DEFAULT '0',
  `express` varchar(250) DEFAULT '',
  `areas` text,
  `carriers` text,
  `enabled` int(11) DEFAULT '0',
  `merchantid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_dispatch
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_gift`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_gift`;
CREATE TABLE `ims_tg_gift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL COMMENT '活动名称',
  `uniacid` int(11) NOT NULL,
  `goodsid` int(11) NOT NULL COMMENT '商品id',
  `starttime` varchar(145) DEFAULT NULL COMMENT '活动开启时间',
  `endtime` varchar(145) DEFAULT NULL COMMENT '活动结束时间',
  `gettime` int(11) DEFAULT NULL COMMENT '有效领取时间',
  `times` int(11) DEFAULT NULL COMMENT '领取次数',
  `sendnum` int(11) DEFAULT NULL COMMENT '赠送数量',
  `getnum` int(11) DEFAULT NULL COMMENT '领取数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ims_tg_gift
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_goods`;
CREATE TABLE `ims_tg_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `gname` varchar(225) NOT NULL COMMENT '商品名称',
  `fk_typeid` int(10) unsigned NOT NULL COMMENT '所属分类id',
  `gsn` varchar(50) NOT NULL COMMENT '商品货号',
  `gnum` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品库存',
  `groupnum` int(10) unsigned NOT NULL COMMENT '最低拼团人数',
  `mprice` decimal(10,2) NOT NULL,
  `gprice` decimal(10,2) NOT NULL COMMENT '团购价',
  `oprice` decimal(10,2) NOT NULL COMMENT '单买价',
  `freight` decimal(10,2) NOT NULL,
  `gdesc` longtext NOT NULL COMMENT '商品简介',
  `gdesc1` varchar(100) DEFAULT NULL COMMENT '商品特点1',
  `gdesc2` varchar(100) DEFAULT NULL COMMENT '商品特点2',
  `gdesc3` varchar(100) DEFAULT NULL COMMENT '商品特点3',
  `gimg` varchar(225) DEFAULT NULL COMMENT '商品图片路径',
  `gubtime` int(10) unsigned NOT NULL COMMENT '商品上架时间',
  `isshow` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否上架',
  `salenum` int(10) unsigned NOT NULL COMMENT '销量',
  `ishot` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否热卖',
  `displayorder` int(11) NOT NULL,
  `createtime` int(10) unsigned NOT NULL COMMENT '最后修改时间',
  `uniacid` int(10) NOT NULL COMMENT '公众号的id',
  `endtime` int(11) NOT NULL COMMENT '团购限时（小时数）',
  `yunfei_id` int(11) NOT NULL,
  `is_discount` int(11) NOT NULL,
  `credits` int(11) NOT NULL,
  `is_hexiao` int(2) NOT NULL,
  `hexiao_id` varchar(225) NOT NULL,
  `is_share` int(2) NOT NULL,
  `gdetaile` longtext NOT NULL,
  `isnew` int(11) NOT NULL,
  `isrecommand` int(11) NOT NULL,
  `isdiscount` int(11) NOT NULL,
  `hasoption` int(11) NOT NULL,
  `group_level` varchar(1000) NOT NULL,
  `group_level_status` int(11) NOT NULL,
  `merchantid` int(11) NOT NULL,
  `share_title` varchar(200) NOT NULL,
  `share_image` varchar(250) NOT NULL,
  `share_desc` varchar(200) NOT NULL,
  `one_limit` int(11) NOT NULL,
  `many_limit` int(11) NOT NULL,
  `firstdiscount` decimal(10,2) NOT NULL,
  `category_childid` int(11) NOT NULL,
  `category_parentid` int(11) NOT NULL,
  `pv` int(11) NOT NULL,
  `uv` int(11) NOT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `goodstab` varchar(32) DEFAULT NULL,
  `op_one_limit` int(11) DEFAULT NULL COMMENT '单次购买数',
  `first_free` int(11) NOT NULL,
  `give_coupon_id` int(11) NOT NULL,
  `give_gift_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gname` (`gname`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_goods
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_goods_atlas`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_goods_atlas`;
CREATE TABLE `ims_tg_goods_atlas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `g_id` int(11) NOT NULL COMMENT '商品id',
  `thumb` varchar(145) NOT NULL COMMENT '图片路径',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_goods_atlas
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_goods_imgs`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_goods_imgs`;
CREATE TABLE `ims_tg_goods_imgs` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `fk_gid` int(10) NOT NULL COMMENT '对应商品的id',
  `albumpath` varchar(225) NOT NULL COMMENT '图片路径',
  `uniacid` int(10) NOT NULL COMMENT '公众号id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_gid` (`fk_gid`),
  UNIQUE KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_goods_imgs
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_goods_option`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_goods_option`;
CREATE TABLE `ims_tg_goods_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsid` int(10) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `thumb` varchar(60) DEFAULT '',
  `productprice` decimal(10,2) DEFAULT '0.00',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  `costprice` decimal(10,2) DEFAULT '0.00',
  `stock` int(11) DEFAULT '0',
  `weight` decimal(10,2) DEFAULT '0.00',
  `displayorder` int(11) DEFAULT '0',
  `specs` text,
  PRIMARY KEY (`id`),
  KEY `indx_goodsid` (`goodsid`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_goods_option
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_goods_param`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_goods_param`;
CREATE TABLE `ims_tg_goods_param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsid` int(10) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `value` text,
  `displayorder` int(11) DEFAULT '0',
  `uniacid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `indx_goodsid` (`goodsid`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_goods_param
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_goods_type`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_goods_type`;
CREATE TABLE `ims_tg_goods_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `cname` varchar(30) NOT NULL COMMENT '分类名称',
  `pid` int(10) DEFAULT NULL COMMENT '上级分类的id',
  `uniacid` int(10) DEFAULT NULL COMMENT '公众号的id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_goods_type
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_group`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_group`;
CREATE TABLE `ims_tg_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupnumber` varchar(115) NOT NULL COMMENT '团编号',
  `goodsid` int(11) NOT NULL COMMENT '商品ID',
  `goodsname` varchar(1024) NOT NULL COMMENT '商品名称',
  `groupstatus` int(11) NOT NULL COMMENT '团状态',
  `neednum` int(11) NOT NULL COMMENT '所需人数',
  `lacknum` int(11) NOT NULL COMMENT '缺少人数',
  `starttime` varchar(225) NOT NULL COMMENT '开团时间',
  `endtime` varchar(225) NOT NULL COMMENT '到期时间',
  `uniacid` int(11) NOT NULL,
  `grouptype` int(11) NOT NULL COMMENT '1同2异3普通4单',
  `isshare` int(11) NOT NULL COMMENT '1分享2不分享',
  `price` varchar(11) DEFAULT NULL,
  `merchantid` int(11) NOT NULL,
  `successtime` varchar(100) NOT NULL,
  `lottery_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_group
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_helpbuy`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_helpbuy`;
CREATE TABLE `ims_tg_helpbuy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` varchar(45) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_helpbuy
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_lottery`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_lottery`;
CREATE TABLE `ims_tg_lottery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  `uniacid` int(11) DEFAULT NULL,
  `goodsid` int(11) DEFAULT NULL,
  `starttime` varchar(145) DEFAULT NULL,
  `endtime` varchar(145) DEFAULT NULL,
  `first_num` int(11) DEFAULT NULL,
  `second_num` int(11) DEFAULT NULL,
  `third_num` int(11) DEFAULT NULL,
  `forth_num` int(11) DEFAULT NULL,
  `createtime` varchar(145) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ims_tg_lottery
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_member`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_member`;
CREATE TABLE `ims_tg_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL COMMENT '公众账号id',
  `openid` varchar(100) NOT NULL COMMENT '微信会员openID',
  `nickname` varchar(20) NOT NULL COMMENT '昵称',
  `avatar` varchar(255) NOT NULL COMMENT '头像',
  `addtime` varchar(45) NOT NULL,
  `tag` varchar(1000) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `uid` int(11) NOT NULL,
  `credit1` varchar(100) DEFAULT NULL,
  `credit2` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `realname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_member
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_merchant`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_merchant`;
CREATE TABLE `ims_tg_merchant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `industry` varchar(45) NOT NULL,
  `address` varchar(115) NOT NULL,
  `linkman_name` varchar(145) NOT NULL,
  `linkman_mobile` varchar(145) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `createtime` varchar(115) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `detail` varchar(1222) NOT NULL,
  `salenum` int(11) NOT NULL COMMENT '商家销量',
  `open` int(11) NOT NULL COMMENT '是否分配商家权限',
  `uname` varchar(45) NOT NULL,
  `password` varchar(145) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `messageopenid` varchar(150) NOT NULL,
  `openid` varchar(150) NOT NULL,
  `goodsnum` int(11) NOT NULL,
  `percent` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_merchant
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_merchant_account`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_merchant_account`;
CREATE TABLE `ims_tg_merchant_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merchantid` int(11) NOT NULL COMMENT '商家ID',
  `uniacid` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '操作员id',
  `amount` decimal(10,2) NOT NULL COMMENT '交易总金额',
  `updatetime` varchar(45) NOT NULL COMMENT '上次结算时间',
  `no_money` decimal(10,2) NOT NULL COMMENT '目前未结算金额',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_merchant_account
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_merchant_record`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_merchant_record`;
CREATE TABLE `ims_tg_merchant_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merchantid` int(11) NOT NULL COMMENT '商家id',
  `money` varchar(45) NOT NULL COMMENT '本次结算金额',
  `uid` int(11) NOT NULL COMMENT '操作员id',
  `createtime` varchar(45) NOT NULL COMMENT '结算时间',
  `uniacid` int(11) NOT NULL,
  `orderno` varchar(45) NOT NULL,
  `commission` varchar(45) NOT NULL,
  `percent` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_merchant_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_nav`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_nav`;
CREATE TABLE `ims_tg_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一标识',
  `uniacid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `displayorder` int(11) NOT NULL,
  `enabled` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_nav
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_notice`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_notice`;
CREATE TABLE `ims_tg_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '唯一标识',
  `uniacid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `enabled` int(11) NOT NULL,
  `createtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_notice
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_oplog`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_oplog`;
CREATE TABLE `ims_tg_oplog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `describe` varchar(225) DEFAULT NULL,
  `view_url` varchar(225) DEFAULT NULL,
  `ip` varchar(32) DEFAULT NULL COMMENT 'IP',
  `data` varchar(1024) DEFAULT NULL,
  `createtime` varchar(32) DEFAULT NULL,
  `user` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_oplog
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_order`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_order`;
CREATE TABLE `ims_tg_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uniacid` varchar(45) NOT NULL COMMENT '公众号',
  `gnum` int(11) NOT NULL COMMENT '购买数量',
  `openid` varchar(145) NOT NULL COMMENT '用户名',
  `ptime` varchar(45) NOT NULL COMMENT '支付成功时间',
  `orderno` varchar(45) NOT NULL COMMENT '订单编号',
  `price` varchar(45) NOT NULL COMMENT '价格',
  `status` int(9) NOT NULL COMMENT '订单状态0未支1支付，2已发货，3完成订单，9取消订单',
  `addressid` int(11) NOT NULL COMMENT '地址id',
  `g_id` int(11) NOT NULL COMMENT '商品id',
  `tuan_id` int(11) NOT NULL COMMENT '团id',
  `is_tuan` int(2) NOT NULL COMMENT '是否为团1为团0为单人',
  `createtime` varchar(45) NOT NULL COMMENT '订单生成时间',
  `pay_type` int(4) NOT NULL COMMENT '支付方式',
  `starttime` varchar(45) NOT NULL COMMENT '开始时间',
  `endtime` int(45) NOT NULL COMMENT '结束时间（小时）',
  `tuan_first` int(11) NOT NULL COMMENT '团长',
  `express` varchar(50) DEFAULT NULL COMMENT '快递公司名称',
  `expresssn` varchar(50) DEFAULT NULL COMMENT '快递单号',
  `transid` varchar(50) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `success` int(11) NOT NULL,
  `addname` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(300) NOT NULL,
  `goodsprice` varchar(45) NOT NULL,
  `freight` varchar(45) NOT NULL,
  `pay_price` varchar(45) NOT NULL,
  `credits` int(11) NOT NULL,
  `is_usecard` int(11) NOT NULL,
  `is_hexiao` int(2) NOT NULL,
  `hexiaoma` varchar(50) NOT NULL,
  `veropenid` varchar(200) NOT NULL,
  `sendtime` varchar(115) NOT NULL,
  `gettime` varchar(115) NOT NULL,
  `addresstype` int(11) NOT NULL,
  `optionid` int(11) NOT NULL,
  `checkpay` int(11) NOT NULL,
  `merchantid` int(11) NOT NULL,
  `optionname` varchar(100) NOT NULL,
  `issettlement` int(11) NOT NULL,
  `message` text NOT NULL COMMENT '代付留言',
  `ordertype` int(11) NOT NULL,
  `othername` varchar(100) NOT NULL,
  `successtime` varchar(100) NOT NULL,
  `adminremark` varchar(100) NOT NULL,
  `discount_fee` varchar(100) NOT NULL,
  `first_fee` varchar(100) NOT NULL,
  `couponid` int(11) NOT NULL,
  `bdeltime` int(11) NOT NULL,
  `helpbuy_opneid` varchar(100) DEFAULT NULL,
  `giftid` int(11) NOT NULL,
  `getcouponid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_order
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_order_goods`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_order_goods`;
CREATE TABLE `ims_tg_order_goods` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `fk_orderid` int(10) NOT NULL COMMENT '订单id',
  `fk_goodid` int(10) NOT NULL COMMENT '商品id',
  `uniacid` int(10) NOT NULL COMMENT '公众号id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_orderid` (`fk_orderid`),
  UNIQUE KEY `fk_goodid` (`fk_goodid`),
  UNIQUE KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_order_goods
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_order_print`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_order_print`;
CREATE TABLE `ims_tg_order_print` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `pid` int(3) NOT NULL,
  `oid` int(10) NOT NULL,
  `foid` varchar(50) NOT NULL,
  `status` int(3) NOT NULL,
  `addtime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_order_print
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_page`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_page`;
CREATE TABLE `ims_tg_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `params` longtext NOT NULL,
  `html` longtext NOT NULL,
  `click_pv` varchar(10) NOT NULL,
  `click_uv` varchar(10) NOT NULL,
  `enter_pv` varchar(10) NOT NULL,
  `enter_uv` varchar(10) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_page
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_print`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_print`;
CREATE TABLE `ims_tg_print` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `print_no` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `member_code` varchar(50) NOT NULL,
  `print_nums` int(3) NOT NULL,
  `qrcode_link` varchar(100) NOT NULL,
  `status` int(3) NOT NULL,
  `mode` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_print
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_puv`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_puv`;
CREATE TABLE `ims_tg_puv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` varchar(45) NOT NULL,
  `pv` varchar(20) DEFAULT NULL COMMENT '总浏览人次',
  `uv` varchar(50) NOT NULL COMMENT '总浏览人数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_puv
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_puv_record`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_puv_record`;
CREATE TABLE `ims_tg_puv_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` varchar(45) NOT NULL,
  `openid` varchar(145) NOT NULL,
  `goodsid` int(11) NOT NULL COMMENT '商品id',
  `createtime` varchar(120) DEFAULT NULL COMMENT '访问时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_puv_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_refund_record`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_refund_record`;
CREATE TABLE `ims_tg_refund_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transid` varchar(115) NOT NULL COMMENT '订单编号',
  `createtime` varchar(45) NOT NULL COMMENT '退款时间',
  `status` int(11) NOT NULL COMMENT '0未成功1成功',
  `type` int(11) NOT NULL COMMENT '1手机端2Web端3最后一人退款4部分退款',
  `goodsid` int(11) NOT NULL COMMENT '商品ID',
  `payfee` varchar(100) NOT NULL COMMENT '支付金额',
  `refundfee` varchar(100) NOT NULL COMMENT '退还金额',
  `refund_id` varchar(115) NOT NULL COMMENT '微信退款单号',
  `refundername` varchar(100) NOT NULL COMMENT '退款人姓名',
  `refundermobile` varchar(100) NOT NULL COMMENT '退款人电话',
  `goodsname` varchar(100) NOT NULL COMMENT '商品名称',
  `uniacid` int(11) NOT NULL,
  `orderid` varchar(45) NOT NULL,
  `merchantid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_refund_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_rules`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_rules`;
CREATE TABLE `ims_tg_rules` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `rulesname` varchar(40) NOT NULL COMMENT '规则名称',
  `rulesdetail` varchar(4000) DEFAULT NULL COMMENT '规则详情',
  `uniacid` int(10) NOT NULL COMMENT '公众号的id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `rulesname` (`rulesname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_rules
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_saler`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_saler`;
CREATE TABLE `ims_tg_saler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `storeid` varchar(225) DEFAULT '',
  `uniacid` int(11) DEFAULT '0',
  `openid` varchar(255) DEFAULT '',
  `nickname` varchar(145) NOT NULL,
  `avatar` varchar(225) NOT NULL,
  `status` tinyint(3) DEFAULT '0',
  `merchantid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_storeid` (`storeid`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_saler
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_scratch`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_scratch`;
CREATE TABLE `ims_tg_scratch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL COMMENT '活动名称',
  `starttime` varchar(32) DEFAULT NULL COMMENT '开始时间',
  `endtime` varchar(32) DEFAULT NULL COMMENT '结束时间',
  `detail` varchar(145) DEFAULT NULL COMMENT '说明',
  `use_credits` varchar(32) DEFAULT NULL COMMENT '需花费积分',
  `get_credits` varchar(32) DEFAULT NULL COMMENT '得到积分',
  `join_times` int(11) DEFAULT NULL COMMENT '参与次数',
  `winning_rate` varchar(32) DEFAULT NULL COMMENT '中奖率',
  `prize` varchar(1024) DEFAULT NULL COMMENT '奖品',
  `uniacid` int(11) DEFAULT NULL,
  `only_others` int(11) DEFAULT NULL COMMENT '1为只送积分给未中奖人',
  `status` int(11) DEFAULT NULL COMMENT '1开启',
  `alert_logo` varchar(145) DEFAULT NULL COMMENT '弹出的抽奖提示图',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ims_tg_scratch
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_scratch_record`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_scratch_record`;
CREATE TABLE `ims_tg_scratch_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `openid` varchar(145) NOT NULL COMMENT '参与人openid',
  `activity_id` int(11) NOT NULL COMMENT '活动id',
  `type` varchar(45) DEFAULT NULL COMMENT '活动类型',
  `status` int(11) DEFAULT NULL COMMENT '2待领取3已领取',
  `prize` varchar(445) DEFAULT NULL COMMENT '奖品详情',
  `createtime` varchar(145) DEFAULT NULL COMMENT '参与时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ims_tg_scratch_record
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_setting`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_setting`;
CREATE TABLE `ims_tg_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `key` varchar(200) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_setting
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_spec`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_spec`;
CREATE TABLE `ims_tg_spec` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `displaytype` tinyint(3) unsigned NOT NULL,
  `content` text NOT NULL,
  `goodsid` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  `merchantid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_spec
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_spec_item`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_spec_item`;
CREATE TABLE `ims_tg_spec_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `specid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `show` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_specid` (`specid`),
  KEY `indx_show` (`show`),
  KEY `indx_displayorder` (`displayorder`),
  KEY `indx_weid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_spec_item
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_store`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_store`;
CREATE TABLE `ims_tg_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT '0',
  `storename` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `tel` varchar(255) DEFAULT '',
  `lat` varchar(255) DEFAULT '',
  `lng` varchar(255) DEFAULT '',
  `status` tinyint(3) DEFAULT '0',
  `createtime` varchar(45) NOT NULL,
  `merchantid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_uniacid` (`uniacid`),
  KEY `idx_status` (`status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_store
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_user`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_user`;
CREATE TABLE `ims_tg_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_user
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_users`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_users`;
CREATE TABLE `ims_tg_users` (
  `id` int(10) NOT NULL COMMENT '主键',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `password` varchar(20) NOT NULL COMMENT '用户密码',
  `email` varchar(60) NOT NULL COMMENT '邮箱',
  `tel` varchar(20) NOT NULL COMMENT '电话',
  `uniacid` int(10) NOT NULL COMMENT '公众号id',
  `openid` varchar(100) NOT NULL COMMENT '用户openid',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `uniacid` (`uniacid`),
  UNIQUE KEY `openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_users
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_user_menu`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_user_menu`;
CREATE TABLE `ims_tg_user_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `level` tinyint(3) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `extend_title` varchar(50) NOT NULL,
  `extend_url` varchar(255) NOT NULL,
  `extend_icon` varchar(255) NOT NULL,
  `active_urls` text NOT NULL,
  `is_system` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_user_menu
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_user_node`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_user_node`;
CREATE TABLE `ims_tg_user_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `url` varchar(300) NOT NULL,
  `do` varchar(255) NOT NULL,
  `ac` varchar(32) DEFAULT NULL,
  `op` varchar(32) DEFAULT NULL,
  `ac_id` int(11) DEFAULT NULL,
  `do_id` int(6) unsigned NOT NULL,
  `remark` varchar(255) NOT NULL,
  `displayorder` tinyint(3) unsigned NOT NULL,
  `level` tinyint(3) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`do_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_user_node
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_tg_user_role`
-- ----------------------------
DROP TABLE IF EXISTS `ims_tg_user_role`;
CREATE TABLE `ims_tg_user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `merchantid` int(11) NOT NULL,
  `nodes` text NOT NULL,
  `uniacid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_tg_user_role
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_uni_account`
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_account`;
CREATE TABLE `ims_uni_account` (
  `uniacid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `default_acid` int(10) unsigned NOT NULL,
  `rank` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_account
-- ----------------------------
INSERT INTO `ims_uni_account` VALUES ('1', '0', '演示账号（可删除）', '微信让微信营销变的更简单!', '1', null);

-- ----------------------------
-- Table structure for `ims_uni_account_group`
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_account_group`;
CREATE TABLE `ims_uni_account_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `groupid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_account_group
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_uni_account_menus`
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_account_menus`;
CREATE TABLE `ims_uni_account_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `menuid` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `sex` tinyint(3) unsigned NOT NULL,
  `group_id` int(10) NOT NULL,
  `client_platform_type` tinyint(3) unsigned NOT NULL,
  `area` varchar(50) NOT NULL,
  `data` text NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `isdeleted` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `menuid` (`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_account_menus
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_uni_account_modules`
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_account_modules`;
CREATE TABLE `ims_uni_account_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `module` varchar(50) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL,
  `settings` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_module` (`module`),
  KEY `idx_uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_account_modules
-- ----------------------------
INSERT INTO `ims_uni_account_modules` VALUES ('1', '1', 'basic', '1', '');
INSERT INTO `ims_uni_account_modules` VALUES ('2', '1', 'news', '1', '');
INSERT INTO `ims_uni_account_modules` VALUES ('3', '1', 'music', '1', '');
INSERT INTO `ims_uni_account_modules` VALUES ('4', '1', 'userapi', '1', '');
INSERT INTO `ims_uni_account_modules` VALUES ('5', '1', 'recharge', '1', '');
INSERT INTO `ims_uni_account_modules` VALUES ('47', '1', 'ewei_shop_v1', '1', '');

-- ----------------------------
-- Table structure for `ims_uni_account_users`
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_account_users`;
CREATE TABLE `ims_uni_account_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `role` varchar(255) NOT NULL,
  `rank` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_memberid` (`uid`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_account_users
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_uni_group`
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_group`;
CREATE TABLE `ims_uni_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `modules` varchar(10000) NOT NULL,
  `templates` varchar(5000) NOT NULL,
  `uniacid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_group
-- ----------------------------
INSERT INTO `ims_uni_group` VALUES ('1', '体验套餐服务', 'N;', 'N;', '0');

-- ----------------------------
-- Table structure for `ims_uni_settings`
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_settings`;
CREATE TABLE `ims_uni_settings` (
  `uniacid` int(10) unsigned NOT NULL,
  `passport` varchar(200) NOT NULL,
  `oauth` varchar(100) NOT NULL,
  `jsauth_acid` int(10) unsigned NOT NULL,
  `uc` varchar(500) NOT NULL,
  `notify` varchar(2000) NOT NULL,
  `creditnames` varchar(500) NOT NULL,
  `creditbehaviors` varchar(500) NOT NULL,
  `welcome` varchar(60) NOT NULL,
  `default` varchar(60) NOT NULL,
  `default_message` varchar(2000) NOT NULL,
  `shortcuts` varchar(5000) NOT NULL,
  `payment` varchar(2000) NOT NULL,
  `stat` varchar(300) NOT NULL,
  `menuset` text NOT NULL,
  `default_site` int(10) unsigned DEFAULT NULL,
  `sync` varchar(100) NOT NULL,
  `recharge` varchar(500) NOT NULL,
  `tplnotice` varchar(1000) NOT NULL,
  `grouplevel` tinyint(3) unsigned NOT NULL,
  `mcplugin` varchar(500) NOT NULL,
  PRIMARY KEY (`uniacid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_settings
-- ----------------------------
INSERT INTO `ims_uni_settings` VALUES ('1', 'a:3:{s:8:\"focusreg\";i:0;s:4:\"item\";s:5:\"email\";s:4:\"type\";s:8:\"password\";}', 'a:2:{s:6:\"status\";s:1:\"0\";s:7:\"account\";s:1:\"0\";}', '0', 'a:1:{s:6:\"status\";i:0;}', 'a:1:{s:3:\"sms\";a:2:{s:7:\"balance\";i:0;s:9:\"signature\";s:0:\"\";}}', 'a:5:{s:7:\"credit1\";a:2:{s:5:\"title\";s:6:\"积分\";s:7:\"enabled\";i:1;}s:7:\"credit2\";a:2:{s:5:\"title\";s:6:\"余额\";s:7:\"enabled\";i:1;}s:7:\"credit3\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}s:7:\"credit4\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}s:7:\"credit5\";a:2:{s:5:\"title\";s:0:\"\";s:7:\"enabled\";i:0;}}', 'a:2:{s:8:\"activity\";s:7:\"credit1\";s:8:\"currency\";s:7:\"credit2\";}', '', '', '', '', 'a:4:{s:6:\"credit\";a:1:{s:6:\"switch\";b:0;}s:6:\"alipay\";a:4:{s:6:\"switch\";b:0;s:7:\"account\";s:0:\"\";s:7:\"partner\";s:0:\"\";s:6:\"secret\";s:0:\"\";}s:6:\"wechat\";a:5:{s:6:\"switch\";b:0;s:7:\"account\";b:0;s:7:\"signkey\";s:0:\"\";s:7:\"partner\";s:0:\"\";s:3:\"key\";s:0:\"\";}s:8:\"delivery\";a:1:{s:6:\"switch\";b:0;}}', '', '', '1', '', '', '', '0', '');

-- ----------------------------
-- Table structure for `ims_uni_verifycode`
-- ----------------------------
DROP TABLE IF EXISTS `ims_uni_verifycode`;
CREATE TABLE `ims_uni_verifycode` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `verifycode` varchar(6) NOT NULL,
  `total` tinyint(3) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_uni_verifycode
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_userapi_cache`
-- ----------------------------
DROP TABLE IF EXISTS `ims_userapi_cache`;
CREATE TABLE `ims_userapi_cache` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(32) NOT NULL,
  `content` text NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_userapi_cache
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_userapi_reply`
-- ----------------------------
DROP TABLE IF EXISTS `ims_userapi_reply`;
CREATE TABLE `ims_userapi_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `description` varchar(300) NOT NULL,
  `apiurl` varchar(300) NOT NULL,
  `token` varchar(32) NOT NULL,
  `default_text` varchar(100) NOT NULL,
  `cachetime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_userapi_reply
-- ----------------------------
INSERT INTO `ims_userapi_reply` VALUES ('1', '1', '\"城市名+天气\", 如: \"北京天气\"', 'weather.php', '', '', '0');
INSERT INTO `ims_userapi_reply` VALUES ('2', '2', '\"百科+查询内容\" 或 \"定义+查询内容\", 如: \"百科姚明\", \"定义自行车\"', 'baike.php', '', '', '0');
INSERT INTO `ims_userapi_reply` VALUES ('3', '3', '\"@查询内容(中文或英文)\"', 'translate.php', '', '', '0');
INSERT INTO `ims_userapi_reply` VALUES ('4', '4', '\"日历\", \"万年历\", \"黄历\"或\"几号\"', 'calendar.php', '', '', '0');
INSERT INTO `ims_userapi_reply` VALUES ('5', '5', '\"新闻\"', 'news.php', '', '', '0');
INSERT INTO `ims_userapi_reply` VALUES ('6', '6', '\"快递+单号\", 如: \"申通1200041125\"', 'express.php', '', '', '0');

-- ----------------------------
-- Table structure for `ims_users`
-- ----------------------------
DROP TABLE IF EXISTS `ims_users`;
CREATE TABLE `ims_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupid` int(10) unsigned NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL,
  `joindate` int(10) unsigned NOT NULL,
  `joinip` varchar(15) NOT NULL,
  `lastvisit` int(10) unsigned NOT NULL,
  `lastip` varchar(15) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_users_failed_login`
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_failed_login`;
CREATE TABLE `ims_users_failed_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `username` varchar(32) NOT NULL,
  `count` tinyint(1) unsigned NOT NULL,
  `lastupdate` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip_username` (`ip`,`username`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_failed_login
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_users_group`
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_group`;
CREATE TABLE `ims_users_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `package` varchar(5000) NOT NULL,
  `maxaccount` int(10) unsigned NOT NULL,
  `maxsubaccount` int(10) unsigned NOT NULL,
  `timelimit` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_group
-- ----------------------------
INSERT INTO `ims_users_group` VALUES ('1', '体验用户组', 'a:1:{i:0;i:1;}', '1', '1', '0');
INSERT INTO `ims_users_group` VALUES ('2', '白金用户组', 'a:1:{i:0;i:1;}', '2', '2', '0');
INSERT INTO `ims_users_group` VALUES ('3', '黄金用户组', 'a:1:{i:0;i:1;}', '3', '3', '0');

-- ----------------------------
-- Table structure for `ims_users_invitation`
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_invitation`;
CREATE TABLE `ims_users_invitation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `fromuid` int(10) unsigned NOT NULL,
  `inviteuid` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_invitation
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_users_permission`
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_permission`;
CREATE TABLE `ims_users_permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `type` varchar(30) NOT NULL,
  `permission` varchar(10000) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_permission
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_users_profile`
-- ----------------------------
DROP TABLE IF EXISTS `ims_users_profile`;
CREATE TABLE `ims_users_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  `realname` varchar(10) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `fakeid` varchar(30) NOT NULL,
  `vip` tinyint(3) unsigned NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthyear` smallint(6) unsigned NOT NULL,
  `birthmonth` tinyint(3) unsigned NOT NULL,
  `birthday` tinyint(3) unsigned NOT NULL,
  `constellation` varchar(10) NOT NULL,
  `zodiac` varchar(5) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `idcard` varchar(30) NOT NULL,
  `studentid` varchar(50) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `resideprovince` varchar(30) NOT NULL,
  `residecity` varchar(30) NOT NULL,
  `residedist` varchar(30) NOT NULL,
  `graduateschool` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `education` varchar(10) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `position` varchar(30) NOT NULL,
  `revenue` varchar(10) NOT NULL,
  `affectivestatus` varchar(30) NOT NULL,
  `lookingfor` varchar(255) NOT NULL,
  `bloodtype` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `weight` varchar(5) NOT NULL,
  `alipay` varchar(30) NOT NULL,
  `msn` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `taobao` varchar(30) NOT NULL,
  `site` varchar(30) NOT NULL,
  `bio` text NOT NULL,
  `interest` text NOT NULL,
  `workerid` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_users_profile
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_video_reply`
-- ----------------------------
DROP TABLE IF EXISTS `ims_video_reply`;
CREATE TABLE `ims_video_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `mediaid` varchar(255) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_video_reply
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_voice_reply`
-- ----------------------------
DROP TABLE IF EXISTS `ims_voice_reply`;
CREATE TABLE `ims_voice_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `mediaid` varchar(255) NOT NULL,
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_voice_reply
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_wechat_attachment`
-- ----------------------------
DROP TABLE IF EXISTS `ims_wechat_attachment`;
CREATE TABLE `ims_wechat_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `acid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `media_id` varchar(255) NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  `model` varchar(25) NOT NULL,
  `tag` varchar(5000) NOT NULL,
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `media_id` (`media_id`),
  KEY `acid` (`acid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_wechat_attachment
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_wechat_news`
-- ----------------------------
DROP TABLE IF EXISTS `ims_wechat_news`;
CREATE TABLE `ims_wechat_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned DEFAULT NULL,
  `attach_id` int(10) unsigned NOT NULL,
  `thumb_media_id` varchar(60) NOT NULL,
  `thumb_url` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `digest` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_source_url` varchar(200) NOT NULL,
  `show_cover_pic` tinyint(3) unsigned NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`),
  KEY `attach_id` (`attach_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_wechat_news
-- ----------------------------

-- ----------------------------
-- Table structure for `ims_wxcard_reply`
-- ----------------------------
DROP TABLE IF EXISTS `ims_wxcard_reply`;
CREATE TABLE `ims_wxcard_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(10) unsigned NOT NULL,
  `title` varchar(30) NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `brand_name` varchar(30) NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `success` varchar(255) NOT NULL,
  `error` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ims_wxcard_reply
-- ----------------------------

";
$dat = array();
$dat['datas'] = $datas;
return $dat;