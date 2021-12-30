<?php

declare(strict_types=1);

namespace app\middleware;

use app\lib\R;
use Illuminate\Database\Events\QueryExecuted;
use support\Db;
use support\Redis;
use Webman\Http\Request;
use Webman\Http\Response;
use Webman\MiddlewareInterface;

/**
 * 用户身份验证中间件
 *
 * @package app\middleware
 */
class AuthCheckMiddleware implements MiddlewareInterface
{
    /**
     * @inheritDoc
     */
    public function process(Request $request, callable $handler): Response
    {
        $controllerPath = str_replace('\\', DIRECTORY_SEPARATOR, $request->controller);
        $controllerArray = explode(DIRECTORY_SEPARATOR, $controllerPath);

        $specify = end($controllerArray) .DIRECTORY_SEPARATOR . $request->action;
        if (strtolower($specify) === 'user/login') {
            return $handler($request);
        }

        $authHeader = $request->header('Authorization');
        if (is_null($authHeader)) {
            return new Response(401, ['Content-Type' => 'application/json'], null);
//           return R::failed('您的访问授权无效!');
        }

        // redis get value for validate
        $exist = Redis::exists("wms:login-token:" . trim($authHeader));
        if (!$exist) {
            return new Response(401, ['Content-Type' => 'application/json'], null);
//            return R::failed("授权无效，请先登录!");
        }

        return $handler($request);
    }
}