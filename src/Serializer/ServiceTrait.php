<?php

namespace Etrias\EwarehousingConnector\Serializer;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\ResponseInterface;

trait ServiceTrait
{
    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @param ResponseInterface $response
     * @param string $className
     * @param DeserializationContext $context
     * @return object
     */
    protected function deserializeResponse(ResponseInterface $response, $className, DeserializationContext $context = null)
    {
        $content = $response->getBody()->getContents();
        $response->getBody()->rewind();

        return $this->serializer->deserialize(
            $content,
            $className,
            'json',
            $context
        );
    }
}
