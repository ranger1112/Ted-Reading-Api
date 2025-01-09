<?php

namespace app\model\article;

use support\Model;

/**
 * Class ArticleMarkModel
 * @property int $id                // 文章标记 ID
 * @property int $article_id        // 文章 ID
 * @property int $paragraph_id      // 文章段落 ID
 * @property string $content        // 内容
 * @property string $desc           // 描述
 */
class ArticleMarkModel extends Model
{
    protected $table = 'article_mark';

    protected $guarded = [];


}
