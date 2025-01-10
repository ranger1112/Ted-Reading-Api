<?php

namespace app\controller\admin\article;

use app\controller\ApiBaseController;
use app\service\article\ArticleService;
use support\Request;

class ArticleAdminController extends ApiBaseController
{
    public function parse(Request $request)
    {
        $params = $request->all();

        ArticleService::parse($params);

        return $this->success($params);
    }
}