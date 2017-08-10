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

use DateTime;

class InboundLine
{
    /**
     * @var string
     */
    protected $articleCode;
    /**
     * @var DateTime
     */
    protected $date;
    /**
     * @var int
     */
    protected $quantity;

    /**
     * InboundLine constructor.
     *
     * @param string   $articleCode
     * @param DateTime $date
     * @param int      $quantity
     */
    public function __construct($articleCode, DateTime $date, $quantity)
    {
        $this->articleCode = $articleCode;
        $this->date = $date;
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
     *
     * @return InboundLine
     */
    public function setArticleCode($articleCode)
    {
        $this->articleCode = $articleCode;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        var_dump('blaat');
        die($this->date);

        return $this->date;
    }

    /**
     * @param DateTime $date
     *
     * @return InboundLine
     */
    public function setDate($date)
    {
        $this->date = $date;

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
     *
     * @return InboundLine
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
}
