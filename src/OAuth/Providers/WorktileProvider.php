<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/2
 * Time: 22:48
 */

namespace Worktile\OAuth\Providers;

use Symfony\Component\HttpFoundation\Request;

class WorktileProvider
{
    public function __construct(Request $request, $clientId, $clientSecret, $callback)
    {
        $this->request = $request;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->callback = $callback;
    }

    public function scopes($scopes)
    {
        
    }
}
