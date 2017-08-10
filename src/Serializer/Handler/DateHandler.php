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

namespace Etrias\EwarehousingConnector\Serializer\Handler;

use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\DateHandler as BaseDateHandler;

class DateHandler extends BaseDateHandler
{
    public static function getSubscribingMethods()
    {
        $methods = [];
        $deserializationTypes = ['DateTime', 'DateTimeImmutable', 'DateInterval'];
        $serialisationTypes = ['DateTime', 'DateTimeImmutable', 'DateInterval'];

        foreach (['array'] as $format) {
            foreach ($deserializationTypes as $type) {
                $methods[] = [
                    'type' => $type,
                    'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                    'format' => $format,
                ];
            }

            foreach ($serialisationTypes as $type) {
                $methods[] = [
                    'type' => $type,
                    'format' => $format,
                    'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                    'method' => 'serialize'.$type,
                ];
            }
        }

        return $methods;
    }
}
