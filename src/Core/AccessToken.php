<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/5
 * Time: 14:54
 */

namespace Worktile\Core;

use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\FilesystemCache;
use Worktile\Foundation\Application;

class AccessToken
{
    /**
     * the app id
     * @var
     */
    protected $clientId;
    /**
     * the app secret
     * @var
     */
    protected $clientSecret;
    /**
     * cache the token
     * @var Cache
     */
    protected $cache;

    /**
     * @var \Worktile\Foundation\Application
     */
    protected $app;

    public function __construct($clientId, $clientSecret, $app, Cache $cache = null)
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->cache        = $cache;
        $this->app          = $app;
    }

    public function getToken($forceRefresh = false)
    {
        $cacheKey = 'access_token';
        $cachedToken = $this->getTokenFromCache($cacheKey);
        if ($forceRefresh || empty($cachedToken)) {
            $serverToken = $this->getTokenFromServer();
            $this->saveTokenToCache($cacheKey, $serverToken);
            return $serverToken;
        }

        return $cachedToken;
    }

    public function getCache()
    {
        return $this->cache ? : $this->cache = new FilesystemCache(sys_get_temp_dir());
    }

    public function getTokenFromCache($cacheKey)
    {
        return $this->getCache()->fetch($cacheKey);
    }

    public function saveTokenToCache($cacheKey, $token)
    {
        return $this->getCache()->save($cacheKey, $token);
    }

    public function getTokenFromServer()
    {
        /**
         * @var $user \Worktile\OAuth\Model\User
         */
        $user = $this->app['oauth']->user();
        return $user->getToken();
    }

    public function getUserFromToken()
    {
        
    }
}
