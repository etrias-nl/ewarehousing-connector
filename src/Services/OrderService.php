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
use Etrias\EwarehousingConnector\Types\Order;
use Etrias\EwarehousingConnector\Types\OrderLine;

class OrderService implements OrderServiceInterface
{

    public function getListing(
        DateTime $from,
        DateTime $to,
        $page = 1,
        $status = null,
        $sort = null,
        $direction = null
    )
    {
        //TODO
    }

    public function getOrder($reference)
    {
        //TODO
    }

    public function addOrder(Order $order) {
        //TODO
    }

    public function updateOrder(
        $reference,
        DateTime $date,
        Address $address = null,
        array $orderLines = null
    ) {
        //TODO
    }

    public function cancelOrder(
        $reference,
        array $orderLines = []
    ) {
        //TODO
    }

    public function getTrackingCode($reference) {
        //TODO
    }
}
