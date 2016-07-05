<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/5
 * Time: 17:31
 */

namespace Worktile\Project;

class ProjectManager
{
    /**
     * The key to open api
     * @var $token string
     */
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }
}
