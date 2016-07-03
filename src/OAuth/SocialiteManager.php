<?php
/**
 * Created by PhpStorm.
 * User: liuxiang
 * Date: 16/7/2
 * Time: 21:52
 */

namespace Worktile\OAuth;

use Symfony\Component\HttpFoundation\Request;
use Worktile\OAuth\Contracts\Factory;

class SocialiteManager implements Factory
{
    /**
     * the created drivers
     * @var array
     */
    protected $drivers = [];
    protected $initialDrivers = [
        'worktile' => 'Worktile'
    ];

    public function __construct($config = [], Request $request = null)
    {
        $this->config  = new Config($config);
        $this->request = $request ? $request : $this->createDefaultRequest();
    }

    public function driver($driver = null)
    {
        $driver = $driver ? $driver : $this->getDefaultDriver();
        if (! isset($this->drivers[$driver])) {
            $this->drivers[$driver] = $this->createDriver($driver);
        }

        return $this->drivers[$driver];
    }

    protected function createDefaultRequest()
    {
        return null;
    }

    /**
     * @throws \Exception
     * @return string
     */
    protected function getDefaultDriver()
    {
        throw new \InvalidArgumentException('No driver is specified');
    }

    /**
     * @param $driver
     * @return mixed
     */
    protected function createDriver($driver)
    {
        if (isset($this->initialDrivers[$driver])) {
            $provider = $this->initialDrivers[$driver];
            $provider = __NAMESPACE__.'\\Providers\\'.$provider.'Provider';
            return $this->buildProvider($provider, $this->config->get($driver));
        }

        throw new \InvalidArgumentException("Driver [$driver] is not supported");
    }

    protected function buildProvider($provider, $config)
    {
        return new $provider($this->request, $config['client_id'], $config['client_secret'], $config['callback']);
    }
}
