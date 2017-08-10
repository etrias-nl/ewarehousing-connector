<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 14:13
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

    /** @var  float */
    protected $quantity;

    /** @var  string */
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
     * @return InboundResponseLine
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

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
     * @return InboundResponseLine
     */
    public function setSkuUnit($skuUnit)
    {
        $this->skuUnit = $skuUnit;

        return $this;
    }



}
