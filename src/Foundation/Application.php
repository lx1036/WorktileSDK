<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/2
 * Time: 19:32
 */

namespace Worktile\Foundation;

use Doctrine\Common\Cache\FilesystemCache;
use Pimple\Container;
use Symfony\Component\HttpFoundation\Request;
use Worktile\Core\AccessToken;

class Application extends Container
{
    protected $providers = [
        ServiceProviders\OAuthServiceProvider::class,
        ServiceProviders\UserServiceProvider::class,
        ServiceProviders\TeamServiceProvider::class,
        ServiceProviders\ProjectServiceProvider::class,
        ServiceProviders\EntryServiceProvider::class,
        ServiceProviders\TaskServiceProvider::class,
        ServiceProviders\EventServiceProvider::class,
        ServiceProviders\FileServiceProvider::class,
        ServiceProviders\PostServiceProvider::class,
        ServiceProviders\PageServiceProvider::class,
        ServiceProviders\WebhookServiceProvider::class,
    ];


    public function __construct($config)
    {
        parent::__construct();

        $this['config'] = function () use ($config) {
            return new Config($config);
        };

        //traverse the providers register methods
        $this->registerProviders();
        // add some helper object
        $this->registerBase();
    }

    /**
     * register the providers
     */
    protected function registerProviders()
    {
        foreach ($this->providers as $provider) {
            $this->register(new $provider());
        }
    }

    protected function registerBase()
    {
        $this['request'] = function () {
            return Request::createFromGlobals();
        };

        $this['cache'] = function () {
            return new FilesystemCache(sys_get_temp_dir());
        };

        $this['access_token'] = function () {
            return new AccessToken(
                $this['config']['client_id'],
                $this['config']['client_secret'],
                $this,
                $this['cache']
            );
        };
    }
}
