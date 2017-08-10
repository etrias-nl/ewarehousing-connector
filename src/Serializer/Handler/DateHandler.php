<?php
/**
 * Created by PhpStorm.
 * User: cprinse
 * Date: 10-8-17
 * Time: 16:37
 */

namespace Etrias\EwarehousingConnector\Serializer\Handler;

use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\DateHandler as BaseDateHandler;

class DateHandler extends BaseDateHandler
{
    public static function getSubscribingMethods()
    {
        $methods = array();
        $deserializationTypes = array('DateTime', 'DateTimeImmutable', 'DateInterval');
        $serialisationTypes = array('DateTime', 'DateTimeImmutable', 'DateInterval');

        foreach (array('array') as $format) {

            foreach ($deserializationTypes as $type) {
                $methods[] = [
                    'type' => $type,
                    'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                    'format' => $format,
                ];
            }

            foreach ($serialisationTypes as $type) {
                $methods[] = array(
                    'type' => $type,
                    'format' => $format,
                    'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                    'method' => 'serialize' . $type,
                );
            }
        }

        return $methods;
    }
}
