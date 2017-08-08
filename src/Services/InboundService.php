<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 14:03
 */

namespace Etrias\EwarehousingConnector\Services;


use DateTime;
use Etrias\EwarehousingConnector\Types\Address;
use Etrias\EwarehousingConnector\Types\CancelOrderLine;
use Etrias\EwarehousingConnector\Types\InboundLine;
use Etrias\EwarehousingConnector\Types\Order;
use Etrias\EwarehousingConnector\Types\OrderLine;
use Etrias\EwarehousingConnector\Types\StockProduct;

class InboundService implements InboundServiceInterface
{

    public function getListing(
        DateTime $from,
        DateTime $to,
        $page = 1,
        $sort = null,
        $direction = null
    )
    {
        //TODO;
    }

    public function createInbound($reference, array $lines)
    {
        //TODO;
    }
}
