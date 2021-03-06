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

class Address
{
    /** @var string */
    protected $numberExtension;

    /** @var string */
    protected $contactPerson;

    /** @var string */
    protected $phoneNumber;

    /** @var string */
    protected $faxNumber;

    /** @var string */
    protected $email;

    /** @var string */
    protected $addressee;

    /** @var string */
    protected $street;

    /** @var string */
    protected $streetNumber;

    /** @var string */
    protected $zipcode;

    /** @var string */
    protected $city;

    /** @var string e.g. NL, EN */
    protected $country;

    /** @var  string */
    protected $streetAddition;

    public function __construct(
        $addressee,
        $street,
        $street_number,
        $zipcode,
        $city,
        $country
    ) {
        $this->addressee = $addressee;
        $this->street = $street;
        $this->streetNumber = $street_number;
        $this->zipcode = $zipcode;
        $this->city = $city;
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getNumberExtension()
    {
        return $this->numberExtension;
    }

    /**
     * @param string $numberExtension
     *
     * @return Address
     */
    public function setNumberExtension($numberExtension)
    {
        $this->numberExtension = $numberExtension;

        return $this;
    }

    /**
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * @param string $contactPerson
     *
     * @return Address
     */
    public function setContactPerson($contactPerson)
    {
        $this->contactPerson = $contactPerson;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     *
     * @return Address
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * @param string $faxNumber
     *
     * @return Address
     */
    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return Address
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressee()
    {
        return $this->addressee;
    }

    /**
     * @param string $addressee
     *
     * @return Address
     */
    public function setAddressee($addressee)
    {
        $this->addressee = $addressee;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street ? $this->street : '';
    }

    /**
     * @param string $street
     *
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber ? $this->streetNumber : '';
    }

    /**
     * @param string $streetNumber
     *
     * @return Address
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreetAddition()
    {
        return $this->streetAddition ? $this->streetAddition : '';
    }

    /**
     * @param string $streetAddition
     *
     * @return Address
     */
    public function setStreetAddition($streetAddition)
    {
        $this->streetAddition = $streetAddition;

        return $this;
    }

    /**
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode ? $this->zipcode : '';
    }

    /**
     * @param string $zipcode
     *
     * @return Address
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city ? $this->city : '';
    }

    /**
     * @param string $city
     *
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country ? $this->country : '';
    }

    /**
     * @param string $country
     *
     * @return Address
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }
}
