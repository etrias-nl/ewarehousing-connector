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

class ClientFactory
{
    public static function create(array $config, AuthenticationServiceInterface $authenticationService)
    {
        $handler = new CurlHandler();
        $stack = HandlerStack::create($handler);
        $stack->push(new AuthenticationMiddleware($authenticationService));

        $client = new EwarehousingClient(array_merge($config, ['handler' => $stack]));

        return $client;
    }
}
