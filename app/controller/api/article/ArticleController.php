<?php

namespace app\controller\api\article;

use app\controller\ApiBaseController;
use app\model\article\ArticleModel;

class ArticleController extends ApiBaseController
{
    public function recommend()
    {
        $article                  = ArticleModel::getRecommend();

        if (!$article) return $this->success();

        $article['platform_name'] = 'TED';
        # 段落排序
        $article['paragraph'] = $article->paragraph->sortBy('order')->map(function ($paragraph) {
            $paragraph['mark'] = $paragraph->mark->map(function ($mark) {
                $mark['attr_name'] = $mark->attr_name;
                return $mark;
            });
            return $paragraph;
        });

        return $this->success($article);
    }
}