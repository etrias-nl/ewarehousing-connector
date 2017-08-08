<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 8-8-17
 * Time: 14:13
 */

namespace Etrias\EwarehousingConnector\Types;


class Status
{
    const CREATED = 'created';
    const PLANNED = 'planned';
    const PROCESSING = 'processing';
    const PARTIALLY_SHIPPED = 'partially_shipped';
    const SHIPPED = 'shipped';
    const BACK_ORDER = 'backorder';
    const CANCELLED = 'cancelled';
    const ON_HOLD = 'on_hold';
}
