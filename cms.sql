/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : cms

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2014-11-20 00:09:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cms_info
-- ----------------------------
DROP TABLE IF EXISTS `cms_info`;
CREATE TABLE `cms_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `m_class_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `content` text,
  `intime` int(10) DEFAULT NULL,
  `uptime` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_info
-- ----------------------------
INSERT INTO `cms_info` VALUES ('7', '8', '宇宙中最强大的开发环境免费了！', '<p>\r\n	今日在Connect大会上，微软将原来499美金（2000多人民币）的Visual Studio彻底免费化了。微软今天发布的<a href=\"http://blogs.msdn.com/b/onecode/archive/2014/11/12/free-visual-studio-community-edition-released-today.aspx\" target=\"_blank\">Visual Studio免费社区版</a>和原499美金的Visual Studio专业版所提供的功能几乎没有任何区别。这对广大开发人员绝对是个福音。如果你还在使用Visual Studio Express版本，是时候卸载Express，安装Visual Studio社区版了。\r\n</p>\r\n<p>\r\n	<a href=\"http://blogs.msdn.com/b/onecode/archive/2014/11/12/free-visual-studio-community-edition-released-today.aspx\">http://blogs.msdn.com/b/onecode/archive/2014/11/12/free-visual-studio-community-edition-released-today.aspx</a>\r\n</p>\r\n<p>\r\n	有了它，你还可以免费下载和使用5000多个Visual Studio插件。其中包括 <a href=\"https://visualstudiogallery.msdn.microsoft.com/a1166718-a2d9-4a48-a5fd-504ff4ad1b65\" target=\"_blank\">示例代码浏览器</a>，<a href=\"https://visualstudiogallery.msdn.microsoft.com/20b80b8c-659b-45ef-96c1-437828fe7cf2?SRC=Home\" target=\"_blank\">Unity插件</a>，等等。\r\n</p>\r\n<br />', '1415889469', '1415892183');
INSERT INTO `cms_info` VALUES ('10', '12', '最近有点不长进！', '最近有点不长进，也没特别的技术，无目标！', '1416404261', '1416404261');
INSERT INTO `cms_info` VALUES ('11', '13', '聊天的最佳结束时机是聊到很high的时候果断结束。', '<span><span><span><span><span><span>聊天的最佳结束时机是聊到很high的时候果断结束，这样给她一种意犹未尽的感觉，很期待下次与你交谈，而且下次开始继续你这次的话题就行。如果聊到了无话可说的时候才结束，给她的印象是你们共同话题很少，而且下次开始的时候你又要头疼该聊些什么话题了。</span></span></span></span></span></span>', '1416406340', '1416408137');
INSERT INTO `cms_info` VALUES ('12', '13', '聊天的时候无意间透露有女生找你', '<span><span><span>有没发现身边有女孩围着的男生比总是孤单一人的男生更有魅力？而且女孩更容易被他们所吸引，这就是所谓的预选。虽然这个有点难于解释，但是女生是不讲逻辑的，我们也没有必要去解释，或许她们认为很多女生喜欢的男人有领袖气质，或者干脆就是必有过人之处吧。</span></span></span>\r\n<div align=\"left\">\r\n	<span><span><span>所\r\n以我们要利用好这个心理，在你与MM聊天的时候，可以适当时机说：等我一下哈，我接个电话，待会聊哈。这样做可以表明你对她的需求感不强，她不是你的全\r\n部，只是生活的一部分，而且有人比她对你更重要。等你接着和她聊的时候她就很八卦了，但是告诉她，刚才接的一个异性好朋友的电话而已。这样无意间透露了你\r\n很受异性的欢迎，这样前面讲的那个心理就会启动作用了，而且她也会觉得别的女生都可以找你，她找你也没什么。由于我是有固定长期女朋友的，所以很多时候我\r\n在和其它MM聊天的时候，女朋友打过电话来，当然先接女朋友电话啦，无形中我就利用了这个效应。当然如果你没人给你打电话的话，可以自己在适当的时机编一\r\n个。<br />\r\n这个不要经常用，偶尔用2，3次就好，之前我遇到一MM聊得很好，用了冷读，也建立起了自己的框架，所以之后和她聊天，我一有其它事就先丢下她，先忙其它的，她说了一句：我只是你的消遣吗？所以不建议经常用，这里没有炫耀的意思，只是举个事例说明经常用后果很严重。</span></span></span>\r\n</div>', '1416408697', '1416408697');
INSERT INTO `cms_info` VALUES ('13', '13', '聊天过程中留下悬念', '<span><span><span>在一次聊天过程中，你们会问很多问题，而一个好的问题或者MM感兴趣的问题，你可以告诉她，下次告诉你吧，或者欲知详情如何，请听下回分解。<br />\r\n或者在打算结束交谈的时候，可以来一个脑筋急转弯，然后让她去想，一定不要太简单的哦，下次她一定会主动找你询问了。<br />\r\n如果和你聊天很开心，你也很幽默的话，其实MM会很想找你聊天的，但是女生固有的矜持又阻止了她这种行为的发生，那么她就需要一个理由或者借口去说服自己，然后放下矜持，主动找你，而你留下的悬念就是给她找好了这样一个理由。</span></span></span>', '1416408896', '1416408896');
INSERT INTO `cms_info` VALUES ('14', '13', '聊天要能引起对方的情绪波动', '<span><span><span></span></span></span><span><span><span>为什么要使用打压，有人会说打压，降低对方的价值，增加自己的价值，建立自己的强框架，这没有错，但是打压会引起的情绪是：生气，失落，自卑。<br />\r\n为什么聊天要使用幽默，这里也包括讲笑话，有人会说幽默，可以吸引对方，让她感觉自己是有趣的，而且营造一种轻松快乐的氛围，也很好，但幽默引起的情绪是：开心，欢乐，高兴。<br />\r\n为什么要讲故事，有人会说讲故事，可以引入很多话题，不会那么无聊，而且展示DHV，还有女人天生八卦，喜欢听故事，和孩子一样。非常对，但讲故事引起的情绪是：好奇，感动，快乐，不同的故事有着不同的感受。<br />\r\n总 结一下，聊天的时候使用的这些技巧，无非就是为了引起对方的情绪波动，有喜，有怒，有哀，有乐，最明显的控制情绪的方法就是推拉。所以在一次成功的聊天过 程中，一定要注意引起对方情绪的波动，如果有了情绪的波动，聊天就不会无聊，和你聊天就不是打发时间，更像是一种生活的体验。控制住了对方的情绪，离控制 她的心，控制她身体不远了。</span></span></span>', '1416409037', '1416409037');

-- ----------------------------
-- Table structure for cms_info_class
-- ----------------------------
DROP TABLE IF EXISTS `cms_info_class`;
CREATE TABLE `cms_info_class` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `pid` int(10) unsigned DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `view` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_info_class
-- ----------------------------
INSERT INTO `cms_info_class` VALUES ('1', '技术论坛', '9', '1', 'infoclass/list');
INSERT INTO `cms_info_class` VALUES ('2', 'PHP', '1', '1', 'info/list');
INSERT INTO `cms_info_class` VALUES ('3', 'YII', '1', '1', 'info/list');
INSERT INTO `cms_info_class` VALUES ('4', 'JAVASCRIPT', '1', '2', 'info/list');
INSERT INTO `cms_info_class` VALUES ('5', 'HTML/CSS', '1', '1', 'info/list');
INSERT INTO `cms_info_class` VALUES ('6', 'ANDORID', '1', '2', 'info/list');
INSERT INTO `cms_info_class` VALUES ('7', 'IOS', '1', '1', 'info/list');
INSERT INTO `cms_info_class` VALUES ('8', '新闻', '9', '1', 'infoclass/list');
INSERT INTO `cms_info_class` VALUES ('9', '栏目列表', '0', '1', 'infoclass/list');
INSERT INTO `cms_info_class` VALUES ('10', '女人', '0', '1', 'infoclass/list');
INSERT INTO `cms_info_class` VALUES ('11', '大杂烩', '10', '1', 'info/list');
INSERT INTO `cms_info_class` VALUES ('12', '感想', '1', '1', 'info/list');
INSERT INTO `cms_info_class` VALUES ('13', '聊天', '10', '1', 'info/list');
INSERT INTO `cms_info_class` VALUES ('14', 'JQUERY', '1', '1', 'info/list');

-- ----------------------------
-- Table structure for cms_search
-- ----------------------------
DROP TABLE IF EXISTS `cms_search`;
CREATE TABLE `cms_search` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_search
-- ----------------------------
INSERT INTO `cms_search` VALUES ('1', '首页', null, null, 'home');

-- ----------------------------
-- Table structure for cms_search_key
-- ----------------------------
DROP TABLE IF EXISTS `cms_search_key`;
CREATE TABLE `cms_search_key` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `m_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_search_key
-- ----------------------------
