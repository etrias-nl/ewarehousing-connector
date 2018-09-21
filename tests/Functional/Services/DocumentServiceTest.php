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

use Etrias\EwarehousingConnector\Response\DocumentResponse;
use Etrias\EwarehousingConnector\Services\DocumentService;
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
class DocumentServiceTest extends BaseServiceTest
{
    /** @var DocumentService */
    protected $service;

    /** @var OrderService */
    protected $orderService;

    static public $reference;

    public function setUp()
    {
        parent::setUp();
        $this->service = new DocumentService($this->client, $this->serializer);
        $this->orderService = new OrderService($this->client, $this->serializer);
        if (is_null(static::$reference)) {
            static::$reference = 'TE' . random_int(0, 99999999);
        }
        $address = new Address('test', 'street', '23', '1000AA', 'Amsterdam', 'NL');
        $orderLine = new OrderLine('8711131842835', 'WC-mat Sealskin Amy Turquoise', 5);
        $order = new Order(static::$reference, new DateTime('today'), $address, [$orderLine], 'nl');
        $response = $this->orderService->addOrder($order);
    }

    public function testAddDocumentToOrder()
    {
        $pdfContent = file_get_contents(__DIR__ . '/../../Resources/example.pdf');

        $response = $this->service->add(static::$reference, $pdfContent);

        $this->assertInstanceOf(SuccessResponse::class, $response);
    }

    public function testAddDocumentToOrderPrint()
    {
        $pdfContent = file_get_contents(__DIR__ . '/../../Resources/example.pdf');

        $response = $this->service->add(static::$reference, $pdfContent, null,2);

        $this->assertInstanceOf(SuccessResponse::class, $response);
    }

    public function testAddDocumentToOrderName()
    {
        $pdfContent = file_get_contents(__DIR__.'/../../Resources/example.pdf');

        $response = $this->service->add(static::$reference, $pdfContent, 'Test.pdf');
        $this->assertInstanceOf(SuccessResponse::class, $response);
    }

    public function testGetAll()
    {
        $response = $this->service->getAll(static::$reference);
        $this->assertCount(3, $response);
        foreach ($response as $document) {
            $this->assertInstanceOf(DocumentResponse::class, $document);
        }
    }

    public function testDelete()
    {
        $response = $this->service->getAll(static::$reference);
        foreach ($response as $document) {
            $deleteResponse = $this->service->delete($document->getId());
            $this->assertInstanceOf(SuccessResponse::class, $deleteResponse);
        }
    }
}
