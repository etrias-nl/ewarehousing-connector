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

use Etrias\EwarehousingConnector\Services\ShippingService;
use Etrias\EwarehousingConnector\Response\ShippingResponse;

/**
 * @coversNothing
 */
class ShippingServiceTest extends BaseServiceTest
{
    /** @var ShippingService */
    protected $service;

    public function setUp()
    {
        parent::setUp();
        $this->service = new ShippingService($this->client, $this->serializer);
    }

    public function testGetShippingMethods()
    {
        $response = $this->service->getShippingMethods();
var_dump($response);

        $this->assertInternalType('array', $response);
        //$this->assertInstanceOf(ShippingResponse::class, reset($response));
    }
}
