<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/2
 * Time: 22:04
 */

namespace Worktile\OAuth\Contracts;

interface Factory
{
    public function driver($driver = null);
}
