<?php

namespace Cheap_Learning_Fast\Providers;

use Cheap_Learning_Fast\Helpers\View;
use Cheap_Learning_Fast\Controllers\User_Controller;
use Cheap_Learning_Fast\Controllers\Template_Controller;
use Cheap_Learning_Fast\Plugin;
use ReduxTemplates\Templates;

class Woo_Commerce_Service_Provider
{
    public function __construct()
    {
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
    }

    public function do()
    {
    }
}