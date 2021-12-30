<?php

namespace app\bootstrap;

use support\Db;
use Webman\Bootstrap;

/**
 * ListenSQL
 * @package app\bootstrap
 */
class ListenSQL implements Bootstrap
{
    public static function start($worker) {
        Db::listen(static function (\Illuminate\Database\Events\QueryExecuted $queryExecuted) {
            $sql = $queryExecuted->sql;
            $bindings =$queryExecuted->bindings;
            foreach ($bindings as $binding) {
                $sql = str_replace_once('?',$binding, $sql);
            }
            $dump = date('Y-m-d H:i:s').' <===> cost: '.$queryExecuted->time."(ms) <===> ".$sql;
            var_dump($dump);
        });
    }
}