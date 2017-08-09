<?php

namespace Etrias\EwarehousingConnector\Client\Middleware;


use Etrias\EwarehousingConnector\Services\AuthenticationService;
use Etrias\EwarehousingConnector\Services\AuthenticationServiceInterface;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\RequestInterface;

class AuthenticationMiddleware
{

    /**
     * @var AuthenticationService
     */
    protected $authenticationService;

    /**
     * AuthenticationMiddleware constructor.
     * @param AuthenticationServiceInterface $authenticationService
     */
    public function __construct(AuthenticationServiceInterface $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            $encodedAuth = base64_encode($this->authenticationService->getUsername().":".$this->authenticationService->getHash());
            $request = $request->withHeader('Authorization', 'Basic '.$encodedAuth);
            return $handler($request, $options);
        };
    }
}
