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

use Etrias\EwarehousingConnector\Client\ClientFactory;
use Etrias\EwarehousingConnector\Client\EwarehousingClient;
use Etrias\EwarehousingConnector\Client\EwarehousingClientInterface;
use Etrias\EwarehousingConnector\Serializer\ArrayDeserializationVisitor;
use Etrias\EwarehousingConnector\Serializer\ArraySerializationVisitor;
use Etrias\EwarehousingConnector\Serializer\Handler\DateHandler;
use Etrias\EwarehousingConnector\Services\AuthenticationService;
use JMS\Serializer\Accessor\DefaultAccessorStrategy;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Naming\CamelCaseNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

/**
 * @coversNothing
 */
abstract class BaseServiceTest extends TestCase
{
    /** @var EwarehousingClient */
    protected $client;

    /** @var SerializerInterface */
    protected $serializer;

    public function setUp()
    {
        $config = [
            'base_uri' => EwarehousingClientInterface::ENDPOINT_TEST,
        ];

        $client = new EwarehousingClient($config);

        $this->serializer = SerializerBuilder::create()
            ->setCacheDir(sys_get_temp_dir().'/jms-cache')
            ->setDebug(true)
            ->addMetadataDir(__DIR__.'/../../../src/Serializer/Metadata', 'Etrias\EwarehousingConnector')
            ->addDefaultDeserializationVisitors()
            ->addDefaultSerializationVisitors()
            ->addDefaultHandlers()
            ->configureHandlers(function (HandlerRegistry $registry) {
                $registry->registerSubscribingHandler(new DateHandler());
            })
            ->setSerializationVisitor('array', new ArraySerializationVisitor(new SerializedNameAnnotationStrategy(new CamelCaseNamingStrategy()), new DefaultAccessorStrategy()))
            ->setDeserializationVisitor('array', new ArrayDeserializationVisitor(new SerializedNameAnnotationStrategy(new CamelCaseNamingStrategy()), new DefaultAccessorStrategy()))
            ->build();

        $authenticationService = new AuthenticationService(
            $client,
            $this->serializer,
            getenv('USERNAME'),
            getenv('CUSTOMERID'),
            getenv('PASSWORD'),
            new FilesystemAdapter()
        );

        $this->client = ClientFactory::create($config, $authenticationService);
    }
}
