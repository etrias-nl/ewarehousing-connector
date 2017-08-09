<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 9-8-17
 * Time: 9:18
 */

namespace Etrias\EwarehousingConnector\Response;

use DateTime;
use Etrias\EwarehousingConnector\Types\Address;
use Etrias\EwarehousingConnector\Types\OrderLine;

class SuccessResponse
{
    public function getSuccess() {
        return true;
    }
}
