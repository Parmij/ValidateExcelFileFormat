<?php

namespace Acme\App;

use \Acme\App\IProcessor;

class Factory
{

    public static function process($file, IProcessor $iProcessor)
    {
        return $iProcessor->process($file);
    }

}