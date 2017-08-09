<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 15:21
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
