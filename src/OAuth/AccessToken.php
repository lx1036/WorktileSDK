<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/5
 * Time: 15:55
 */

namespace Worktile\OAuth;



use Worktile\OAuth\Contracts\AccessTokenInterface;

class AccessToken implements AccessTokenInterface
{
    public function __construct($token)
    {
        
    }

    /**
     * return the AccessToken from the worktile server
     * @return mixed
     */
    public function getToken()
    {
        // TODO: Implement getToken() method.
    }
}