<?php


namespace Etrias\EwarehousingConnector\Services;


use Etrias\EwarehousingConnector\Client\EwarehousingClient;
use Etrias\EwarehousingConnector\Response\DocumentResponse;
use Etrias\EwarehousingConnector\Response\SuccessResponse;
use Etrias\EwarehousingConnector\Serializer\ServiceTrait;
use GuzzleHttp\RequestOptions;
use JMS\Serializer\SerializerInterface;

class DocumentService implements DocumentServiceInterface
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
     * @param string $reference
     *
     * @return DocumentResponse[]
     */
    public function getAll($reference)
    {
        $data = [
            'reference' => $reference
        ];

        $guzzleResponse = $this->client->get('1/documents/order', [RequestOptions::QUERY => $data]);

        return $this->deserializeResponse($guzzleResponse, 'array<'.DocumentResponse::class.'>');
    }

    /**
     * {@inheritdoc}
     *
     * @return SuccessResponse;
     */
    public function add(
        $reference,
        $fileContent,
        $fileName = null,
        $quantityToPrint = null,
        $isShippingLabel = false
    ) {

        if ($fileName === null) {
            $fileName = $reference.'.pdf';
        }

        $data = [
            [
                'name'     => 'shippingLabel',
                'contents' => (int) $isShippingLabel
            ],
            [
                'name'     => 'file',
                'contents' => $fileContent,
                'filename' => $fileName
            ]
        ];

        if (is_numeric($quantityToPrint)) {
            $data[] = [
                'name'     => 'quantity',
                'contents' => $quantityToPrint
            ];
        }

        $guzzleResponse = $this->client->post(
            '/1/orders/document/'.$reference,
            [
                RequestOptions::MULTIPART => $data
            ]
        );

        return $this->deserializeResponse($guzzleResponse, SuccessResponse::class);
    }

    /**
     * @param string $documentId
     *
     * @return SuccessResponse
     */
    public function delete($documentId)
    {
        $guzzleResponse = $this->client->get(
            '/1/documents/delete/'.$documentId
        );

        return $this->deserializeResponse($guzzleResponse, SuccessResponse::class);
    }
}