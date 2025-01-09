<?php

namespace app\model\article;

use support\Model;

/**
 * Class ArticleMarkModel
 * @property int $id                // 文章标记 ID
 * @property int $article_id        // 文章 ID
 * @property int $paragraph_id      // 文章段落 ID
 * @property int $type              // 类型
 * @property string $attr           // 属性(词性)
 * @property string $content        // 内容
 * @property string $desc           // 描述
 */
class ArticleMarkModel extends Model
{
    protected $table = 'article_mark';

    protected $guarded = [];

    const TYPE_WORD   = 1;  # 单词
    const TYPE_PHRASE = 2;  # 短语

    const ATTR_NOUN         = 'n';      # 名词
    const ATTR_PRONOUN      = 'pron';   # 代词
    const ATTR_VERB         = 'v';      # 动词
    const ATTR_ADJECTIVE    = 'adj';    # 形容词
    const ATTR_ADVERB       = 'adv';    # 副词
    const ATTR_PREPOSITION  = 'prep';   # 介词
    const ATTR_CONJUNCTION  = 'conj';   # 连词
    const ATTR_INTERJECTION = 'int';    # 感叹词
    const ATTR_ARTICLE      = 'art';    # 冠词

}
