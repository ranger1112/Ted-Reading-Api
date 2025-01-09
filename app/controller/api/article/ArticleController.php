<?php

namespace app\controller\api\article;

use app\controller\api\ApiBaseController;
use app\model\article\ArticleModel;

class ArticleController extends ApiBaseController
{
    public function recommend()
    {
        $article              = ArticleModel::getRecommend();
        $article['platform_name'] = $article->platform_name;
        # 段落排序
        $article['paragraph'] = $article->paragraph->sortBy('order');

        return $this->success($article);
    }
}