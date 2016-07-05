<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/2
 * Time: 19:42
 */

namespace Worktile\Foundation\ServiceProviders;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Worktile\Task\TaskManager;

class TaskServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['task'] = function ($pimple) {
            return new TaskManager($pimple['access_token']);
        };
    }
}