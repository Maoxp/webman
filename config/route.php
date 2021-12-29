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

use app\controller\Index;
use Webman\Route;






// 关闭默认路由规格
Route::disableDefaultRoute();

// 回退路由: 处理不存在的路由And更改默认404
Route::fallback(static function () {
    return response('not null');
});

Route::options('[{path:.+}]', static function (){
    return response('');
});

Route::group('/api/index', static function () {
    Route::post( '/json', [Index::class, 'json']);
});