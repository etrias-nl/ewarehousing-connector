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
use Etrias\EwarehousingConnector\Types\StockProduct;

class StockService implements StockServiceInterface
{
    public function getListing(
        $articleCode = null,
        $articleDescription = null,
        DateTime $updatedAfter = null,
        $page = 1,
        $limit = 1000,
        $sort = null,
        $direction = null
    ) {
        //TODO
    }

    public function updateStock($articleCode, $minStock, $margin)
    {
        //TODO
    }

    public function createStock(array $products = [])
    {
        //TODO
    }
}
