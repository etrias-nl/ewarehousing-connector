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

class StockProduct
{
    /** @var string */
    protected $sku;

    /** @var string */
    protected $ean;

    /** @var int */
    protected $width;

    /** @var int */
    protected $height;

    /** @var int */
    protected $depth;

    /** @var int */
    protected $weight;

    /** @var bool */
    protected $extra;

    /** @var bool */
    protected $packingSlipVisible;

    /** @var string
     */
    private $articleCode;

    /**  @var string
     */
    private $description;

    /**
     * StockProduct constructor.
     *
     * @param string $articleCode
     * @param string $description
     */
    public function __construct(
        $articleCode,
        $description
    ) {
        $this->articleCode = $articleCode;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     *
     * @return StockProduct
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param string $ean
     *
     * @return StockProduct
     */
    public function setEan($ean)
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     *
     * @return StockProduct
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     *
     * @return StockProduct
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return int
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @param int $depth
     *
     * @return StockProduct
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;

        return $this;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     *
     * @return StockProduct
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return bool
     */
    public function isExtra()
    {
        return $this->extra;
    }

    /**
     * @param bool $extra
     *
     * @return StockProduct
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPackingSlipVisible()
    {
        return $this->packingSlipVisible;
    }

    /**
     * @param bool $packingSlipVisible
     *
     * @return StockProduct
     */
    public function setPackingSlipVisible($packingSlipVisible)
    {
        $this->packingSlipVisible = $packingSlipVisible;

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
     * @return StockProduct
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
     * @return StockProduct
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}
