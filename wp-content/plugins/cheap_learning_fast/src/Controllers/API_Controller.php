<?php

namespace Cheap_Learning_Fast\Controllers;

use Cheap_Learning_Fast\Plugin;
use Cheap_Learning_Fast\Controllers\User_Controller;
use Cheap_Learning_Fast\Controllers\Woo_Commerce_Controller;


class API_Controller
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
        if(is_admin()){
            return;
        }
        $this->create_user_endpoint();
        $this->create_woo_commerce_endpoint();
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
