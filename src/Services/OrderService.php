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
use Etrias\EwarehousingConnector\Response\SuccessResponse;
use Etrias\EwarehousingConnector\Serializer\ServiceTrait;
use Etrias\EwarehousingConnector\Types\Address;
use Etrias\EwarehousingConnector\Types\CancelOrderLine;
use Etrias\EwarehousingConnector\Types\Order;
use Etrias\EwarehousingConnector\Types\OrderLine;
use GuzzleHttp\Exception\ClientException;
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

        $guzzleResponse = $this->client->get('3/orders', [RequestOptions::QUERY => $data]);
        return $this->deserializeResponse($guzzleResponse, 'array<'.OrderResponse::class.'>');
    }

    /**
     * @param string $reference
     * @return OrderResponse
     */
    public function getOrder($reference)
    {
        $guzzleResponse = $this->client->get('2/orders/order', [RequestOptions::QUERY => ['reference' => $reference]]);

        return $this->deserializeResponse($guzzleResponse, OrderResponse::class);
    }

    public function addOrder(Order $order) {
        $json = $this->serializer->serialize($order, 'json');
        $guzzleResponse = $this->client->post('/3/orders/create', [RequestOptions::FORM_PARAMS => json_decode($json, true)]);

        return $this->deserializeResponse($guzzleResponse, SuccessResponse::class);
    }

    /**
     * @param $reference
     * @param DateTime $date
     * @param Address|null $address
     * @param array|null $orderLines
     * @return SuccessResponse
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
            'address' => json_decode($this->serializer->serialize($address, 'json'), true),
            'order_lines' => json_decode($this->serializer->serialize($orderLines, 'json'), true)
        ];

        $guzzleResponse = $this->client->post('/1/orders/update', [RequestOptions::FORM_PARAMS => $data]);

        return $this->deserializeResponse($guzzleResponse, SuccessResponse::class);
    }

    /**
     * @param string $reference
     * @param OrderLine[] $orderLines
     */
    public function cancelOrder(
        $reference,
        array $orderLines = []
    ) {

        
        $guzzleResponse = $this->client->post('/1/orders/cancel/'.$reference, [RequestOptions::FORM_PARAMS => $data]);
    }

    public function getTrackingCode($reference) {
        //TODO
    }
}
