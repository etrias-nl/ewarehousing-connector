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

use Etrias\EwarehousingConnector\Response\GetContextResponse;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;


/**
 * @coversNothing
 */
class AuthenticationServiceTest extends BaseServiceTest
{
    public function testGetContext() {
        $response = $this->authenticationService->getContext();

        $this->assertInstanceOf(GetContextResponse::class, $response);
    }

    public function testGetHash()
    {
        $uuidFactory = new UuidFactory();
        $uuid = $uuidFactory->fromString($this->authenticationService->getHash());

        $this->assertInstanceOf(Uuid::class, $uuid);
    }
}
