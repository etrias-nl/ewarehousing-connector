<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 15:29
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
