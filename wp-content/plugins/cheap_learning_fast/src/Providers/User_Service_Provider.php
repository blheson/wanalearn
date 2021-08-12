<?php

Namespace Cheap_Learning_Fast\Providers;

use Cheap_Learning_Fast\Helpers\View;
use Cheap_Learning_Fast\Controllers\User_Controller;


class User_Service_Provider
{
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
        add_action('register_form', array($this,'do'));
    }

    public function do()
    {
        // User_Controller
    }
}
