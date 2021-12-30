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
//return [];
return [
    'default' => 'mysql',
    'connections' => [
        'mysql' => [
            'driver' => Env::get('DB.CONNECTION', 'mysql'),
            'host' => Env::get('DB.HOST',''),
            'port' => Env::get('DB.PORT','3306'),
            'database' => Env::get('DB.DATABASE','wms'),
            'username' => Env::get('DB.USERNAME',''),
            'password' => Env::get('DB.PASSWORD','tech'),
            'unix_socket' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],
    ]
];
