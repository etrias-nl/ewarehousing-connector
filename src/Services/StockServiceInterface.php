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
use Etrias\EwarehousingConnector\Response\StockResponse;
use Etrias\EwarehousingConnector\Response\SuccessResponse;
use Etrias\EwarehousingConnector\Types\StockProduct;

interface StockServiceInterface
{
    /**
     * @param string|null   $articleCode
     * @param string|null   $articleDescription
     * @param DateTime|null $updatedAfter
     * @param int           $page
     * @param int           $limit
     * @param null          $sort
     * @param null          $direction
     *
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
     * @param int    $minStock
     * @param int    $margin
     *
     * @return SuccessResponse
     */
    public function updateStock($articleCode, $minStock, $margin);

    /**
     * @param StockProduct[] $products
     *
     * @return SuccessResponse
     */
    public function createStock(array $products = []);
}
