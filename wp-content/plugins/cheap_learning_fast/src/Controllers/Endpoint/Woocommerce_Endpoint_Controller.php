<?php

namespace Cheap_Learning_Fast\Controllers\Endpoint;

use Cheap_Learning_Fast\Plugin;

use Cheap_Learning_Fast\Controllers\Woo_Commerce_Controller;

class Woocommerce_Endpoint_Controller extends Base_Endpoint_Controller
{
    public function __construct()
    {
        /**
         * @var Cheap_Learning_Fast\Controllers\Woo_Commerce_Controller
         */
        $this->woo_commerce = new Woo_Commerce_Controller();
    }

    public function init()
    {
        if(is_admin()){
            return;
        }
   
        $this->create_woo_commerce_endpoint();
    }
  
    public function create_woo_commerce_endpoint()
    {
        register_rest_route(
            Plugin::get_instance()->get_api_route_namespace(),
            'order',
            array(
                'methods' => \WP_REST_Server::CREATABLE,
                'callback' => array($this->woo_commerce, 'create_order'),
                'permission_callback' => '__return_true'
            )
        );
    }
}
