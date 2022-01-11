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
declare(strict_types=1);

use app\controller\Index;
use app\lib\R;
use app\middleware\AccessControlMiddleware;
use Webman\Route;


// 关闭默认路由规格
Route::disableDefaultRoute();

// 处理互联网的健康检查的探测回应
Route::any('/', static function() {
    return response();
});

// 回退路由: 处理不存在的路由And更改默认404
Route::fallback(static function () {
    return R::failed('404 not found');
});

// 针对options请求的全局路由
Route::options('[{path:.+}]', static function () {
    return response('');
})->middleware([AccessControlMiddleware::class]);



Route::group('/index', static function () {
    Route::post('/json', [Index::class, 'json']);
});