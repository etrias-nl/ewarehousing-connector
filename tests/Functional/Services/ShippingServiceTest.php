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

    static public $shippingMethodCreate;

    static public $shippingMethodUpdate;

    public function setUp()
    {
        parent::setUp();
        $this->service = new ShippingService($this->client, $this->serializer);
        $this->orderService = new OrderService($this->client, $this->serializer);
        if (is_null(static::$reference)) {
            static::$reference = 'TE' . random_int(0, 99999999);
        }
        if (is_null(static::$shippingMethodCreate) && is_null(static::$shippingMethodUpdate)) {
            $shippingMethods = $this->service->getShippingMethods(null, null, 'paazl');
            static::$shippingMethodCreate = $shippingMethods[0]->getId();
            static::$shippingMethodUpdate = $shippingMethods[1]->getId();
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
        $order = new Order(
            static::$reference,
            new DateTime('today'),
            $address,
            [$orderLine],
            'nl',
            static::$shippingMethodCreate
        );
        $response = $this->orderService->addOrder($order);
        $this->assertInstanceOf(SuccessResponse::class, $response);
        $order = $this->orderService->getOrder(static::$reference);
        $this->assertAttributeEquals(static::$shippingMethodCreate, 'shippingMethod', $order);
    }

    public function testUpdateOrderShippingMethod()
    {
        $order = $this->orderService->getOrder(static::$reference);
        $response = $this->orderService->updateOrder(
            static::$reference,
            new DateTime('today'),
            $order->getDeliveryAddress(),
            $order->getOrderLines(),
            static::$shippingMethodUpdate
        );
        $this->assertInstanceOf(SuccessResponse::class, $response);
        $order = $this->orderService->getOrder(static::$reference);
        $this->assertAttributeEquals(static::$shippingMethodUpdate, 'shippingMethod', $order);
    }
}
