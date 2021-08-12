<?php

namespace Cheap_Learning_Fast\Providers;

use Cheap_Learning_Fast\Helpers\View;
use Cheap_Learning_Fast\Plugin;
use Cheap_Learning_Fast\Controllers\Endpoint\User_Endpoint_Controller;
use Cheap_Learning_Fast\Controllers\Endpoint\Woocommerce_Endpoint_Controller;
use Cheap_Learning_Fast\Controllers\Endpoint\Flutterwave_Endpoint_Controller;

class Endpoint_Service_Provider
{
    public function __construct()
    {
        /**
         * @var Cheap_Learning_Fast\Controllers\Endpoint\User_Endpoint_Controller
         */
        $this->user = new User_Endpoint_Controller();
        /**
         * @var Cheap_Learning_Fast\Controllers\Endpoint\Woocommerce_Endpoint_Controller
         */
        $this->woocommerce = new Woocommerce_Endpoint_Controller();
          /**
         * @var Cheap_Learning_Fast\Controllers\Endpoint\Fluterwave_Endpoint_Controller
         */
        $this->flutterwave = new Flutterwave_Endpoint_Controller();
    }
    /**
     * Registers wordpress action hooks and filters.
     *
     * @return mixed|void
     *
     * @since 1.0.0
     */
    public function register()
    {
        add_action('init', [$this, 'run']);
    }

    /**
     * Callback function for the registered hooks and filters
     *
     * @return void
     * 
     * @since 1.0.0
     */
    public function run()
    {
        add_action('rest_api_init', array($this, 'do'));
    }

    public function do()
    {
        $this->user->init();
        $this->woocommerce->init();
        $this->flutterwave->init();
    }
}