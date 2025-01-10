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

    const ATTR_NOUN         = 1;      # 名词
    const ATTR_PRONOUN      = 2;      # 代词
    const ATTR_VERB         = 3;      # 动词
    const ATTR_ADJECTIVE    = 4;      # 形容词
    const ATTR_ADVERB       = 5;      # 副词
    const ATTR_PREPOSITION  = 6;      # 介词
    const ATTR_CONJUNCTION  = 7;      # 连词
    const ATTR_INTERJECTION = 8;      # 感叹词
    const ATTR_ARTICLE      = 9;      # 冠词
    const ATTR_PHRASE       = 10;     # 短语

    public function attrMapping()
    {
        return [
            self::ATTR_NOUN => [
                'id'   => self::ATTR_NOUN,
                'name' => '名词',
                'code' => 'n',
            ],
            self::ATTR_PRONOUN => [
                'id'   => self::ATTR_PRONOUN,
                'name' => '代词',
                'code' => 'pron',
            ],
            self::ATTR_VERB => [
                'id'   => self::ATTR_VERB,
                'name' => '动词',
                'code' => 'v',
            ],
            self::ATTR_ADJECTIVE => [
                'id'   => self::ATTR_ADJECTIVE,
                'name' => '形容词',
                'code' => 'adj',
            ],
            self::ATTR_ADVERB => [
                'id'   => self::ATTR_ADVERB,
                'name' => '副词',
                'code' => 'adv',
            ],
            self::ATTR_PREPOSITION => [
                'id'   => self::ATTR_PREPOSITION,
                'name' => '介词',
                'code' => 'prep',
            ],
            self::ATTR_CONJUNCTION => [
                'id'   => self::ATTR_CONJUNCTION,
                'name' => '连词',
                'code' => 'conj',
            ],
            self::ATTR_INTERJECTION => [
                'id'   => self::ATTR_INTERJECTION,
                'name' => '感叹词',
                'code' => 'int',
            ],
            self::ATTR_ARTICLE => [
                'id'   => self::ATTR_ARTICLE,
                'name' => '冠词',
                'code' => 'art',
            ],
            self::ATTR_PHRASE => [
                'id'   => self::ATTR_PHRASE,
                'name' => '短语',
                'code' => 'phrase',
            ],
        ];
    }

    public function getAttrNameAttribute()
    {
        return $this->attrMapping()[$this->type]['code'] ?? '';
    }

}
