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
        'client_id' => '7c053a874163497f81483db3269f91f8',
        'client_secret' => 'a0cfea97668248bab55053ca0c4e94e2',
        'callback' => 'http://worktilesdklx.app/team.php',
    ],
];
$app = new \Worktile\Foundation\Application($config);
$OAuth = $app['oauth'];
$response = $OAuth->redirect();
echo $response;

//$response = new \Symfony\Component\HttpFoundation\RedirectResponse('http://www.baidu.com');
//echo $response;
