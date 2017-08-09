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

namespace Tests\Etrias\EwarehousingConnector\Functional\Services;

use Doctrine\Common\Annotations\AnnotationReader;
use Etrias\EwarehousingConnector\Client\EwarehousingClient;
use Etrias\EwarehousingConnector\Client\EwarehousingClientInterface;
use Etrias\EwarehousingConnector\Response\GetContextResponse;
use Etrias\EwarehousingConnector\Services\AuthenticationService;
use Etrias\EwarehousingConnector\Services\AuthenticationServiceInterface;
use Etrias\EwarehousingConnector\Types\Customer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;


/**
 * @coversNothing
 */
abstract class BaseServiceTest extends TestCase
{
    /** @var  EwarehousingClientInterface */
    protected $client;

    /** @var  AuthenticationServiceInterface */
    protected $authenticationService;

    /** @var  SerializerInterface */
    protected $serializer;

    public function setUp()
    {
        $this->client = new EwarehousingClient([
            'base_uri' => EwarehousingClientInterface::ENDPOINT_TEST
        ]);

        $this->serializer = SerializerBuilder::create()
            ->setDebug(true)
            ->addMetadataDir(__DIR__.'/../../../src/Serializer/Metadata', 'Etrias\EwarehousingConnector')
            ->build();

        $this->authenticationService = new AuthenticationService(
            $this->client,
            $this->serializer,
            getenv('USERNAME'),
            getenv('CUSTOMERID'),
            getenv('PASSWORD')
        );
    }
}
