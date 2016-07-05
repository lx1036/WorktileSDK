<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/4
 * Time: 20:18
 */

require_once __DIR__.'/../vendor/autoload.php';

$config = [
    'oauth' => [
        'client_id' => '4f86739caec0435ea13302783af50a21',
        'client_secret' => 'a151406c5e9546cd9a51e4b16c6caddc',
        'callback' => 'http://worktilesdk.app/callback.php',
    ],
];
$app = new \Worktile\Foundation\Application($config);
$OAuth = $app['oauth'];
$response = $OAuth->redirect();
echo $response;

//$response = new \Symfony\Component\HttpFoundation\RedirectResponse('http://www.baidu.com');
//echo $response;
