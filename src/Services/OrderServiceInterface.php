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
use Etrias\EwarehousingConnector\Response\GetTrackingCodeResponse;
use Etrias\EwarehousingConnector\Response\OrderResponse;
use Etrias\EwarehousingConnector\Response\SuccessResponse;
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
     *
     * @return OrderResponse[]
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
     *
     * @return OrderResponse
     */
    public function getOrder($reference);

    /**
     * @param Order $order
     *
     * @return SuccessResponse
     */
    public function addOrder(Order $order);

    /**
     * @param $reference
     * @param DateTime     $date
     * @param Address|null $address
     * @param OrderLine[]  $orderLines
     *
     * @return SuccessResponse
     */
    public function updateOrder($reference, DateTime $date, Address $address = null, array $orderLines = null);

    /**
     * @param string            $reference
     * @param CancelOrderLine[] $orderLines
     *
     * @return SuccessResponse
     */
    public function cancelOrder($reference, array $orderLines = []);

    /**
     * @param string[] $references
     *
     * @return GetTrackingCodeResponse[]
     */
    public function getTrackingCode(array $references);

    /**
     * @param string            $reference
     * @param string            $fileContent
     * @param integer           $quantityToPrint
     * @param boolean           $isShippingLabel
     *
     * @return SuccessResponse
     */
    public function addDocumentToOrder($reference, $fileContent, $quantityToPrint = 1, $isShippingLabel = 0);
}
