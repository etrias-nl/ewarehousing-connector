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
use Etrias\EwarehousingConnector\Response\SuccessResponse;
use Etrias\EwarehousingConnector\Services\OrderService;
use Etrias\EwarehousingConnector\Types\Address;
use Etrias\EwarehousingConnector\Types\CancelOrderLine;
use Etrias\EwarehousingConnector\Types\Order;
use Etrias\EwarehousingConnector\Types\OrderLine;


class OrderServiceTest extends BaseServiceTest
{

    /** @var  OrderService */
    protected $service;

    protected static $reference;

    public static function setUpBeforeClass()
    {
        static::$reference = 'order_'.rand();
    }


    public function setUp()
    {
        parent::setUp();
        $this->service = new OrderService($this->client, $this->serializer);
    }

    public function testGetListing()
    {
        $response = $this->service->getListing(new DateTime('- 1 month'), new DateTime('today'));

        $this->assertTrue(is_array($response));
        $this->assertInstanceOf(OrderResponse::class, reset($response));
    }

    public function testGetorder()
    {
        $response = $this->service->getOrder('ET193417');

        $this->assertInstanceOf(OrderResponse::class, $response);
    }

    public function testAddOrder()
    {
        $address = new Address('test', 'street', '23', '1000AA', 'Amsterdam', 'NL');
        $orderLine = new OrderLine('8711131842835', 'WC-mat Sealskin Amy Turquoise', 2);
        $order = new Order(static::$reference, new DateTime('today'), $address, [$orderLine]);
        $response = $this->service->addOrder($order);
        $this->assertInstanceOf(SuccessResponse::class, $response);
    }

    public function testUpdateOrder()
    {
        $address = new Address('test', 'street', '23', '1000AA', 'Amsterdam', 'NL');
        $orderLine = new OrderLine('8711131842835', 'WC-mat Sealskin Amy Turquoise', 2);

        $response = $this->service->updateOrder(static::$reference, new DateTime('today'), $address, [$orderLine]);
        $this->assertInstanceOf(SuccessResponse::class, $response);
    }

    public function testCancelOrder()
    {
        $orderLines = [new CancelOrderLine('8711131842835', 5)];
        $response = $this->service->cancelOrder(static::$reference, $orderLines);
        $this->assertInstanceOf(SuccessResponse::class, $response);
    }

    public function testGetTrackingCode()
    {
        $response = $this->service->getTrackingCode([static::$reference]);

        $this->assertTrue(is_array($response));
    }

}
