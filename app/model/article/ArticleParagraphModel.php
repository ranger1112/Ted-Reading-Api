<?php

namespace app\model\article;

use support\Model;

/**
 * Class ArticleParagraphModel
 * @property int $id                // 文章段落 ID
 * @property int $article_id        // 文章 ID
 * @property string $text           // 内容
 * @property string $translation    // 翻译内容
 */
class ArticleParagraphModel extends Model
{
    protected $table = 'article_paragraph';

    protected $guarded = [];

    public function article()
    {
        return $this->belongsTo(ArticleModel::class, 'article_id', 'id');
    }

    public function mark()
    {
        return $this->hasMany(ArticleMarkModel::class, 'paragraph_id', 'id');
    }

}
