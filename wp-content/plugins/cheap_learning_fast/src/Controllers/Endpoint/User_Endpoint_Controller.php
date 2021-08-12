<?php

namespace Cheap_Learning_Fast\Controllers\Endpoint;

use Cheap_Learning_Fast\Plugin;
use Cheap_Learning_Fast\Controllers\User_Controller;

use Cheap_Learning_Fast\Controllers\Endpoint\Base_Endpoint_Controller;



class User_Endpoint_Controller extends Base_Endpoint_Controller
{
    public function __construct()
    {
        /**
         * @var Cheap_Learning_Fast\Controllers\User_Controller
         */
        $this->user = new User_Controller();
     
    }

    public function init()
    {
        if(is_admin()){
            return;
        }
        $this->create_user_endpoint();
  
    }
    public function create_user_endpoint()
    {
        //get user data
        register_rest_route(
            Plugin::get_instance()->get_api_route_namespace(),
            'user',
            array(
                'methods' => \WP_REST_Server::READABLE,
                'callback' => array($this->user, 'read'),
                'permission_callback' => '__return_true'
            )
        );
        //log user in
        register_rest_route(
            Plugin::get_instance()->get_api_route_namespace(),
            'user/login',
            array(
                'methods' => \WP_REST_Server::EDITABLE,
                'callback' => array($this->user, 'login'),
                'permission_callback' => '__return_true'
            )
        );
        //log user out
        register_rest_route(
            Plugin::get_instance()->get_api_route_namespace(),
            'user/logout',
            array(
                'methods' => \WP_REST_Server::READABLE,
                'callback' => array($this->user, 'logout'),
                'permission_callback' => '__return_true'
            )
        );
        //register new user
        register_rest_route(
            Plugin::get_instance()->get_api_route_namespace(),
            'user',
            array(
                'methods' => \WP_REST_Server::CREATABLE,
                'callback' => array($this->user, 'create'),
                'permission_callback' => '__return_true'
            )
        );
    }
  
}
