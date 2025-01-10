<?php

namespace app\service\article;

use app\model\article\ArticleMarkModel;
use app\model\article\ArticleModel;
use app\model\article\ArticleParagraphModel;
use support\Db;

class ArticleService
{
    public static function parse($params)
    {
        $paragraphItems = $params['paragraph'];
        $markItems      = $params['mark'];
        unset($params['paragraph'], $params['mark']);

        Db::transaction(function () use ($params, $paragraphItems, $markItems) {
            $article = ArticleModel::parse($params);

            foreach ($paragraphItems as $order => $paragraphItem) {
                $order                = intval($order) + 1;
                $paragraphText        = $paragraphItem['text'];
                $paragraphTranslation = $paragraphItem['translation'];
                $paragraph            = ArticleParagraphModel::query()->updateOrCreate([
                    'article_id' => $article->id,
                    'order'      => $order
                ], [
                    'text'        => $paragraphText,
                    'translation' => $paragraphTranslation
                ]);
                $paragraphId = $paragraph->id;

                foreach ($markItems as &$markItem) {
                    if (isset($markItem['is_handled'])) continue;   # 只处理一次
                    if (str_contains($paragraphText, $markItem['content'])) {
                        ArticleMarkModel::query()->updateOrCreate([
                            'article_id'   => $article->id,
                            'paragraph_id' => $paragraphId,
                            'content'      => $markItem['content'],
                        ], [
                            'type'    => $markItem['type'],
                            'attr'    => $markItem['attr'],
                            'grammar' => $markItem['grammar'],
                            'desc'    => $markItem['desc'],
                        ]);
                        $markItem['is_handled'] = true;
                    }
                }
            }
        });
    }

}