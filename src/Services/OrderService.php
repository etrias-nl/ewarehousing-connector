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

namespace Etrias\EwarehousingConnector\Services;

use DateTime;
use Etrias\EwarehousingConnector\Client\EwarehousingClient;
use Etrias\EwarehousingConnector\Response\GetTrackingCodeResponse;
use Etrias\EwarehousingConnector\Response\OrderResponse;
use Etrias\EwarehousingConnector\Response\SuccessResponse;
use Etrias\EwarehousingConnector\Serializer\ServiceTrait;
use Etrias\EwarehousingConnector\Types\Address;
use Etrias\EwarehousingConnector\Types\Order;
use GuzzleHttp\RequestOptions;
use JMS\Serializer\SerializerInterface;

class OrderService implements OrderServiceInterface
{
    use ServiceTrait;

    /**
     * @var EwarehousingClient
     */
    protected $client;
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * OrderService constructor.
     *
     * @param EwarehousingClient  $client
     * @param SerializerInterface $serializer
     */
    public function __construct(EwarehousingClient $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * {@inheritdoc}
     * @return OrderResponse[]
     */
    public function getListing(
        DateTime $from,
        DateTime $to,
        $page = 1,
        $status = null,
        $sort = null,
        $direction = null
    ) {
        $data = [
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'page' => $page,
            'status' => $status,
            'sort' => $sort,
            'direction' => $direction,
        ];

        $guzzleResponse = $this->client->get('3/orders', [RequestOptions::QUERY => $data]);

        return $this->deserializeResponse($guzzleResponse, 'array<'.OrderResponse::class.'>');
    }

    /**
     * {@inheritdoc}
     * @return OrderResponse
     */
    public function getOrder($reference)
    {
        $guzzleResponse = $this->client->get('2/orders/order', [RequestOptions::QUERY => ['reference' => $reference]]);

        return $this->deserializeResponse($guzzleResponse, OrderResponse::class);
    }

    /**
     * {@inheritdoc}
     */
    public function addOrder(Order $order)
    {
        $json = $this->serializer->serialize($order, 'json');
        $guzzleResponse = $this->client->post('/3/orders/create', [RequestOptions::FORM_PARAMS => json_decode($json, true)]);

        return $this->deserializeResponse($guzzleResponse, SuccessResponse::class);
    }

    /**
     * {@inheritdoc}
     */
    public function updateOrder(
        $reference,
        DateTime $date,
        Address $address = null,
        array $orderLines = null
    ) {
        $data = [
            'reference' => $reference,
            'date' => $date->format('Y-m-d'),
            'address' => $this->serializer->serialize($address, 'array'),
            'order_lines' => $this->serializer->serialize($orderLines, 'array'),
        ];

        $guzzleResponse = $this->client->post('/1/orders/update', [RequestOptions::FORM_PARAMS => $data]);

        return $this->deserializeResponse($guzzleResponse, SuccessResponse::class);
    }

    /**
     * {@inheritdoc}
     */
    public function cancelOrder(
        $reference,
        array $orderLines = []
    ) {
        $data = [
            'order_lines' => $this->serializer->serialize($orderLines, 'array'),
        ];

        $guzzleResponse = $this->client->post('/1/orders/cancel/'.$reference, [RequestOptions::FORM_PARAMS => $data]);

        return $this->deserializeResponse($guzzleResponse, SuccessResponse::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getTrackingCode(array $references)
    {
        $guzzleResponse = $this->client->get('5/orders/tracking', [RequestOptions::QUERY => ['reference' => $references]]);

        return $this->deserializeResponse($guzzleResponse, 'array<string, '.GetTrackingCodeResponse::class.'>');
    }
}
