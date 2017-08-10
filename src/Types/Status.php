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
