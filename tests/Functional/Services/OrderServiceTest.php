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

/**
 * @coversNothing
 */
class OrderServiceTest extends BaseServiceTest
{
    /** @var OrderService */
    protected $service;

    static public $reference;

    public function setUp()
    {
        parent::setUp();
        $this->service = new OrderService($this->client, $this->serializer);
        if (is_null(static::$reference)) {
            static::$reference = 'TE' . random_int(0, 99999999);
        }
    }

    public function testGetListing()
    {
        $response = $this->service->getListing(new DateTime('- 1 month'), new DateTime('today'));

        $this->assertInternalType('array', $response);
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
        $orderLine = new OrderLine('8711131842835', 'WC-mat Sealskin Amy Turquoise', 5);
        $order = new Order(static::$reference, new DateTime('today'), $address, [$orderLine], 'nl');
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

    public function testUpdateOrderWithoutStreetNumber()
    {
        $address = new Address('test', 'street', null, '1000AA', 'Amsterdam', 'NL');
        $orderLine = new OrderLine('8711131842835', 'WC-mat Sealskin Amy Turquoise', 2);

        $response = $this->service->updateOrder(static::$reference, new DateTime('today'), $address, [$orderLine]);
        $this->assertInstanceOf(SuccessResponse::class, $response);
    }

    public function testCancelOrderWithOrderLine()
    {
        static::$reference = 'order_'.random_int(0, PHP_INT_MAX);
        $this->testAddOrder();
        $orderLines = [new OrderLine('8711131842835', '8711131842835', 1)];
        $response = $this->service->cancelOrder(static::$reference, $orderLines);
        $this->assertInstanceOf(SuccessResponse::class, $response);
    }

    public function testCancelOrderWithCancelOrderLine()
    {
        $orderLines = [new CancelOrderLine('8711131842835', 1)];
        $response = $this->service->cancelOrder(static::$reference, $orderLines);
        $this->assertInstanceOf(SuccessResponse::class, $response);
    }

    public function testCancelCompleteOder()
    {
        static::$reference = 'order_'.random_int(0, PHP_INT_MAX);
        $this->testAddOrder();
        $response = $this->service->cancelOrder(static::$reference);
        $this->assertInstanceOf(SuccessResponse::class, $response);
    }

    public function testGetTrackingCode()
    {
        $response = $this->service->getTrackingCode([static::$reference]);

        $this->assertInternalType('array', $response);
    }

    public function testGetListingToday()
    {
        $response = $this->service->getListing(
            new DateTime('- 1 month'),
            new DateTime('today'),
            1,
            null,
            null,
            null,
            new DateTime('yesterday')
        );

        $this->assertInternalType('array', $response);
        $this->assertInstanceOf(OrderResponse::class, reset($response));
    }
}
