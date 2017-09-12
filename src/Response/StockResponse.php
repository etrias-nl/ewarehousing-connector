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

namespace Etrias\EwarehousingConnector\Response;

use DateTime;
use Etrias\EwarehousingConnector\Types\ShopInformation;

class StockResponse
{
    /** @var int */
    protected $customerId;

    /** @var string */
    protected $articleCode;

    /** @var string */
    protected $description;

    /** @var float */
    protected $fysicalStock;

    /** @var float */
    protected $salableStock;

    /** @var float */
    protected $availableStock;

    /** @var float */
    protected $quarantaineStock;

    /** @var float */
    protected $pickableStock;

    /** @var string */
    protected $skuUnit;

    /** @var float */
    protected $netWeight;

    /** @var float */
    protected $grossWeight;

    /** @var DateTime */
    protected $updatedAt;

    /** @var string[] */
    protected $statuses;

    /** @var ShopInformation */
    protected $shopInformation;

    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param int $customerId
     *
     * @return StockResponse
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * @return string
     */
    public function getArticleCode()
    {
        return $this->articleCode;
    }

    /**
     * @param string $articleCode
     *
     * @return StockResponse
     */
    public function setArticleCode($articleCode)
    {
        $this->articleCode = $articleCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return StockResponse
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float
     */
    public function getFysicalStock()
    {
        return $this->fysicalStock;
    }

    /**
     * @param float $fysicalStock
     *
     * @return StockResponse
     */
    public function setFysicalStock($fysicalStock)
    {
        $this->fysicalStock = $fysicalStock;

        return $this;
    }

    /**
     * @return float
     */
    public function getSalableStock()
    {
        return $this->salableStock;
    }

    /**
     * @param float $salableStock
     *
     * @return StockResponse
     */
    public function setSalableStock($salableStock)
    {
        $this->salableStock = $salableStock;

        return $this;
    }

    /**
     * @return float
     */
    public function getAvailableStock()
    {
        return $this->availableStock;
    }

    /**
     * @param float $availableStock
     *
     * @return StockResponse
     */
    public function setAvailableStock($availableStock)
    {
        $this->availableStock = $availableStock;

        return $this;
    }

    /**
     * @return float
     */
    public function getQuarantaineStock()
    {
        return $this->quarantaineStock;
    }

    /**
     * @param float $availableStock
     * @param mixed $quarantaineStock
     *
     * @return StockResponse
     */
    public function setQuarantaineStock($quarantaineStock)
    {
        $this->quarantaineStock = $quarantaineStock;

        return $this;
    }

    /**
     * @return float
     */
    public function getPickableStock()
    {
        return $this->pickableStock;
    }

    /**
     * @param float $availableStock
     * @param mixed $pickableStock
     *
     * @return StockResponse
     */
    public function setPickableStock($pickableStock)
    {
        $this->pickableStock = $pickableStock;

        return $this;
    }

    /**
     * @return string
     */
    public function getSkuUnit()
    {
        return $this->skuUnit;
    }

    /**
     * @param string $skuUnit
     *
     * @return StockResponse
     */
    public function setSkuUnit($skuUnit)
    {
        $this->skuUnit = $skuUnit;

        return $this;
    }

    /**
     * @return float
     */
    public function getNetWeight()
    {
        return $this->netWeight;
    }

    /**
     * @param float $netWeight
     *
     * @return StockResponse
     */
    public function setNetWeight($netWeight)
    {
        $this->netWeight = $netWeight;

        return $this;
    }

    /**
     * @return float
     */
    public function getGrossWeight()
    {
        return $this->grossWeight;
    }

    /**
     * @param float $grossWeight
     *
     * @return StockResponse
     */
    public function setGrossWeight($grossWeight)
    {
        $this->grossWeight = $grossWeight;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $updatedAt
     *
     * @return StockResponse
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return \string[]
     */
    public function getStatuses()
    {
        return $this->statuses;
    }

    /**
     * @param \string[] $statuses
     *
     * @return StockResponse
     */
    public function setStatuses($statuses)
    {
        $this->statuses = $statuses;

        return $this;
    }

    /**
     * @return ShopInformation
     */
    public function getShopInformation()
    {
        return $this->shopInformation;
    }

    /**
     * @param ShopInformation $shopInformation
     *
     * @return StockResponse
     */
    public function setShopInformation($shopInformation)
    {
        $this->shopInformation = $shopInformation;

        return $this;
    }
}
