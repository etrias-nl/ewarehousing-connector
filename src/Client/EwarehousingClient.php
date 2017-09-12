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
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;
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
     *
     * @throws BadRequestException
     *
     * @return ResponseInterface
     */
    protected function parseError(ResponseInterface $response, Throwable $previous = null)
    {
        $body = json_decode($response->getBody(), true);

        if ($body === null && $previous !== null) {
            throw $previous;
        }

        if (is_array($body)) {
            $errors = $body['errors'] ?? $body['error'] ?? null;
            if (is_array($errors)) {
                $exception = new BadRequestException('multiple exceptions see childs', null, $previous);
                foreach ($errors as $error) {
                    $exception->addChild(new BadRequestException(json_encode($error), null, $previous));
                }
                throw $exception;
            } elseif ($errors !== null) {
                throw new BadRequestException($body['error'] ?? 'Bad eWarehousing request', null, $previous);
            }
        }

        return $response;
    }
}
