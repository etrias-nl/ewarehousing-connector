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

namespace Tests\Etrias\EwarehousingConnector\Functional\Services;


/**
 * @coversNothing
 */
class AuthenticationServiceTest extends AbstractServiceTest
{
    public function testGetContext()
    {
        var_dump($this->authenticationService->getContext());
    }
}
