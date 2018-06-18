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

namespace Etrias\EwarehousingConnector\Client\Middleware;

use Etrias\EwarehousingConnector\Services\AuthenticationService;
use Etrias\EwarehousingConnector\Services\AuthenticationServiceInterface;
use Psr\Http\Message\RequestInterface;

class AuthenticationMiddleware
{
    /**
     * @var AuthenticationService
     */
    protected $authenticationService;

    /**
     * AuthenticationMiddleware constructor.
     *
     * @param AuthenticationServiceInterface $authenticationService
     */
    public function __construct(AuthenticationServiceInterface $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function __invoke(callable $handler)
    {
        return function(RequestInterface $request, array $options) use ($handler) {
            $encodedAuth = base64_encode($this->authenticationService->getUsername().':'.$this->authenticationService->getHash());
            $request = $request->withHeader('Authorization', 'Basic '.$encodedAuth);

            return $handler($request, $options);
        };
    }
}
