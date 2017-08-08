<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 15:21
 */

namespace Etrias\EwarehousingConnector\Services;

use DateTime;
use Etrias\EwarehousingConnector\Types\InboundLine;

interface InboundServiceInterface
{
    /**
     * @param DateTime $from
     * @param DateTime $to
     * @param int $page
     * @param null $sort
     * @param null $direction
     */
    public function getListing(DateTime $from, DateTime $to, $page = 1, $sort = null, $direction = null);

    /**
     * @param $reference
     * @param InboundLine[] $lines
     */
    public function createInbound($reference, array $lines);
}
