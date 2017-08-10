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

namespace Etrias\EwarehousingConnector\Services;

use Etrias\EwarehousingConnector\Response\GetContextResponse;

interface AuthenticationServiceInterface
{
    /**
     * @return GetContextResponse
     */
    public function getContext();

    /** @return string */
    public function getUsername();

    /**
     * @return string
     */
    public function getHash();
}
