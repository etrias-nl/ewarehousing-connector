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

namespace Etrias\EwarehousingConnector\Client;

use Etrias\EwarehousingConnector\Exceptions\BadRequestException;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\ClientException;
use Throwable;

class EwarehousingClient extends Client implements EwarehousingClientInterface
{
    public function __call($method, $args)
    {
        try {
            $response = parent::__call($method, $args);
            $response = $this->parseError($response);
        } catch (ClientException $e) {
            $response = $this->parseError($e->getResponse(), $e);
        }

        return $response;
    }

    /**
     * @param ResponseInterface $body
     * @return ResponseInterface
     * @throws BadRequestException
     */
    protected function parseError(ResponseInterface $response, Throwable $previous = null)
    {
        $body = json_decode($response->getBody(), true);

        if ($body === null && $previous !== null) {
            throw $previous;
        }

        if (is_array($body) && key_exists('error', $body)) {
            if (is_array($body['error'])) {
                $exception = new BadRequestException('multiple exceptions see childs', null, $previous);
                foreach ($body['error'] as $error) {
                    $exception->addChild(new BadRequestException(json_encode($error), null, $previous));
                }
            } else {
                $exception = new BadRequestException($body['error'] ?? 'Bad Paazl request', null, $previous);
            }

            throw $exception;
        }

        return $response;
    }
}
