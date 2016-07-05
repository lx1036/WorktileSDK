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
use Worktile\Entry\EntryManager;

class EntryServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        // TODO: Implement register() method.
        $pimple['entry'] = function ($pimple) {
            return new EntryManager($pimple['access_token']);
        };
    }
}