<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/2
 * Time: 22:48
 */

namespace Worktile\OAuth\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Worktile\OAuth\Contracts\Providers;
use Worktile\OAuth\Exceptions\InvalidStateException;
use Worktile\OAuth\Model\User;
use Worktile\Support\Arr;
use Worktile\Support\Str;

class WorktileProvider implements Providers
{
    /**
     *  the auth url
     */
    const AUTH_URL = 'https://open.worktile.com/oauth2/authorize';

    /**
     * the url for getting the access_token
     */
    const ACCESS_TOKEN_URL = 'https://api.worktile.com/oauth2/access_token';

    /**
     * the url for getting the user info
     */
    const USER_URL = 'https://api.worktile.com/v1/user/profile';

    /**
     * key words by the api
     */
    const TOKEN = 'access_token';
    const STATE = 'state';
    /**
     * the switch to use the state
     * @var bool
     */
    protected $useState = true;

    /**
     * custom parameters to the auth request
     * @var array
     */
    protected $customParameters = [];

    /**
     * the guzzle http client
     * @var $httpClient \GuzzleHttp\Client
     */
    protected $httpClient = null;

    public function __construct(Request $request, $clientId, $clientSecret, $callback)
    {
        $this->request      = $request;
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->callback     = $callback;
    }

    public function scopes($scopes)
    {
        
    }

    /**
     * Redirect the user to the authenticated page for the specified provider
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect()
    {
        $state = null;
        if ($this->useState()) {
            $this->request->getSession()->set(static::STATE, $state = Str::random(16));
        }

//        var_dump($this->getAuthUrl($state));
        return new RedirectResponse($this->getAuthUrl($state));
    }

    /**
     * Get the user instance from the authenticated page
     * @return \Worktile\OAuth\Model\User
     */
    public function user()
    {
        //check the return state is valid
        if ($this->hasInvalidState()) {
            throw new InvalidStateException;
        }
        $token = $this->getAccessToken($this->getCode());
        $user  =  $this->mapUserToObject($this->getUserByToken($token));
        $user->setToken($token);
        return $user;
    }

    protected function useState()
    {
        return $this->useState;
    }

    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase(static::AUTH_URL, $state);
    }

    protected function buildAuthUrlFromBase($authUrl, $state)
    {
        return $authUrl.'?'.http_build_query($this->getAuthFields($state), '', '&');
    }

    protected function getAuthFields($state)
    {
        $fields = array_merge([
            'client_id'    => $this->clientId,
            'redirect_uri' => $this->callback,
            'display'      => 'web',
        ], $this->customParameters);

        if ($this->useState()) {
            $fields[static::STATE] = $state;
        }

        return $fields;
    }

    protected function getCode()
    {
        return $this->request->get('code');
    }

    protected function getAccessToken($code)
    {
        $postKey = (version_compare(ClientInterface::VERSION, '6') === 1) ? 'form_params' : 'body';
        $response = $this->getHttpClient()->post($this->getTokenUrl(), [
            'headers' => ['Accept' => 'application/json'],
            $postKey  => $this->getTokenFields($code),
        ]);

        $token = Arr::get(json_decode($response->getBody(), true), static::TOKEN);

        $this->request->getSession()->set(static::TOKEN, $token);

        return $token;
    }

    protected function getHttpClient()
    {
        if (is_null($this->httpClient)) {
            $this->httpClient = new Client();
        }

        return $this->httpClient;
    }

    protected function getTokenUrl()
    {
        return static::ACCESS_TOKEN_URL;
    }

    protected function getTokenFields($code)
    {
        return [
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'code'          => $code,
            'redirect_uri'  => $this->callback,
        ];
    }

    /**
     * Get the user info by json
     * @param $token
     * @return \Psr\Http\Message\ResponseInterface
     */
    private function getUserByToken($token)
    {
        $userUrl  = $this->getUserUrl();
        $response = $this->getHttpClient()->get($userUrl, [
            'headers' => [
                'Content-Type' => 'application/json',
                static::TOKEN  => $token,
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    protected function getUserUrl()
    {
        return static::USER_URL;
    }

    /**
     * @param $user
     * @return User
     */
    protected function mapUserToObject($user)
    {
        return (new User())->setUser($user)->map([
            'uid'          => $user['uid'],
            'name'         => $user['name'],
            'display_name' => $user['display_name'],
            'email'        => $user['email'],
            'desc'         => $user['desc'],
            'avatar'       => $user['avatar'],
            'status'       => $user['status'],
            'online'       => $user['online'],
        ]);
    }

    protected function hasInvalidState()
    {
        if (! $this->useState()) {
            return new InvalidStateException();
        }
        $state = $this->request->getSession()->get(static::STATE);
        return ! ((strlen($state) > 0) && ($this->request->get(static::STATE) === $state));
    }

}
