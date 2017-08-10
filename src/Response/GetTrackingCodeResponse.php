<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 9-8-17
 * Time: 9:18
 */

namespace Etrias\EwarehousingConnector\Response;


use Etrias\EwarehousingConnector\Types\Label;

class GetTrackingCodeResponse
{
    /** @var  string */
    protected $orderReference;

    /** @var  bool */
    protected $sent;

    /** @var  string */
    protected $zipcode;

    /** @var  Label[] */
    protected $labels = [];

    /** @var  string */
    protected $trackingCode;

    /** @var  string */
    protected $trackingUrl;

    /**
     * @return string
     */
    public function getOrderReference()
    {
        return $this->orderReference;
    }

    /**
     * @param string $orderReference
     * @return GetTrackingCodeResponse
     */
    public function setOrderReference($orderReference)
    {
        $this->orderReference = $orderReference;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSent()
    {
        return $this->sent;
    }

    /**
     * @param bool $sent
     * @return GetTrackingCodeResponse
     */
    public function setSent($sent)
    {
        $this->sent = $sent;

        return $this;
    }

    /**
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param string $zipcode
     * @return GetTrackingCodeResponse
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * @return Label[]
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * @param Label[] $labels
     * @return GetTrackingCodeResponse
     */
    public function setLabels($labels)
    {
        $this->labels = $labels;

        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingCode()
    {
        return $this->trackingCode;
    }

    /**
     * @param string $trackingCode
     * @return GetTrackingCodeResponse
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
     * @return GetTrackingCodeResponse
     */
    public function setTrackingUrl($trackingUrl)
    {
        $this->trackingUrl = $trackingUrl;

        return $this;
    }




}
