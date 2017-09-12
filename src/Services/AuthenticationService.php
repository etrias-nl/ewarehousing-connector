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

namespace Etrias\EwarehousingConnector\Services;

use Etrias\EwarehousingConnector\Client\EwarehousingClient;
use Etrias\EwarehousingConnector\Response\GetContextResponse;
use Etrias\EwarehousingConnector\Serializer\ServiceTrait;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\Cache\Adapter\NullAdapter;

class AuthenticationService implements AuthenticationServiceInterface
{
    use ServiceTrait;

    const CACHE_KEY = 'eWh-context-cc503444-6c3a-4fb7-b492-a75f2caa63a9';
    const CACHE_TTL = 60 * 15;

    /**
     * @var EwarehousingClient
     */
    protected $client;

    /** @var AdapterInterface */
    protected $cacheAdapter;

    /**
     * @var string
     */
    private $userName;
    /**
     * @var string
     */
    private $customerId;
    /**
     * @var string
     */
    private $password;

    /** @var bool */
    private $passwordIsPlain;

    /**
     * AuthenticationService constructor.
     *
     * @param EwarehousingClient    $client
     * @param SerializerInterface   $serializer
     * @param string                $userName
     * @param string                $customerId
     * @param string                $password
     * @param AdapterInterface|null $cacheAdapter
     * @param bool                  $passwordIsPlain
     */
    public function __construct(
        EwarehousingClient $client,
        SerializerInterface $serializer,
        $userName,
        $customerId,
        $password,
        AdapterInterface $cacheAdapter = null,
        $passwordIsPlain = true
    ) {
        $this->userName = $userName;
        $this->customerId = $customerId;
        $this->password = $password;
        $this->client = $client;
        if ($cacheAdapter === null) {
            $this->cacheAdapter = new NullAdapter();
        } else {
            $this->cacheAdapter = $cacheAdapter;
        }
        $this->serializer = $serializer;
        $this->passwordIsPlain = $passwordIsPlain;
    }

    /**
     * @return GetContextResponse
     */
    public function getContext()
    {
        $data = [
            'username' => $this->userName,
            'customer_id' => $this->customerId,
            'password' => $this->passwordIsPlain ? md5($this->password) : $this->password,
        ];

        $guzzleResponse = $this->client->post('2/auth', ['form_params' => $data]);

        return $this->deserializeResponse($guzzleResponse, GetContextResponse::class);
    }

    /**
     * @return string
     */
    public function getHash()
    {
        $cacheItem = $this->cacheAdapter->getItem(static::CACHE_KEY);
        if ($cacheItem->isHit()) {
            return $cacheItem->get();
        }

        $context = $this->getContext();

        $cacheItem
            ->expiresAfter(static::CACHE_TTL)
            ->set($context->getContext());

        $this->cacheAdapter->save($cacheItem);

        return $context->getContext();
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }
}
