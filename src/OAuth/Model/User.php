<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/3
 * Time: 20:41
 */

namespace Worktile\OAuth\Model;

class User
{

    protected $user;

    /**
     * user id
     * @var $id
     */
    protected $id;

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
}
