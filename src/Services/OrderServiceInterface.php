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
use Etrias\EwarehousingConnector\Types\Address;
use Etrias\EwarehousingConnector\Types\CancelOrderLine;
use Etrias\EwarehousingConnector\Types\Order;
use Etrias\EwarehousingConnector\Types\OrderLine;

interface OrderServiceInterface
{
    /**
     * @param DateTime    $from
     * @param DateTime    $to
     * @param int         $page
     * @param string|null $status
     * @param string|null $sort
     * @param string|null $direction
     */
    public function getListing(
        DateTime $from,
        DateTime $to,
        $page = 1,
        $status = null,
        $sort = null,
        $direction = null
    );

    /**
     * @param string $reference
     */
    public function getOrder($reference);

    /**
     * @param Order $order
     */
    public function addOrder(Order $order);

    /**
     * @param $reference
     * @param DateTime     $date
     * @param Address|null $address
     * @param OrderLine[]  $orderLines
     */
    public function updateOrder($reference, DateTime $date, Address $address = null, array $orderLines = null);

    /**
     * @param string            $reference
     * @param CancelOrderLine[] $orderLines
     */
    public function cancelOrder($reference, array $orderLines = []);

    /**
     * @param string[] $references
     */
    public function getTrackingCode(array $references);
}
