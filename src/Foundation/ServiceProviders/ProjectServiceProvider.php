<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/2
 * Time: 19:41
 */

namespace Worktile\Foundation\ServiceProviders;


use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Worktile\Project\ProjectManager;

class ProjectServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        // TODO: Implement register() method.
        $pimple['project'] = function ($pimple) {
            return new ProjectManager($pimple['access_token']);
        };
    }
}