<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 9-8-17
 * Time: 9:18
 */

namespace Etrias\EwarehousingConnector\Response;

use DateTime;
use Etrias\EwarehousingConnector\Types\Address;
use Etrias\EwarehousingConnector\Types\OrderLine;

class OrderResponse
{
    /** @var  string */
    protected $reference;

    /** @var  DateTime */
    protected $date;

    /** @var  string */
    protected $shipped;

    /** @var  string */
    protected $statusCode;

    /** @var  Address */
    protected $deliveryAddress;

    /** @var  OrderLine[] */
    protected $orderLines = [];

    /** @var  string */
    protected $tracking;

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return OrderResponse
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     * @return OrderResponse
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return string
     */
    public function getShipped()
    {
        return $this->shipped;
    }

    /**
     * @param string $shipped
     * @return OrderResponse
     */
    public function setShipped($shipped)
    {
        $this->shipped = $shipped;

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
     * @return OrderResponse
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return Address
     */
    public function getDeliveryAddress()
    {
        return $this->deliveryAddress;
    }

    /**
     * @param Address $deliveryAddress
     * @return OrderResponse
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
    }

    /**
     * @return OrderLine[]
     */
    public function getOrderLines()
    {
        return $this->orderLines;
    }

    /**
     * @param OrderLine[] $orderLines
     * @return OrderResponse
     */
    public function setOrderLines($orderLines)
    {
        $this->orderLines = $orderLines;

        return $this;
    }

    /**
     * @return string
     */
    public function getTracking()
    {
        return $this->tracking;
    }

    /**
     * @param string $tracking
     * @return OrderResponse
     */
    public function setTracking($tracking)
    {
        $this->tracking = $tracking;

        return $this;
    }


}
