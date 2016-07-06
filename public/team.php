<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/6
 * Time: 21:29
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
$teamObj = $app['team'];
$userTeams = $teamObj->all();
var_dump($userTeams);
