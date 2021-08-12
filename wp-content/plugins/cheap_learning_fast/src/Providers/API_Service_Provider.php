<?php


namespace Cheap_Learning_Fast\Providers;

use Cheap_Learning_Fast\Helpers\View;
use Cheap_Learning_Fast\Plugin;
use Cheap_Learning_Fast\Controllers\API_Controller;

class API_Service_Provider
{
    public function __construct()
    {
        /**
         * @var Cheap_Learning_Fast\Controllers\API_Controller
         */
        $this->api = new API_Controller();
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
        $this->api->init();
    }
}
