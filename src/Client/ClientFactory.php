<?php

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Etrias\EwarehousingConnector\Client;

use Etrias\EwarehousingConnector\Client\Middleware\AuthenticationMiddleware;
use Etrias\EwarehousingConnector\Services\AuthenticationServiceInterface;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use RuntimeException;

class ClientFactory
{
    /** @var HandlerStack */
    protected $handlerStack;

    /** @var AuthenticationServiceInterface */
    protected $authenticationService;

    /** @var array */
    protected $config = [];

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @return $this
     */
    public function addDefaultHandlerStack()
    {
        $handler = new CurlHandler();
        $this->handlerStack = HandlerStack::create($handler);

        return $this;
    }

    /**
     * @param callable $callable
     * @param string   $name
     *
     * @return $this
     */
    public function pushToHandlerStack(callable $callable, $name = '')
    {
        if ($this->handlerStack === null) {
            $this->addDefaultHandlerStack();
        }

        $this->handlerStack->push($callable, $name);

        return $this;
    }

    /**
     * @return HandlerStack
     */
    public function getHandlerStack()
    {
        if ($this->handlerStack === null) {
            $this->addDefaultHandlerStack();
        }

        return $this->handlerStack;
    }

    /**
     * @param HandlerStack $handlerStack
     *
     * @return $this
     */
    public function setHandlerStack(HandlerStack $handlerStack)
    {
        $this->handlerStack = $handlerStack;

        return $this;
    }

    /**
     * @param AuthenticationServiceInterface $authenticationService
     *
     * @return $this
     */
    public function setAuthenticationService(AuthenticationServiceInterface $authenticationService)
    {
        $this->authenticationService = $authenticationService;

        return $this;
    }

    /**
     * @param array $config
     *
     * @return $this
     */
    public function setConfig(array $config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * @return EwarehousingClient
     */
    public function build()
    {
        if ($this->handlerStack === null) {
            $this->addDefaultHandlerStack();
        }

        $this->config = array_merge($this->config, ['handler' => $this->handlerStack]);

        if ($this->authenticationService === null) {
            throw new RuntimeException('There is no authenticationService set for Ewarehousing connector');
        }

        $this->handlerStack->push(new AuthenticationMiddleware($this->authenticationService));

        $client = new EwarehousingClient($this->config);

        return $client;
    }
}
