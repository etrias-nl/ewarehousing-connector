<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 13:53
 */

namespace Etrias\EwarehousingConnector\Client;


interface EwarehousingClientInterface
{
    const ENDPOINT_PRODUCTION = 'https://ws.ewarehousing.nl';
    const ENDPOINT_TEST = 'https://ws.ewarehousing.nl';
    const ENDPOINT_DEBUGGING_PROXY = 'https://private-anon-57d9e95c49-ewarehousing.apiary-proxy.com';
    const ENDPOINT_MOCK = 'https://private-anon-57d9e95c49-ewarehousing.apiary-mock.com';
}
