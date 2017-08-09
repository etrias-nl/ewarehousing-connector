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

use DateTime;
use Etrias\EwarehousingConnector\Response\OrderResponse;
use Etrias\EwarehousingConnector\Services\OrderService;


class OrderServiceTest extends BaseServiceTest
{

    /** @var  OrderService */
    protected $service;

    public function setUp()
    {
        parent::setUp();
        $this->service = new OrderService($this->client, $this->serializer);
    }

    public function testGetListing() {
        $response = $this->service->getListing(new DateTime('- 1 month'), new DateTime('today'));

        $this->assertTrue(is_array($response));
        $this->assertInstanceOf(OrderResponse::class, reset($response));
    }

    public function testGetorder() {
        $response = $this->service->getOrder('ET193417');

        $this->assertInstanceOf(OrderResponse::class, $response);
    }

}
