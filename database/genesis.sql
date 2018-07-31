-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 �?07 �?17 �?08:41
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `genesis`
--

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `nick_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `account_num` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cellphone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '普通管理员',
  `is_stop` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '已启用',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_account_num_unique` (`account_num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=74 ;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`id`, `name`, `nick_name`, `account_num`, `password`, `cellphone`, `role`, `type`, `is_stop`, `last_login`, `created_at`, `updated_at`) VALUES
(61, '书单来了', '昵称七个字', 'xiaohong', 'eyJpdiI6ImQ2ZG1FRnFXN1JBNWNFWnQ1bEJkTEE9PSIsInZhbHVlIjoiOE9MZzRoZkc5OWNWTFNCR1B0M1FNcTBIMmNVbzBYOUxKak9cL2IzR0U0MlE9IiwibWFjIjoiN2QxZjQyZTIwNzI0MGViOTE3YmYyM2FmZWNkYTIzYWZlMzhkYWNlMmNlMzkwMWY3ZWI3N2YwZjgxNzA1ZTdmYyJ9', '', '用户查看|公告查看|文章查看|评论查看', '普通管理员', '已启用', '2018-07-11 11:07:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, '普通第一个', '昵称七个字', 'xiaohong45345', 'eyJpdiI6Im9nbFZEWTlZYTZib1FoZmZIUHdvbXc9PSIsInZhbHVlIjoibWpHZTVmN2E2ZEZlcEdnQjl6Y3F5amZTa0RwWUJ0a2xiZU5GOGEwTSt4cz0iLCJtYWMiOiJjOTIwZDk0NWQxMDUxNTJhZDcxOTdjZWU0YTQ4NDgzZGJjZGI1Y2NhYzEzZmQ3YWZlOTVmZWRhZjU0ODYzODA4In0=', '', '用户查看|公告查看|文章查看|评论查看', '普通管理员', '已启用', '2018-07-11 12:07:35', '0000-00-00 00:00:00', '2018-07-17 08:33:14'),
(64, '第三个', '昵称七个字', 'disange', 'eyJpdiI6Ilg1eHB6b1AycnFHS3FsS1NKMCtMMWc9PSIsInZhbHVlIjoiWk9reUlTd1FJOW5RdXc4bGlLanZSQnR6VjN1VlVLRjhsc3kzU0M5MTA0cz0iLCJtYWMiOiJjNDllMzEyYzcxYWMwYzVjMmY3YWY1OWZkMTRlYmJjZDZmOTVlNWIyNWVmZDYxNjVlZGY4ZjI0Y2NmNWU1MTcyIn0=', '', '文章查看|文章删除|用户查看|用户删除|公告查看|公告添加|公告修改|公告删除|管理员添加|管理员修改|管理员删除|管理员查看|评论查看|评论删除', '超级管理员', '已启用', '2018-07-11 05:07:41', '0000-00-00 00:00:00', '2018-07-11 17:41:39'),
(63, '第二个', '昵称七个字', 'dierge', 'eyJpdiI6Inc4RStQQlYxaVp3bjZBekxwcXJUclE9PSIsInZhbHVlIjoicWg0SjZubEE2dDJMVjlibElRZDY5aFV5c2laTzJPeDVnMGRcL3dQN1pmSEU9IiwibWFjIjoiMTE1M2YzNzBiYTY1ODc0NDViZTVlYjdlYmIzYTRjODJkYWUxMmZiYmI3ZmYwYzFhNmJlZjRlOGQ5NzFiYWQ2NCJ9', '', '文章查看|文章删除|用户查看|用户删除|公告查看|公告添加|公告修改|公告删除|管理员添加|管理员修改|管理员删除|管理员查看|评论查看|评论删除', '超级管理员', '已启用', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, '第四个', '昵称七个字', 'disige', 'eyJpdiI6IkN0VFwvTEI5ZGZUOU9WVXRjc1lBVlN3PT0iLCJ2YWx1ZSI6IlpoN1VDRWJNNzl6YVFuTCtSNVFPYUg1ZlNyaXpyc3lBc1hOU1M3M2g4ZE09IiwibWFjIjoiOTUyNGNlYzZjNDVkNGUwZDI1ZGNkNDA5ZGU5OTgwNDdlZjA1Y2NmODYzMWY1YjUwZTQzMmI5NzU4NDIyMWFhMyJ9', '', '文章查看|文章删除|用户查看|用户删除|公告查看|公告添加|公告修改|公告删除|管理员添加|管理员修改|管理员删除|管理员查看|评论查看|评论删除', '超级管理员', '已启用', NULL, '2018-07-11 04:43:39', '2018-07-11 04:43:39'),
(66, '小军', '昵称七个字', 'xiaojun', 'eyJpdiI6InM0QkdwYXNJaTM5ZXR6QXBha05qMlE9PSIsInZhbHVlIjoiTTI0bGtIWG1pYlRTdkMxRFJkYjNNQ2FMU2V4RnozXC9pTVZ0MVlsXC9XMDFZPSIsIm1hYyI6IjdjYzA1N2E3NWRiYmFiZmJjZjY5YTM0MWNmOTMwYzkyNmMzYTc1ZjExNWM5ODBkZWNiMGYzNDIwNGZkNThlYzEifQ==', '', '用户查看|用户删除|公告查看|公告添加|文章查看|文章删除', '普通管理员', '已启用', NULL, '2018-07-11 06:11:29', '2018-07-17 08:34:38'),
(69, '测试', '昵称七个字', 'testtest', 'eyJpdiI6IklTNEZYZFc5eHNORm1GRWhtZ1NcL0h3PT0iLCJ2YWx1ZSI6IkptZnlcL0p0QnQ3a25OMlNGSnQyUjBhdU9cL0Y2Z0VhTEUxZkU1NlwvRzZ1b3M9IiwibWFjIjoiZjdjYjE5ZmJmNWYwYjUyNTZiM2MxMWZmMmRmYzdlZGE1ODkxMjVkOTY1NGJmNDc5NDU1ODg1NzQ1N2FjZDRhZCJ9', '', '', '普通管理员', '已启用', '2018-07-12 09:07:15', '2018-07-11 14:23:41', '2018-07-12 09:15:52'),
(71, '唯一超级', '昵称七个字', 'superadmin', 'eyJpdiI6IkRTTzZSTThnKzVBeDJaNW03YWpVN3c9PSIsInZhbHVlIjoiQkJFS041SFFNWnhHVmg4WGVzV3VnT3B4TDBXbFwvN2QrXC9NVkp0dGdRb253PSIsIm1hYyI6IjkwZTgxOGM1ZmZlNGRkZTI3NTA1ODM0ZTQ4MDcwOGM0NzY4YmFiN2ZlYWNiMDdiMDlmOWU4ZWQ4NzZkNWUyZjgifQ==', '', '文章查看|文章删除|文章下架|用户查看|用户添加|用户删除|公告查看|公告添加|公告修改|公告删除|管理员添加|管理员修改|管理员删除|管理员查看|评论查看|评论删除|部门编辑|部门删除|部门查看', '超级管理员', '已启用', '2018-07-17 04:07:34', '2018-07-11 17:47:15', '2018-07-17 16:34:17'),
(72, '黎明', '', 'ptadmin', 'eyJpdiI6Ild4cFVMXC9nenJBSFFtOHBGTXp4eG93PT0iLCJ2YWx1ZSI6InJJcUdRbEczMEVLdmJpaGhaYzhGYW1hbVo4WEFWdW1uSTdOUjdSTTJnMkU9IiwibWFjIjoiYjE2N2EwMGM4ZWJmNzRkZGRhMGIxYWJjYjViMjY3MzRmMjE3ZjlhMzBhODYxOTBhOWU1OTA2MjljYTNiNGRiNyJ9', '', '用户查看|公告查看|文章查看|评论查看|部门查看', '普通管理员', '已启用', NULL, '2018-07-17 16:27:10', '2018-07-17 16:27:10'),
(73, '李中', '', 'ptadmin1', 'eyJpdiI6IlQybDhzdHpKem1PbjRkRzc4clBwMUE9PSIsInZhbHVlIjoiYmxcL09FUVI0RW1oMlRER3hkZHdWdVkyOXh2XC8xQk9OSG1RT3hKV3hVUzl3PSIsIm1hYyI6ImRkMDY0ZTk0NjEzZDQwOWU1NGFmZGIwMDljNDJlMWE4NjE5Nzc3YmY4MDM5ZGFhN2I3NjBjY2YwYzE1YTZhMmYifQ==', '', '用户查看|公告查看|文章查看|评论查看', '普通管理员', '已启用', '2018-07-17 04:07:33', '2018-07-17 16:28:22', '2018-07-17 16:33:55');

-- --------------------------------------------------------

--
-- 表的结构 `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `imgurl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `click` int(11) NOT NULL DEFAULT '0',
  `plnum` int(11) NOT NULL DEFAULT '0',
  `like` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_stop` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '已启用',
  `created_at` datetime NOT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- 转存表中的数据 `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `imgurl`, `user_id`, `click`, `plnum`, `like`, `type`, `is_stop`, `created_at`, `updated_at`) VALUES
(30, 'erwer', '<p>rwrwrew&nbsp;</p><p><img src="/ueditor/php/upload/image/20180709/1531107772410437.jpg" title="1531107772410437.jpg" alt="1122952604_15283583863141n.jpg"/></p>', 'upload/article-img/1531107774.jpg', 9, 0, 0, 0, '通知', '已启用', '0000-00-00 00:00:00', '2018-07-09 03:42:54'),
(6, 'sdfsfghfg', '<p>sdfsdfsdfsdfsfsdfsf<img src="/ueditor/php/upload/image/20180707/1530947179663119.jpeg" title="1530947179663119.jpeg" alt="0Io1gBaOzH.jpeg"/></p>', '', 9, 0, 0, 0, '通知', '已禁用', '2018-07-04 08:59:11', '2018-07-12 06:28:25'),
(7, 'sfdf', '<p>sfsf</p>', '9', 9, 0, 0, 0, '通知', '已启用', '2018-07-05 09:16:33', ''),
(8, 'dfsdf', '<p>sdfdsf</p>', '9', 9, 0, 0, 0, '通知', '已启用', '2018-07-04 10:21:02', ''),
(10, 'dsfsdf', '<p>dsfdsfds</p>', '9', 9, 0, 0, 0, '通知', '已启用', '2018-07-04 10:23:47', ''),
(11, '666666666666666666666', '<p>666666666666666666666</p>', '9', 9, 0, 0, 0, '通知', '已启用', '2018-07-04 10:24:20', ''),
(13, 'dsfsdf', '<p>sfsdfsdf</p>', 'upload/article-img/0Io1gBaOzH.jpeg', 9, 0, 0, 0, '通知', '已启用', '2018-07-04 10:27:24', ''),
(14, 'yyyddyyyyy', '<p>yyyssssdfsdfyyyyyyyyyyyy</p>', 'upload/article-img/1530954059.jpg', 9, 0, 0, 0, '动态', '已禁用', '2018-07-04 10:28:23', '2018-07-12 06:29:25'),
(15, '啦啦啦啦啦啦', '<p>啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦</p><p><img src="/ueditor/php/upload/image/20180705/1530756070762135.jpg" title="1530756070762135.jpg" alt="1122952604_15283583863141n.jpg"/></p>', 'upload/article-img/1530953844.jpg', 9, 0, 0, 0, '通知', '已启用', '2018-07-05 02:01:13', '2018-07-07 08:57:24'),
(29, '33333', '<p><strong>而发热污染</strong></p><p><br/></p><p><img src="/ueditor/php/upload/image/20180709/1531103381712907.jpg" title="1531103381712907.jpg" alt="u=2901909704,2236555082&amp;fm=173&amp;app=25&amp;f=JPEG.jpg"/></p>', 'upload/article-img/1531103388.jpg', 9, 0, 0, 0, '通知', '已启用', '0000-00-00 00:00:00', '2018-07-09 02:29:48'),
(33, 'erwr', '<p>rwrwrwr</p>', '', 9, 0, 0, 0, '通知', '已禁用', '0000-00-00 00:00:00', '2018-07-12 06:29:28'),
(40, '文章二', '<p>rwrwrew&nbsp;</p><p><img src="/ueditor/php/upload/image/20180709/1531107772410437.jpg" title="1531107772410437.jpg" alt="1122952604_15283583863141n.jpg"/></p>', 'upload/article-img/0Io1gBaOzH.jpeg', 1, 0, 0, 0, '分享', '已启用', '2018-07-04 10:27:24', '2018-07-12 07:12:45'),
(41, '文章二', '<p>rwrwrew&nbsp;</p><p><img src="/ueditor/php/upload/image/20180709/1531107772410437.jpg" title="1531107772410437.jpg" alt="1122952604_15283583863141n.jpg"/></p>', 'upload/article-img/0Io1gBaOzH.jpeg', 1, 0, 0, 0, '分享', '已启用', '2018-07-04 10:27:24', '2018-07-12 07:12:35'),
(42, '文章二', '<p>rwrwrew&nbsp;</p><p><img src="/ueditor/php/upload/image/20180709/1531107772410437.jpg" title="1531107772410437.jpg" alt="1122952604_15283583863141n.jpg"/></p>', 'upload/article-img/0Io1gBaOzH.jpeg', 1, 0, 0, 0, '分享', '已启用', '2018-07-04 10:27:24', ''),
(43, '文章二', '<p>rwrwrew&nbsp;</p><p><img src="/ueditor/php/upload/image/20180709/1531107772410437.jpg" title="1531107772410437.jpg" alt="1122952604_15283583863141n.jpg"/></p>', 'upload/article-img/0Io1gBaOzH.jpeg', 1, 0, 0, 0, '分享', '已启用', '2018-07-04 10:27:24', ''),
(44, '文章二', '<p>rwrwrew&nbsp;</p><p><img src="/ueditor/php/upload/image/20180709/1531107772410437.jpg" title="1531107772410437.jpg" alt="1122952604_15283583863141n.jpg"/></p>', 'upload/article-img/0Io1gBaOzH.jpeg', 1, 0, 0, 0, '分享', '已启用', '2018-07-04 10:27:24', ''),
(45, '文章二', '<p>rwrwrew&nbsp;</p><p><img src="/ueditor/php/upload/image/20180709/1531107772410437.jpg" title="1531107772410437.jpg" alt="1122952604_15283583863141n.jpg"/></p>', 'upload/article-img/0Io1gBaOzH.jpeg', 1, 0, 0, 0, '分享', '已启用', '2018-07-04 10:27:24', ''),
(46, '文章二', '<p>rwrwrew&nbsp;</p><p><img src="/ueditor/php/upload/image/20180709/1531107772410437.jpg" title="1531107772410437.jpg" alt="1122952604_15283583863141n.jpg"/></p>', 'upload/article-img/0Io1gBaOzH.jpeg', 1, 0, 0, 0, '分享', '已启用', '2018-07-04 10:27:24', ''),
(47, '文章二', '<p>rwrwrew&nbsp;</p><p><img src="/ueditor/php/upload/image/20180709/1531107772410437.jpg" title="1531107772410437.jpg" alt="1122952604_15283583863141n.jpg"/></p>', 'upload/article-img/0Io1gBaOzH.jpeg', 1, 0, 0, 0, '分享', '已启用', '2018-07-04 10:27:24', ''),
(48, '文章二', '<p>rwrwrew&nbsp;</p><p><img src="/ueditor/php/upload/image/20180709/1531107772410437.jpg" title="1531107772410437.jpg" alt="1122952604_15283583863141n.jpg"/></p>', 'upload/article-img/0Io1gBaOzH.jpeg', 1, 0, 0, 0, '分享', '已启用', '2018-07-04 10:27:24', '2018-07-17 08:11:22'),
(50, 'dsfsdfsd', '<p>dsfdsfdsfdsfdsf<br/></p>', 'upload/article-img/1531383470.jpg', 71, 0, 0, 0, '动态', '已启用', '0000-00-00 00:00:00', '2018-07-12 08:17:50'),
(51, '23442', '<p>342342323234</p>', '', 71, 0, 0, 0, '动态', '已启用', '0000-00-00 00:00:00', '2018-07-16 05:23:07');

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `like` int(11) NOT NULL,
  `is_del` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '未删除',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `article_id`, `parent_id`, `like`, `is_del`, `created_at`) VALUES
(10, '回复很好8', 1, 6, 9, 0, '未删除', '2018-07-08 00:00:00'),
(5, '很好4', 1, 6, 0, 0, '未删除', '2018-07-04 00:00:00'),
(6, '很好5', 1, 6, 0, 0, '未删除', '2018-07-04 00:00:00'),
(7, '很好6', 1, 6, 0, 0, '未删除', '2018-07-04 00:00:00'),
(8, '很好7', 1, 6, 0, 0, '已删除', '2018-07-04 00:00:00'),
(9, '很好8', 2, 6, 5, 0, '未删除', '2018-07-08 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '信息部', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '人事部', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '语文资源', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '技术部', '0000-00-00 00:00:00', '2018-07-16 03:50:21'),
(22, '789', '2018-07-17 08:19:49', '2018-07-17 08:19:49'),
(19, '123', '2018-07-16 03:50:43', '2018-07-16 03:50:43');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `nick_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('男','女') COLLATE utf8_unicode_ci NOT NULL,
  `account_num` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cellphone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `thumb` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `is_stop` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '已启用',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_account_num_unique` (`account_num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `nick_name`, `gender`, `account_num`, `password`, `cellphone`, `department_id`, `grade`, `thumb`, `is_stop`, `created_at`, `updated_at`) VALUES
(1, '用户小华', '用户1', '男', 'yonghu1', 'eyJpdiI6ImREMnlScExvRnRpanRSZkVoSFpYWWc9PSIsInZhbHVlIjoieUttWXdjdUh3WWMrWllKc04ya25ZUT09IiwibWFjIjoiYzA2YTI2MmYzYTg1ZGM0YWNlZWZhM2QyZGMyNjJjOWE4NjBkN2MzZDFkMWMxMzBjZDQ0ZGFjMTdlNmUyZjg4YSJ9', '12345678911', 1, 1, '', '已禁用', '2018-07-11 04:43:39', '2018-07-16 04:38:52'),
(2, '用户', '用户2', '男', 'yonghu2', 'eyJpdiI6InRwM3puaXp3UDVuVTNSOGI5bXpWZnc9PSIsInZhbHVlIjoibVNCWDZ6QlhtYlwvYk04MnZ6OG1ITGc9PSIsIm1hYyI6IjVmNzg3ZTY0MGUzN2NmMzkxYmRhYTEwY2RlMmU3OGZiMTQyZTMwYTEyNWJiMTBhZjc0N2E1ZWZiNjVmOGRhYjMifQ==', '12345678912', 3, 1, '', '已启用', '0000-00-00 00:00:00', '2018-07-16 04:37:57'),
(3, '用户小李', '收到', '男', 'xiaohong', 'eyJpdiI6IlZPNWZrVzJJaEFjMmsyTUs5ME90XC9RPT0iLCJ2YWx1ZSI6Ijg1Vm5lRXY2WXJSamtmNHQxQ243S1E9PSIsIm1hYyI6ImY1Y2Q3NmU4OGUyOWQzNTE4N2FhYjkzYWFkNjA4MTkwNTJjNWRkYWVjMzhmNTE1NWU1ZGMzYjA3NDQ0OGNmZmIifQ==', '', 3, 0, 'cache/xiaohong.jpg', '已禁用', '2018-07-16 02:57:12', '2018-07-16 04:39:58'),
(4, '王芳孩子', '王芳孩子', '男', 'G123456', 'eyJpdiI6IlwvZ0xmYmtKN09lbGcwclpQZzR4ZGx3PT0iLCJ2YWx1ZSI6IlFDTU53U2xcL0VGM0dqTVMyZFdmaWFRPT0iLCJtYWMiOiJjZWQzOWU0YjdmZTAzZTQyNjk2YjE5ZThiZTRmYjQyMDJjODAxZmJiMzc2Y2ExMjM0MzBjYzVhOWQ5Njc5ZWMxIn0=', '', 1, 0, 'cache/G123456.jpg', '已启用', '2018-07-17 08:27:44', '2018-07-17 08:27:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
