<?php
declare(strict_types=1);

namespace app\middleware;

use Webman\Http\Request;
use Webman\Http\Response;
use Webman\MiddlewareInterface;

/**
 * 跨域请求中间件
 * @package app\middleware
 */
class AccessControlMiddleware implements MiddlewareInterface
{
    /**
     * @inheritDoc
     * @param Request $request
     * @param callable $handler
     * @return Response
     */
    public function process(Request $request, callable $handler): Response
    {
        $response = $request->method() === 'OPTIONS' ? response('') : $handler($request);
        $response->withHeaders([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Headers' => 'Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodified-Since, X-Requested-With,Origin',
            'Access-Control-Allow-Methods' => 'GET,POST,PUT,DELETE,OPTIONS',
        ]);
        return $response;
    }
}