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

use support\Env;

return [
    'default' => [
//        'scheme' => 'tcp',
        'host'     => Env::get('REDIS.HOST', '127.0.0.1'),
        'password' => Env::get('REDIS.PASSWORD', null),
        'port'     => Env::get('REDIS.PORT', 6379),
        'database' => Env::get('REDIS.DATABASE', 0),
    ],
];
