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

namespace Etrias\EwarehousingConnector\Exceptions;

use Exception;
use Throwable;

class EwarehousingException extends Exception
{
    /** @var Throwable[] */
    protected $childErrors = [];

    /**
     * @param Throwable $throwable
     *
     * @return $this
     */
    public function addChild(Throwable $throwable)
    {
        $this->childErrors[] = $throwable;

        return $this;
    }

    /**
     * @return $this
     */
    public function clearChilds()
    {
        $this->childErrors = [];

        return $this;
    }

    public function getChilds()
    {
        return $this->childErrors;
    }

    public function hasChilds()
    {
        return count($this->childErrors) > 0;
    }
}
