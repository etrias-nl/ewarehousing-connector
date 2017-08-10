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
use Etrias\EwarehousingConnector\Response\InboundResponse;
use Etrias\EwarehousingConnector\Response\SuccessResponse;
use Etrias\EwarehousingConnector\Serializer\ServiceTrait;
use Etrias\EwarehousingConnector\Types\Address;
use Etrias\EwarehousingConnector\Types\CancelOrderLine;
use Etrias\EwarehousingConnector\Types\InboundLine;
use Etrias\EwarehousingConnector\Types\Order;
use Etrias\EwarehousingConnector\Types\OrderLine;
use Etrias\EwarehousingConnector\Types\StockProduct;
use GuzzleHttp\RequestOptions;
use JMS\Serializer\SerializerInterface;

class InboundService implements InboundServiceInterface
{
    use ServiceTrait;

    /** @var EwarehousingClient */
    protected $client;

    /** @var SerializerInterface */
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
     * @inheritdoc
     */
    public function getListing(
        DateTime $from = null,
        DateTime $to = null,
        $page = 1,
        $sort = null,
        $direction = null
    )
    {
        $data = [
            'from' => $from ? $from->format('Y-m-d') : null,
            'to' => $to ? $to->format('Y-m-d') : null,
            'page' => $page,
            'sort' => $sort,
            'direction' => $direction,
        ];

        $guzzleResponse = $this->client->get('2/inbound', [RequestOptions::QUERY => $data]);
        return $this->deserializeResponse($guzzleResponse, 'array<'.InboundResponse::class.'>');
    }

    /**
     * @inheritdoc
     */
    public function createInbound($reference, array $lines)
    {
        $data = [
            'reference' => $reference,
            'lines' => $this->serializer->serialize($lines, 'array')
        ];

        $guzzleResponse = $this->client->post('2/inbound/create', [RequestOptions::FORM_PARAMS => $data]);
        return $this->deserializeResponse($guzzleResponse, SuccessResponse::class);
    }
}
