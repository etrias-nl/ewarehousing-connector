<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 14:13
 */

namespace Etrias\EwarehousingConnector\Types;


class OrderLine
{
    /** @var string */
    protected $articleCode;

    /** @var string */
    protected $articleDescription;

    /** @var  int */
    protected $quantity;

    /** @var  string */
    protected $title;

    /** @var  string */
    protected $description;

    /** @var  string */
    protected $imageUrl;

    /** @var  string */
    protected $seoTitle;

    /** @var  string */
    protected $seoDescription;

    /** @var  string */
    protected $deepUrl;

    /** @var  string[] */
    protected $categories = [];

    /** @var  string[] */
    protected $serialNumbers = [];

    /** @var  string */
    protected $statusCode;

    public function __construct(
        $articleCode,
        $articleDescription,
        $quantity
    )
    {
        $this->articleCode = $articleCode;
        $this->articleDescription = $articleDescription;
        $this->quantity = $quantity;
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
     * @return OrderLine
     */
    public function setArticleCode($articleCode)
    {
        $this->articleCode = $articleCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getArticleDescription()
    {
        return $this->articleDescription;
    }

    /**
     * @param string $articleDescription
     * @return OrderLine
     */
    public function setArticleDescription($articleDescription)
    {
        $this->articleDescription = $articleDescription;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return OrderLine
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

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
     * @return OrderLine
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
     * @return OrderLine
     */
    public function setDescription($description)
    {
        $this->description = $description;

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
     * @return OrderLine
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

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
     * @return OrderLine
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
     * @return OrderLine
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
     * @return OrderLine
     */
    public function setDeepUrl($deepUrl)
    {
        $this->deepUrl = $deepUrl;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param string[] $categories
     * @return OrderLine
     */
    public function setCategories(array $categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @return \string[]
     */
    public function getSerialNumbers()
    {
        return $this->serialNumbers;
    }

    /**
     * @param \string[] $serialNumbers
     * @return OrderLine
     */
    public function setSerialNumbers(array $serialNumbers)
    {
        $this->serialNumbers = $serialNumbers;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param string $statusCode
     * @return OrderLine
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }




}
