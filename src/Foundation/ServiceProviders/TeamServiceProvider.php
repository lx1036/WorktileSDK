<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/2
 * Time: 19:40
 */

namespace Worktile\Foundation\ServiceProviders;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Worktile\Team\Team;
use Worktile\Team\TeamManager;

class TeamServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        // TODO: Implement register() method.
        $pimple['team'] = function ($pimple) {
//            return new TeamManager($pimple['access_token']);
            return new Team($pimple['access_token']);
        };
    }
}