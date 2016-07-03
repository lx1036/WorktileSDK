<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/2
 * Time: 19:38
 */

namespace Worktile\Foundation\ServiceProviders;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Worktile\OAuth\SocialiteManager;

class OAuthServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        // TODO: Implement register() method.
        $pimple['oauth']       = function ($pimple) {
            $callbackUrl       = $this->getCallbackUrl($pimple);
            $scopes            = $pimple['config']->get('oauth.scopes', []);

            /**
             * @var $provider \Worktile\OAuth\Providers\WorktileProvider
             */
            $provider = (new SocialiteManager([
                'worktile' => [
                    'client_id'     => $pimple['config']['client_id'],
                    'client_secret' => $pimple['config']['client_secret'],
                    'callback'      => $callbackUrl,
                ]
            ]))->driver('worktile');

            if (! empty($scopes)) {
                $provider->scopes($scopes);
            }

            return $provider;
        };
    }

    protected function getCallbackUrl($pimple)
    {
        $callbackUrl = $pimple['config']->get('oauth.callback');
        if (strpos($callbackUrl, 'http') === 0) {
            return $callbackUrl;
        }

        $baseUrl = $pimple['request']->getSchemeAndHttpHost();
        return $baseUrl.'/'.ltrim($callbackUrl, '/');
    }


}