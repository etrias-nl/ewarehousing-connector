<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 14:03
 */

namespace Etrias\EwarehousingConnector\Services;


use Etrias\EwarehousingConnector\Client\EwarehousingClientInterface;
use GuzzleHttp\Psr7\Request;

class AuthenticationService implements AuthenticationServiceInterface
{

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
     * @var EwarehousingClientInterface
     */
    protected $client;

    /**
     * AuthenticationService constructor.
     * @param EwarehousingClientInterface $client
     * @param string $userName
     * @param string $customerId
     * @param string $password
     */
    public function __construct(EwarehousingClientInterface $client, $userName, $customerId, $password)
    {

        $this->userName = $userName;
        $this->customerId = $customerId;
        $this->password = $password;
        $this->client = $client;
    }

    public function getContext()
    {
        $request = new Request();

    }
}
