<?php

namespace app\model\article;

use support\Model;

/**
 * Class ArticleModel
 * @property int $id                // 文章 ID
 * @property string $title          // 文章标题
 * @property string $zh_title       // 中文标题
 * @property int $status             // 文章状态 1-正常 2-隐藏
 * @property int $is_recommend        // 是否推荐 1-否 2-是
 * @property int $type              // 文章类型 1-文章
 * @property int $platform          // 来源平台 1-TED
 * @property string $author         // 作者
 * @property string $translator     // 译者
 * @property string $desc           // 描述
 * @property string $cover          // 封面
 * @property string $origin_url     // 原文链接
 * @property string $publish_time   // 发布时间
 */
class ArticleModel extends Model
{
    protected $table = 'article';

    protected $guarded = [];

}
