<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 14:03
 */

namespace Etrias\EwarehousingConnector\Services;


use Etrias\EwarehousingConnector\Client\EwarehousingClient;
use Etrias\EwarehousingConnector\Client\EwarehousingClientInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\Cache\Adapter\NullAdapter;

class AuthenticationService implements AuthenticationServiceInterface
{
    const CACHE_KEY = 'eWh-context-cc503444-6c3a-4fb7-b492-a75f2caa63a9';
    const CACHE_TTL = 60*15;

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

    /**
     * @var EwarehousingClient
     */
    protected $client;

    /** @var AdapterInterface */
    protected $cacheAdapter;


    /**
     * AuthenticationService constructor.
     * @param EwarehousingClientInterface $client
     * @param string $userName
     * @param string $customerId
     * @param string $password
     * @param AdapterInterface|null $cacheAdapter
     */
    public function __construct(
        EwarehousingClientInterface $client,
        $userName,
        $customerId,
        $password,
        AdapterInterface $cacheAdapter = null
    )
    {
        $this->userName = $userName;
        $this->customerId = $customerId;
        $this->password = $password;
        $this->client = $client;
        if ($cacheAdapter === null) {
            $this->cacheAdapter = new NullAdapter();
        } else {
            $this->cacheAdapter = $cacheAdapter;
        }
    }

    public function getContext()
    {
        $cacheItem = $this->cacheAdapter->getItem(static::CACHE_KEY);
        if ($cacheItem->isHit()) {
            return $cacheItem->get();
        }

        $data = [
            'username' => $this->userName,
            'customer_id' => $this->customerId,
            'password' => md5($this->password),
        ];

        $response = $this->client->post('2/auth', ['form_params' => $data]);

        $context = $response->getBody()->getContents();

        $cacheItem
            ->expiresAfter(static::CACHE_TTL)
            ->set($context);

        $this->cacheAdapter->save($cacheItem);

        return $context;
    }
}
