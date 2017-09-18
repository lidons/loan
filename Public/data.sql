CREATE database loan;
use loan;
/*管理员表*/

use loan;
DROP TABLE IF EXISTS `dk_admin`;
CREATE TABLE `dk_admin` (
  `id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(40) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
insert into dk_admin values (1,'hanmeimei','dbadfaf0bb3e2759916ee14afc43d58f','1531630636@qq.com');

/*用户表*/
use loan;
DROP TABLE IF EXISTS `dk_user`;
CREATE TABLE `dk_user`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`wxuser` varchar(50) NOT NULL DEFAULT '' ,
	`wxnickname` varchar(50)   ,
	`upuser` varchar(50) NOT NULL  ,
	`heightuser` varchar(100) NOT NULL  ,
	`headimgurl` varchar(255) NOT NULL  ,
	`username` varchar(20) NOT NULL DEFAULT '' ,
	`phone`  varchar(15) NOT NULL DEFAULT '' ,
	`status` int(5) unsigned NOT NULL DEFAULT '0',
	`money` FLOAT(4,2) NOT NULL DEFAULT '0' ,
	`up_money` FLOAT(4,2) NOT NULL DEFAULT '0' ,
	`state` int(2) NOT NULL  DEFAULT '1' ,
    `create_time` INT(10) unsigned NOT NULL DEFAULT '0',
	 PRIMARY KEY (`id`),
	 KEY `wxuser`(`wxuser`,`upuser`,`heightuser`),
	 KEY `upuser`(`wxuser`,`upuser`,`heightuser`),
	 KEY `heightuser`(`wxuser`,`upuser`,`heightuser`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*利息表*/
use loan;
DROP TABLE IF EXISTS `dk_money`;
CREATE TABLE `dk_money`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`show_money` FLOAT(4,4) NOT NULL DEFAULT '0' comment '佣金',
	 PRIMARY KEY (`id`),
	 KEY `show_money`(`show_money`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `dk_money` VALUES (1,0.0500),(2,0.0200);

/*文章表*/
use loan;
DROP TABLE IF EXISTS `dk_menu`;
CREATE TABLE `dk_menu`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`title` varchar(255) NOT NULL DEFAULT '' comment '文章标题',
	`small_title` varchar(255) NOT NULL DEFAULT '' comment '文章简要',
	`picture` varchar(100) NOT NULL DEFAULT '' comment '文章封面',
	`description` text NOT NULL DEFAULT '',
	`rank` int(5) unsigned NOT NULL DEFAULT '1' comment '文章权限',
	`createtime` varchar(50) NOT NULL  comment '创建时间',
	PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*佣金*/
use loan;
DROP TABLE IF EXISTS `dk_commision`;
CREATE TABLE `dk_commision`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`source` varchar(255) NOT NULL DEFAULT '' comment '佣金来源',
	`status` int(5) unsigned NOT NULL DEFAULT '0' comment '发放情况',
	`createtime` varchar(50) NOT NULL  comment '创建时间',
	PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*会员价格*/
use loan;
DROP TABLE IF EXISTS `dk_member`;
CREATE TABLE `dk_member`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`member` varchar(50) NOT NULL DEFAULT '' comment '会员',
	`member_moeny` int(10) unsigned NOT NULL DEFAULT '0' comment '会员价钱',
	`createtime` varchar(50) NOT NULL  comment '创建时间',
	PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO dk_member(`member`,`member_moeny`) VALUES ('初级会员',69),('中级会员',199),('高级会员',399),('服务商',599),('金牌服务商',799),('合伙人',999);



/*返佣*/
use loan;
DROP TABLE IF EXISTS `dk_getshow`;
CREATE TABLE `dk_getshow`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`title` varchar(50) NOT NULL DEFAULT '' ,
	`small_title` varchar(50) NOT NULL DEFAULT '' ,
	`member_moeny`  FLOAT(4,2) unsigned NOT NULL DEFAULT '0' comment '会员价钱',
	`selled` int(10) unsigned NOT NULL DEFAULT '0' comment '',
	`money`  FLOAT(4,2) unsigned NOT NULL DEFAULT '0' comment '会员价钱',
	`state` int(2) NOT NULL  DEFAULT '0' comment '状态',
	`status` int(2) NOT NULL  DEFAULT '0' comment '状态',
	PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*最新口子*/
use loan;
DROP TABLE IF EXISTS `dk_newest`;
CREATE TABLE `dk_newest`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`title` varchar(20) NOT NULL DEFAULT '',
	`url` varchar(100) NOT NULL DEFAULT '' ,
	`picture` varchar(50) NOT NULL DEFAULT '',
	`input_picture` varchar(50) NOT NULL DEFAULT '', 
	`status` int(2) NOT NULL  DEFAULT '0' ,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*获取申请贷款的信息*/
use loan;
DROP TABLE IF EXISTS `dk_apply`;
CREATE TABLE `dk_apply`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`title` varchar(20) NOT NULL DEFAULT '',
	`username` varchar(100) NOT NULL DEFAULT ''  ,
	`phone` varchar(50) NOT NULL DEFAULT '',
	`status` int(2) NOT NULL  DEFAULT '0' ,
	`createtime` varchar(50) ,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*快速办卡*/
use loan;
DROP TABLE IF EXISTS `dk_card`;
CREATE TABLE `dk_card`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`title` varchar(20) NOT NULL DEFAULT '',
	`url` varchar(100) NOT NULL DEFAULT '' ,
	`card_url` varchar(100) NOT NULL DEFAULT '' ,
	`picture` varchar(50) NOT NULL DEFAULT '',
	`status` int(2) NOT NULL  DEFAULT '0' ,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*代理网贷*/
use loan;
DROP TABLE IF EXISTS `dk_upmany`;
CREATE TABLE `dk_upmany`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`title` varchar(20) NOT NULL DEFAULT '',
	`picture` varchar(50) NOT NULL DEFAULT '',
	`jump_picture` varchar(50) NOT NULL DEFAULT '', 
	`status` int(2) NOT NULL  DEFAULT '0',
	PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


/*养卡攻略*/
use loan;
DROP TABLE IF EXISTS `dk_keepcard`;
CREATE TABLE `dk_keepcard`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`nice` varchar(20) NOT NULL DEFAULT '' ,
	`icon` varchar(50) NOT NULL DEFAULT '',
	`title` varchar(50) NOT NULL DEFAULT '', 
	`author` varchar(20) NOT NULL DEFAULT '',
	`menu` text NOT NULL DEFAULT '' comment '文章描述',
	`createtime` varchar(50) NOT NULL  comment '创建时间',
	 PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*轮播图*/
use loan;
DROP TABLE IF EXISTS `dk_picture`;
CREATE TABLE `dk_picture`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`img_desc` varchar(20) NOT NULL DEFAULT '' ,
	`img` varchar(50) NOT NULL DEFAULT '',
	`sort` int(10) NOT NULL DEFAULT '0', 
	`createtime` varchar(50) NOT NULL  comment '创建时间',
	 PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


/*图片*/
use loan;
DROP TABLE IF EXISTS `dk_img`;
CREATE TABLE `dk_img`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`img` varchar(50) NOT NULL DEFAULT '',
    `status` int(5) unsigned NOT NULL DEFAULT '0',
	`createtime` varchar(50) NOT NULL  comment '创建时间',
	 PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

/*微信基本配置*/
use loan;
DROP TABLE IF EXISTS `dk_wechat`;
CREATE TABLE `dk_wechat`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`token` varchar(255) NOT NULL DEFAULT '',
    `encodingaeskey` varchar(255) NOT NULL DEFAULT '',
    `appid` varchar(255) NOT NULL DEFAULT '',
    `appsecret` varchar(255) NOT NULL DEFAULT '',
    `partnerid` varchar(255) NOT NULL DEFAULT '',
    `partnerkey`  varchar(255) NOT NULL DEFAULT '',
	`createtime` varchar(50) NOT NULL  comment '创建时间',
	 PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
INSERT INTO `dk_wechat` VALUES (1,'2','4','2','4','4','4','');

/*微信菜单*/
use loan;
DROP TABLE IF EXISTS `dk_wxmenu`;
CREATE TABLE `dk_wxmenu`(
	`id` mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(50) NOT NULL DEFAULT '',
	`wx_type` varchar(20) NOT NULL DEFAULT '',
	`menu_change` varchar(100) NOT NULL DEFAULT '',
	`status` int(5) NOT NULL DEFAULT '0',
     PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;




