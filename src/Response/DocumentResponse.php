<?php
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 21-9-18
 * Time: 16:34
 */

namespace Etrias\EwarehousingConnector\Response;


use DateTime;

class DocumentResponse
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $orderId;

    /**
     * @var string
     */
    protected $externalReference;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $mimetype;

    /**
     * @var integer
     */
    protected $quantity;

    /**
     * @var bool
     */
    protected $shippingLabel;

    /**
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return DocumentResponse
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     * @return DocumentResponse
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalReference()
    {
        return $this->externalReference;
    }

    /**
     * @param string $externalReference
     * @return DocumentResponse
     */
    public function setExternalReference($externalReference)
    {
        $this->externalReference = $externalReference;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return DocumentResponse
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
     * @return DocumentResponse
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getMimetype()
    {
        return $this->mimetype;
    }

    /**
     * @param string $mimetype
     * @return DocumentResponse
     */
    public function setMimetype($mimetype)
    {
        $this->mimetype = $mimetype;
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
     * @return DocumentResponse
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return bool
     */
    public function isShippingLabel()
    {
        return $this->shippingLabel;
    }

    /**
     * @param bool $shippingLabel
     * @return DocumentResponse
     */
    public function setShippingLabel($shippingLabel)
    {
        $this->shippingLabel = $shippingLabel;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     * @return DocumentResponse
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}