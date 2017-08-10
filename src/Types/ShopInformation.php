<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 14:13
 */

namespace Etrias\EwarehousingConnector\Types;


class ShopInformation
{
    /** @var  string */
    protected $description;

    /** @var  float */
    protected $minStock;

    /** @var  float */
    protected $margin;

    /** @var  string */
    protected $imageUrl;

    /** @var  string */
    protected $title;

    /** @var  string */
    protected $seoTitle;

    /** @var  string */
    protected $seoDescription;

    /** @var  string */
    protected $deepUrl;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return ShopInformation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float
     */
    public function getMinStock()
    {
        return $this->minStock;
    }

    /**
     * @param float $minStock
     * @return ShopInformation
     */
    public function setMinStock($minStock)
    {
        $this->minStock = $minStock;

        return $this;
    }

    /**
     * @return float
     */
    public function getMargin()
    {
        return $this->margin;
    }

    /**
     * @param float $margin
     * @return ShopInformation
     */
    public function setMargin($margin)
    {
        $this->margin = $margin;

        return $this;
    }

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     * @return ShopInformation
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return ShopInformation
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getSeoTitle()
    {
        return $this->seoTitle;
    }

    /**
     * @param string $seoTitle
     * @return ShopInformation
     */
    public function setSeoTitle($seoTitle)
    {
        $this->seoTitle = $seoTitle;

        return $this;
    }

    /**
     * @return string
     */
    public function getSeoDescription()
    {
        return $this->seoDescription;
    }

    /**
     * @param string $seoDescription
     * @return ShopInformation
     */
    public function setSeoDescription($seoDescription)
    {
        $this->seoDescription = $seoDescription;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeepUrl()
    {
        return $this->deepUrl;
    }

    /**
     * @param string $deepUrl
     * @return ShopInformation
     */
    public function setDeepUrl($deepUrl)
    {
        $this->deepUrl = $deepUrl;

        return $this;
    }


}
