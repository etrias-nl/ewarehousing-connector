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

class CancelOrderLine
{
    /** @var string */
    private $articleCode;

    /** @var int */
    private $quantity;

    /**
     * CancelOrderLine constructor.
     *
     * @param string $articleCode
     * @param int    $quantity
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
     *
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
     *
     * @return CancelOrderLine
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
}
