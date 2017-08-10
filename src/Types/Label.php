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

class Label
{
    /** @var string */
    protected $trackingCode;

    /** @var string */
    protected $trackingUrl;

    /** @var string */
    protected $shipper;

    /**
     * @return string
     */
    public function getTrackingCode()
    {
        return $this->trackingCode;
    }

    /**
     * @param string $trackingCode
     *
     * @return Label
     */
    public function setTrackingCode($trackingCode)
    {
        $this->trackingCode = $trackingCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingUrl()
    {
        return $this->trackingUrl;
    }

    /**
     * @param string $trackingUrl
     *
     * @return Label
     */
    public function setTrackingUrl($trackingUrl)
    {
        $this->trackingUrl = $trackingUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getShipper()
    {
        return $this->shipper;
    }

    /**
     * @param string $shipper
     *
     * @return Label
     */
    public function setShipper($shipper)
    {
        $this->shipper = $shipper;

        return $this;
    }
}
