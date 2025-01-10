<?php
/**
 * This file is part of webman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author    walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link      http://www.workerman.net/
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */

use app\controller\api\article\ArticleController;
use app\controller\api\LoginController;
use app\middleware\AuthMiddleware;
use Webman\Route;
use app\controller\admin\article\ArticleAdminController;

Route::group('/v1', function () {
    // 登录相关
    Route::post('/login', [LoginController::class, 'login']);
    // 注册
    Route::post('/register', [LoginController::class, 'register']);
    // 注册的验证码
    Route::post('/register-code', [LoginController::class, 'registerCode']);
    // 文章相关
    Route::group('/article', function () {
        // 随机推荐文章
        Route::get('/recommend', [ArticleController::class, 'recommend']);
    });

});

Route::group('/v1', function () {
    Route::group('/article', function () {
        // 随机推荐文章
        Route::post('/parse', [ArticleAdminController::class, 'parse']);
    });
})->middleware([
    AuthMiddleware::class,
]);

Route::disableDefaultRoute();





