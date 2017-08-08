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

namespace Tests\Etrias\PaazlConnector\Functional\Services;

use Etrias\EwarehousingConnector\Client\EwarehousingClient;
use Etrias\EwarehousingConnector\Client\EwarehousingClientInterface;
use Etrias\EwarehousingConnector\Services\AuthenticationService;
use Etrias\EwarehousingConnector\Services\AuthenticationServiceInterface;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;

/**
 * @coversNothing
 */
abstract class AbstractServiceTest
{
    /** @var  EwarehousingClientInterface */
    protected $client;

    /** @var  AuthenticationServiceInterface */
    protected $authenticationService;

    public function setUp()
    {
        $this->client = new EwarehousingClient();
        $this->authenticationService = new AuthenticationService(
            $this->client,
            getenv('USERNAME'),
            getenv('CUSTOMERID'),
            getenv('PASSWORD')
        );
    }

    public function testGetContext()
    {

    }
}
