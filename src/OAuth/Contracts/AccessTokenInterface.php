<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/5
 * Time: 15:51
 */

namespace Worktile\OAuth\Contracts;

interface AccessTokenInterface
{
    /**
     * return the AccessToken from the worktile server
     * @return mixed
     */
    public function getToken();
}
