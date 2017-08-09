<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 9-8-17
 * Time: 12:17
 */

namespace Etrias\EwarehousingConnector\Client;


use Etrias\EwarehousingConnector\Client\Middleware\AuthenticationMiddleware;
use Etrias\EwarehousingConnector\Services\AuthenticationServiceInterface;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;

class ClientFactory
{

    static public function create(array $config = [], AuthenticationServiceInterface $authenticationService)
    {
        $handler = new CurlHandler();
        $stack = HandlerStack::create($handler);
        $stack->push(new AuthenticationMiddleware($authenticationService));

        $client = new EwarehousingClient(array_merge($config, ['handler' => $stack]));

        return $client;
    }
}
