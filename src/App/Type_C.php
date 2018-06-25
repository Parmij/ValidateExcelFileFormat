<?php

namespace Acme\App;

use Acme\Util\Util;

class Type_C implements IProcessor
{
    const columnsName = array("A" => "Field_A*", "B" => "#Field_B", "C" => "Field_C",);

    public static function process($file)
    {
        return Util::validateData($file, self::columnsName);
    }

}