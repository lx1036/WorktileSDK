<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/3
 * Time: 20:41
 */

namespace Worktile\OAuth\Model;

use Doctrine\Common\Cache\FilesystemCache;

class User
{

    protected $user;

    /**
     * user id
     * @var $id
     */
    protected $uid;

    /**
     * user name
     * @var $name
     */
    protected $name;

    /**
     * user display_name
     * @var
     */
    protected $display_name;

    /**
     * user email
     * @var
     */
    protected $email;

    /**
     * user desc
     * @var
     */
    protected $desc;

    /**
     * user avatar
     * @var
     */
    protected $avatar;

    /**
     * user status
     * @var
     */
    protected $status;

    /**
     * user online
     * @var
     */
    protected $online;

    /**
     * the access_token from the worktile server
     * @var
     */
    protected $token;

    /**
     * set the raw user from the provider
     * @param $user
     * @return \Worktile\OAuth\Model\User
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Map the given array onto the user's properties.
     * @param array $attributes
     * @return \Worktile\OAuth\Model\User
     */
    public function map(array $attributes)
    {
        foreach ($attributes as $key => $attribute) {
            $this->{$key} = $attribute;
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->getCache()->save('access_token', $token);
        $this->token = $token;
    }

    public function getCache()
    {
        return new FilesystemCache(sys_get_temp_dir());
    }
}
