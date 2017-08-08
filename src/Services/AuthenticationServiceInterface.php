<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 15:21
 */

namespace Etrias\EwarehousingConnector\Services;

interface AuthenticationServiceInterface
{

    /**
     * @return string
     */
    public function getContext();
}
