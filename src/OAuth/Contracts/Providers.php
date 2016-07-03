<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/3
 * Time: 20:37
 */

namespace Worktile\OAuth\Contracts;

interface Providers
{
    /**
     * Redirect the user to the authenticated page for the specified provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect();

    /**
     * Get the user instance from the authenticated page
     * @return \Worktile\OAuth\Model\User
     */
    public function user();
}
