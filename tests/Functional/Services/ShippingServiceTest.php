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
use Etrias\EwarehousingConnector\Services\OrderService;
use Etrias\EwarehousingConnector\Services\ShippingService;
use Etrias\EwarehousingConnector\Response\ShippingResponse;
use Etrias\EwarehousingConnector\Types\Address;
use Etrias\EwarehousingConnector\Types\OrderLine;
use Etrias\EwarehousingConnector\Types\Order;
use Etrias\EwarehousingConnector\Response\SuccessResponse;

/**
 * @coversNothing
 */
class ShippingServiceTest extends BaseServiceTest
{
    /** @var ShippingService */
    protected $service;

    /** @var OrderService */
    protected $orderService;

    static public $reference;

    public function setUp()
    {
        parent::setUp();
        $this->service = new ShippingService($this->client, $this->serializer);
        $this->orderService = new OrderService($this->client, $this->serializer);
        if (is_null(static::$reference)) {
            static::$reference = 'TE' . random_int(0, 99999999);
        }
    }

    public function testGetShippingMethods()
    {
        $response = $this->service->getShippingMethods();

        $this->assertInternalType('array', $response);
        $this->assertInstanceOf(ShippingResponse::class, reset($response));
    }

    public function testAddOrderWithShippingMethod()
    {
        $address = new Address('test', 'street', '23', '1000AA', 'Amsterdam', 'NL');
        $orderLine = new OrderLine('8711131842835', 'Test Product', 5);
        $shippingMethods = $this->service->getShippingMethods(null, null, 'paazl');
        $shippingMethodCreate = $shippingMethods[0]->getId();
        $order = new Order(
            static::$reference,
            new DateTime('today'),
            $address,
            [$orderLine],
            'nl',
            $shippingMethodCreate
        );
        $response = $this->orderService->addOrder($order);
        $this->assertInstanceOf(SuccessResponse::class, $response);
        $order = $this->orderService->getOrder(static::$reference);
        $this->assertAttributeEquals($shippingMethodCreate, 'shippingMethod', $order);
    }

    public function testUpdateOrderShippingMethod()
    {
        $reference = 'TS' . random_int(0, 99999999);
        $address = new Address('test', 'street', '23', '1000AA', 'Amsterdam', 'NL');
        $orderLine = new OrderLine('8711131842835', 'Test Product', 5);
        $shippingMethods = $this->service->getShippingMethods(null, null, 'paazl');
        $shippingMethodCreate = $shippingMethods[0]->getId();
        $order = new Order(
            $reference,
            new DateTime('today'),
            $address,
            [$orderLine],
            'nl',
            $shippingMethodCreate
        );
        $response = $this->orderService->addOrder($order);
        $this->assertInstanceOf(SuccessResponse::class, $response);
        $shippingMethodUpdate = $shippingMethods[1]->getId();
        $response = $this->orderService->updateOrder(
            $reference,
            new DateTime('today'),
            $address,
            $order->getOrderLines(),
            $shippingMethodUpdate
        );
        $this->assertInstanceOf(SuccessResponse::class, $response);
        $order = $this->orderService->getOrder($reference);
        $this->assertAttributeEquals($shippingMethodUpdate, 'shippingMethod', $order);
    }
}
