<?php

namespace Cheap_Learning_Fast\Controllers\Endpoint;

use Cheap_Learning_Fast\Plugin;
use Cheap_Learning_Fast\Controllers\User_Controller;
use Cheap_Learning_Fast\Controllers\Woo_Commerce_Controller;


class Base_Endpoint_Controller
{
    public function __construct()
    {
        /**
         * @var Cheap_Learning_Fast\Controllers\User_Controller
         */
        $this->user = new User_Controller();
        /**
         * @var Cheap_Learning_Fast\Controllers\Woo_Commerce_Controller
         */
        $this->woo_commerce = new Woo_Commerce_Controller();
    }

    public function init()
    {
    }
    public function create_user_endpoint()
    {
       
    }
    public function create_woo_commerce_endpoint()
    {
      
    }
}
