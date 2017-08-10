<?php

namespace Etrias\EwarehousingConnector\Serializer;

use JMS\Serializer\GenericDeserializationVisitor;

class ArrayDeserializationVisitor extends GenericDeserializationVisitor
{
    protected function decode($str)
    {
        return $str;
    }
}
