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

use DateTime;
use Etrias\EwarehousingConnector\Response\InboundResponse;
use Etrias\EwarehousingConnector\Response\SuccessResponse;
use Etrias\EwarehousingConnector\Types\InboundLine;

interface InboundServiceInterface
{
    /**
     * @param DateTime $from
     * @param DateTime|null $to
     * @param int      $page
     * @param null     $sort
     * @param null     $direction
     * @return InboundResponse[]
     */
    public function getListing(DateTime $from, DateTime $to = null, $page = 1, $sort = null, $direction = null);

    /**
     * @param $reference
     * @param InboundLine[] $lines
     * @return SuccessResponse
     */
    public function createInbound($reference, array $lines);
}
