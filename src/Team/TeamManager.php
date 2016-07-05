<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/5
 * Time: 16:47
 */

namespace Worktile\Team;

class TeamManager
{
    /**
     * the key to open the api
     * @var $token string
     */
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }
}
