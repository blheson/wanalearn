<?php

namespace Cheap_Learning_Fast\Controllers;

class Payment_Gateway_Controller 
{

    public static function _add_gateway_class($gateways)
    {
        $gateways[] = 'Cheap_Learning_Fast\Controllers\Flutterwave_Controller'; // your class name is here
        return $gateways;
    }

}
