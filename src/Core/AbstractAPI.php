<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/5
 * Time: 17:41
 */

namespace Worktile\Core;

use GuzzleHttp\Client;

abstract class AbstractAPI
{

    /**
     * Get all the items
     * @return mixed
     */
    abstract public function all();

    /**
     * The key to open api
     * @var $token string
     */
    protected $token;
    /**
     * the guzzle http client
     * @var $httpClient \GuzzleHttp\Client
     */
    protected $httpClient;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @param $url string
     * @param $method string
     * @param array $parameters
     * @return array
     */
    public function queryHttpResponse($url, $method, $parameters = [])
    {
        $method = strtolower($method);
        $response = $this->getHttpClient()->$method($url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'access_token' => $this->token,
            ],
            'body' => $parameters,
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Get the guzzle http client
     * @return Client
     */
    public function getHttpClient()
    {
        if (is_null($this->httpClient)) {
            $this->httpClient = new Client();
        }

        return $this->httpClient;
    }
}
