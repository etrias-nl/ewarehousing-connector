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
use Etrias\EwarehousingConnector\Response\InboundResponse;
use Etrias\EwarehousingConnector\Response\OrderResponse;
use Etrias\EwarehousingConnector\Response\StockResponse;
use Etrias\EwarehousingConnector\Response\SuccessResponse;
use Etrias\EwarehousingConnector\Services\InboundService;
use Etrias\EwarehousingConnector\Services\OrderService;
use Etrias\EwarehousingConnector\Services\StockService;
use Etrias\EwarehousingConnector\Types\Address;
use Etrias\EwarehousingConnector\Types\CancelOrderLine;
use Etrias\EwarehousingConnector\Types\InboundLine;
use Etrias\EwarehousingConnector\Types\Order;
use Etrias\EwarehousingConnector\Types\OrderLine;
use Etrias\EwarehousingConnector\Types\StockProduct;


class InboundServiceTest extends BaseServiceTest
{

    /** @var  InboundService */
    protected $service;

    protected static $reference;


    public function setUp()
    {
        parent::setUp();
        $this->service = new InboundService($this->client, $this->serializer);
    }

    public function testCreateInbound()
    {
        $response = $this->service->createInbound('order_844078270', [
            new InboundLine('TESTcode', new DateTime('yesterday'), 2)
        ]);

        $this->assertInstanceOf(SuccessResponse::class, $response);
    }

    public function testGetListing()
    {
        $response = $this->service->getListing();

        $this->assertTrue(is_array($response));
        $this->assertInstanceOf(InboundResponse::class, reset($response));
    }
}
