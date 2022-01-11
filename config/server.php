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
use app\lib\Env;
return [
    'listen'               => Env::get('SERVER.LISTEN','http://0.0.0.0:8787'),
    'transport'            => 'tcp',
    'context'              => [],
    'name'                 => Env::get('SERVER.NAME','webman'),
    'count'                => Env::get('SERVER.COUNT',cpu_count() * 2),
    'user'                 => '',
    'group'                => '',
    'pid_file'             => runtime_path() . '/webman.pid',
    'stdout_file'          => runtime_path() . '/logs/stdout.log',
    'log_file'             => runtime_path() . '/logs/workerman.log',
    'max_request'          => 1000000,
    'max_package_size'     => 10*1024*1024,
    'reusePort'            => true  // 避免惊群
];
