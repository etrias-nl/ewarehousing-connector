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

namespace Etrias\EwarehousingConnector\Types;

class InboundResponseLine
{
    /**
     * @var string
     */
    protected $itemId;

    /**
     * @var string
     */
    protected $articleCode;

    /**
     * @var string
     */
    protected $variant;

    /**
     * @var float
     */
    protected $quantity;

    /**
     * @var float
     */
    protected $processed;

    /**
     * @var string
     */
    protected $skuUnit;

    /**
     * @return string
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param string $itemId
     *
     * @return InboundResponseLine
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

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
     * @return InboundResponseLine
     */
    public function setArticleCode($articleCode)
    {
        $this->articleCode = $articleCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getVariant()
    {
        return $this->variant;
    }

    /**
     * @param string $variant
     *
     * @return InboundResponseLine
     */
    public function setVariant($variant)
    {
        $this->variant = $variant;

        return $this;
    }

    /**
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param float $quantity
     *
     * @return InboundResponseLine
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return float
     */
    public function getProcessed()
    {
        return $this->processed;
    }

    /**
     * @param float $processed
     * @return InboundResponseLine
     */
    public function setProcessed($processed)
    {
        $this->processed = $processed;

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
     * @return InboundResponseLine
     */
    public function setSkuUnit($skuUnit)
    {
        $this->skuUnit = $skuUnit;

        return $this;
    }
}
