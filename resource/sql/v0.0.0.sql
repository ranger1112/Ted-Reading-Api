CREATE TABLE `v0_user`
(
    `id`              int(11)                                 NOT NULL AUTO_INCREMENT,
    `username`        varchar(50) COLLATE utf8mb4_unicode_ci  NOT NULL COMMENT '用户名',
    `status`          tinyint(4)                              NOT NULL DEFAULT '1' COMMENT '用户状态 1-正常 2-禁用',
    `email`           varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '邮箱',
    `head_img`        varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '头像',
    `phone`           varchar(11) COLLATE utf8mb4_unicode_ci  NOT NULL DEFAULT '' COMMENT '手机号',
    `password`        varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '密码',
    `wechat_user_id`  varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '企微ID',
    `desc`            varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
    `token`           varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '当前登陆 token',
    `ip`              varchar(50) COLLATE utf8mb4_unicode_ci  NOT NULL COMMENT '登陆IP',
    `last_login_time` datetime                                NOT NULL COMMENT '上次登陆时间',
    `created_at`      datetime                                         DEFAULT CURRENT_TIMESTAMP,
    `updated_at`      datetime                                         DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`) USING BTREE,
    UNIQUE KEY `username` (`username`) USING BTREE,
    UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci COMMENT ='Users table';

CREATE TABLE `v0_article`
(
    `id`           int(11)                                 NOT NULL AUTO_INCREMENT,
    `title`        varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章标题',
    `zh_title`     varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '中文标题',
    `status`       tinyint(4)                              NOT NULL DEFAULT 1 COMMENT '文章状态 1-正常 2-隐藏',
    `is_recommend` tinyint(4)                              NOT NULL DEFAULT 1 COMMENT '是否推荐 1-否 2-是',
    `type`         tinyint(4)                              NOT NULL DEFAULT 1 COMMENT '文章类型 1-文章',
    `platform`     tinyint(4)                              NOT NULL DEFAULT 1 COMMENT '来源平台 1-TED',
    `author`       varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '作者',
    `translator`   varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '译者',
    `desc`         varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '描述',
    `cover`        varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '封面',
    `origin_url`   varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '原文链接',
    `publish_time` datetime                                NOT NULL COMMENT '发布时间',
    `created_at`   datetime                                         DEFAULT CURRENT_TIMESTAMP,
    `updated_at`   datetime                                         DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci COMMENT ='文章表';

CREATE TABLE `v0_article_paragraph`
(
    `id`          int(11)                         NOT NULL AUTO_INCREMENT,
    `article_id`  int(11)                         NOT NULL COMMENT '文章ID',
    `order`       int(11)                         NOT NULL COMMENT '排序',
    `text`        text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章内容',
    `translation` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章翻译内容',
    `created_at`  datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_at`  datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`) USING BTREE,
    KEY `article_id` (`article_id`) USING BTREE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci COMMENT ='文章段落表';

CREATE TABLE `v0_article_mark`
(
    `id`           int(11)                         NOT NULL AUTO_INCREMENT,
    `article_id`   int(11)                         NOT NULL COMMENT '文章ID',
    `paragraph_id` int(11)                         NOT NULL COMMENT '文章段落ID',
    `type`         tinyint(4)                      NOT NULL DEFAULT 1 COMMENT '类型 1-单词 2-短语',
    `attr`         varchar(50)                     NOT NULL DEFAULT '' COMMENT '词性',
    `content`      text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '文章内容',
    `grammar`      text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '语法',
    `desc`         text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '描述',
    `created_at`   datetime                                 DEFAULT CURRENT_TIMESTAMP,
    `updated_at`   datetime                                 DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`) USING BTREE,
    KEY `article_id` (`article_id`) USING BTREE,
    KEY `paragraph_id` (`paragraph_id`) USING BTREE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci COMMENT ='文章笔记表';