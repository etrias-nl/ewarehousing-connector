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

interface EwarehousingClientInterface
{
    const ENDPOINT_PRODUCTION = 'https://ws.ewarehousing.nl/';
    const ENDPOINT_TEST = 'http://ws.ewarehousing.nl/';
    const ENDPOINT_DEBUGGING_PROXY = 'https://private-anon-57d9e95c49-ewarehousing.apiary-proxy.com/';
    const ENDPOINT_MOCK = 'https://private-anon-57d9e95c49-ewarehousing.apiary-mock.com/';
}
