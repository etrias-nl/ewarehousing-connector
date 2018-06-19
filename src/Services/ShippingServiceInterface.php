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

use Etrias\EwarehousingConnector\Response\ShippingResponse;

interface ShippingServiceInterface
{
    /**
     * @param string|null   $distributor
     * @param string|null   $code
     * @param string|null   $type
     *
     * @return ShippingResponse[]
     */
    public function getShippingMethods($distributor = null, $code = null, $type = null);

}
