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
use Etrias\EwarehousingConnector\Response\StockResponse;
use Etrias\EwarehousingConnector\Response\SuccessResponse;
use Etrias\EwarehousingConnector\Services\OrderService;
use Etrias\EwarehousingConnector\Services\StockService;
use Etrias\EwarehousingConnector\Types\Address;
use Etrias\EwarehousingConnector\Types\CancelOrderLine;
use Etrias\EwarehousingConnector\Types\Order;
use Etrias\EwarehousingConnector\Types\OrderLine;
use Etrias\EwarehousingConnector\Types\StockProduct;


class StockServiceTest extends BaseServiceTest
{

    /** @var  StockService */
    protected $service;

    protected static $reference;

//    public static function setUpBeforeClass()
//    {
//        static::$reference = 'order_'.rand();
//    }


    public function setUp()
    {
        parent::setUp();
        $this->service = new StockService($this->client, $this->serializer);
    }

    public function testGetListing()
    {
        $response = $this->service->getListing();

        $this->assertTrue(is_array($response));
        $this->assertInstanceOf(StockResponse::class, reset($response));
    }

    public function testUpdateStock()
    {
        $response = $this->service->updateStock('190325090616', 99,45);
        $this->assertInstanceOf(SuccessResponse::class, $response);
    }

    public function testCreateStock()
    {
        $products = [
            new StockProduct('testStock'.rand(), 'test'.rand()),
            new StockProduct('testStock'.rand(), 'test'.rand())
        ];

        $response = $this->service->createStock($products);
        $this->assertInstanceOf(SuccessResponse::class, $response);
    }

}
