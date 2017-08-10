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

class EwarehousingClient extends Client implements EwarehousingClientInterface
{
    public function __call($method, $args)
    {
        try {
            return parent::__call($method, $args);
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);

            if (is_array($response['error'])) {
                $exception = new BadRequestException('multiple exceptions see childs', null, $e);
                foreach ($response['error'] as $error) {
                    $exception->addChild(new BadRequestException(json_encode($error), null, $e));
                }
            } else {
                $exception = new BadRequestException($response['error'], null, $e);
            }

            throw $exception;
        }
    }
}
