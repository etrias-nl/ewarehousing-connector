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
use Etrias\EwarehousingConnector\Response\StockResponse;
use Etrias\EwarehousingConnector\Response\SuccessResponse;
use Etrias\EwarehousingConnector\Serializer\ServiceTrait;
use GuzzleHttp\RequestOptions;
use JMS\Serializer\SerializerInterface;

class StockService implements StockServiceInterface
{
    use ServiceTrait;

    /** @var EwarehousingClient */
    protected $client;

    /** @var SerializerInterface */
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
     *
     * @return StockResponse[]
     */
    public function getListing(
        array $articleCodes = [],
        $articleDescription = null,
        DateTime $updatedAfter = null,
        $page = 1,
        $limit = 1000,
        $sort = null,
        $direction = null
    ) {
        $data = [
            'article_code' => $articleCodes,
            'article_description' => $articleDescription,
            'updated_after' => $updatedAfter ? $updatedAfter->format('Y-m-d') : null,
            'page' => $page,
            'sort' => $sort,
            'direction' => $direction,
            'limit' => $limit,
        ];

        $guzzleResponse = $this->client->get('3/stock', [RequestOptions::QUERY => $data]);

        return $this->deserializeResponse($guzzleResponse, 'array<'.StockResponse::class.'>');
    }

    /**
     * {@inheritdoc}
     *
     * @return SuccessResponse
     */
    public function updateStock($articleCode, $minStock, $margin)
    {
        $data = [
            'article_code' => $articleCode,
            'min_stock' => $minStock,
            'margin' => $margin,
        ];

        $guzzleResponse = $this->client->post('2/stock/update', [RequestOptions::FORM_PARAMS => $data]);

        return $this->deserializeResponse($guzzleResponse, SuccessResponse::class);
    }

    /**
     * {@inheritdoc}
     *
     * @return SuccessResponse
     */
    public function createStock(array $products = [])
    {
        $data = [
            'products' => $this->serializer->serialize($products, 'array'),
        ];

        $guzzleResponse = $this->client->post('2/stock/create', [RequestOptions::FORM_PARAMS => $data]);

        return $this->deserializeResponse($guzzleResponse, SuccessResponse::class);
    }
}
