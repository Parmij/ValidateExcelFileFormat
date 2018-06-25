<?php

namespace Acme\App;

use Acme\Util\Util;

class Type_B implements IProcessor
{
    const columnsName = array("A" => "Field_A*", "B" => "#Field_B");

    public static function process($file)
    {
        return Util::validateData($file, self::columnsName);
    }

}