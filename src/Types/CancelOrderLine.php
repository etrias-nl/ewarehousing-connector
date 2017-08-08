<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 14:13
 */

namespace Etrias\EwarehousingConnector\Types;


class CancelOrderLine
{
    /** @var string  */
    private $articleCode;

    /** @var int */
    private $quantity;

    /**
     * CancelOrderLine constructor.
     * @param string $articleCode
     * @param int $quantity
     */
    public function __construct($articleCode, $quantity)
    {
        $this->articleCode = $articleCode;
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
     * @return CancelOrderLine
     */
    public function setArticleCode($articleCode)
    {
        $this->articleCode = $articleCode;

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
     * @return CancelOrderLine
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }


}
