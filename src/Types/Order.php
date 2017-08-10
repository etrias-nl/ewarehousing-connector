<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 14:13
 */

namespace Etrias\EwarehousingConnector\Types;


use DateTime;

class Order
{
    /**
     * @var string
     */
    protected $reference;
    /**
     * @var DateTime
     */
    protected $date;
    /**
     * @var Address
     */
    protected $address;
    /**
     * @var OrderLine[]
     */
    protected $orderLines = [];

    public function __construct (
        $reference,
        DateTime $date,
        Address $address,
        array $orderLines
    )
    {
        $this->reference = $reference;
        $this->date = $date;
        $this->address = $address;
        $this->orderLines = $orderLines;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     * @return Order
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
     * @return Order
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return Order
     */
    public function setAddress($address)
    {
        $this->address = $address;

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
     * @return Order
     */
    public function setOrderLines($orderLines)
    {
        $this->orderLines = $orderLines;

        return $this;
    }

}
