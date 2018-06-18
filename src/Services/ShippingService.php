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

use Etrias\EwarehousingConnector\Client\EwarehousingClient;
use Etrias\EwarehousingConnector\Response\ShippingResponse;
use Etrias\EwarehousingConnector\Serializer\ServiceTrait;
use GuzzleHttp\RequestOptions;
use JMS\Serializer\SerializerInterface;

class ShippingService implements ShippingServiceInterface
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
     * @return ShippingResponse[]
     */
    public function getShippingMethods(
        $distributor = null,
        $code = null,
        $type = null
    ) {
        $data = [
            'from' => $distributor,
            'to' => $code,
            'page' => $type
        ];

        $guzzleResponse = $this->client->get('1/shippingmethods', [RequestOptions::QUERY => $data]);

        return $this->deserializeResponse($guzzleResponse, 'array<'.ShippingResponse::class.'>');
    }

}
