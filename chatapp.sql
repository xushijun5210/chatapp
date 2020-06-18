-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-06-15 06:44:33
-- 服务器版本： 5.5.53
-- PHP 版本： 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `chatapp`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_role`
--

CREATE TABLE `admin_role` (
  `role_id` int(5) NOT NULL COMMENT '主键',
  `role_name` varchar(100) NOT NULL COMMENT '角色名称',
  `auth_id` int(5) NOT NULL COMMENT '权限ID',
  `create_time` int(10) NOT NULL COMMENT '添加时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='角色表';

-- --------------------------------------------------------

--
-- 表的结构 `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(8) NOT NULL COMMENT '主键',
  `role_id` int(5) NOT NULL COMMENT '角色ID',
  `name` varchar(100) NOT NULL COMMENT '用户名称',
  `email` varchar(200) NOT NULL COMMENT '用户邮箱',
  `phone` varchar(15) NOT NULL COMMENT '用户手机',
  `password` char(40) NOT NULL COMMENT '密码',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '状态1表示启用，0表示禁用',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='后台管理员表';

--
-- 转存表中的数据 `admin_user`
--

INSERT INTO `admin_user` (`id`, `role_id`, `name`, `email`, `phone`, `password`, `status`, `create_time`, `update_time`) VALUES
(1, 1, '55555', '2273525664@qq.com', '13884844235', '123456', 1, 0, 0),
(2, 1, 'admin', '2273525665@qq.com', '13884844235', '123456', 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `friends`
--

CREATE TABLE `friends` (
  `id` int(10) NOT NULL COMMENT '主键ID',
  `user_id` int(10) NOT NULL COMMENT '用户ID',
  `friend_id` int(10) NOT NULL COMMENT '好友ID',
  `status` enum('0','1','2') COLLATE utf8_esperanto_ci NOT NULL DEFAULT '2' COMMENT '好友状态（0：表示已经是好友，1：表示申请中，2：表示申请发送方）',
  `create_time` varchar(32) COLLATE utf8_esperanto_ci NOT NULL COMMENT '创建时间',
  `update_time` varchar(32) COLLATE utf8_esperanto_ci NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_esperanto_ci COMMENT='好友表';

-- --------------------------------------------------------

--
-- 表的结构 `groupnews`
--

CREATE TABLE `groupnews` (
  `id` int(10) NOT NULL COMMENT '主键ID',
  `group_id` int(10) NOT NULL COMMENT '群id',
  `user_id` int(10) NOT NULL COMMENT '发送者ID',
  `content` text NOT NULL COMMENT '发送内容',
  `contenttype` enum('0','1','2','3') NOT NULL DEFAULT '0' COMMENT '内容类型（0：文字，1图片链接，2：音频链接，3：视频）',
  `create_time` varchar(32) NOT NULL COMMENT '发送时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='群消息表';

-- --------------------------------------------------------

--
-- 表的结构 `groups`
--

CREATE TABLE `groups` (
  `id` int(10) NOT NULL COMMENT '主键ID',
  `user_id` int(10) NOT NULL COMMENT '群主ID',
  `name` varchar(32) COLLATE utf8_esperanto_ci NOT NULL COMMENT '群名',
  `imgurl` varchar(32) COLLATE utf8_esperanto_ci NOT NULL COMMENT '群封面链接',
  `notice` text COLLATE utf8_esperanto_ci NOT NULL COMMENT '群公告',
  `create_time` varchar(32) COLLATE utf8_esperanto_ci NOT NULL COMMENT '建群时间',
  `update_time` varchar(32) COLLATE utf8_esperanto_ci NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_esperanto_ci COMMENT='群表';

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE `member` (
  `id` int(10) NOT NULL COMMENT '主键ID',
  `group_id` int(10) NOT NULL COMMENT '群id',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `name` varchar(32) COLLATE utf8_esperanto_ci NOT NULL COMMENT '群名称',
  `number` int(10) NOT NULL COMMENT '未读消息数',
  `group_news` enum('0','1') COLLATE utf8_esperanto_ci NOT NULL DEFAULT '0' COMMENT '是否屏蔽群消息（0：不屏蔽，1：屏蔽）',
  `create_time` varchar(32) COLLATE utf8_esperanto_ci NOT NULL COMMENT '加入时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_esperanto_ci COMMENT='群成员表';

-- --------------------------------------------------------

--
-- 表的结构 `onetoonenews`
--

CREATE TABLE `onetoonenews` (
  `id` int(10) NOT NULL COMMENT '主键ID',
  `user_id` int(10) NOT NULL COMMENT '发送者ID',
  `accept_id` int(10) NOT NULL COMMENT '接收者ID',
  `content` text NOT NULL COMMENT '内容',
  `contenttype` enum('0','1','2','3','4') NOT NULL DEFAULT '0' COMMENT '内容类型（0：文字，1图片链接，2：音频链接，3：视频）',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '消息状态（0：已读，1：未读）',
  `create_time` varchar(32) NOT NULL COMMENT '发送时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='一对一消息表';

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL COMMENT '主键ID',
  `name` varchar(40) NOT NULL COMMENT '用户名',
  `email` varchar(40) NOT NULL COMMENT '邮箱',
  `sex` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '性别',
  `birthday` date NOT NULL COMMENT '生日',
  `phone` varchar(15) NOT NULL COMMENT '电话号码',
  `password` varchar(40) NOT NULL COMMENT '密码',
  `introduce` text NOT NULL COMMENT '介绍',
  `imgurl` varchar(100) NOT NULL COMMENT '头像链接',
  `status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '是否启用 1：启用 0：禁用',
  `create_time` varchar(32) NOT NULL COMMENT '注册时间',
  `update_time` varchar(32) NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `sex`, `birthday`, `phone`, `password`, `introduce`, `imgurl`, `status`, `create_time`, `update_time`) VALUES
(1, '张三', '2273525663@qq.com', '1', '0000-00-00', '', '999999999', '', '', '1', '2020-06-01 16:10:21', '2020-06-01 16:20:09'),
(2, '李四', '2273525664@qq.com', '1', '2020-06-01', '13884844235', '999999999', '你好啊', '/phdhhd/jsdajhdh/d.png', '1', '2020-06-01 16:00:33', '2020-06-01 16:20:57'),
(3, '王五', '2273525664@qq.com', '1', '1987-09-17', '18588597569', 'te6AB8Jw3vMUk', '你好啊', '/phdhhd/jsdajhdh/d.png', '1', '2020-06-01 16:02:33', '2020-06-01 16:22:25'),
(4, '扣扣', '2273525668@qq.com', '1', '0000-00-00', '', 'xushijun5210', '', '', '1', '', ''),
(5, '玩玩', '2273525669@qq.com', '1', '0000-00-00', '', 'xushijun5210', '', '', '1', '2020-06-15 09:47:37', '2020-06-15 09:47:37'),
(6, '地方', '2273525679@qq.com', '1', '0000-00-00', '', 'xushijun5210', '', '', '1', '2020-06-15 11:35:58', '2020-06-15 11:35:58'),
(7, '好好', '3273525679@qq.com', '1', '0000-00-00', '', 'xushijun5210', '', '', '1', '2020-06-15 11:38:18', '2020-06-15 11:38:18'),
(8, '好好', '3273525679@qq.com', '1', '0000-00-00', '', 'xushijun5210', '', '', '1', '2020-06-15 11:41:09', '2020-06-15 11:41:09');

--
-- 转储表的索引
--

--
-- 表的索引 `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`role_id`);

--
-- 表的索引 `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `groupnews`
--
ALTER TABLE `groupnews`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `onetoonenews`
--
ALTER TABLE `onetoonenews`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `role_id` int(5) NOT NULL AUTO_INCREMENT COMMENT '主键';

--
-- 使用表AUTO_INCREMENT `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID';

--
-- 使用表AUTO_INCREMENT `groupnews`
--
ALTER TABLE `groupnews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID';

--
-- 使用表AUTO_INCREMENT `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID';

--
-- 使用表AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID';

--
-- 使用表AUTO_INCREMENT `onetoonenews`
--
ALTER TABLE `onetoonenews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID';

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID', AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
