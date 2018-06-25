<?php
namespace Acme\App;

use \Acme\Util\Util;

class Type_A implements IProcessor
{
    const columnsName = array("A" => "Field_A*", "B" => "#Field_B", "C" => "Field_C", "D" => "Field_D*", "E" => "Field_E*");

    public static function process($file)
    {
        return Util::validateData($file, self::columnsName);
    }

}