<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 15:22
 */

namespace Etrias\EwarehousingConnector\Services;

use DateTime;
use Etrias\EwarehousingConnector\Response\StockResponse;
use Etrias\EwarehousingConnector\Types\StockProduct;

interface StockServiceInterface
{
    /**
     * @param string|null $articleCode
     * @param string|null $articleDescription
     * @param DateTime|null $updatedAfter
     * @param int $page
     * @param int $limit
     * @param null $sort
     * @param null $direction
     * @return StockResponse[]
     */
    public function getListing(
        $articleCode = null,
        $articleDescription = null,
        DateTime $updatedAfter = null,
        $page = 1,
        $limit = 1000,
        $sort = null,
        $direction = null
    );

    /**
     * @param string $articleCode
     * @param int $minStock
     * @param int $margin
     */
    public function updateStock($articleCode, $minStock, $margin);

    /**
     * @param StockProduct[] $products
     */
    public function createStock(array $products = []);
}
