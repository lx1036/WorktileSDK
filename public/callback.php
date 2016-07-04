<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/4
 * Time: 21:10
 */
//phpinfo();
require_once __DIR__.'/../vendor/autoload.php';

$config = [
    'client_id' => '4f86739caec0435ea13302783af50a21',
    'client_secret' => 'a151406c5e9546cd9a51e4b16c6caddc',
    'oauth' => [
        'callback' => 'http://worktilesdk.app/callback.php',
    ],
];
$app = new \Worktile\Foundation\Application($config);
$OAuth = $app['oauth'];
$user = $OAuth->user();
var_dump($user);
