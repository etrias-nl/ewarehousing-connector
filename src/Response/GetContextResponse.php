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

use Etrias\EwarehousingConnector\Types\Customer;

class GetContextResponse
{
    /**
     * @var string
     */
    protected $context;

    /** @var Customer[] */
    protected $customers = [];

    /** @var string */
    protected $type;

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param string $context
     *
     * @return GetContextResponse
     */
    public function setContext($context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * @return Customer[]
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * @param Customer[] $customers
     *
     * @return GetContextResponse
     */
    public function setCustomers($customers)
    {
        $this->customers = $customers;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return GetContextResponse
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
