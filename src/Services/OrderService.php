<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 14:03
 */

namespace Etrias\EwarehousingConnector\Services;


use DateTime;
use Etrias\EwarehousingConnector\Client\EwarehousingClient;
use Etrias\EwarehousingConnector\Client\EwarehousingClientInterface;
use Etrias\EwarehousingConnector\Exceptions\OrderNotFoundException;
use Etrias\EwarehousingConnector\Response\OrderResponse;
use Etrias\EwarehousingConnector\Serializer\ServiceTrait;
use Etrias\EwarehousingConnector\Types\Address;
use Etrias\EwarehousingConnector\Types\CancelOrderLine;
use Etrias\EwarehousingConnector\Types\Order;
use Etrias\EwarehousingConnector\Types\OrderLine;
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
     * @param EwarehousingClient $client
     * @param SerializerInterface $serializer
     */
    public function __construct(EwarehousingClient $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * @param DateTime $from
     * @param DateTime $to
     * @param int $page
     * @param string|null $status
     * @param string|null $sort
     * @param string|null $direction
     * @return OrderResponse[]
     */
    public function getListing(
        DateTime $from,
        DateTime $to,
        $page = 1,
        $status = null,
        $sort = null,
        $direction = null
    )
    {
        $data = [
            'from' => $from->format('Y-m-d'),
            'to' => $to->format('Y-m-d'),
            'page' => $page,
            'status' => $status,
            'sort' => $sort,
            'direction' => $direction
        ];

        $guzzleResponse = $this->client->get('3/orders', ['query' => $data]);
        return $this->deserializeResponse($guzzleResponse, 'array<'.OrderResponse::class.'>');
    }

    /**
     * @param string $reference
     * @return OrderResponse
     * @throws OrderNotFoundException
     */
    public function getOrder($reference)
    {

        $guzzleResponse = $this->client->get('2/orders/order', ['query' => ['reference' => $reference]]);
        $order = $this->deserializeResponse($guzzleResponse, OrderResponse::class);

        return $order;
    }

    public function addOrder(Order $order) {
        //TODO
    }

    public function updateOrder(
        $reference,
        DateTime $date,
        Address $address = null,
        array $orderLines = null
    ) {
        //TODO
    }

    public function cancelOrder(
        $reference,
        array $orderLines = []
    ) {
        //TODO
    }

    public function getTrackingCode($reference) {
        //TODO
    }
}
