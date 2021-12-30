<?php

namespace app\lib;

use support\Response;

/**
 * 自定义Json格式响应消息主体
 *
 * @package app\lib
 */
class R
{
    /**
     * 成功
     */
    private const SUCCESS = 0;

    private const FAIL = 1;

    /**
     * 成功响应
     *
     * @param mixed $data
     * @param string $msg
     * @return Response
     */
    public static function success($data = null, string $msg = 'ok'): Response
    {
        return self::restResult($data, self::SUCCESS, $msg);
    }

    /**
     * 失败响应
     *
     * @param string $msg
     * @return Response
     */
    public static function failed(string $msg = 'fail'): Response
    {
        return self::restResult(null, self::FAIL, $msg);
    }

    /**
     * 返回响应结果
     *
     * @param $data
     * @param int $code
     * @param string $msg
     * @return Response
     */
    protected static function restResult($data, int $code, string $msg): Response
    {
        $result = new \stdClass();
        $result->success = $code === 0;
        $result->code = $code;
        $result->msg = $msg;
        $result->data = $data;
        $jsonBody = json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        return new Response(200, ['Content-Type' => 'application/json'], $jsonBody);
    }
}