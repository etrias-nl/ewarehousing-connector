<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 14:13
 */

namespace Etrias\EwarehousingConnector\Types;


class Customer
{
    /** @var  string */
    protected $name;

    /** @var  int */
    protected $id;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Customer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Customer
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


}
