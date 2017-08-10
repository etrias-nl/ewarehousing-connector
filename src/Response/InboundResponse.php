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

namespace Etrias\EwarehousingConnector\Response;

use DateTime;
use Etrias\EwarehousingConnector\Types\InboundResponseLine;

class InboundResponse
{
    /** @var DateTime */
    protected $date;

    /** @var string */
    protected $reference;

    /** @var string */
    protected $status;

    /** @var string */
    protected $statusCode;

    /** @var string */
    protected $typeCode;

    /** @var InboundResponseLine[] */
    protected $inboundLines;

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     *
     * @return InboundResponse
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
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
     *
     * @return InboundResponse
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

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
     *
     * @return InboundResponse
     */
    public function setStatus($status)
    {
        $this->status = $status;

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
     *
     * @return InboundResponse
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getTypeCode()
    {
        return $this->typeCode;
    }

    /**
     * @param string $typeCode
     *
     * @return InboundResponse
     */
    public function setTypeCode($typeCode)
    {
        $this->typeCode = $typeCode;

        return $this;
    }

    /**
     * @return InboundResponseLine[]
     */
    public function getInboundLines()
    {
        return $this->inboundLines;
    }

    /**
     * @param InboundResponseLine[] $inboundLines
     *
     * @return InboundResponse
     */
    public function setInboundLines($inboundLines)
    {
        $this->inboundLines = $inboundLines;

        return $this;
    }
}
