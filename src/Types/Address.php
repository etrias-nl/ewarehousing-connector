<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 14:23
 */

namespace Etrias\EwarehousingConnector\Types;


class Address
{
    /** @var  string */
    protected $numberExtension;

    /** @var  string */
    protected $contactPerson;

    /** @var  string */
    protected $phoneNumber;

    /** @var  string */
    protected $faxNumber;

    /** @var  string */
    protected $email;

    /** @var  string */
    protected $addressee;

    /** @var  string */
    protected $street;

    /** @var  string */
    protected $street_number;

    /** @var  string */
    protected $zipcode;

    /** @var  string */
    protected $city;

    /** @var  string e.g. NL, EN */
    protected $country;

    public function __construct(
        $addressee,
        $street,
        $street_number,
        $zipcode,
        $city,
        $country
    )
    {

        $this->addressee = $addressee;
        $this->street = $street;
        $this->street_number = $street_number;
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
        return $this->street;
    }

    /**
     * @param string $street
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
        return $this->street_number;
    }

    /**
     * @param string $street_number
     * @return Address
     */
    public function setStreetNumber($street_number)
    {
        $this->street_number = $street_number;

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
        return $this->city;
    }

    /**
     * @param string $city
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
        return $this->country;
    }

    /**
     * @param string $country
     * @return Address
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }


}
